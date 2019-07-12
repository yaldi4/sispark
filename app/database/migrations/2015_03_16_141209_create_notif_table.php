<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notif', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('subject', 100);
			$table->string('body', 100);
            $table->boolean('is_read')->default(0);
			$table->timestamp('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notif');
	}

}
