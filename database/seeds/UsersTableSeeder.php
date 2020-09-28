<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Admin',
            'email' => 'admin@newsportal.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('user');
        $user->assignRole('writer');
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Writer',
            'email' => 'writer@newsportal.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('writer');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@newsportal.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole('user');
    }
}
