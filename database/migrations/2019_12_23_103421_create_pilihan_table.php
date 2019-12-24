<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePilihanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pilihan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('zona')->nullable()->index('FK_pilihan_zona');
			$table->text('pilihan')->nullable();
			$table->boolean('order', 1)->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pilihan');
	}

}
