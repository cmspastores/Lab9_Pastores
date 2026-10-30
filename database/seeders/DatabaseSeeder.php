<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'name'     => 'Carlos',                       // YOUR first name
        'email'    => 'nurse.pastores@bakuna.test', // nurse.[yourlastname]@bakuna.test
        'password' => Hash::make('bakuna2026'),
    ]);
    $this->call([
        VaccinationSeeder::class,
    ]);
}
}
