<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Persiapan Olimpiade Matematika SD, SMP, SMA - Bank soal lengkap OSN, KSN, dan kompetisi matematika lainnya">
    <meta name="keywords" content="olimpiade matematika, OSN matematika, KSN matematika, soal olimpiade SD, soal olimpiade SMP, soal olimpiade SMA">
    <title>Olimpiade Matematika SD SMP SMA - Kelas Olimpiade</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#f97316',
                        math: '#6366f1',
                        dark: '#1e293b',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #eef2ff 0%, #f5f3ff 50%, #faf5ff 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
        }
        .math-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%236366f1' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="bg-gray-50 text-dark">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-gradient-to-br from-math to-purple-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl font-bold">M</span>
                        </div>
                        <span class="text-xl font-bold gradient-text">Olimpiade Matematika</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-600 hover:text-math font-medium transition">Beranda</a>
                    <a href="#tingkat" class="text-gray-600 hover:text-math font-medium transition">Tingkat</a>
                    <a href="#materi" class="text-gray-600 hover:text-math font-medium transition">Materi</a>
                    <a href="#paket" class="text-gray-600 hover:text-math font-medium transition">Paket Soal</a>
                    <a href="#testimoni" class="text-gray-600 hover:text-math font-medium transition">Testimoni</a>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-math font-medium transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-math to-purple-600 text-white px-5 py-2 rounded-full font-medium hover:shadow-lg hover:scale-105 transition-all">
                        Daftar Gratis
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-4 py-4 space-y-3">
                <a href="#beranda" class="block text-gray-600 hover:text-math font-medium">Beranda</a>
                <a href="#tingkat" class="block text-gray-600 hover:text-math font-medium">Tingkat</a>
                <a href="#materi" class="block text-gray-600 hover:text-math font-medium">Materi</a>
                <a href="#paket" class="block text-gray-600 hover:text-math font-medium">Paket Soal</a>
                <a href="#testimoni" class="block text-gray-600 hover:text-math font-medium">Testimoni</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-gradient math-pattern pt-24 pb-16 md:pt-32 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-white rounded-full px-4 py-2 shadow-sm mb-6">
                        <span class="text-2xl mr-2">📐</span>
                        <span class="text-sm text-gray-600 font-medium">Olimpiade Matematika SD - SMP - SMA</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Kuasai <span class="gradient-text">Matematika Olimpiade</span> dari Dasar hingga Mahir
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Persiapkan diri untuk OSN, KSN, dan berbagai kompetisi matematika dengan ribuan soal berkualitas tinggi, pembahasan detail, dan strategi penyelesaian yang teruji.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-math to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-center hover:shadow-xl hover:scale-105 transition-all">
                            Mulai Latihan Sekarang
                        </a>
                        <a href="#tingkat" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold text-center hover:border-math hover:text-math transition-all">
                            Lihat Tingkat Kelas
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="animate-float">
                        <div class="bg-white rounded-3xl shadow-2xl p-8">
                            <div class="text-center mb-6">
                                <div class="text-6xl mb-4">🏆</div>
                                <h3 class="text-xl font-bold text-gray-800">Soal Olimpiade Matematika</h3>
                                <p class="text-gray-500">Tingkat SD - SMP - SMA</p>
                            </div>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-indigo-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <span class="text-2xl">🎒</span>
                                        <span class="font-medium">SD (Kelas 4-6)</span>
                                    </div>
                                    <span class="text-math font-bold">500+ Soal</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <span class="text-2xl">📚</span>
                                        <span class="font-medium">SMP (Kelas 7-9)</span>
                                    </div>
                                    <span class="text-purple-600 font-bold">800+ Soal</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-violet-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <span class="text-2xl">🎓</span>
                                        <span class="font-medium">SMA (Kelas 10-12)</span>
                                    </div>
                                    <span class="text-violet-600 font-bold">1000+ Soal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -z-10 top-10 -left-10 w-32 h-32 bg-indigo-200 rounded-full opacity-50 blur-2xl"></div>
                    <div class="absolute -z-10 bottom-10 -right-10 w-40 h-40 bg-purple-200 rounded-full opacity-50 blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl p-6 text-center card-hover">
                    <div class="text-4xl font-bold text-math mb-2">2300+</div>
                    <div class="text-gray-600">Soal Matematika</div>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 text-center card-hover">
                    <div class="text-4xl font-bold text-purple-600 mb-2">150+</div>
                    <div class="text-gray-600">Paket Latihan</div>
                </div>
                <div class="bg-gradient-to-br from-violet-50 to-violet-100 rounded-2xl p-6 text-center card-hover">
                    <div class="text-4xl font-bold text-violet-600 mb-2">3</div>
                    <div class="text-gray-600">Tingkat Pendidikan</div>
                </div>
                <div class="bg-gradient-to-br from-fuchsia-50 to-fuchsia-100 rounded-2xl p-6 text-center card-hover">
                    <div class="text-4xl font-bold text-fuchsia-600 mb-2">95%</div>
                    <div class="text-gray-600">Tingkat Kepuasan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tingkat Section -->
    <section id="tingkat" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-math font-semibold">TINGKAT PENDIDIKAN</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Pilih Tingkat Sesuai Jenjangmu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Soal-soal disusun sesuai kurikulum dan tingkat kesulitan olimpiade masing-masing jenjang pendidikan
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- SD -->
                <div class="bg-white rounded-3xl overflow-hidden card-hover shadow-lg border-2 border-indigo-100 hover:border-indigo-300">
                    <div class="bg-gradient-to-r from-indigo-500 to-blue-500 p-6 text-white text-center">
                        <span class="text-5xl">🎒</span>
                        <h3 class="text-2xl font-bold mt-4">Sekolah Dasar</h3>
                        <p class="text-indigo-100">Kelas 4 - 6</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Bilangan & Operasi Hitung</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Geometri Dasar</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Logika & Penalaran</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Soal Cerita & Pemecahan Masalah</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <span class="text-3xl font-bold text-math">500+</span>
                            <span class="text-gray-500"> Soal</span>
                        </div>
                        <a href="{{ route('register') }}" class="block mt-4 text-center bg-gradient-to-r from-indigo-500 to-blue-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            Mulai Latihan SD
                        </a>
                    </div>
                </div>

                <!-- SMP -->
                <div class="bg-white rounded-3xl overflow-hidden card-hover shadow-lg border-2 border-purple-100 hover:border-purple-300 transform md:scale-105">
                    <div class="bg-gradient-to-r from-purple-500 to-violet-500 p-6 text-white text-center relative">
                        <div class="absolute top-2 right-2 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-xs font-bold">
                            POPULER
                        </div>
                        <span class="text-5xl">📚</span>
                        <h3 class="text-2xl font-bold mt-4">Sekolah Menengah Pertama</h3>
                        <p class="text-purple-100">Kelas 7 - 9</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Aljabar & Persamaan</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Geometri & Pengukuran</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Teori Bilangan</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Kombinatorika Dasar</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Statistika & Peluang</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <span class="text-3xl font-bold text-purple-600">800+</span>
                            <span class="text-gray-500"> Soal</span>
                        </div>
                        <a href="{{ route('register') }}" class="block mt-4 text-center bg-gradient-to-r from-purple-500 to-violet-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            Mulai Latihan SMP
                        </a>
                    </div>
                </div>

                <!-- SMA -->
                <div class="bg-white rounded-3xl overflow-hidden card-hover shadow-lg border-2 border-violet-100 hover:border-violet-300">
                    <div class="bg-gradient-to-r from-violet-500 to-fuchsia-500 p-6 text-white text-center">
                        <span class="text-5xl">🎓</span>
                        <h3 class="text-2xl font-bold mt-4">Sekolah Menengah Atas</h3>
                        <p class="text-violet-100">Kelas 10 - 12</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Aljabar Lanjut</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Geometri Bidang & Ruang</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Teori Bilangan Lanjut</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Kombinatorika & Probabilitas</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <span class="text-3xl font-bold text-violet-600">1000+</span>
                            <span class="text-gray-500"> Soal</span>
                        </div>
                        <a href="{{ route('register') }}" class="block mt-4 text-center bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white py-3 rounded-xl font-semibold hover:shadow-lg transition">
                            Mulai Latihan SMA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Materi Section -->
    <section id="materi" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-math font-semibold">CAKUPAN MATERI</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Materi Olimpiade Matematika Lengkap</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Mencakup semua topik yang sering muncul di OSN, KSN, dan kompetisi matematika bergengsi lainnya
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Aljabar -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-6 card-hover border border-blue-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center mb-4">
                        <span class="text-3xl">📊</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Aljabar</h3>
                    <p class="text-gray-600 text-sm mb-4">Persamaan, pertidaksamaan, fungsi, polinomial, dan sistem persamaan</p>
                    <div class="text-math font-semibold text-sm">500+ Soal</div>
                </div>

                <!-- Geometri -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-6 card-hover border border-purple-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center mb-4">
                        <span class="text-3xl">📐</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Geometri</h3>
                    <p class="text-gray-600 text-sm mb-4">Segitiga, lingkaran, segi empat, transformasi, dan geometri ruang</p>
                    <div class="text-purple-600 font-semibold text-sm">600+ Soal</div>
                </div>

                <!-- Teori Bilangan -->
                <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl p-6 card-hover border border-orange-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center mb-4">
                        <span class="text-3xl">🔢</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Teori Bilangan</h3>
                    <p class="text-gray-600 text-sm mb-4">Faktorisasi, modular aritmetika, kongruensi, dan diophantine</p>
                    <div class="text-orange-600 font-semibold text-sm">450+ Soal</div>
                </div>

                <!-- Kombinatorika -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 card-hover border border-green-100">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-lg flex items-center justify-center mb-4">
                        <span class="text-3xl">🎲</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Kombinatorika</h3>
                    <p class="text-gray-600 text-sm mb-4">Permutasi, kombinasi, prinsip pencacahan, dan probabilitas</p>
                    <div class="text-green-600 font-semibold text-sm">400+ Soal</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kompetisi Section -->
    <section class="py-20 bg-gradient-to-br from-math to-purple-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-indigo-200 font-semibold">KOMPETISI YANG DICAKUP</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Persiapan Berbagai Kompetisi</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white/10 backdrop-blur rounded-2xl p-8 text-center">
                    <div class="text-5xl mb-4">🏅</div>
                    <h3 class="text-xl font-bold mb-2">OSN / KSN</h3>
                    <p class="text-indigo-100">Olimpiade Sains Nasional tingkat Kabupaten, Provinsi, dan Nasional</p>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-8 text-center">
                    <div class="text-5xl mb-4">🌏</div>
                    <h3 class="text-xl font-bold mb-2">IMO Preparation</h3>
                    <p class="text-indigo-100">Persiapan menuju International Mathematical Olympiad</p>
                </div>
                <div class="bg-white/10 backdrop-blur rounded-2xl p-8 text-center">
                    <div class="text-5xl mb-4">🏆</div>
                    <h3 class="text-xl font-bold mb-2">Kompetisi Lainnya</h3>
                    <p class="text-indigo-100">AMC, AIME, Kangaroo Math, dan kompetisi matematika lainnya</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Paket Soal Section -->
    <section id="paket" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-math font-semibold">PAKET SOAL</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Paket Latihan Tersedia</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai paket soal dari kompetisi sebelumnya dan soal latihan berkualitas tinggi
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Paket 1 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📝</span>
                        </div>
                        <div>
                            <h3 class="font-bold">OSN SD 2024</h3>
                            <p class="text-sm text-gray-500">Tingkat Kabupaten</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">40 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>

                <!-- Paket 2 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📝</span>
                        </div>
                        <div>
                            <h3 class="font-bold">OSN SMP 2024</h3>
                            <p class="text-sm text-gray-500">Tingkat Provinsi</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">25 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>

                <!-- Paket 3 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-violet-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">📝</span>
                        </div>
                        <div>
                            <h3 class="font-bold">OSN SMA 2024</h3>
                            <p class="text-sm text-gray-500">Tingkat Nasional</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">20 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>

                <!-- Paket 4 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div>
                            <h3 class="font-bold">Latihan Aljabar</h3>
                            <p class="text-sm text-gray-500">Semua Tingkat</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">100 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>

                <!-- Paket 5 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div>
                            <h3 class="font-bold">Latihan Geometri</h3>
                            <p class="text-sm text-gray-500">Semua Tingkat</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">120 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>

                <!-- Paket 6 -->
                <div class="bg-white rounded-2xl p-6 card-hover shadow-lg">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <span class="text-2xl">🎯</span>
                        </div>
                        <div>
                            <h3 class="font-bold">Latihan Kombinatorika</h3>
                            <p class="text-sm text-gray-500">Semua Tingkat</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">80 Soal</span>
                        <span class="text-green-600 font-medium">Tersedia</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('register') }}" class="inline-block bg-gradient-to-r from-math to-purple-600 text-white px-8 py-4 rounded-full font-semibold hover:shadow-xl hover:scale-105 transition-all">
                    Lihat Semua Paket Soal
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-math font-semibold">TESTIMONI</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Kisah Sukses Mereka</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimoni 1 -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-8 card-hover">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Latihan soal di sini sangat membantu persiapan OSN Matematika. Soal-soalnya variatif dan pembahasannya mudah dipahami. Akhirnya saya lolos ke tingkat provinsi!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                            DP
                        </div>
                        <div>
                            <h4 class="font-bold">Dimas Pratama</h4>
                            <p class="text-sm text-gray-500">Siswa SMP - Medalis OSN</p>
                        </div>
                    </div>
                </div>

                <!-- Testimoni 2 -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-8 card-hover">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Anak saya jadi lebih semangat belajar matematika. Fitur latihannya interaktif dan bisa dipantau progressnya. Sangat recommended untuk persiapan olimpiade!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-bold">
                            SA
                        </div>
                        <div>
                            <h4 class="font-bold">Ibu Sari</h4>
                            <p class="text-sm text-gray-500">Orang Tua Siswa SD</p>
                        </div>
                    </div>
                </div>

                <!-- Testimoni 3 -->
                <div class="bg-gradient-to-br from-violet-50 to-indigo-50 rounded-2xl p-8 card-hover">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Bank soalnya lengkap banget, dari tingkat mudah sampai sulit. Pembahasan setiap soal detail dan membantu saya memahami berbagai teknik penyelesaian."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-violet-500 to-indigo-500 rounded-full flex items-center justify-center text-white font-bold">
                            RH
                        </div>
                        <div>
                            <h4 class="font-bold">Rina Handayani</h4>
                            <p class="text-sm text-gray-500">Siswi SMA - Peraih Perak KSN</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-math to-purple-700 math-pattern">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Jadi Juara Olimpiade Matematika?
            </h2>
            <p class="text-xl text-indigo-100 mb-8">
                Bergabung sekarang dan mulai perjalananmu menuju medali emas!
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-math px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl hover:scale-105 transition-all">
                Daftar Sekarang - Gratis!
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-math to-purple-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl font-bold">M</span>
                        </div>
                        <span class="text-xl font-bold text-white">Olimpiade Matematika</span>
                    </div>
                    <p class="mb-6 leading-relaxed">
                        Platform persiapan olimpiade matematika terlengkap untuk siswa SD, SMP, dan SMA di Indonesia.
                    </p>
                    <a href="{{ url('/') }}" class="text-math hover:text-indigo-400 font-medium">
                        &larr; Kembali ke Kelas Olimpiade
                    </a>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4">Tingkat</h3>
                    <ul class="space-y-3">
                        <li><a href="#tingkat" class="hover:text-white transition">SD (Kelas 4-6)</a></li>
                        <li><a href="#tingkat" class="hover:text-white transition">SMP (Kelas 7-9)</a></li>
                        <li><a href="#tingkat" class="hover:text-white transition">SMA (Kelas 10-12)</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4">Kontak</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            info@kelasolimpiade.id
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            +62 812 323 2032
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p>&copy; {{ date('Y') }} Kelas Olimpiade. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/628123232032" target="_blank" class="fixed bottom-6 right-6 bg-green-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 hover:scale-110 transition-all z-50">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    </a>

    <!-- Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
