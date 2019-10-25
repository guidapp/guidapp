<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagemsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('imagems', function (Blueprint $table) {
        //     $table->unsignedBigInteger('atracao_id')->nullable();
        //     $table->unsignedBigInteger('evento_id')->nullable();
        //     $table->unsignedBigInteger('prato_id')->nullable();
        //     $table->unsignedBigInteger('promocao_id')->nullable();
        //     $table->unsignedBigInteger('estabelecimento_id')->nullable();
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->foreign('atracao_id')->references('id')->on('atracaos');
        //     $table->foreign('evento_id')->references('id')->on('eventos');
        //     $table->foreign('prato_id')->references('id')->on('pratos');
        //     $table->foreign('promocao_id')->references('id')->on('promocaos');
        //     $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('imagems', function (Blueprint $table) {
        //     $table->dropColumn([
        //         'atracao_id', 'evento_id', 'prato_id', 'promocao_id', 'estabelecimento_id', 'user_id'
        //     ]);
        // });
    }
}
