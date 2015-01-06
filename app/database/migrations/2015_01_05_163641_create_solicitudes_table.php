<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('solicitudes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('ano');
            $table->string('descripcion', 2000);
            $table->integer('persona_beneficiario_id', false, true);
            $table->integer('persona_solicitante_id', false, true)->nullable();
            $table->integer('tipo_ayuda_id', false, true);
            $table->integer('area_id', false, true);
            $table->integer('referente_id', false, true);
            $table->integer('recepcion_id', false, true);
            $table->integer('organismo_id', false, true);
            $table->boolean('ind_mismo_benef')->default(0);
            $table->boolean('ind_inmediata')->default(0);
            $table->string('actividad', 2000)->nullable();
            $table->string('referencia', 2000)->nullable();
            $table->string('accion_tomada', 2000)->nullable();
            $table->string('necesidad', 1500);
            $table->string('tipo_proc', 5)->nullable();
            $table->integer('num_proc')->nullable();
            $table->string('facturas', 100)->nullable();
            $table->string('observaciones', 1500)->nullable();
            $table->string('moneda', 3);
            $table->integer('prioridad');
            $table->string('estatus', 3);
            $table->integer('usuario_asignacion_id', false, true)->nullable();
            $table->integer('usuario_autorizacion_id', false, true)->nullable();
            $table->date('fecha_solicitud');
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_aceptacion')->nullable();
            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('solicitudes');
    }

}
