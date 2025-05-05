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
            <button id="theme-toggle" class="fixed top-4 right-4 p-2 rounded bg-gray-200 dark:bg-gray-800">
                Toggle Dark Mode
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
