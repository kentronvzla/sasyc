<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::connection('oracle')->create('documentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitud_id', false, true)->length(14);
            $table->integer('beneficiario_id', false, true)->length(14)->nullable();

            $table->string('ccosto', 10)->nullable();
            $table->string('cod_acc_int', 7)->nullable();
            $table->string('moneda', 3)->nullable();
            $table->decimal('monto', 14, 2)->nullable();
            $table->string('dependencia',10)->nullable();

            $table->string('tipo_doc', 5)->nullable();
            $table->string('descripcion', 1000);
            $table->date('fecha');
            $table->string('estatus', 3);
            $table->boolean('ind_reverso')->default(0);
            $table->string('mensaje', 1000)->nullable();
            $table->integer('id_doc')->nullable()->length(14);
            $table->string('referencia', 20)->nullable();
            $table->integer('version')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::connection('oracle')->drop('documentos');
    }

}
