<?php

class Kendaraan extends \Eloquent {
	use \Watson\Validating\ValidatingTrait;

	protected $rules = [
		'rfid'              => 'required',
		'pengendara_id'      => 'required',
		'no_pol'			=> 'required',
		'merek'				=> 'required',
		'tipe'				=> 'required',
		'jenis'				=> 'required',
		'warna'				=> 'required'
	];
	protected $fillable = [];
	protected  $guarded = ['id','created_at','updated_at'];
	protected $table = 'kendaraan';

	public function pengendara()
	{
		return $this->belongsTo('Pengendara');
	}

	public function transaksi()
	{
		return $this->hasMany('Transaksi','kendaraan_id');
	}
}