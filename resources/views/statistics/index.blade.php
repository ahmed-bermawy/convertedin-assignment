@extends('layouts.app')

@section('title', 'Statistics')

@section('content')
    <div class="flex justify-center">
        <div class="w-full bg-white p-6 rounded-lg">
            <h1 class="text-2xl text-center font-medium mb-1">Top 10 Users with Highest Task Count</h1>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Task Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($statistics as $statistic)
                        <tr>
                            <td class="border px-4 py-2">{{ $statistic->user->name }}</td>
                            <td class="border px-4 py-2">{{ $statistic->task_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection