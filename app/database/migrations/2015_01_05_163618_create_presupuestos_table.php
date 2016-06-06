<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('presupuestos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id', false, true);
            $table->integer('requerimiento_id', false, true);
            $table->integer('proceso_id', false, true);
            //esto es para kerux
            $table->integer('documento_id')->length(14)->nullable();//Lo pone kerux.
            $table->string('moneda', 3)->nullable();//Configuracion
            $table->integer('beneficiario_id', false, true)->length(14)->nullable();//Lo selecciona el usuario
            //fin de kerux
            $table->integer('cantidad')->nullable();
            $table->decimal('monto', 14, 2)->nullable(); 
            $table->decimal('montoapr', 14, 2)->nullable();
            $table->string('estatus_doc', 3)->nullable();
            $table->string('cheque', 100)->nullable(); 
            $table->integer('numop')->nullable();
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
        Schema::connection('oracle')->drop('presupuestos');
    }

}
