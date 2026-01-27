<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Kelas Olimpiade')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @include('partials.katex')
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white shadow-lg" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo & Desktop Menu -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('student.dashboard') }}" class="text-xl font-bold">Kelas Olimpiade</a>
                    <div class="hidden md:flex space-x-1">
                        <a href="{{ route('student.dashboard') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Dashboard</a>
                        <a href="{{ route('student.packages.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Paket Soal</a>
                        <a href="{{ route('subscriptions.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Langganan</a>
                        <a href="{{ route('student.practice.history') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Riwayat</a>
                        <a href="{{ route('student.classrooms.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Kelas Saya</a>
                        <a href="{{ route('orders.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded">Pesanan</a>
                    </div>
                </div>

                <!-- Right Side: Cart, Profile, Logout (Desktop) -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <a href="{{ route('cart.index') }}" class="hover:bg-blue-700 px-3 py-2 rounded relative">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @php
                            $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count();
                        @endphp
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <a href="{{ route('student.profile.show') }}" class="hover:bg-blue-700 px-3 py-2 rounded">{{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:bg-blue-700 px-3 py-2 rounded">Logout</button>
                    </form>
                </div>

                <!-- Mobile: Cart & Hamburger -->
                <div class="flex md:hidden items-center space-x-2">
                    <!-- Cart Icon Mobile -->
                    <a href="{{ route('cart.index') }}" class="hover:bg-blue-700 p-2 rounded relative">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <!-- Hamburger Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="hover:bg-blue-700 p-2 rounded focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden bg-blue-700">
            <div class="px-4 py-3 space-y-1">
                <a href="{{ route('student.dashboard') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Dashboard</a>
                <a href="{{ route('student.packages.index') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Paket Soal</a>
                <a href="{{ route('subscriptions.index') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Langganan</a>
                <a href="{{ route('student.practice.history') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Riwayat</a>
                <a href="{{ route('student.classrooms.index') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Kelas Saya</a>
                <a href="{{ route('orders.index') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">Pesanan</a>
                <div class="border-t border-blue-500 my-2"></div>
                <a href="{{ route('student.profile.show') }}" class="block hover:bg-blue-800 px-3 py-2 rounded">
                    <span class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left hover:bg-blue-800 px-3 py-2 rounded flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session('info'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
                {{ session('info') }}
            </div>
        @endif

        @yield('content')
    </main>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    @stack('scripts')
</body>
</html>
