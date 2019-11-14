<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 30)->create();

        // Usuario para testes manuais no navegador
        factory('App\User')->create(['name' => 'ADMIN', 'email' => 'admin@gmail.com', 'password' => password_hash('123456', PASSWORD_DEFAULT)]);
    }
}
