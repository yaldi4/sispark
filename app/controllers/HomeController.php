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

	/**
	 * Menampilkan tampilan view login
     */
	public function getLogin()
	{
		return View::make();
	}

	public function postLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'pengenal'    => 'required', // make sure the email is an actual email
			'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('/')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'pengenal' 	=> Input::get('pengenal'),
				'password' 	=> Input::get('password')
			);

			$remember = (Input::has('remember')) ? true : false;

			// attempt to do the login
			if (Auth::attempt($userdata,$remember)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				//echo 'SUCCESS!';
				//$tipe = Auth::user()->tipe;
				$user = Auth::user();
				if ($user->hasRole('User')) return Redirect::route('pengendara.index');
				if ($user->hasRole('Admin')) return Redirect::route('admin.index');
				if ($user->hasRole('Operator Masuk')) {
					Event::fire('operator.login',array($user));
					return Redirect::route('operator.showoperator');
				}
				if ($user->hasRole('Operator Keluar')) {
					Event::fire('operator.login',array($user));
					return Redirect::route('operator.showoperatorkeluar');
				}
				//return Redirect::to('home');
				//return 'Berhasil';

			} else {

				// validation not successful, send back to form
				//return Redirect::to('/');
				Session::flash('message', 'login gagal NIM/NIP Anda salah');
				return Redirect::route('home.index');
				//return 'gagal';

			}
		}
	}
}
