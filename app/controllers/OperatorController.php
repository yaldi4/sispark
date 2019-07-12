<?php
use Carbon\Carbon;
class OperatorController extends BaseController {

	public function getIndex()
	{
		return 'oii';
	}

	public function getKeluar()
	{
		return View::make('operator.klr')->with('title', 'Operator Keluar');
	}
	public function getMasuk()
	{
		return View::make('operator.msk')->with('title','Operator Masuk');
	}

	public function postRfid()
	{
		$rfid = Input::get('rfid');
		$kendaraan = Kendaraan::where('rfid', '=', $rfid)->first();
//		if (!isset($pengendara)) {
//			Session::put('pengendara_id', 'Tidak Ditemukan');
//		} else {
//			$pengendara_id = $pengendara->id;
//			Session::put('pengendara_id', $pengendara_id);
//		}
		Session::put('rfid',$rfid);
		Session::put('id',$kendaraan->id);
		if ($kendaraan == '') {
			return Response::make(null,404);
		} else {
			return Response::json(null,200);
		}
	}

	public function getNama()
	{
		$rfid = Session::get('rfid');
		$url = Route('op.getnama');
		$kendaraan= Kendaraan::where('rfid', '=', $rfid)->first();


		if($kendaraan == '') {
			$data = array('html'=>'<div class="form-control input-md hasilcari" id="nama" data-refresh-url="'.$url.'">
				Tidak Ditemukan</div>');
		} else {
			$pengendara = $kendaraan->pengendara;
			$data = array('html'=>'
				<input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="'.$pengendara->nama.'" id="nama" data-refresh-url="'.$url.'">
				');
		}
		return Response::json($data);
	}

	public function getKendaraan()
	{
		$rfid = Session::get('rfid');
		$kendaraan= Kendaraan::where('rfid', '=', $rfid)->first();
//		$pengendara = $kendaraan->pengendara;
		$url = Route('op.getkendaraan');
		if($kendaraan == '') {
			$data = array('html'=>'<div class="form-control input-md hasilcari" id="nama" data-refresh-url="'.$url.'">
				Tidak Ditemukan</div>');
		} else {
			$data = array('html'=>'
				<input class="form-control input-md hasilcari" placeholder=" " autocomplete="off" name="nama" type="text" value="'.$kendaraan->no_pol.'" id="kendaraan_id" data-refresh-url="'.$url.'">
				');
		}
		return Response::json($data);
	}

	public function getPic()
	{
		$kendaraan_id = Session::get('id');
//		return $kendaraan_id;
//		$pengendara_id = 3;
		$datarefresh = Route('op.getpic');
		if ($kendaraan_id == '') {
			$url = asset('uploads/datatidakditemukan.png');
			$data = array('html'=>'<img src="'.$url.'" class="hasilcari" data-refresh-url="'.$datarefresh.'" alt="">');
		} else {
			$transaksi = Transaksi::where('kendaraan_id','=',$kendaraan_id)->orderBy('msk_at', 'desc')->first();
			$img = $transaksi->pic_msk;
			//$img = 'dae39daf2b188a8a5aee976197dbbf0b.png';
			$url = asset('uploads/'.$img);
			$data = array('html'=>'<img src="'.$url.'" class="hasilcari" data-refresh-url="'.$datarefresh.'" alt="">');
			//Session::put('pengendara_id',NULL);
		}

		return Response::json($data);
	}

	public function postPic()
	{
        $img = $_REQUEST['imgBase64'];
        $user = Auth::user()->id;
        $rfid = Input::get('rfid');
        $kendaraan = Kendaraan::where('rfid', '=', $rfid)->first();
        $id 	= $kendaraan->id;
        $cek 	= Transaksi::where('kendaraan_id',$id)->orderBy('msk_at', 'desc')->first();
//        $img = 'test';
//        $user = 2;
        // Clean up the data url string a bit.
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        // Decode the image.
        $decodedImage = base64_decode($img);

        // Generate a random filename.
        $filename = md5(time()).'.png';
        $response = '';
        if (empty($cek->op_klr) && !empty($cek->op_msk)) {
            $response = 400;
        } else {
            $transaksi = new Transaksi;
            $transaksi->kendaraan_id = $id;
            $transaksi->pic_msk = $filename;
            $transaksi->op_msk = $user;
            $transaksi->msk_at = Carbon::now();
            $transaksi->save();
            if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename, $decodedImage)) {
                $response = 200;
            } else {
                $response = 500;
            }
        }
        return Response::make(null,$response);
	}

    public function postPicKeluar()
    {
        $img = $_REQUEST['imgBase64'];
        $user = Auth::user()->id;
        $rfid = $_REQUEST['rfid'];
        $kendaraan = Kendaraan::where('rfid', '=', $rfid)->first();
        $id 	= $kendaraan->id;
        $cek 	= Transaksi::where('kendaraan_id',$id)->orderBy('msk_at', 'desc')->first();
        // Clean up the data url string a bit.
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);

        // Decode the image.
        $decodedImage = base64_decode($img);

        // Generate a random filename.
        $filename = md5(time()).'.png';
        $response = '';
        if (empty($cek->op_klr) && !empty($cek->op_msk)) {
            $cek->pic_klr = $filename;
            $cek->op_klr = $user;
            $cek->klr_at = Carbon::now();
            $cek->save();
            // Save the file to the server and generate a response.
            if (file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename, $decodedImage)) {
//                $imageURL = 'http://' . $_SERVER['HTTP_HOST'] . '/uploads/' . $filename;
                $response = 200;
            } else {
                $response = 500;
            }
        } elseif (!empty($cek->op_klr) && !empty($cek->op_msk)) {
            $response = 400;
        }
        return Response::make(null,$response);
    }

