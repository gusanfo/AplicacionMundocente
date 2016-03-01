<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 *   		$table->enum('type',['empresa','particular'])->default('particular');
	 */
	public function up()
	{
		Schema::create('revistas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('universidad');
			$table->string('nombre');
			$table->dateTime('fecha_limite');
			$table->string('enlace');
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
		Schema::drop('revistas');
	}

}
