<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVendaIngressosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venda_ingressos', function (Blueprint $table) {
            $table->unsignedBigInteger('ingresso_id');
            $table->unsignedBigInteger('pagamento_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('ingresso_id')->references('id')->on('ingressos');
            $table->foreign('pagamento_id')->references('id')->on('pagamentos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venda_ingressos', function (Blueprint $table) {
            $table->dropColumn(['ingresso_id', 'pagamento_id', 'user_id']);
        });
    }
}
