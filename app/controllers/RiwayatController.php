<?php

class RiwayatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /riwayat
	 *
	 * @return Response
	 */
    public function getDownload()
    {
//        $pdf = App::make('dompdf');
//        $pdf->loadHTML('<h1>Hello World!!</h1>');
//        return $pdf->stream();
//        $data = Transaksi::get(['kendaraan_id','op_msk','pic_msk','msk_at','op_klr','pic_klr','klr_at']);
        $awal = Session::get('awal');
        $akhir = Session::get('akhir');
        if (empty($awal) && empty($akhir)) {
            $data = Transaksi::orderBy('msk_at','desc')->get();
        } else {
            $data = Transaksi::whereBetween('msk_at', array($awal,$akhir))->orderBy('msk_at','desc')->get();
        }
//        return Response::json(['data'=> $data->toArray()]);
        $pdf = PDF::loadView('admin.riwayat.tabel', compact('data'));
        return $pdf->stream();
    }
	public function getParkir()
	{
		return View::make('admin.riwayat.parkir')->with('title','Riwayat Parkir');
	}

	public function postParkir()
	{
//		$data = Input::get('foo');
//		Session::put('foo', $data);
//		var_dump($data['foo']);
//		return Response::json($data);
        $awal = Input::get('awal');
        $akhir = Input::get('akhir');
        Session::put('awal', $awal);
        Session::put('akhir', $akhir);
//        return $awal.'  '.$akhir;
	}

	public function postTest()
	{
//		$id = Input::get('id');
//		$transaksi = Transaksi::find($id);
//		return $transaksi->opkeluar->toArray();
	}

    public function getLog()
    {
        return View::make('admin.riwayat.operator')->with('title','Riwayat Operator');
    }

    public function postLog()
    {
        $user = Input::get('user');
        Session::put('user',$user);
        $notif = Notif::where('user_id','=',$user)->get();
        foreach ($notif as $a ) {
            $a->is_read = 1;
            $a->save();
        }
        //return $user;
        return Redirect::route('ad.getlog');
    }

}