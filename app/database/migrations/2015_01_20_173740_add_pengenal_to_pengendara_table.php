<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddPengenalToPengendaraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pengendara', function(Blueprint $table)
		{
			$table->string('pengenal', 60);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pengendara', function(Blueprint $table)
		{
			$table->dropColumn('pengenal');
		});
	}

}
