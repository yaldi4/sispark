<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.user.index')->with('title','Data User');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.user.create')->with('title','Create user');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		$user  = new User;
		$password = Input::get('password');
		$user->username = Input::get('username');
		$user->password = $password;
		$user->role = Input::get('role');
//		var_dump($user->isValid('creating'));
//		return $user->toArray();
		if (! $user->isValid('creating')) {
			return Redirect::back()->withErrors($user->getErrors());
		}
		$user->password = Hash::make($password);
		$user->save();
		Session::flash('message', 'Successfully saved user!');
		return Redirect::route('admin.user.index');

	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
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
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$title = 'Edit User';
		$user = User::find($id);
		return View::make('admin.user.edit')->with(compact('title','user'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user  = User::find($id);
		$password = Input::get('password');
		$user->username = Input::get('username');
		$user->password = $password;
		$user->role = Input::get('role');
//		var_dump($user->isValid('updating',false));
//		return $user->toArray();
//		var_dump($user->getErrors());
		if (! $user->isValid('updating')) {
			return Redirect::back()->withErrors($user->getErrors());
		}
		$user->password = Hash::make($password);
		$user->save();
		Session::flash('message', 'Successfully edit user!');
		return Redirect::route('admin.user.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Successfully deleted user!');
		return Redirect::route('admin.user.index');
	}

}