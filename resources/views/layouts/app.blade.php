<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ url('favicon.ico') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <header class="dark-blue shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 flex justify-between">
                    <!-- Page Heading -->
                    <div class="flex inline-flex gap-6 items-center">
                        
                        <a href="{{ route('questionnaire') }}">
                            <img src="{{ url('/images/logo-white.png') }}" alt="NHS Forth Valley" width="64px">
                        </a> 
                        
                        <h2 class="inlinefont-semibold text-xl text-white leading-tight">
                        @if (isset($heading))
                            {{ $heading }}
                        @else
                            <a href="{{ route('questionnaire') }}">Oxford Scores</a>
                        @endif
                        </h2>

                    </div>   

                    @auth
                        @include('layouts.navigation')
                    @endauth
                                 
                </div>                    
            </header>


            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto sm:px-6 py-12">
                    <div class="p-6 bg-white shadow-sm sm:rounded-lg">
                        {{ $slot }}
                    </div>
                    <p class="text-center mt-6 text-sm text-gray-600">© NHS Forth Valley - Oxford Scores</p>
                </div>
            </main>
        </div>
    </body>
</html>