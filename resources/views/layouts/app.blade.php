<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Compiled CSS -->
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 dark:text-white">
<div class="container mx-auto p-4">

    <nav class="flex items-center justify-between flex-wrap bg-blue-500 p-6">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <span class="font-semibold text-xl tracking-tight">ConvertedIn Assignment</span>
        </div>
        <div class="block lg:hidden" id="hamburger-button">
            <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v15z"/></svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" id="menu">
            <div class="text-sm lg:flex-grow">
                <a href="{{ route('tasks.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ Route::currentRouteName() == 'tasks.index' ? 'active' : '' }}">
                    Tasks
                </a>
                <a href="{{ route('statistics.index') }}" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4 {{ Route::currentRouteName() == 'statistics.index' ? 'active' : '' }}">
                    Statistics
                </a>
            </div>
        </div>
    </nav>

    <h1 class="text-2xl font-bold p-4 text-center">@yield('title')</h1>


    @if ($errors->any())
        <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @yield('content')

</div>
</body>
</html>