<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDosisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dosis', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('obat')->nullable()->index('FK_dosis_obat');
			$table->string('kandungan')->nullable();
			$table->string('usia')->nullable();
			$table->string('dosis_rendah')->nullable();
			$table->string('dosis_sedang')->nullable();
			$table->string('dosis_tinggi')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dosis');
	}

}
