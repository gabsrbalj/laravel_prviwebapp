<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users = [
         [
           'name' => 'Super Admin',
           'email' => 'superadmin@gmail.com',
           'username' => 'admin',
           'password' => '123456',
           'is_admin' => '1',
         ],
         [
           'name' => 'User',
           'email' => 'user@gmail.com',
           'username' => 'user',
           'password' => '13456',
           'is_admin' => null,
         ],
          [
           'name' => 'Client',
           'email' => 'client@gmail.com',
           'username' => 'client',
           'password' => '13456',
           'is_admin' => null,
         ]
       ];

       foreach($users as $user)
       {
           User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'username' => $user['username'],
            'password' => Hash::make($user['password'])
          ]);
        }
    }
}
