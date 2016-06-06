<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentossasycTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('documentossasyc', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('documento_id', false, true);
            $table->string('tipo_doc', 5);
            $table->string('tipo_evento', 3);
            $table->string('descripcion', 1000);
            $table->date('fecha');
            $table->string('estatus', 3);
            $table->integer('solicitud', false, true);
            $table->string('ref_doc', 30)->nullable();
            $table->integer('num_op')->nullable();
            $table->string('mensaje', 2000)->nullable();
            $table->integer('id_doc_ref', false, true)->nullable();
            $table->boolean('ind_aprueba_auto')->default(0);
            $table->boolean('ind_doc_ext')->default(0);
            $table->boolean('ind_ctas_adic')->default(0);
            $table->boolean('ind_reng_adic')->default(0);
            $table->boolean('ind_detcomp_adic')->default(0);
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
        Schema::drop('documentossasyc');
    }

}
