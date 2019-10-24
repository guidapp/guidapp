<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EstabelecimentosTableSeeder::class);
        $this->call(AtracaosTableSeeder::class);
        $this->call(EventosTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(ContatosTableSeeder::class);
        $this->call(EventoUnicosTableSeeder::class);
        $this->call(ApresentacaosTableSeeder::class);
        $this->call(EstabecimentoUserTableSeeder::class);
        $this->call(Avaliacao_eventosTableSeeder::class);
        $this->call(HorariosTableSeeder::class);
        $this->call(PromocaosTableSeeder::class);
        $this->call(PratosTableSeeder::class);
        $this->call(ComentariosTableSeeder::class);
        $this->call(IngressosTableSeeder::class);
        $this->call(PagamentosTableSeeder::class);
        $this->call(VendaIngressosTableSeeder::class);
        $this->call(ImpulsionamentosTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ImagemsTableSeeder::class);
    }
}
