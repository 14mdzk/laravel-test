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
        User::create(['username' => 'mzain', 'full_name' => 'Maulana Zain', 'password' => Hash::make('password')]);
        User::create(['username' => 'admin', 'full_name' => 'Administrator', 'password' => Hash::make('admin')]);
    }
}
