<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('departamentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('supervisor_id', false, true);
            $table->string('nombre', 100);
            $table->integer('version')->default(0);
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('departamento_id', false, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('departamentos');
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('departamento_id');
        });
        Schema::table('solicitudes', function(Blueprint $table) {
            $table->dropColumn('departamento_id');
        });
    }

}
