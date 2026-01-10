<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Alba AutoCare - Sistem Manajemen Perawatan Kendaraan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <style>
            body { font-family: 'Inter', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .fade-in-up {
                animation: fadeInUp 0.8s ease-out;
            }
            .delay-100 {
                animation-delay: 0.1s;
                opacity: 0;
                animation-fill-mode: forwards;
            }
            .delay-200 {
                animation-delay: 0.2s;
                opacity: 0;
                animation-fill-mode: forwards;
            }
            .delay-300 {
                animation-delay: 0.3s;
                opacity: 0;
                animation-fill-mode: forwards;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-neutral-950 via-neutral-900 to-neutral-950 text-white">
        
        <!-- Navigation -->
        <nav class="bg-black/80 backdrop-blur-xl border-b border-neutral-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Audi Rings Logo -->
                        <div class="flex items-center gap-1.5 mr-3">
                            <div class="w-5 h-5 rounded-full border-2 border-red-600"></div>
                            <div class="w-5 h-5 rounded-full border-2 border-neutral-400 -ml-2"></div>
                            <div class="w-5 h-5 rounded-full border-2 border-neutral-400 -ml-2"></div>
                            <div class="w-5 h-5 rounded-full border-2 border-neutral-400 -ml-2"></div>
                        </div>
                        <span class="text-xl font-bold text-white">Alba AutoCare</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                <div class="text-center">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 fade-in-up">
                        Alba <span class="text-red-600">AutoCare</span>
                    </h1>
                    <p class="text-xl text-neutral-400 mb-12 max-w-2xl mx-auto fade-in-up delay-100">
                        Sistem Manajemen Perawatan Kendaraan yang Modern dan Profesional
                    </p>
                    
                    <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-4 bg-red-600 hover:bg-red-700 text-white rounded-lg text-lg font-semibold transition-all duration-200 transform hover:scale-105 fade-in-up delay-200">
                        Buka Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1 -->
                <div class="glass p-6 rounded-xl fade-in-up delay-100">
                    <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Manajemen Kendaraan</h3>
                    <p class="text-neutral-400 text-sm">Kelola data kendaraan dengan mudah dan terorganisir</p>
                </div>

                <!-- Feature 2 -->
                <div class="glass p-6 rounded-xl fade-in-up delay-200">
                    <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Jadwal Perawatan</h3>
                    <p class="text-neutral-400 text-sm">Atur jadwal perawatan kendaraan secara sistematis</p>
                </div>

                <!-- Feature 3 -->
                <div class="glass p-6 rounded-xl fade-in-up delay-300">
                    <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Spare Parts</h3>
                    <p class="text-neutral-400 text-sm">Manajemen suku cadang dan inventori yang efisien</p>
                </div>

                <!-- Feature 4 -->
                <div class="glass p-6 rounded-xl fade-in-up delay-300">
                    <div class="w-12 h-12 bg-red-600/20 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2 text-white">Laporan & Statistik</h3>
                    <p class="text-neutral-400 text-sm">Dashboard dengan visualisasi data yang lengkap</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-neutral-950/80 backdrop-blur-xl border-t border-neutral-800 mt-20">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-neutral-500">
                        &copy; {{ date('Y') }} Alba AutoCare. All rights reserved.
                    </p>
                    <div class="flex items-center gap-2">
                        <p class="text-sm text-neutral-600">
                            Powered by
                        </p>
                        <div class="flex items-center gap-1">
                            <div class="w-3 h-3 rounded-full border border-red-600"></div>
                            <div class="w-3 h-3 rounded-full border border-neutral-500 -ml-1"></div>
                            <div class="w-3 h-3 rounded-full border border-neutral-500 -ml-1"></div>
                            <div class="w-3 h-3 rounded-full border border-neutral-500 -ml-1"></div>
                        </div>
                        <span class="text-red-600 font-semibold text-sm">Audi</span>
                        <span class="text-neutral-600 text-sm">Technology</span>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
