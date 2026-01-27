@extends('layouts.app')

@section('title', $classroom->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center space-x-2 text-sm text-gray-500 mb-2">
            <a href="{{ route('student.classrooms.index') }}" class="hover:text-gray-700">Kelas Saya</a>
            <span>/</span>
            <span>{{ $classroom->name }}</span>
        </div>
        <div class="flex justify-between items-start">
            <div>
                <h1 class="text-2xl font-bold">{{ $classroom->name }}</h1>
                <div class="flex items-center space-x-2 mt-2">
                    <span class="px-2 py-1 text-xs rounded bg-purple-100 text-purple-800">
                        {{ $classroom->subscription->name }}
                    </span>
                    @if($hasActiveSubscription)
                        <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-800">
                            Langganan Aktif
                        </span>
                    @else
                        <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                            Langganan Tidak Aktif
                        </span>
                    @endif
                </div>
            </div>
        </div>
        @if($classroom->description)
            <p class="text-gray-600 mt-3">{{ $classroom->description }}</p>
        @endif
    </div>

    <!-- Subscription Status Alert -->
    @if(!$hasActiveSubscription)
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6 rounded">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        <strong>Langganan Anda tidak aktif.</strong> Anda hanya dapat melihat aktivitas yang diposting saat langganan Anda aktif.
                        @if($lockedCount > 0)
                            Ada <strong>{{ $lockedCount }} aktivitas</strong> yang tidak dapat diakses.
                        @endif
                    </p>
                    <p class="mt-2">
                        <a href="{{ route('subscriptions.index') }}" class="text-yellow-700 font-medium underline hover:text-yellow-600">
                            Perpanjang langganan untuk akses penuh
                        </a>
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Locked Activities Info -->
    @if($lockedCount > 0 && $hasActiveSubscription)
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6 rounded">
            <p class="text-sm text-blue-700">
                Ada <strong>{{ $lockedCount }} aktivitas</strong> yang diposting di luar periode langganan Anda sebelumnya.
            </p>
        </div>
    @endif

    <!-- Activities -->
    @if($activities->count() > 0)
        <div class="space-y-6">
            @foreach($activities as $activity)
                <div class="bg-white rounded-lg shadow overflow-hidden {{ $activity->is_pinned ? 'ring-2 ring-yellow-400' : '' }}">
                    <!-- Activity Header -->
                    <div class="p-4 border-b {{ $activity->is_pinned ? 'bg-yellow-50' : 'bg-gray-50' }}">
                        <div class="flex items-center space-x-3">
                            @if($activity->is_pinned)
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5 5a2 2 0 012-2h6a2 2 0 012 2v2a2 2 0 01-2 2H7a2 2 0 01-2-2V5zm2 0v2h6V5H7z"></path>
                                </svg>
                            @endif
                            @if($activity->type === 'youtube')
                                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-600 flex items-center">
                                    <svg class="h-3 w-3 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                    YouTube
                                </span>
                            @elseif($activity->type === 'announcement')
                                <span class="px-2 py-1 text-xs rounded bg-orange-100 text-orange-600 flex items-center">
                                    <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                    Pengumuman
                                </span>
                            @elseif($activity->type === 'link')
                                <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-600 flex items-center">
                                    <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                    </svg>
                                    Link
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-600 flex items-center">
                                    <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Materi
                                </span>
                            @endif
                            <h3 class="font-semibold text-lg">{{ $activity->title }}</h3>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                            Diposting oleh {{ $activity->admin->name }} | {{ $activity->created_at->format('d M Y H:i') }}
                        </p>
                    </div>

                    <!-- Activity Content -->
                    <div class="p-4">
                        @if($activity->type === 'youtube')
                            @if($activity->youtube_embed_url)
                                <div class="aspect-video">
                                    <iframe
                                        src="{{ $activity->youtube_embed_url }}"
                                        class="w-full h-full rounded"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            @else
                                <a href="{{ $activity->content }}" target="_blank" class="text-blue-600 hover:underline">
                                    {{ $activity->content }}
                                </a>
                            @endif
                        @elseif($activity->type === 'link')
                            <a href="{{ $activity->content }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Buka Link
                            </a>
                            <p class="text-sm text-gray-500 mt-2">{{ $activity->content }}</p>
                        @elseif($activity->type === 'announcement')
                            <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                                <p class="text-gray-800 whitespace-pre-line">{{ $activity->content }}</p>
                            </div>
                        @else
                            <div class="prose max-w-none">
                                <p class="whitespace-pre-line">{{ $activity->content }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
            @if($lockedCount > 0)
                <p class="text-gray-500">Tidak ada aktivitas yang dapat diakses.</p>
                <p class="text-sm text-gray-400 mt-2">Ada {{ $lockedCount }} aktivitas yang tersedia jika Anda memperpanjang langganan.</p>
                <a href="{{ route('subscriptions.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Perpanjang Langganan
                </a>
            @else
                <p class="text-gray-500">Belum ada aktivitas di kelas ini.</p>
                <p class="text-sm text-gray-400 mt-2">Aktivitas akan muncul ketika admin menambahkannya.</p>
            @endif
        </div>
    @endif
</div>
@endsection
