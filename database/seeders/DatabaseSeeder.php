<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    Role::insert([
        ['role' => 'admin'],
        ['role' => 'customer'],
    ]);

    Akun::insert([
        [
            'username' => 'admin1',
            'password' => bcrypt('password'),
            'email' => 'admin@example.com',
            'nama_lengkap' => 'Admin Satu',
            'role_id' => 1
        ],
        [
            'username' => 'customer1',
            'password' => bcrypt('password'),
            'email' => 'customer@example.com',
            'nama_lengkap' => 'Customer Satu',
            'role_id' => 2
        ]
    ]);
}
}
