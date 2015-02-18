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
        Schema::connection('oracle')->create('presupuestos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id', false, true);
            $table->integer('requerimiento_id', false, true);

            //esto es para kerux
            $table->string('ccosto', 10)->nullable();//configuracion
            $table->string('cod_acc_int', 7)->nullable();//Tipo de ayuda
            $table->string('cod_cta', 14)->nullable();//Requerimiento
            $table->string('cod_item', 10)->nullable();//Requerimiento
            $table->string('desc_requerimiento', 500)->nullable();//Nombre del requerimiento
            $table->integer('documento_id')->length(14)->nullable();//Lo pone kerux.
            $table->string('moneda', 3)->nullable();//Configuracion
            $table->string('tipo_reng', 4)->nullable();//Requirimiento->TipoRequerimiento
            $table->integer('beneficiario_id', false, true)->length(14)->nullable();//Lo selecciona el usuario
            //fin de kerux

            $table->integer('cantidad')->nullable();
            $table->decimal('monto', 14, 2)->nullable();
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
