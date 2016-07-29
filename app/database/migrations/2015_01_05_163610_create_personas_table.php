<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('personas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->string('apellido', 30);
            $table->integer('tipo_nacionalidad_id', false, true)->default(1);;
            $table->bigInteger('ci')->nullable();
            $table->string('sexo', 1)->nullable();
            $table->integer('estado_civil_id', false, true)->nullable();
            $table->string('lugar_nacimiento', 500)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('nivel_academico_id', false, true)->nullable();
            $table->integer('parroquia_id', false, true)->nullable();
            $table->string('ciudad', 15)->nullable();
            $table->string('zona_sector', 250)->nullable();
            $table->string('calle_avenida', 250)->nullable();
            $table->string('apto_casa', 50)->nullable();
            $table->string('telefono_fijo', 20)->nullable();
            $table->string('telefono_celular', 20)->nullable();
            $table->string('telefono_otro', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('twitter', 100)->nullable();
            $table->boolean('ind_trabaja')->default(0);
            $table->string('ocupacion', 100)->nullable();
            $table->decimal('ingreso_mensual', 14, 2)->nullable();
            $table->string('observaciones', 1500)->nullable();
            $table->boolean('ind_asegurado')->default(0);
            $table->integer('seguro_id', false, true)->nullable();
            $table->decimal('cobertura', 14, 2)->nullable();
            $table->string('otro_apoyo', 200)->nullable();
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
        Schema::drop('personas');
    }

}
