<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

//	public function showWelcome()
//	{
//		return View::make('hello');
//	}
	public function getIndex()
	{
		return View::make('home.index');
	}


	public function postLogin()
	{
		$user = new User;
		$username = Input::get('username');
		$password = Input::get('password');
		$role = Input::get('role');
		$remember = (Input::has('remember')) ? true : false;

		$user->username 	= $username;
		$user->password 	= $password;
		$user->role 	= $role;
		$userdata = array('username'=>$username,'password'=>$password);
//		var_dump($user->isValid('logging_in'));
//		var_dump($user->toArray());
		if (! $user->isValid('logging_in')) {
			return 'false';
		} else {
			if (Auth::attempt($userdata,$remember)) {
				$authrole =  Auth::user()->role;
				if ($authrole == 'admin')return Redirect::route('admin.pengendara.index');
                if ($authrole == 'operator') {
                    if ($user->role == 'Operator Masuk') {
                        Event::fire('operator.login',array($user));
                        return Redirect::route('op.getmasuk');
                    } elseif ($user->role == 'Operator Keluar') {
                        Event::fire('operator.login',array($user));
                        return Redirect::route('op.getkeluar');
                    } else {
                        return 'Pilih salah satu operator';
                    }
                }
			} else {
				return 'salah username or password';
			}
		}

	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home.index');
	}

	public function missingMethod($parameters = array())
	{
		//
	}
}
