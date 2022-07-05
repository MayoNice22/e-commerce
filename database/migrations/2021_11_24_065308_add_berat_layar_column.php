<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBeratLayarColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specs',function(Blueprint $table){
            $table->double('berat');
            $table->double('layar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specs',function(Blueprint $table){
            $table->dropColumn('berat');
            $table->dropColumn('layar');
        });
    }
}
