<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>E-commerce Laravel</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/cart.js'])
    </head>
    <body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
        @php
            use App\Helpers\Cart;
        @endphp

        <!-- Barra de Navegação -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">E-commerce</a>
                        </div>
                        <!-- Links de Navegação -->
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="/" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-100 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Início
                            </a>
                            <a href="/produtos" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-100 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Produtos
                            </a>
                            <a href="#" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 dark:hover:text-gray-100 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                Contato
                            </a>
                        </div>
                    </div>
                    <!-- Botões de Ação -->
                    <div class="flex items-center">
                        <!-- Botão Dark Mode -->
                        <button id="themeToggle" class="p-2 rounded-full text-gray-500 hover:text-yellow-500 focus:outline-none">
                            <svg id="themeToggleIcon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <!-- Ícone de Sol (modo claro) -->
                                <path id="iconSun" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m8.66-8.66l-.7.7M4.34 4.34l.7.7m12.02 12.02l.7.7M4.34 19.66l.7-.7M21 12h-1M4 12H3m9 3a3 3 0 100-6 3 3 0 000 6z" />
                                <!-- Ícone de Lua (modo escuro) -->
                                <path id="iconMoon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                            </svg>
                        </button>
                        <a href="/cart" class="p-1 rounded-full text-gray-400 hover:text-gray-500 dark:text-gray-300 relative">
                            <span class="sr-only">Carrinho</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span id="cartCount" class="absolute -top-1 -right-1 bg-indigo-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                {{ Cart::count() }}
                            </span>
                        </a>
                        @if (Route::has('login'))
                            <div class="ml-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">
                                        Login
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 bg-indigo-600 text-white dark:bg-indigo-700 text-sm font-medium hover:bg-indigo-700 dark:hover:bg-indigo-600 px-4 py-2 rounded-md">
                                            Registrar
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </main>

        <!-- Modal de Login -->
        <div id="loginModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Login Necessário</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500 dark:text-gray-300">
                            Para adicionar produtos ao carrinho, você precisa estar logado.
                        </p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Fazer Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-gray-100 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Registrar
                            </a>
                        @endif
                        <button onclick="window.closeLoginModal()" class="mt-3 px-4 py-2 bg-gray-100 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
                <nav class="-mx-5 -my-2 flex flex-wrap justify-center">
                    <div class="px-5 py-2">
                        <a href="#" class="text-base text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                            Política de Privacidade
                        </a>
                    </div>
                    <div class="px-5 py-2">
                        <a href="#" class="text-base text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                            Termos de Serviço
                        </a>
                    </div>
                </nav>
                <div class="mt-8 flex justify-center space-x-6">
                    <a href="#" class="text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="currentColor" d="M24 12c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12zM12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm-2-15h4v4h-4zm0 6h4v8h-4z" />
                        </svg>
                    </a>
                </div>
            </div>
        </footer>

        <script>
            // Adiciona o evento de clique ao botão de tema
            document.addEventListener('DOMContentLoaded', () => {
                const themeToggle = document.getElementById('themeToggle');
                if (themeToggle) {
                    themeToggle.addEventListener('click', window.toggleTheme);
                }
            });

            // Define a variável isAuthenticated globalmente
            window.isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        </script>
    </body>
</html> 