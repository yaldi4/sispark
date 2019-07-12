<?php
use ElephantIO\Client,
    ElephantIO\Engine\SocketIO\Version1X;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('parkir', function()
{
    $data = Transaksi::with('kendaraan','opmasuk')->orderBy('msk_at','desc')->get();
	return View::make('admin.riwayat.tabel', compact('data'));
});
View::composer('admin.widget.notif', function($view)
{
    //$view->with('notif', Notif::all());
    $notif = DB::table('notif')->where('is_read', '=', 0)->orderBy('created_at', 'desc')->take(5)->get();
    //$view->with('notif', $notif);
    $count = DB::table('notif')->where('is_read', '=', 0)->count();
    $view->with(compact('notif','count'));
});
Route::resource('admin/user', 'UserController');
Route::resource('admin/pengendara', 'PengendaraController');
Route::resource('admin/kendaraan', 'KendaraanController');
Route::controller('admin/riwayat', 'RiwayatController', ['getParkir'=>'ad.getparkir','postParkir'=>'ad.postparkir',
                'getLog'=>'ad.getlog','postLog'=>'ad.postlog']);
Route::controller('operator', 'OperatorController', ['getMasuk'=>'op.getmasuk','postRfid'=>'op.postrfid','getNama'=>'op.getnama',
    'getKendaraan'=>'op.getkendaraan','postPic'=>'op.postpic','postPicKeluar'=>'op.postpickeluar','postKfrmMasuk'=>'op.kfrmmasuk',
    'postKfrmKeluar'=>'op.kfrmkeluar','getPic'=>'op.getpic', 'getKeluar'=>'op.getkeluar']);
Route::controller('table', 'TableController', ['getUser'=>'api.user','getPengendara'=>'api.pengendara','getParkir'=>'api.parkir',
                'getLog'=>'api.log']);
Route::controller('/','HomeController',['getIndex'=>'home.index','postLogin'=>'home.login','getLogout'=>'home.logout']);
Event::listen('operator.login', function($user)
{
    //var_dump($user);
    $notif = new Notif;
    $notif->user_id = Auth::user()->id;
    $notif->subject = $user->role;
    $notif->body = $user->username.' baru saja login';
    $notif->created_at = Carbon::now();
    $notif->save();
    $client = new Client(new Version1X('http://localhost:1337'));

    $tgl = date('c',strtotime($notif->created_at));
    $ago = date('F j, Y',strtotime($notif->created_at));
    $count = DB::table('notif')->where('is_read', '=', 0)->count();
    $client->initialize();
    $client->emit('login', ['nama' => Auth::user()->username, 'tgl' => $tgl, 'ago' => $ago, 'count' => $count, 'id' => $user->id]);
    $client->close();
});
Event::listen('operator.logout', function($user)
{
    //var_dump($user);
    $notif = new Notif;
    $notif->user_id = Auth::user()->id;
    $notif->subject = $user->role;
    $notif->body = $user->username.' baru saja logout';
    $notif->create_at = Carbon::now();
    $notif->save();
    $client = new Client(new Version1X('http://localhost:1337'));

    $tgl = date('c',strtotime($notif->created_at));
    $ago = date('F j, Y',strtotime($notif->created_at));
    $count = DB::table('notif')->where('is_read', '=', 0)->count();
    $client->initialize();
    $client->emit('logout', ['nama' => $user->username, 'tgl' => $tgl, 'ago' => $ago, 'count' => $count, 'id' => $user->id]);
    $client->close();
});