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
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'fabricio.melo@geq.com.br',
            'password' => bcrypt('fab87144551'),
            'status_assinante' => 'false',
            'cpf' => '00000000000',
            'type' => 'admin',

        ]);
    }
}
