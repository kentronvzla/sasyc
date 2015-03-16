<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseRequerimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('procesos', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nombre',100);
            $table->string('tipo_doc',5);
            $table->boolean('ind_cantidad')->default(0);
            $table->boolean('ind_monto')->default(0);
            $table->boolean('ind_beneficiario')->default(0);
            $table->integer('version')->default(0);
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
		Schema::drop('procesos');
	}

}
