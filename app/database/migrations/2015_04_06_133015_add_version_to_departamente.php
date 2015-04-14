<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVersionToDepartamente extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('departamentos', function(Blueprint $table) {
            $table->integer('version')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('departamentos', function(Blueprint $table) {
            $table->dropColumn('version');
        });
    }

}
