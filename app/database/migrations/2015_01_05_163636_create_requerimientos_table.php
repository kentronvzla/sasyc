<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('requerimientos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 500);
            $table->string('descripcion', 500);
            $table->string('cod_item', 10)->nullable();
            $table->string('cod_cta', 14);
            $table->string('tipo_requerimiento_id', 1);
            $table->integer('tipo_ayuda_id', false, true);
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
        Schema::drop('requerimientos');
    }

}
