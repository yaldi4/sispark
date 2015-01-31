<?php

class PengendaraController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /pengendara
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.pengendara.index')->with('title', 'Data Pengendara');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pengendara/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.pengendara.create')->with('title','Create Pengendara');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pengendara
	 *
	 * @return Response
	 */
	public function store()
	{
		$pengendara = new Pengendara;
		$pengendara->pengenal = Input::get('pengenal');
		$pengendara->nama = Input::get('nama');
		$pengendara->tempat_lahir = Input::get('tempat_lahir');
		$pengendara->tgl_lahir = Input::get('tgl_lahir');
		$pengendara->jk = Input::get('jk');
		$pengendara->no_hp = Input::get('no_hp');
		$pengendara->alamat = Input::get('alamat');
		if (! $pengendara->isValid()) {
			return Redirect::back()->withErrors($pengendara->getErrors());
		}
		$pengendara->save();
		Session::put('pengendara_id',$pengendara->id);
//		Session::flash('message', 'Successfully saved pengendara!');
		return Redirect::route('admin.kendaraan.create')->with('title','Create Kendaraan');
	}

	/**
	 * Display the specified resource.
	 * GET /pengendara/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pengendara/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$title = 'Edit Pengendara';
		$pengendara = Pengendara::find($id);
		return View::make('admin.pengendara.edit')->with(compact('title', 'pengendara'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pengendara/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$pengendara = Pengendara::find($id);
		$pengendara->fill($input);
		if (! $pengendara->isValid()) {
			return 'fasle';
		}
		$pengendara->save();
		Session::put('pengendara_id', $pengendara->id);
		return Redirect::route('admin.kendaraan.edit', $pengendara->id);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pengendara/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pengendara = Pengendara::find($id);
		$kendaraan = $pengendara->kendaraan;
		$kendaraan->delete();
		$pengendara->delete();
		Session::flash('message', 'Successfully deleted pengendara!');
		return Redirect::route('admin.pengendara.index')->with('title','Data User');
	}

}