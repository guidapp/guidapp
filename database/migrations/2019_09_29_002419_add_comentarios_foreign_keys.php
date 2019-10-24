<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComentariosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedBigInteger('comentario_id')->nullable();
            // $table->unsignedBigInteger('user_id')->nullable();
            // $table->unsignedBigInteger('estabelecimento_id')->nullable();
            // $table->unsignedBigInteger('prato_id')->nullable();
            // $table->unsignedBigInteger('evento_id')->nullable();
            // $table->unsignedBigInteger('atracao_id')->nullable();
            $table->foreign('comentario_id')->references('id')->on('comentarios');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
            // $table->foreign('prato_id')->references('id')->on('pratos');
            // $table->foreign('evento_id')->references('id')->on('eventos');
            // $table->foreign('atracao_id')->references('id')->on('atracaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentarios', function (Blueprint $table) {
            // $table->dropColumn([
            //     'comentario_id', 'user_id', 'estabelecimento_id', 'prato_id', 'atracao_id'
            // ]);

            $table->dropColumn([
                'comentario_id'
            ]);
        });
    }
}
