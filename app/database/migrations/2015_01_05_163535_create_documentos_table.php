<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('documentos', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->string('tipo_doc',5);
                        $table->string('desc_doc',60);
                        $table->date('fec_doc');
                        $table->string('sts_doc',3);
                        $table->boolean('ind_reverso')->default(0);
                        $table->integer('solicitud_id',false,true);
                        $table->string('mensaje',1000);
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
		Schema::drop('documentos');
	}

}
