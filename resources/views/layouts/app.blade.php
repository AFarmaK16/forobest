<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 text-gray-900">
        <!-- Full Page Container -->
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    @include('layouts.navigation')
                </div>
            </header>

            <!-- Page Heading -->
            @if (isset($header))
                <div class="bg-gray-50 border-b dark:bg-gray-900 dark:border-gray-700">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <h1 class="text-lg font-semibold text-gray-700 dark:text-gray-300">
                            {{ $header }}
                        </h1>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">© {{ now()->year }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
