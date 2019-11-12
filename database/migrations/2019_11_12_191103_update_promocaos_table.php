<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromocaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promocaos', function (Blueprint $table) {
            $table->dropColumn('mes');
            $table->dropColumn('dia_semana');
            $table->boolean('domingo')->nullable()->default(false);
            $table->boolean('segunda')->nullable()->default(false);
            $table->boolean('terca')->nullable()->default(false);
            $table->boolean('quarta')->nullable()->default(false);
            $table->boolean('quinta')->nullable()->default(false);
            $table->boolean('sexta')->nullable()->default(false);
            $table->boolean('sabado')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promocaos', function (Blueprint $table) {
            $table->integer('mes');
            $table->integer('dia_semana');
            $table->dropColumn('domingo');
            $table->dropColumn('segunda');
            $table->dropColumn('terca');
            $table->dropColumn('quarta');
            $table->dropColumn('quinta');
            $table->dropColumn('sexta');
            $table->dropColumn('sabado');
        });
    }
}
