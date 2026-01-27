@extends('layouts.app')

@section('title', 'Kelas Saya')

@section('content')
<div class="max-w-6xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Kelas Saya</h1>

    @if($classrooms->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($classrooms as $classroom)
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="font-bold text-lg">{{ $classroom->name }}</h3>
                            <span class="px-2 py-1 text-xs rounded bg-purple-100 text-purple-800">
                                {{ $classroom->subscription->name }}
                            </span>
                        </div>
                        @if($classroom->description)
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($classroom->description, 100) }}</p>
                        @endif
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span>{{ $classroom->activities_count }} aktivitas</span>
                        </div>

                        <!-- Recent Activities Preview -->
                        @if($classroom->activities->count() > 0)
                            <div class="border-t pt-3 mb-4">
                                <p class="text-xs text-gray-500 mb-2">Aktivitas terbaru:</p>
                                @foreach($classroom->activities as $activity)
                                    <div class="flex items-center space-x-2 text-sm mb-1">
                                        @if($activity->type === 'youtube')
                                            <svg class="h-4 w-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                            </svg>
                                        @elseif($activity->type === 'announcement')
                                            <svg class="h-4 w-4 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                            </svg>
                                        @else
                                            <svg class="h-4 w-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                            </svg>
                                        @endif
                                        <span class="truncate">{{ $activity->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <a href="{{ route('student.classrooms.show', $classroom) }}"
                            class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Masuk Kelas
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="h-16 w-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <p class="text-gray-500 mb-4">Anda belum terdaftar di kelas manapun.</p>
            <p class="text-sm text-gray-400">Hubungi admin untuk mendaftarkan Anda ke kelas yang sesuai.</p>
        </div>
    @endif
</div>
@endsection
