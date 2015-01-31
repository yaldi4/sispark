<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKendaraanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kendaraan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('rfid', 25)->nullable();
			$table->integer('pengendara_id');
			$table->string('no_pol', 11);
			$table->string('merek', 20)->nullable();
			$table->string('tipe', 30)->nullable();
			$table->string('jenis', 20)->nullable();
			$table->string('warna', 20)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kendaraan');
	}

}
