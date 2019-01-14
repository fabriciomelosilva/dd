<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'fabricio.melo@geq.com.br',
            'password' => bcrypt('fab87144551'),
            'status_assinante' => 'false',
            'cpf' => '00000000000',
            'type' => 'admin',

        ]);

        $findRole = Role::where('name','adimin')->first();
            
        $user->roles()->attach($findRole);
    }
}
