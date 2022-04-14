<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'username' => "user.1",
                'password' => Hash::make("jornal001"),
                'acesso' => "admin",
                'estado' => "on",
            ],   [
                'username' => "user.2",
                'password' => Hash::make("jornal001"),
                'acesso' => "escritor",
                'estado' => "on",
            ],   [
                'username' => "user.3",
                'password' => Hash::make("jornal001"),
                'acesso' => "editor",
                'estado' => "on",
            ],   [
                'username' => "user.4",
                'password' => Hash::make("jornal001"),
                'acesso' => "leitor",
                'estado' => "on",
            ],
        ]);
    }
}