<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revistas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('departamento',60);
			$table->string('ciudad',60);
			$table->string('universidad',60);
			//$table->enum('areas',)
			$table->string('areas',120);
			$table->string('titulo');
			$table->enum('tipoRevista',['Indexada','No indexada']);
			$table->enum('categoria',['A','B','C']);
			$table->date('fechaRecepcion')->nullable();
			$table->string('enlace',60);
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
