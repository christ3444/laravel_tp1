<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateaccompliFieldWithDefaultValueToTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
           $table->boolean('accompli')->default(0)->change();
           $table->boolean('accompli')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->boolean('accompli')->default(NULL)->change();
            $table->boolean('accompli')->nullable(false)->change();
        });
    }
}
