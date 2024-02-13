<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('users')->insert([
        // Admin
        [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ],
        // Doctor (corrected spelling)
        [
            'name' => 'Doctor',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('doctor'),
            'role' => 'doctor',
        ],
        // Patient
        [
            'name' => 'Patient',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('patient'),
            'role' => 'patient',
        ],
    ]);
}

}
