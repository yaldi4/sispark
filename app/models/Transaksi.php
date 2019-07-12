<?php

class Transaksi extends \Eloquent {
	protected $fillable = [];

	protected $guarded = ['id'];

	protected $table = 'transaksi';

	public $timestamps = false ;

	public function kendaraan()
	{
		return $this->belongsTo('Kendaraan','kendaraan_id');
	}

	public function opmasuk()
	{
		return $this->belongsTo('User','op_msk');
	}

	public function opkeluar()
	{
		return $this->belongsTo('User','op_klr');
	}
}