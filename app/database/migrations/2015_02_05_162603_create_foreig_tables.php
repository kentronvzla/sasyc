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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
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
    }

}
