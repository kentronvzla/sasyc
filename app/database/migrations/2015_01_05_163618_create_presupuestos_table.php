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
            $table->integer('beneficiario_id', false, true);
            $table->integer('cantidad');
            $table->decimal('monto', 14, 2);
            $table->string('estatus', 3);
            $table->integer('id_doc_proc')->nullable();
            $table->integer('id_sol_sum')->nullable();
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
        Schema::drop('presupuestos');
    }

}
