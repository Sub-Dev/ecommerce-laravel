<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme', 'light') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Button to toggle theme -->
            <button id="theme-toggle" class="fixed top-4 right-4 p-2 rounded-full bg-gray-200 dark:bg-gray-800 text-gray-600 dark:text-gray-300">
                <!-- Ícone de Sol (modo claro) -->
                <svg id="icon-sun" class="w-6 h-6 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m8.66-8.66l-.7.7M4.34 4.34l.7.7m12.02 12.02l.7.7M4.34 19.66l.7-.7M21 12h-1M4 12H3m9 3a3 3 0 100-6 3 3 0 000 6z" />
                </svg>

                <!-- Ícone de Lua (modo escuro) -->
                <svg id="icon-moon" class="w-6 h-6 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                </svg>
            </button>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

        <script>
            // Função para alternar entre os modos claro e escuro
            const toggleDarkMode = () => {
                const html = document.documentElement;
                html.classList.toggle('dark');

                // Salva a preferência do usuário no localStorage
                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            };

            // Verifica se há uma preferência de tema salva e aplica ao carregar a página
            window.addEventListener('DOMContentLoaded', () => {
                const savedTheme = localStorage.getItem('theme');
                const html = document.documentElement;

                // Se houver preferência salva, aplica o tema correspondente
                if (savedTheme === 'dark') {
                    html.classList.add('dark');
                } else if (savedTheme === 'light') {
                    html.classList.remove('dark');
                }
            });

            // Adiciona o evento de clique no botão de alternância
            document.querySelector('#theme-toggle').addEventListener('click', toggleDarkMode);
        </script>
    </body>
</html>
