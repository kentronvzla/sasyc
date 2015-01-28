<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosSolicitudTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('fotos_solicitud', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id', FALSE, true);
            $table->string('descripcion', 100);
            $table->string('foto');
            $table->boolean('ind_reporte')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('fotos_solicitud');
    }

}
