<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('familia_persona', function(Blueprint $table)
		{
                        $table->integer('persona_beneficiario_id', false, true);
                        $table->integer('persona_familia_id', false, true);
			$table->string('parentesco', 200);                        
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
		Schema::drop('familia_persona');
	}

}
