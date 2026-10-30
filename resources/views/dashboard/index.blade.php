@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="space-y-6">
        <div>
            <h1 class="text-2xl font-semibold">Vaccination dashboard</h1>
            <p class="mt-1 text-slate-600">View upcoming and overdue vaccination schedules.</p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            @foreach ($stats as $stat)
                <article class="rounded-lg border border-slate-200 bg-white p-5">
                    <h2 class="text-sm font-medium text-slate-600">{{ $stat['label'] }}</h2>
                    <p class="mt-2 text-2xl font-semibold">{{ $stat['value'] }}</p>
                </article>
            @endforeach
        </div>

        <section class="overflow-hidden rounded-lg border border-slate-200 bg-white">
            <div class="border-b border-slate-200 px-5 py-4">
                <h2 class="font-semibold">Vaccination schedule</h2>
            </div>

            @if ($schedules->isEmpty())
                <p class="p-5 text-slate-600">No vaccinations are scheduled.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th scope="col" class="px-5 py-3 font-medium">Patient</th>
                                <th scope="col" class="px-5 py-3 font-medium">Purok</th>
                                <th scope="col" class="px-5 py-3 font-medium">Vaccine</th>
                                <th scope="col" class="px-5 py-3 font-medium">Dose</th>
                                <th scope="col" class="px-5 py-3 font-medium">Scheduled</th>
                                <th scope="col" class="px-5 py-3 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="px-5 py-3">{{ $schedule->patient_name }}</td>
                                    <td class="px-5 py-3">{{ $schedule->purok }}</td>
                                    <td class="px-5 py-3">{{ $schedule->vaccine }}</td>
                                    <td class="px-5 py-3">{{ $schedule->dose }}</td>
                                    <td class="px-5 py-3">{{ $schedule->scheduled_at->format('M j, Y') }}</td>
                                    <td class="px-5 py-3">{{ $schedule->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </section>
@endsection
