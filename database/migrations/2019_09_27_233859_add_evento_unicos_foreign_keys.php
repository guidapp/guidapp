<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventoUnicosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evento_unicos', function (Blueprint $table) {
            $table->unsignedBigInteger('evento_id');
            $table->bigInteger('festival_id')->nullable();
            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('festival_id')->references('id')->on('festivals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evento_unicos', function (Blueprint $table) {
            $table->dropColumn(['festival_id','evento_id']);
        });
    }
}
