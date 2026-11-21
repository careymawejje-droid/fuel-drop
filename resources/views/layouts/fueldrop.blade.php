<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | FuelDrop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-900 antialiased">
    @php
        $role = auth()->user()->hasRole('admin') ? 'admin' : (auth()->user()->hasRole('provider') ? 'provider' : (auth()->user()->hasRole('driver') ? 'driver' : 'customer'));
    @endphp
    @include('components.fueldrop.sidebar', ['role' => $role])
    <div class="min-h-screen lg:ml-64">
        <div class="hidden border-b border-slate-200 bg-white px-6 py-4 lg:flex lg:items-center lg:justify-between">
            <div class="[&_a]:!text-slate-600 [&_a:hover]:!text-slate-900">
                @yield('back-link')
            </div>
            <p class="text-sm text-slate-500">Signed in as <span class="font-medium text-slate-900">{{ auth()->user()->name }}</span></p>
        </div>
        <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    {{-- Render Lucide icons --}}
    <script>lucide.createIcons();</script>
</body>
</html>
