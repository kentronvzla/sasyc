<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesoRequerimientoTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('proceso_requerimiento', function(Blueprint $table) {
            $table->integer('requerimiento_id', false, true);
            $table->integer('proceso_id', false, true);
            $table->timestamps();

            $table->unique(['requerimiento_id', 'proceso_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('proceso_requerimiento');
    }

}
