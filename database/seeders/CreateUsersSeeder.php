<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'admin',
               'email'=>'admin@admin.com',
               'type'=>0,
               'password'=> hash::make('admin12345'),
            ],
            [
               'name'=>'user',
               'email'=>'user@user.com',
               'type'=> 1,
               'password'=> hash::make('user12345'),
            ],
            [
               'name'=>'manager',
               'email'=>'manager@manager.com',
               'type'=>2,
               'password'=> hash::make('manager12345'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
