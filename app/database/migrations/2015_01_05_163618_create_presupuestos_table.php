<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresupuestosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presupuestos', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('solicitud_id', false, true);
                        $table->integer('requerimiento_id', false, true);
                        $table->integer('tipo_requerimiento_id', false, true);
                        $table->string('cod_item',10);
                        $table->string('cod_cta',14);
                        $table->integer('num_benef');
                        $table->integer('cantidad');
                        $table->decimal('monto', 14, 2);
                        $table->string('estatus',3);
                        $table->integer('id_doc_proc');
                        $table->integer('id_sol_sum');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('presupuestos');
	}

}
