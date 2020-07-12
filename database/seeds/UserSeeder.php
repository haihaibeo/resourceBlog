<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John',
            'username' => 'usernamejohn',
            'email' => 'john@mail.com',
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'name' => 'Danny',
            'username' => 'usernamedanny',
            'email' => 'danny@mail.com',
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'name' => 'Lisa',
            'username' => 'usernamelisa',
            'email' => 'lisa@mail.com',
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'name' => 'Howard',
            'username' => 'usernamehoward',
            'email' => 'howard@mail.com',
            'password' => Hash::make('123123'),
        ]);
        User::create([
            'name' => 'Felix',
            'username' => 'usernamefelix',
            'email' => 'felix@mail.com',
            'password' => Hash::make('123123'),
        ]);
    }
}
