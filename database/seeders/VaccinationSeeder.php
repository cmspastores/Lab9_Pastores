<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rows = [
            [
                'patient_name' => 'Baby Juan Dela Cruz',
                'purok' => 'Purok 3',
                'vaccine' => 'BCG',
                'dose' => '1st dose',
                'scheduled_at' => '2026-11-03',
                'status' => 'Scheduled',
            ],
            [
                'patient_name' => 'Lola Pacing Reyes',
                'purok' => 'Purok 1',
                'vaccine' => 'Anti-Flu',
                'dose' => 'Annual',
                'scheduled_at' => '2026-10-20',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Carlos',
                'purok' => 'Purok 2',
                'vaccine' => 'OPV',
                'dose' => 'Annual',
                'scheduled_at' => '2026-09-16',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Carlos',
                'purok' => 'Purok 2',
                'vaccine' => 'OPV',
                'dose' => 'Annual',
                'scheduled_at' => '2026-09-16',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Manuel',
                'purok' => 'Purok 2',
                'vaccine' => 'Pentavalent',
                'dose' => 'Annual',
                'scheduled_at' => '2026-09-16',
                'status' => 'Overdue',
            ],
            [
                'patient_name' => 'Rien',
                'purok' => 'Purok 2',
                'vaccine' => 'MMR',
                'dose' => 'Annual',
                'scheduled_at' => '2026-09-16',
                'status' => 'Overdue',
            ],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
