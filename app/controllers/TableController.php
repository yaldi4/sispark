<?php

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

}