<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengendaraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengendara', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 100);
			$table->string('tempat_lahir', 125)->nullable();
			$table->date('tgl_lahir')->nullable();
			$table->string('jk', 10)->nullable();
			$table->string('no_hp', 14)->nullable();
			$table->text('alamat')->nullable();
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
		Schema::drop('pengendara');
	}

}
