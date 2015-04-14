<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMontoaprToPresupuesto extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('presupuestos', function(Blueprint $table) {
            $table->decimal('montoapr', 14, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('presupuestos', function(Blueprint $table) {
            $table->dropColumn('montoapr');
        });
    }

}
