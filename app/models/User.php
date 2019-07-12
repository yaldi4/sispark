<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Watson\Validating\ValidatingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, ValidatingTrait;

	protected $rulesets = [
		'creating' => [
			'username'              => 'required',
			'password'              => 'required|min:4',
			'role'					=> 'required'
		],
		'logging_in' => [
			'username'              => 'required',
			'password'              => 'required',
		],
		'updating' => [
			'username'              => 'required',
			'password'              => 'required|min:4',
			'role'					=> 'required'
		]

	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function masuk()
	{
		return $this->hasMany('Transaksi','op_msk');
	}

	public function keluar()
	{
		return $this->hasMany('Transaksi','op_klr');
	}

    public function notif()
    {
        return $this->hasMany('Notif','user_id');
    }

}
