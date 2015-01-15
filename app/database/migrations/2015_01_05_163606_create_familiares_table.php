<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('familia_persona', function(Blueprint $table) {
            $table->integer('persona_familia_id', false, true);
            $table->integer('persona_beneficiario_id', false, true);
            $table->integer('parentesco_id', false, true);
            $table->timestamps();
            
            $table->primary(['persona_familia_id', 'persona_beneficiario_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('familia_persona');
    }

}
