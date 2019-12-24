<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRiwayatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('riwayat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user')->index('FK_riwayat_users');
			$table->integer('zona')->index('FK_riwayat_zona');
			$table->boolean('pilihan_order', 1)->default(0);
			$table->boolean('hasil', 1)->nullable()->default(0);
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
		Schema::drop('riwayat');
	}

}
