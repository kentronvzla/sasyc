<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoRequerimientosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tipo_requerimientos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
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
        Schema::drop('tipo_requerimientos');
    }

}
