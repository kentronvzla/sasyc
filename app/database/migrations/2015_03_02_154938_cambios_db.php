<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambiosDb extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('memos', function($table){
            $table->integer('usuario_id', false, true)->nullable();
            $table->index('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
        });

        Schema::table('solicitudes', function($table){
            $table->string('num_solicitud', 8)->nullable();
        });

        Schema::table('recaudos', function($table){
            $table->integer('tipo_ayuda_id', false, true)->nullable();
            $table->index('tipo_ayuda_id');
            $table->foreign('tipo_ayuda_id')->references('id')->on('tipo_ayudas');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
