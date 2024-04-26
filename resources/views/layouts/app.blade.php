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
    <h1 class="text-2xl font-bold p-4 text-center">@yield('title')</h1>

    @yield('content')

</div>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
</body>
</html>