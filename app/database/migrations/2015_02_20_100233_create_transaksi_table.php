<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('kendaraan_id');
			$table->integer('op_msk');
			$table->string('pic_msk');
			$table->timestamp('msk_at');
			$table->integer('op_klr')->nullable();
			$table->string('pic_klr')->nullable();
			$table->timestamp('klr_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaksi');
	}

}
