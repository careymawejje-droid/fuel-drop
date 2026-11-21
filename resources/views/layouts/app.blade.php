<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/lucide@latest"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        @php
            $role = auth()->user()->hasRole('admin') ? 'admin' : (auth()->user()->hasRole('provider') ? 'provider' : (auth()->user()->hasRole('driver') ? 'driver' : 'customer'));
        @endphp
        <div class="min-h-screen bg-slate-100">
            @include('components.fueldrop.sidebar', ['role' => $role])
            <div class="min-h-screen lg:ml-64">
                @if (isset($header))
                    <header class="border-b border-slate-200 bg-white">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        <script>lucide.createIcons();</script>
    </body>
</html>
