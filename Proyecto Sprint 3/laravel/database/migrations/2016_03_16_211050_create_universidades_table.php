<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversidadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('universidades', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->integer('ciudad_id')->unsigned();
			$table->foreign('ciudad_id')->references('id')->on('ciudades');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('universidades');
	}

}
