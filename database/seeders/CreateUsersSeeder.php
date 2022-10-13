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
               'name'=>'Admin',
               'email'=>'admin@admin.com',
               'type'=>0,
               'password'=> hash::make('admin12345'),
            ],
            [
               'name'=>'Finance',
               'email'=>'finance@finance.com',
               'type'=> 1,
               'password'=> hash::make('finance12345'),
            ],
            [
               'name'=>'HR',
               'email'=>'hr@hr.com',
               'type'=>2,
               'password'=> hash::make('hr12345'),
            ],
            [
                'name'=>'Data Entry',
                'email'=>'dataentry@dataentry.com',
                'type'=>3,
                'password'=> hash::make('dataentry12345'),
             ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
