<?php

class KendaraanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /kendaraan
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /kendaraan/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'Create Kendaraan';
		return View::make('admin.kendaraan.create')->with(compact('title'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /kendaraan
	 *
	 * @return Response
	 */
	public function store()
	{
		$pengendara_id = Session::get('pengendara_id');
//		$pengendara_id = 1;
		if (!isset($pengendara_id)) {
			return Redirect::route('admin.pengendara.index')->with('title', 'Data Pengendara');
		}
		$input = Input::all();
		$kendaraan = new Kendaraan;
		$kendaraan->fill($input);
		$kendaraan->pengendara_id = $pengendara_id;
		if (! $kendaraan->isValid()) {
			return Redirect::back()->withErrors($kendaraan->getErrors());
		}
		$kendaraan->save();
		Session::flash('message', 'Successfully saved pengendara!');
		return Redirect::route('admin.pengendara.index')->with('title','Data Pengendara');
	}

	/**
	 * Display the specified resource.
	 * GET /kendaraan/{id}
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
	 * GET /kendaraan/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pengendara_id = $id;
		$title = 'Edit Kendaraan';
		$input = Input::all();
		$pengendara = Pengendara::find($pengendara_id);
		$kendaraan = $pengendara->kendaraan;
		return View::make('admin.kendaraan.edit')->with(compact('title','kendaraan'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /kendaraan/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pengendara_id = $id;
		$input = Input::all();
		$pengendara = Pengendara::find($pengendara_id);
		$kendaraan = $pengendara->kendaraan;
		$kendaraan->fill($input);
		if (! $kendaraan->isValid()) {
			return Redirect::back()->withErrors($kendaraan->getErrors());
		}
		$kendaraan->save();
		Session::flash('message', 'Successfully updated pengendara!');
		return Redirect::route('admin.pengendara.index')->with('title','Data Pengendara');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /kendaraan/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}