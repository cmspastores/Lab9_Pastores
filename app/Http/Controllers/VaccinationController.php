<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaccination;

class VaccinationController extends Controller
{
    public function index()
{
    $title = 'Bakuna Tracker – Purok Lastname';
    $schedules = Vaccination::orderBy('scheduled_at')->get();
    $stats = [
        ['label' => 'Total', 'value' => $schedules->count()],
        ['label' => 'Done', 'value' => $schedules->where('status', 'Done')->count()],
        // ... 2 more
    ];
    $alerts =  $schedules = Vaccination::orderBy('scheduled_at')->get();
    return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts'));
}
    
    public function schedule()
    {
        $title = 'Schedule Vaccination – Purok Lastname';
        return view('dashboard.schedule', compact('title'));
    }
}
