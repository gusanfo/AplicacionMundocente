<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosAcademicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('eventos_academicos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('departamento',80);
			$table->string('ciudad',80);
			$table->string('universidad',100);
			$table->string('areas',160);
			$table->string('titulo',100);
			$table->date('fecha_evento');
			$table->string('enlace',160);
	//		$table->integer('area_id')->unsigned();
	//		$table->foreign('area_id')->references('id')->on('areas');
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
		Schema::drop('eventos_academicos');
	}

}
