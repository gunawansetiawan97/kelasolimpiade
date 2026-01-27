@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-2xl font-bold">Profil Saya</h1>
            <a href="{{ route('student.profile.edit') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit Profil</a>
        </div>

        <dl class="space-y-4">
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">Username</dt>
                <dd class="font-medium">{{ $user->username }}</dd>
            </div>
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">Nama</dt>
                <dd class="font-medium">{{ $user->name }}</dd>
            </div>
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">Email</dt>
                <dd class="font-medium">{{ $user->email }}</dd>
            </div>
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">Tanggal Lahir</dt>
                <dd class="font-medium">{{ $user->birth_date?->format('d/m/Y') ?? '-' }}</dd>
            </div>
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">Kota</dt>
                <dd class="font-medium">{{ $user->city ?? '-' }}</dd>
            </div>
            <div class="flex border-b pb-3">
                <dt class="w-32 text-gray-500">No HP</dt>
                <dd class="font-medium">{{ $user->phone ?? '-' }}</dd>
            </div>
            <div class="flex">
                <dt class="w-32 text-gray-500">Sekolah</dt>
                <dd class="font-medium">{{ $user->school ?? '-' }}</dd>
            </div>
        </dl>

        <hr class="my-6">

        <a href="{{ route('student.profile.password') }}" class="text-blue-600 hover:underline">Ubah Password</a>
    </div>
</div>
@endsection
