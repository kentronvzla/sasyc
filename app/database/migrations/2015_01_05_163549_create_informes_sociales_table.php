<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformesSocialesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('informes_sociales', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('solicitud_id',false,true);
                        $table->integer('persona_id',false,true);
                        $table->char('tipo_casa');
                        $table->char('tipo_tendencia');
                        $table->string('observaciones',4000);
                        $table->decimal('total_ingresos',14,2);
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
		Schema::drop('informes_sociales');
	}

}
