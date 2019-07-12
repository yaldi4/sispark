<?php

use Carbon\Carbon;

class TableController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /table
	 *
	 * @return Response
	 */
	public function getUser()
	{
		return Datatable::collection(User::all(array('id','username','role')))
			->showColumns('username', 'role')
			->addColumn('aksi',function($model){
				$data = '<button type="button" class="edit-btn btn btn-info btn-small" data-useredit="'.$model->id.'" >Edit User</button>
            <button type="button" class="delete-btn btn btn-warning btn-small" data-userdel="'.$model->id.'" >Delete User</button>';
				return $data;
			})
			->searchColumns('username','role')
			->orderColumns('username','role')
			->make();
	}

	public function getPengendara()
	{
		return Datatable::collection(Pengendara::all(array('id','pengenal','nama')))
			->showColumns('pengenal','nama')
			->addColumn('aksi',function($model){
				$data = '<button type="button" class="btn btn-info btn-small" data-pengendaraedit="'.$model->id.'" >edit</button>
				<button type="button" class="btn btn-warning btn-small" data-pengendaradel="'.$model->id.'" >delete</button>';
				return $data;
			})
			->searchColumns('nama')
			->orderColumns('nama')
			->make();
	}

	public function getParkir()
	{
        $awal = Session::get('awal');
        $akhir = Session::get('akhir');

        if (empty($awal) && empty($akhir)) {
            $transaksi = Transaksi::all();
        } else {
            $transaksi = Transaksi::whereBetween('msk_at', array($awal,$akhir))->get();
        }
//        $data = Transaksi::get(['kendaraan_id','op_msk','pic_msk','msk_at','op_klr','pic_klr','klr_at']);
//        return Response::json(['data'=> $data->toArray()]);{}

        return Datatable::collection($transaksi)
            ->addColumn('kendaraan',function($model){
                return $model->kendaraan->no_pol;
            })
            ->addColumn('pic_msk',function($model){
                $url = asset("uploads/".$model->pic_msk);
                $data = '<a href="'.$url.'" data-lightbox="image-1">
                <img  src="'.$url.'" width="80px" height="60px"></a>';
//                $data = "<img src=".$url." width='80px' height='60px'>";
                return $data;
            })
            ->addColumn('op_masuk',function($model){
                return $model->opmasuk->username;
            })
            ->addColumn('tgl_masuk',function($model){
                $dt = Carbon::parse($model->msk_at);
                return $dt->toDayDateTimeString();
            })
            ->addColumn('pic_klr',function($model){
                if (empty($model->pic_klr)) {
                    return 'belum keluar';
                } else {
                    $url = asset("uploads/".$model->pic_klr);
                    $data = '<a href="'.$url.'" data-lightbox="image-1">
                <img  src="'.$url.'" width="80px" height="60px"></a>';
//               $data = "<img  src=".$url." width='80px' height='60px'>";
                    return $data;
                }
            })
            ->addColumn('op_keluar',function($model){
                if (!isset($model->opkeluar->username)) {
                    $data = 'pengendara belum keluar';
                } else {
                    $data = $model->opkeluar->username;
                }
                return $data;
            })
            ->addColumn('tgl_keluar',function($model){
                $dt = Carbon::parse($model->klr_at);
                if ($model->klr_at == "0000-00-00 00:00:00") {
                    return 'belum keluar';
                } else {
                    return $dt->toDayDateTimeString();
                }
            })
            ->searchColumns('kendaraan')
            ->make();
	}

    public function getLog()
    {
//        $user = Session::get('user');
        $data = Notif::orderBy('created_at', 'desc')->get(['user_id','subject','body','created_at']);

        return Datatable::collection($data)
            ->addColumn('operator', function ($model) {
                return $model->user->username;
            })
            ->showColumns('subject','body','created_at')
            ->make();
    }

}