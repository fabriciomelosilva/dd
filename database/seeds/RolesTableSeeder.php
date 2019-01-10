<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'Role dos usuários administradores do sistema. Os mesmos tem o papel de inserir os pdfs das edições e gerenciar as mesmas.',
        ]);

        DB::table('roles')->insert([
            'name' => 'assinante',
            'description' => 'Role dos usuários assinantes. Os mesmos são criados a partir da validação vinda da api de autenticação dos assinantes.',
        ]);
    }
}
