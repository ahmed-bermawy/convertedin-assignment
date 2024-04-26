@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</a>
    <br>
    <br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if (count($tasks) > 0)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Description</th>
                    <th scope="col" class="px-6 py-3">Assigned To</th>
                    <th scope="col" class="px-6 py-3">Assigned By</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $task->title }}</td>
                        <td class="px-6 py-4">{{ $task->description }}</td>
                        <td class="px-6 py-4">{{ $task->assignedTo->name }}</td>
                        <td class="px-6 py-4">{{ $task->assignedBy->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $tasks->links() }}
        @else
            <p>No tasks found.</p>
        @endif
    </div>
@endsection
