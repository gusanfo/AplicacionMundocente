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
			$table->string('nombre',30);
			$table->string('universidad',30);
			$table->string('cargo',30);
			$table->date('fecha_inicio');
			$table->date('fecha_finalizacion');
			$table->string('enlace',50);
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
