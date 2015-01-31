<?php

use Watson\Validating\ValidatingTrait;

class Pengendara extends \Eloquent {
	use ValidatingTrait;
	protected $fillable = [];

	protected $guarded = ['id','created_at','updated_at'];

	protected $rules = [
		'pengenal'              => 'required',
		'nama'              	=> 'required|min:4',
		'tempat_lahir'			=> 'required',
		'tgl_lahir'				=> 'required',
		'jk'					=> 'required',
		'no_hp'					=> 'required',
		'alamat'				=> 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pengendara';

	public function kendaraan()
	{
		return $this->hasOne('Kendaraan');
	}
}