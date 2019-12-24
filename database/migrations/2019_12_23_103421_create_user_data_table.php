<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_data', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nama');
			$table->string('jk');
			$table->string('usia');
			$table->integer('user')->nullable()->index('FK_user_data_users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_data');
	}

}
