<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $admin = User::create([
            'name' => 'Administrator Website',
            'email' => 'admin@admin.com',
            'password' => hash::make('admin12345')
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User Website',
            'email' => 'user@user.com',
            'password' => hash::make('user12345')
        ]);

        $user->assignRole('user');
    }
}
