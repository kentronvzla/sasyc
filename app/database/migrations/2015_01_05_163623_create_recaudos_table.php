<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaudosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recaudos', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('nombre',500);
                        $table->string('descripcion',500);
                        $table->boolean('ind_obligatorio')->default(0);
                        $table->boolean('ind_vence')->default(0);
                        $table->boolean('ind_activo')->default(0);
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
		Schema::drop('recaudos');
	}

}