	public function postKfrmMasuk()
	{
		$user = Auth::user()->id;
		$id 	= Session::get('id');
		$img 	= Session::get('img');
		$cek 	= Transaksi::where('kendaraan_id',$id)->orderBy('msk_at', 'desc')->first();
		$response = '';
		if (empty($cek->op_klr) && !empty($cek->op_msk)) {
			if(file_exists(public_path('uploads/'.$img))) {
				echo 'File exists';
				File::delete(public_path('uploads/' . $img));
				$response = 400;
                Session::forget('img');
			}
		} elseif (!empty($id) && !empty($img)) {
			$transaksi = new Transaksi;
			$transaksi->kendaraan_id = $id;
			$transaksi->pic_msk = $img;
			$transaksi->op_msk = $user;
			$transaksi->msk_at = Carbon::now();
			$transaksi->save();
			$response = 200;
            Session::forget('img');
		}
		return Response::make(null,$response);
	}

	public function postKfrmKeluar()
	{
//        $id = Input::get('id');
//        $cek 	= Transaksi::where('kendaraan_id',$id)->orderBy('msk_at', 'desc')->first();
//        if (empty($cek->op_klr) && !empty($cek->op_msk)) {
//            return $cek->toArray();
//        } elseif (empty($cek)) {
//            return 'gak ada masuk';
//        }
//		$rfid 	= Session::get('rfid');
        $user = Auth::user()->id;
		$id 	= Session::get('id');
		$img 	= Session::get('imgkeluar');
//        $response = '';
        $cek 	= Transaksi::where('kendaraan_id',$id)->orderBy('msk_at', 'desc')->first();
        if (empty($cek->op_klr) && !empty($cek->op_msk)) {
            $cek->pic_klr = $img;
            $cek->op_klr = $user;
            $cek->klr_at = Carbon::now();
            $cek->save();
            $response = 200;
            Session::forget('imgkeluar');
        } else {
            if(file_exists(public_path('uploads/'.$img))) {
                echo 'File exists';
                File::delete(public_path('uploads/' . $img));
                Session::forget('imgkeluar');
            }
            $response = 400;
        }
        return Response::make(null,$response);
//		if (!empty($id) && !empty($img)) {
//			$transaksi = Transaksi::where('kendaraan_id','=',$id)->orderBy('msk_at', 'desc')->first();
//			$transaksi->op_klr = Auth::user()->id;
//			$transaksi->klr_at = Carbon::now();
//			$transaksi->pic_klr = $img;
//			$transaksi->save();
//			return Response::make(200);
//		} else {
//			return Response::make(null,404);
//		}
	}

}