<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $admin = User::factory()->create([
            'name' => 'rizki',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
        ]);   
        $admin->assignRole('admin');
        $admin = User::factory()->create([
            'name' => 'penulis',
            'email' => 'penulis@gmail.com',
            'password' => '12345678',
        ]);   
        $admin->assignRole('writer');
    }
}
