<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kelas Olimpiade - Platform persiapan olimpiade sains terbaik di Indonesia">
    <title>Kelas Olimpiade - Platform Persiapan Olimpiade Sains</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#f97316',
                        dark: '#1e293b',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .gradient-text {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 50%, #fdf4ff 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        }
    </style>
</head>
<body class="bg-gray-50 text-dark">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold gradient-text">Kelas Olimpiade</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-600 hover:text-primary font-medium transition">Beranda</a>
                    <a href="#fitur" class="text-gray-600 hover:text-primary font-medium transition">Fitur</a>
                    <a href="#paket" class="text-gray-600 hover:text-primary font-medium transition">Paket Soal</a>
                    <a href="#testimoni" class="text-gray-600 hover:text-primary font-medium transition">Testimoni</a>
                    <a href="#faq" class="text-gray-600 hover:text-primary font-medium transition">FAQ</a>
                </div>

                <div class="flex items-center space-x-3">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary font-medium transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-primary to-purple-600 text-white px-5 py-2 rounded-full font-medium hover:shadow-lg hover:scale-105 transition-all">
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
                <a href="#beranda" class="block text-gray-600 hover:text-primary font-medium">Beranda</a>
                <a href="#fitur" class="block text-gray-600 hover:text-primary font-medium">Fitur</a>
                <a href="#paket" class="block text-gray-600 hover:text-primary font-medium">Paket Soal</a>
                <a href="#testimoni" class="block text-gray-600 hover:text-primary font-medium">Testimoni</a>
                <a href="#faq" class="block text-gray-600 hover:text-primary font-medium">FAQ</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-gradient pt-24 pb-16 md:pt-32 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-white rounded-full px-4 py-2 shadow-sm mb-6">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                        <span class="text-sm text-gray-600">Platform Olimpiade #1 di Indonesia</span>
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Raih <span class="gradient-text">Medali Emas</span> Olimpiade Impianmu
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        Persiapkan diri dengan ribuan soal olimpiade berkualitas, pembahasan lengkap,
                        dan sistem latihan yang terstruktur untuk meraih prestasi terbaikmu.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="bg-gradient-to-r from-primary to-purple-600 text-white px-8 py-4 rounded-full font-semibold text-center hover:shadow-xl hover:scale-105 transition-all">
                            Mulai Belajar Gratis
                        </a>
                        <a href="#fitur" class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-full font-semibold text-center hover:border-primary hover:text-primary transition-all">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    <div class="flex items-center gap-6 mt-8">
                        <div class="flex -space-x-3">
                            <div class="w-10 h-10 rounded-full bg-blue-500 border-2 border-white flex items-center justify-center text-white text-sm font-bold">A</div>
                            <div class="w-10 h-10 rounded-full bg-green-500 border-2 border-white flex items-center justify-center text-white text-sm font-bold">B</div>
                            <div class="w-10 h-10 rounded-full bg-purple-500 border-2 border-white flex items-center justify-center text-white text-sm font-bold">C</div>
                            <div class="w-10 h-10 rounded-full bg-orange-500 border-2 border-white flex items-center justify-center text-white text-sm font-bold">+</div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">1000+ Siswa Aktif</p>
                            <p class="text-sm text-gray-500">Bergabung sekarang!</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="animate-float">
                        <div class="bg-white rounded-3xl shadow-2xl p-8 relative">
                            <div class="absolute -top-4 -right-4 bg-secondary text-white px-4 py-2 rounded-full text-sm font-bold">
                                LIVE
                            </div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800">Ujian Berlangsung</h3>
                                    <p class="text-sm text-gray-500">OSN Matematika 2024</p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Progress</span>
                                    <span class="font-bold text-primary">75%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="bg-gradient-to-r from-primary to-purple-600 h-3 rounded-full" style="width: 75%"></div>
                                </div>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>15 dari 20 soal</span>
                                    <span>Sisa: 25:30</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -z-10 top-10 -left-10 w-32 h-32 bg-blue-200 rounded-full opacity-50 blur-2xl"></div>
                    <div class="absolute -z-10 bottom-10 -right-10 w-40 h-40 bg-purple-200 rounded-full opacity-50 blur-2xl"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-lg border border-gray-100">
                    <div class="text-4xl font-bold text-primary mb-2">500+</div>
                    <div class="text-gray-600">Paket Soal</div>
                </div>
                <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-lg border border-gray-100">
                    <div class="text-4xl font-bold text-secondary mb-2">10K+</div>
                    <div class="text-gray-600">Soal Tersedia</div>
                </div>
                <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-lg border border-gray-100">
                    <div class="text-4xl font-bold text-purple-600 mb-2">5K+</div>
                    <div class="text-gray-600">Siswa Terdaftar</div>
                </div>
                <div class="stat-card rounded-2xl p-6 text-center card-hover shadow-lg border border-gray-100">
                    <div class="text-4xl font-bold text-green-600 mb-2">98%</div>
                    <div class="text-gray-600">Tingkat Kepuasan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold">FITUR UNGGULAN</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Kenapa Memilih Kelas Olimpiade?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Platform kami dirancang khusus untuk membantu siswa Indonesia meraih prestasi di berbagai kompetisi olimpiade
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Bank Soal Lengkap</h3>
                    <p class="text-gray-600">
                        Ribuan soal olimpiade dari berbagai bidang: Matematika, Fisika, Kimia, Biologi, Informatika, dan Astronomi.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Simulasi Ujian Real-time</h3>
                    <p class="text-gray-600">
                        Rasakan sensasi ujian sesungguhnya dengan timer, navigasi soal, dan sistem penilaian otomatis.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-purple-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Analisis Performa</h3>
                    <p class="text-gray-600">
                        Pantau perkembangan belajarmu dengan statistik detail dan rekomendasi materi yang perlu dipelajari.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mode Latihan</h3>
                    <p class="text-gray-600">
                        Latihan tanpa tekanan waktu untuk memahami konsep dengan lebih baik sebelum menghadapi ujian.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pembahasan Detail</h3>
                    <p class="text-gray-600">
                        Setiap soal dilengkapi pembahasan lengkap untuk membantu memahami konsep dan cara penyelesaian.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Akses Multi-device</h3>
                    <p class="text-gray-600">
                        Belajar kapan saja dan di mana saja melalui laptop, tablet, atau smartphone dengan tampilan responsif.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages/Courses Section -->
    <section id="paket" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold">PAKET SOAL</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Pilih Bidang Olimpiademu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Tersedia berbagai paket soal untuk berbagai bidang olimpiade dengan tingkat kesulitan yang bervariasi
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Package 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 card-hover border border-blue-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">📐</span>
                        </div>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Populer</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Matematika</h3>
                    <p class="text-gray-600 mb-4">Soal-soal olimpiade matematika dari tingkat kabupaten hingga nasional.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">150+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>

                <!-- Package 2 -->
                <div class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-2xl p-8 card-hover border border-orange-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">⚛️</span>
                        </div>
                        <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-medium">Baru</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Fisika</h3>
                    <p class="text-gray-600 mb-4">Latihan soal fisika olimpiade dengan pembahasan konsep mendalam.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">120+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>

                <!-- Package 3 -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 card-hover border border-green-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">🧪</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Kimia</h3>
                    <p class="text-gray-600 mb-4">Bank soal kimia olimpiade lengkap dengan praktikum virtual.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">100+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>

                <!-- Package 4 -->
                <div class="bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl p-8 card-hover border border-pink-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">🧬</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Biologi</h3>
                    <p class="text-gray-600 mb-4">Soal biologi dari genetika hingga ekologi dengan ilustrasi lengkap.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">90+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>

                <!-- Package 5 -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl p-8 card-hover border border-purple-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">💻</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Informatika</h3>
                    <p class="text-gray-600 mb-4">Latihan programming dan algoritma untuk kompetisi informatika.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">80+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>

                <!-- Package 6 -->
                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl p-8 card-hover border border-indigo-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <span class="text-3xl">🔭</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">OSN Astronomi</h3>
                    <p class="text-gray-600 mb-4">Jelajahi alam semesta melalui soal-soal astronomi yang menantang.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500">60+ Paket Soal</span>
                        <a href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Mulai →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-gradient-to-br from-primary to-purple-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-200 font-semibold">CARA KERJA</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Mulai dalam 3 Langkah Mudah</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold">
                        1
                    </div>
                    <h3 class="text-xl font-bold mb-3">Daftar Akun</h3>
                    <p class="text-blue-100">Buat akun gratis dalam hitungan detik menggunakan email atau nomor HP.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold">
                        2
                    </div>
                    <h3 class="text-xl font-bold mb-3">Pilih Paket Soal</h3>
                    <p class="text-blue-100">Pilih bidang olimpiade dan tingkat kesulitan sesuai kebutuhanmu.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold">
                        3
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mulai Latihan</h3>
                    <p class="text-blue-100">Kerjakan soal, lihat pembahasan, dan pantau perkembanganmu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold">TESTIMONI</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Apa Kata Mereka?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Dengarkan pengalaman para siswa yang telah meraih prestasi bersama Kelas Olimpiade
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Berkat latihan intensif di Kelas Olimpiade, saya berhasil meraih medali emas OSN Matematika tingkat provinsi. Soal-soalnya sangat mirip dengan yang keluar saat kompetisi!"
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                            AR
                        </div>
                        <div>
                            <h4 class="font-bold">Ahmad Rizki</h4>
                            <p class="text-sm text-gray-500">Medalis Emas OSN Matematika</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Platform ini sangat membantu persiapan OSN Fisika saya. Pembahasan soalnya detail dan mudah dipahami. Timer-nya juga membantu melatih manajemen waktu."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-full flex items-center justify-center text-white font-bold">
                            SA
                        </div>
                        <div>
                            <h4 class="font-bold">Siti Aisyah</h4>
                            <p class="text-sm text-gray-500">Medalis Perak OSN Fisika</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white rounded-2xl p-8 card-hover shadow-lg">
                    <div class="flex items-center gap-1 mb-4">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <p class="text-gray-600 mb-6">
                        "Sebagai guru pembina olimpiade, saya merekomendasikan Kelas Olimpiade kepada semua murid saya. Kualitas soalnya setara dengan soal olimpiade sesungguhnya."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                            BP
                        </div>
                        <div>
                            <h4 class="font-bold">Budi Prasetyo, M.Pd</h4>
                            <p class="text-sm text-gray-500">Guru Pembina Olimpiade</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-primary font-semibold">FAQ</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">Pertanyaan yang Sering Diajukan</h2>
            </div>

            <div class="space-y-4" x-data="{ open: 1 }">
                <!-- FAQ Item 1 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = open === 1 ? null : 1" class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-gray-50 transition">
                        <span class="font-semibold text-lg">Apakah pendaftaran gratis?</span>
                        <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': open === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open === 1" x-collapse class="px-6 pb-6">
                        <p class="text-gray-600">Ya, pendaftaran akun di Kelas Olimpiade sepenuhnya gratis. Anda bisa langsung mengakses berbagai paket soal latihan setelah mendaftar.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = open === 2 ? null : 2" class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-gray-50 transition">
                        <span class="font-semibold text-lg">Bidang olimpiade apa saja yang tersedia?</span>
                        <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': open === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open === 2" x-collapse class="px-6 pb-6">
                        <p class="text-gray-600">Saat ini tersedia paket soal untuk OSN Matematika, Fisika, Kimia, Biologi, Informatika, dan Astronomi. Kami terus menambah koleksi soal dari berbagai kompetisi.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = open === 3 ? null : 3" class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-gray-50 transition">
                        <span class="font-semibold text-lg">Bagaimana cara kerja mode latihan?</span>
                        <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': open === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open === 3" x-collapse class="px-6 pb-6">
                        <p class="text-gray-600">Mode latihan memungkinkan Anda mengerjakan soal tanpa batasan waktu. Cocok untuk memahami konsep dan cara penyelesaian soal dengan lebih mendalam sebelum mencoba simulasi ujian.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <button @click="open = open === 4 ? null : 4" class="w-full flex justify-between items-center p-6 text-left bg-white hover:bg-gray-50 transition">
                        <span class="font-semibold text-lg">Apakah ada pembahasan untuk setiap soal?</span>
                        <svg class="w-5 h-5 text-gray-500 transition-transform" :class="{ 'rotate-180': open === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open === 4" x-collapse class="px-6 pb-6">
                        <p class="text-gray-600">Ya, setiap soal dilengkapi dengan pembahasan lengkap yang menjelaskan konsep dan langkah-langkah penyelesaian. Pembahasan dapat diakses setelah Anda menyelesaikan ujian atau dalam mode latihan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-br from-primary to-purple-700">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Meraih Medali Olimpiade?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Bergabung dengan ribuan siswa lainnya dan mulai perjalananmu menuju prestasi!
            </p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-primary px-8 py-4 rounded-full font-semibold text-lg hover:shadow-xl hover:scale-105 transition-all">
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
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">Kelas Olimpiade</span>
                    </div>
                    <p class="mb-6 leading-relaxed">
                        Platform persiapan olimpiade sains terbaik di Indonesia. Raih medali impianmu bersama kami!
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4">Menu</h3>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#fitur" class="hover:text-white transition">Fitur</a></li>
                        <li><a href="#paket" class="hover:text-white transition">Paket Soal</a></li>
                        <li><a href="#testimoni" class="hover:text-white transition">Testimoni</a></li>
                        <li><a href="#faq" class="hover:text-white transition">FAQ</a></li>
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

    <!-- Alpine.js for FAQ -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Mobile Menu Toggle -->
    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
