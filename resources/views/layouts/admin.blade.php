<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Kelas Olimpiade')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @include('partials.katex')
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-gray-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">Admin Panel</a>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('admin.dashboard') }}" class="hover:bg-gray-700 px-3 py-2 rounded">Dashboard</a>
                        <a href="{{ route('admin.packages.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded">Paket Soal</a>
                        <a href="{{ route('admin.students.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded">Murid</a>
                        <a href="{{ route('admin.orders.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded relative">
                            Pesanan
                            @php
                                $pendingPayments = \App\Models\Payment::where('status', 'pending')->count();
                            @endphp
                            @if($pendingPayments > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">{{ $pendingPayments }}</span>
                            @endif
                        </a>
                        <a href="{{ route('admin.subscriptions.index') }}" class="hover:bg-gray-700 px-3 py-2 rounded">Langganan</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:bg-gray-700 px-3 py-2 rounded">Logout</button>
                    </form>
                </div>
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

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
