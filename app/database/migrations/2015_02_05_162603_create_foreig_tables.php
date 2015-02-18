<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeigTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('bitacoras', function(Blueprint $table) {
            $table->index('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');
            
            $table->index('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
        
        Schema::table('documentos', function(Blueprint $table) {
            $table->index('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');
        });
        
        /*nuevas agregadas--luego borro este comentario*/
        Schema::table('areas', function(Blueprint $table) {
            $table->index('tipo_ayuda_id');
            $table->foreign('tipo_ayuda_id')->references('id')->on('tipo_ayudas');
        });
        
        Schema::table('municipios', function(Blueprint $table) {
            $table->index('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
        
        Schema::table('parroquias', function(Blueprint $table) {
            $table->index('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
        });
        
        Schema::table('familia_persona', function(Blueprint $table) {
            $table->index('persona_familia_id');
            $table->foreign('persona_familia_id')->references('id')->on('personas');
            
            $table->index('persona_beneficiario_id');
            $table->foreign('persona_beneficiario_id')->references('id')->on('personas');
            
            $table->index('parentesco_id');
            $table->foreign('parentesco_id')->references('id')->on('parentescos'); 
        });
        
        Schema::table('personas', function(Blueprint $table) {
            $table->index('tipo_nacionalidad_id');
            $table->foreign('tipo_nacionalidad_id')->references('id')->on('tipo_nacionalidades');
            
            $table->index('estado_civil_id');
            $table->foreign('estado_civil_id')->references('id')->on('estados_civiles');
            
            $table->index('nivel_academico_id');
            $table->foreign('nivel_academico_id')->references('id')->on('niveles_academicos');
            
            $table->index('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
        });

        Schema::connection('oracle')->table('presupuestos', function(Blueprint $table) {
            $table->index('beneficiario_id');
            //$table->foreign('beneficiario_id')->references('numbenef')->on('doc.beneficiarios');

            $table->index('ccosto');
            //$table->foreign('ccosto')->references('ccosto')->on('ppto.cents_costo');

            $table->index('cod_acc_int');
            //$table->foreign('cod_acc_int')->references('codaccint')->on('ppto.acc_int');

            $table->index('cod_item');
            //$table->foreign('cod_item')->references('coditem')->on('cat.item_cat');

            $table->index('id_doc');
            //$table->foreign('id_doc')->references('iddoc')->on('doc.documentos_origen');
        });
        
        Schema::table('recaudo_solicitud', function(Blueprint $table) {
            $table->index('solicitud_id');
            $table->foreign('solicitud_id')->references('id')->on('solicitudes');
            
            $table->index('recaudo_id');
            $table->foreign('recaudo_id')->references('id')->on('recaudos');
        });
        
        Schema::table('requerimientos', function(Blueprint $table) {
            $table->index('tipo_requerimiento_id');
            $table->foreign('tipo_requerimiento_id')->references('id')->on('tipo_requerimientos');
            
            $table->index('tipo_ayuda_id');
            $table->foreign('tipo_ayuda_id')->references('id')->on('tipo_ayudas');
        });
        
        /*Schema::table('solicitudes', function(Blueprint $table) {
            $table->index('persona_beneficiario_id');
            $table->foreign('persona_beneficiario_id')->references('id')->on('personas');
            
            $table->index('persona_solicitante_id');
            $table->foreign('persona_solicitante_id')->references('id')->on('personas');
            
            $table->index('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            
            $table->index('referente_id');
            $table->foreign('referente_id')->references('id')->on('referentes');
            
            $table->index('recepcion_id');
            $table->foreign('recepcion_id')->references('id')->on('recepciones');
            
            $table->index('organismo_id');
            $table->foreign('organismo_id')->references('id')->on('organismos');
            -------------?
            $table->index('usuario_asignacion_id');
            $table->foreign('usuario_asignacion_id')->references('id')->on('tipo_requerimientos');
            
            $table->index('usuario_autorizacion_id');
            $table->foreign('usuario_autorizacion_id')->references('id')->on('tipo_ayudas');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::table('bitacoras', function(Blueprint $table) {
            $table->dropForeign('bitacoras_solicitud_id_foreign');
            $table->dropIndex('bitacoras_solicitud_id_index');
            
            $table->dropForeign('bitacoras_usuario_id_foreign');
            $table->dropIndex('bitacoras_usuario_id_index');
        });
        
        Schema::table('documentos', function(Blueprint $table) {
            $table->dropForeign('documentos_solicitud_id_foreign');
            $table->dropIndex('documentos_solicitud_id_index');
        });
        
         /*nuevas agregadas--luego borro este comentario*/
        Schema::table('areas', function(Blueprint $table) {
            $table->dropForeign('areas_tipo_ayuda_id_foreign');
            $table->dropIndex('areas_tipo_ayuda_id_index');
        });
        
        Schema::table('municipios', function(Blueprint $table) {
            $table->dropForeign('municipios_estado_id_foreign');
            $table->dropIndex('municipios_estado_id_index');
        });
        
        Schema::table('parroquias', function(Blueprint $table) {
            $table->dropForeign('parroquias_municipio_id_foreign');
            $table->dropIndex('parroquias_municipio_id_index');
        });
        
        Schema::table('familia_persona', function(Blueprint $table) {
            $table->dropForeign('familia_persona_persona_familia_id_foreign');
            $table->dropIndex('familia_persona_persona_familia_id_index');
            
            $table->dropForeign('familia_persona_persona_beneficiario_id_foreign');
            $table->dropIndex('familia_persona_persona_beneficiario_id_index');
            
            $table->dropForeign('familia_persona_parentesco_id_foreign');
            $table->dropIndex('familia_persona_parentesco_id_index');
        });
        
         Schema::table('personas', function(Blueprint $table) {
            $table->dropForeign('personas_tipo_nacionalidad_id_foreign');
            $table->dropIndex('personas_tipo_nacionalidad_id_index');
            
            $table->dropForeign('personas_estado_civil_id_foreign');
            $table->dropIndex('personas_estado_civil_id_index');
            
            $table->dropForeign('personas_nivel_academico_id_foreign');
            $table->dropIndex('personas_nivel_academico_id_index');
            
            $table->dropForeign('personas_parroquia_id_foreign');
            $table->dropIndex('personas_parroquia_id_index');
        });
        
        Schema::table('presupuestos', function(Blueprint $table) {
            $table->dropForeign('presupuestos_solicitud_id_foreign');
            $table->dropIndex('presupuestos_solicitud_id_index');
            
            $table->dropForeign('presupuestos_requerimiento_id_foreign');
            $table->dropIndex('presupuestos_requerimiento_id_index');
            
            $table->dropForeign('presupuestos_beneficiario_id_foreign');
            $table->dropIndex('presupuestos_beneficiario_id_index');
        });
        
         Schema::table('recaudo_solicitud', function(Blueprint $table) {
            $table->dropForeign('recaudo_solicitud_solicitud_id_foreign');
            $table->dropIndex('recaudo_solicitud_solicitud_id_index');
            
            $table->dropForeign('recaudo_solicitud_recaudo_id_foreign');
            $table->dropIndex('recaudo_solicitud_recaudo_id_index');
        });
        
        Schema::table('requerimientos', function(Blueprint $table) {
            $table->dropForeign('requerimientos_tipo_requerimiento_id_foreign');
            $table->dropIndex('requerimientos_tipo_requerimiento_id_index');
            
            $table->dropForeign('requerimientos_tipo_ayuda_id_foreign');
            $table->dropIndex('requerimientos_tipo_ayuda_id_index');
        });
    }

}
