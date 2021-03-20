<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExpirationFieldWithDefaultValueToTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->string('expiration')->default('jj/mm/aaaa')->change();
            $table->string('expiration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
        $table->string('expiration')->default(NULL)->change();
        $table->string('expiration')->nullable()->change(); 
       
    }
}
