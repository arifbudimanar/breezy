<!DOCTYPE html>
<html x-cloak lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{darkMode: localStorage.getItem('darkMode')|| localStorage.setItem('darkMode', 'system')}"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- X-Cloak -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        @media (prefers-color-scheme: dark) {
            ::-webkit-scrollbar {
                width: 5px;
                background-color: #111827;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #4f46e5;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background-color: #6366d0;
            }
        }

        @media (prefers-color-scheme: light) {
            ::-webkit-scrollbar {
                width: 5px;
                height: 5px;
                background-color: #f5f5f5;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #4f46e5;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background-color: #6366d0;
            }
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div class="flex space-x-5">
            <div class="mt-5 flex items-center text-gray-600 dark:text-gray-400">
                <div class="mr-2">{{ __('Language') }}</div>
                @include('layouts.partials.language')
            </div>
            <div class="mt-5 flex items-center text-gray-600 dark:text-gray-400">
                <div class="mr-2">{{ __('Theme') }}</div>
                @include('layouts.partials.theme')
            </div>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

    </div>
</body>

</html>