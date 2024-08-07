<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Artesaos\SEOTools\Facades\SEOTools::generate() !!}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
    @stack('styles')
</head>

<body x-cloak x-data="theme({{ preferenceIs('theme', 'dark') ? 'true' : 'false' }})" :class="{ 'dark': darkMode == true }" class="font-sans antialiased"
    x-on:change-theme.window="darkMode = $event.detail.dark">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <x-layouts.navigation />

        <!-- Page Content -->
        <main class="mx-auto mt-4 max-w-7xl">
            {{ $slot }}
        </main>
    </div>
    @stack('scripts')
    <livewire:scripts />
</body>

</html>
