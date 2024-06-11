<!-- Layouts file for regular users -->
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
     <!-- Styles -->
     @vite(['resources/css/app.css'])

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @auth
            @if(Auth::user()->isAdmin())
                @include('layouts.admin-navigation')
            @else
                @include('layouts.navigation')
            @endif
        @endauth

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
