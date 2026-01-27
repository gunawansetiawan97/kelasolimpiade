@extends('layouts.guest')

@section('title', 'Lupa Password - Kelas Olimpiade')

@section('content')
<div class="bg-white shadow-md rounded-lg p-8">
    <h2 class="text-2xl font-bold text-center mb-6">Lupa Password</h2>

    <p class="text-gray-600 text-center mb-6">
        Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
    </p>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                required autofocus>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Kirim Link Reset Password
        </button>
    </form>

    <p class="text-center mt-6 text-gray-600">
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Kembali ke Login</a>
    </p>
</div>
@endsection
