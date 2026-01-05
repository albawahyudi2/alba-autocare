<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
            .glass-light { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(0, 0, 0, 0.1); }
        </style>
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <div class="flex flex-col flex-1 bg-gradient-to-br from-neutral-950 via-neutral-900 to-neutral-950">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-neutral-900/80 backdrop-blur-xl border-b border-neutral-800">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
            
            <!-- Footer -->
            <footer class="bg-neutral-950/80 backdrop-blur-xl border-t border-neutral-800 mt-auto">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-neutral-500">
                            &copy; {{ date('Y') }} Alba AutoCare. All rights reserved.
                        </p>
                        <p class="text-sm text-neutral-600">
                            Powered by <span class="text-red-600 font-semibold">Audi</span> 
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
