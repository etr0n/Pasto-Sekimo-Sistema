<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=> 'Administratorius',
            'last_name'=>'',
            'email'=> 'admin@gmail.com',
            'password' => Hash::make('Administratorius1!'),
            'role_id' => 1
        ]);

        User::create([
            'name'=> 'Operatorius',
            'last_name'=>'',
            'email'=> 'operatorius@gmail.com',
            'password' => Hash::make('Operatorius1!'),
            'role_id' => 2
        ]);

        User::create([
            'name'=> 'Ieva',
            'last_name'=>'Ievaite',
            'email'=> 'ieva@gmail.com',
            'password' => Hash::make('Klientas1!'),
            'role_id' => 3
        ]);

    }
}
