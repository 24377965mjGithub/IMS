<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

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
            'firstName' => 'Mark Jason',
            'middleName' => 'Penote',
            'lastName' => 'Espelita',
            'phonenumber' => '09978972884',
            'role' => '1',
            'email' => 'mjespelita.swashed@gmail.com',
            'password' => Hash::make('adminadmin')
        ]);

        Role::create([
            'roleName' => 'Admin'
        ]);
    }
}
