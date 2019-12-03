<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('descricao');
            $table->float('avaliacao');
            $table->integer('visitas');
            $table->string('hash');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }

    public function addEventoUnico() {
        $evento_unico = new EventoUnico;
        $evento_unico->latitude = $request->latitude;
        $evento_unico->longitude = $request->longitude;
        $evento_unico->data = $request->dataEvento;

        $evento->eventoUnico()->save($evento_unico);
    }

    public function addAtracao($atracao) {
        if(!isset($evento_unico)) {
            $this->addEventoUnico();
        }

        $this->eventoUnico[0]->save($atracao);
    }

    public function getAtracoes() {
        return $this->eventoUnico[0]->atracaos;
    }
}
