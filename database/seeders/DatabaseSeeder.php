<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'nathan@fic15.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'phone' => '1234567890'
        ]);

        \App\Models\ProfileClinic::factory()->create([
            'name' => 'Klinik Nathan',
            'address' => 'Jl.Rungkut No 12',
            'phone' => '123456789',
            'email' => 'dr.nathan@klinik.com',
            'doctor_name' => 'Dr. Nathan',
            'unique_code' => '123456'
        ]);

        $this->call([
            DoctorSeeder::class,
            DoctorScheduleSeeder::class,
            PatientSeeder::class
        ]);
    }
}
