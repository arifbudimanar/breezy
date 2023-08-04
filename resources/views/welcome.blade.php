<!DOCTYPE html>
<html x-cloak lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') || localStorage.setItem('darkMode', 'system') }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{ 'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)')
            .matches) }">

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
                height: 5px;
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

<body
    class="font-sans antialiased bg-white sm:bg-gray-100 dark:bg-gray-800 sm:dark:bg-gray-900 selection:bg-indigo-100 dark:selection:bg-indigo-800">
    @if (session('success'))
        <div class="fixed z-30 right-5 bottom-5" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 8000)">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-700"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-indigo-500 bg-indigo-100 rounded-lg dark:bg-indigo-800 dark:text-indigo-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button" x-on:click="show = false"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-800"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    @if (session('warning'))
        <div class="fixed z-30 right-5 bottom-5" x-data="{ show: true }" x-show="show" x-transition
            x-init="setTimeout(() => show = false, 8000)">
            <div id="toast-warning"
                class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-700"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('warning') }}</div>
                <button type="button" x-on:click="show = false"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-800"
                    data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div class="min-h-screen">
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex sm:hidden md:flex items-center">
                            <a href="{{ route('home') }}">
                                <x-application-logo
                                    class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px md:ml-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @include('layouts.partials.language')
                        @include('layouts.partials.theme')
                        {{-- @guest
                        <div class="ml-1 space-x-1">
                            <x-button.link-primary href="{{ route('login')}}">
                                {{ __('Login') }}
                            </x-button.link-primary>
                        </div>
                        @endguest --}}
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-900 dark:text-white focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->first_name }}</div>
                                        @if (Auth::user()->isUserVerified())
                                            <div class="ml-1 flex items-center">
                                                <x-badge.verified-account />
                                            </div>
                                        @endif
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    {{-- <x-dropdown-link :href="route('home')">
                                    {{ __('Home') }}
                                </x-dropdown-link> --}}
                                    <x-dropdown-link :href="route('user.dashboard')">
                                        {{ __('Your Dashboard') }}
                                    </x-dropdown-link>
                                    @can('admin')
                                        <x-dropdown-link :href="route('admin.dashboard')">
                                            {{ __('Admin Dashboard') }}
                                        </x-dropdown-link>
                                    @endcan
                                    <x-dropdown-link :href="route('user.profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endauth
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-responsive-nav-link>
                </div>
                @include('layouts.partials.theme-responsive')
                @include('layouts.partials.language-responsive')
            </div>
        </nav>
        {{-- <header class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Welcome') }}
                </h2>
            </div>
        </header> --}}

        <div class="sm:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-6">
                <x-card.app>
                    <div class="py-8 mx-auto max-w-screen text-left sm:text-center lg:py-16">
                        <h1
                            class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            Welcome to Breezy!
                        </h1>
                        <p
                            class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                            A simple, user-friendly, and powerful tool to efficiently manage your organization. With its
                            intuitive interface and robust features, stay on top of projects, tasks, and teams
                            effortlessly.
                        </p>
                        <div class="flex justify-left sm:justify-center gap-5">
                            <x-button.link-primary href="{{ route('register') }}">
                                {{ __('Register') }}
                            </x-button.link-primary>
                            <x-button.link-secondary href="{{ route('login') }}">
                                {{ __('Login') }}
                            </x-button.link-secondary>
                        </div>
                    </div>

                </x-card.app>

                <x-card.app>
                    <section class=" text-white">
                        <div class="py-8 sm:py-12 sm:px-6 lg:py-16 lg:px-8">
                            <div class="max-w-xl">
                                <h2 class="text-3xl font-bold sm:text-4xl text-gray-900 dark:text-white">Feature</h2>

                                <p class="mt-4 text-gray-900 dark:text-white">
                                    Our features are designed to help you stay organized and manage your projects and
                                    tasks efficiently.
                                </p>
                            </div>

                            <div class="mt-8 grid grid-cols-1 gap-8 md:mt-16 md:grid-cols-2 md:gap-12 lg:grid-cols-3">
                                <div class="flex items-start gap-4">
                                    <span class="shrink-0 rounded-lg bg-gray-700 p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 01-.657.643 48.39 48.39 0 01-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 01-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 00-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 01-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 00.657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 01-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 005.427-.63 48.05 48.05 0 00.582-4.717.532.532 0 00-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 00.658-.663 48.422 48.422 0 00-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 01-.61-.58v0z" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">Theme</h2>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            Choose between light and dark mode to suit your preference.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="shrink-0 rounded-lg bg-gray-700 p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10.5 21l5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 016-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 01-3.827-5.802" />
                                        </svg>
                                    </span>
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">Translation</h2>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            Site translation is available in English and Indonesian.
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <span class="shrink-0 rounded-lg bg-gray-700 p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                        </svg>

                                    </span>
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                                            Responsive Design
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                            This site is designed to be responsive and can be accessed from any device.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </x-card.app>

            </div>
        </div>
    </div>
</body>

</html>
