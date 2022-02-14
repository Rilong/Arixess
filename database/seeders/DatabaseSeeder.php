<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::create([
           'name' => 'Manager',
           'email' => 'manage@gmail.com',
           'password' => Hash::make('manager123456789'),
           'role' => 'manager'
       ]);
    }
}
