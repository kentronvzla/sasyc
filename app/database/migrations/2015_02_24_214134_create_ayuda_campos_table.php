<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudaCamposTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ayuda_campos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('formulario');
            $table->string('campo');
            $table->text('ayuda');
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
        Schema::drop('ayuda_campos');
    }

}
