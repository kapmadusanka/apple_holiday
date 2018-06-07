<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::truncate();

        User::create( [
            'email' => 'admin@gmail.com' ,
            'password' => Hash::make( '123456' ) ,
            'name' => 'Admin' ,
            'role' => 1 ,
        ]);

        User::create([
                'email' => 'user@gmail.com' ,
                'password' => Hash::make( '123456' ) ,
                'name' => 'User' ,
                'role' => 2 ,
            ]);

    }
}
