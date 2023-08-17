<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
            'firstName' => 'Admin',
            'middleName' => 'Admin',
            'lastName' => 'Admin',
            'phonenumber' => '09978972884',
            'role' => 'Admin',
            'email' => 'mjespelita.swashed@gmail.com',
            'password' => Hash::make('adminadmin')
        ]);
    }
}
