<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacorasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('bitacoras', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id', false, true);
            $table->date('fecha');
            $table->string('nota', 1500);
            $table->integer('usuario_id', false, true);
            $table->string('memo', 14);
            $table->string('tipo', 5);
            $table->boolean('ind_activo')->default(0);
            $table->boolean('ind_alarma')->default(0);
            $table->integer('version')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('bitacoras');
    }

}
