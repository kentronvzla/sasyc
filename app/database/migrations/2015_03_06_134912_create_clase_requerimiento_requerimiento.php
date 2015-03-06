<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaseRequerimientoRequerimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clase_requerimiento_requerimiento', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('requerimiento_id',false,true);
            $table->integer('clase_requerimiento_id',false,true);
            $table->boolean('ind_cantidad')->default(0);
            $table->boolean('ind_monto')->default(0);
            $table->boolean('ind_beneficiario')->default(0);
            $table->integer('version')->default(0);
			$table->timestamps();

            $table->foreign('requerimiento_id')->references('id')->on('requerimientos');
            $table->foreign('clase_requerimiento_id')->references('id')->on('clase_requerimiento');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clase_requerimiento_requerimiento');
	}

}
