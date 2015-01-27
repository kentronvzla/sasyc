<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParroquiasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('parroquias', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('municipio_id', false, true);
            $table->string('nombre', 200);
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
        Schema::drop('parroquias');
    }

}
