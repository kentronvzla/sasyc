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
            $table->string('descripcion', 2000);
            $table->integer('persona_beneficiario_id', false, true)->nullable();
            $table->integer('persona_solicitante_id', false, true)->nullable();
            $table->integer('area_id', false, true);
            $table->integer('referente_id', false, true);
            $table->integer('recepcion_id', false, true);
            $table->integer('organismo_id', false, true);
            $table->boolean('ind_mismo_benef')->default(0);
            $table->boolean('ind_inmediata')->default(0);
            $table->boolean('ind_beneficiario_menor')->default(0);
            $table->string('actividad', 2000)->nullable();
            $table->string('referencia', 2000)->nullable();
            $table->string('referencia_externa',100)->nullable();            
            $table->string('accion_tomada', 2000)->nullable();
            $table->string('necesidad', 1500);
            $table->string('tipo_proc', 5)->nullable();
            $table->integer('num_proc')->nullable();
            $table->string('facturas', 100)->nullable();
            $table->string('observaciones', 1500)->nullable();
            $table->string('moneda', 3);
            $table->string('estatus', 3);
            $table->integer('usuario_asignacion_id', false, true)->nullable();
            $table->integer('usuario_autorizacion_id', false, true)->nullable();
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_aceptacion')->nullable();
            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_cierre')->nullable();
            $table->integer('tipo_vivienda_id', false, true)->nullable();
            $table->integer('tenencia_id', false, true)->nullable();
            $table->integer('departamento_id', false, true)->nullable();
            $table->integer('memo_id', false, true)->nullable();
            $table->longText('informe_social')->nullable();
            $table->decimal('total_ingresos', 14, 2)->nullable();
            $table->text('beneficiario_json')->nullable();
            $table->text('solicitante_json')->nullable();
            $table->string('num_solicitud', 8)->nullable();
            $table->integer('version')->default(0)->nullable();
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
