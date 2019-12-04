<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtracaosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atracaos', function (Blueprint $table) {
            $table->unsignedBigInteger('evento_unico_id')->nullable();
            $table->foreign('evento_unico_id')->references('id')->on('evento_unicos');
        });
        Schema::table('atracaos', function (Blueprint $table){
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atracaos', function (Blueprint $table) {
            $table->dropColumn(['evento_unico_id']);
        });
    }
}
