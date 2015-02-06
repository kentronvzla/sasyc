<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('memos', function(Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('numero', false, true);
            $table->string('asunto', 100);
            $table->integer('origen_id', false, true);
            $table->integer('destino_id', false, true);
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
        Schema::drop('memos');
    }

}
