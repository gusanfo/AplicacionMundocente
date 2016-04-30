<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvocatoriasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('convocatorias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('departamento',80);
			$table->string('ciudad',60);
			$table->string('universidad',120);
			$table->string('areas',170);
			$table->string('titulo',80);
			$table->date('fecha_inicio');
			$table->date('fecha_finalizacion');
			$table->string('descripcion',180)->nullable();
			$table->string('enlace',170);
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
		Schema::drop('convocatorias');
	}

}
