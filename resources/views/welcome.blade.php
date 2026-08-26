<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll & HRIS - Kimia Farma</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kf: {
                            navy: '#003B73',
                            blue: '#005BBB',
                            cyan: '#00A8CC',
                            dark: '#0A2540',
                            bg: '#F8FAFC'
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        html {
            scroll-behavior: smooth;
        }
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        html, body { 
            font-family: 'Inter', sans-serif; 
            background-color: #FFFFFF; 
            top: 0 !important; 
            position: static !important;
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        #google_translate_element,
        .goog-te-gadget,
        .goog-te-gadget-simple,
        .goog-te-banner-frame,
        .goog-te-balloon-frame,
        .skiptranslate,
        iframe.goog-te-banner-frame,
        iframe[id^=":"] {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            height: 0 !important;
            width: 0 !important;
            max-height: 0 !important;
            overflow: hidden !important;
            pointer-events: none !important;
            position: absolute !important;
            left: -9999px !important;
            top: -9999px !important;
        }

        #goog-gt-tt,
        .goog-gt-tt-tip,
        [class*="VIpgJd"] {
            display: none !important;
            visibility: hidden !important;
            pointer-events: none !important;
        }

        .goog-text-highlight {
            background-color: transparent !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased">

    <!-- Element Penyimpan API -->
    <div id="google_translate_element" style="display:none;"></div>

    <!-- Header Navbar Sticky Utama -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm">
        
        <!-- Garis Selaput Orange & Biru Kimia Farma -->
        <div class="w-full h-1.5 flex">
            <div class="w-1/2 bg-orange-500"></div>
            <div class="w-1/2 bg-kf-blue"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-2">
            
            <!-- Baris Atas: Search & Language Switcher -->
            <div class="flex justify-end items-center gap-4 text-xs mb-1">
                <div class="relative w-48 sm:w-64">
                    <input type="text" placeholder="Search" class="w-full pl-4 pr-9 py-1 rounded-full border border-slate-300 focus:outline-none focus:border-kf-blue text-xs transition">
                    <i class="fa-solid fa-magnifying-glass absolute right-3 top-2 text-slate-400"></i>
                </div>
                
                <div class="flex items-center text-xs font-semibold text-slate-600 gap-1 notranslate">
                    <button onclick="changeLanguage('id')" id="btn-id" class="hover:text-kf-blue transition text-kf-navy font-bold">IND</button>
                    <span class="text-slate-300">|</span>
                    <button onclick="changeLanguage('en')" id="btn-en" class="hover:text-kf-blue transition">ENG</button>
                </div>
            </div>

            <!-- Baris Utama: Logo, Menu Navigasi, & Tombol Aksi/Mobile -->
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('images/logo-kimia-farma.jpg') }}" alt="Logo Kimia Farma" class="h-16 sm:h-20 w-auto object-contain">
                    <span class="text-xs font-semibold px-2.5 py-1 bg-blue-50 text-kf-navy rounded-md border border-blue-100 hidden sm:inline-block notranslate">Payroll & HRIS</span>
                </div>

                <nav class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-semibold uppercase tracking-wide">
                <a href="{{ url('/') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Beranda</a>
                <a href="{{ url('/fitur') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Fitur</a>
                <a href="{{ url('/modul') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Modul</a>
                <a href="{{ url('/keunggulan') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Keunggulan</a>
                <a href="{{ url('/tentang') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Tentang</a>
                <a href="{{ url('/kontak') }}" class="nav-link hover:text-kf-blue transition text-slate-700">Kontak</a>
                </nav>

                <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                   <!-- Tombol Demo Sistem -->
                   <a href="{{ url('/dashboard') }}" class="hidden sm:inline-block px-4 py-2 text-xs sm:text-sm font-semibold text-kf-navy bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition">
                   Demo Sistem
                   </a>

                   <!-- Tombol Login Payroll -->
                   <a href="{{ url('/dashboard') }}" class="px-3 sm:px-4 py-2 text-xs sm:text-sm font-semibold text-white bg-kf-navy hover:bg-slate-800 rounded-lg shadow-sm transition flex items-center gap-1.5">
                   <i class="fa-solid fa-lock text-xs text-kf-cyan"></i> 
                   <span>Login Payroll</span>
                   </a>
                     
                   <!-- Tombol Garis Tiga (Mobile Menu Button) - Dipindah ke dalam flexbox yang benar -->
                   <button id="mobile-menu-btn" onclick="toggleMobileMenu()" class="md:hidden text-slate-700 hover:text-kf-blue focus:outline-none p-2 rounded-lg border border-slate-200">
                       <i class="fa-solid fa-bars text-lg"></i>
                   </button>
                </div>
            </div>

            <!-- DROPDOWN MENU TAMPILAN HP -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-slate-100 mt-3 pt-3 pb-2 space-y-2 text-sm font-semibold uppercase text-slate-700">
            <a href="{{ url('/') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg bg-blue-50 text-kf-navy font-bold">Beranda</a>
            <a href="{{ url('/fitur') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-slate-50 transition">Fitur</a>
            <a href="{{ url('/modul') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-slate-50 transition">Modul</a>
            <a href="{{ url('/keunggulan') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-slate-50 transition">Keunggulan</a>
            <a href="{{ url('/tentang') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-slate-50 transition">Tentang</a>
            <a href="{{ url('/kontak') }}" onclick="toggleMobileMenu()" class="block px-3 py-2 rounded-lg hover:bg-slate-50 transition">Kontak</a>
            </div>

        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-12 pb-20 overflow-hidden bg-white">
        
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute inset-0 opacity-10 bg-cover bg-center" style="background-image: url('{{ asset('images/background.jpg') }}');"></div>
            
            <svg class="hidden lg:block absolute right-0 top-0 h-full w-2/3 object-cover opacity-90" viewBox="0 0 800 600" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M250 0 C450 150, 350 400, 800 600 L800 0 Z" fill="url(#kf-gradient)" />
                <path d="M150 0 C380 220, 200 500, 800 550 L800 0 Z" fill="#00A8CC" fill-opacity="0.25" />
                <defs>
                    <linearGradient id="kf-gradient" x1="250" y1="0" x2="800" y2="600" gradientUnits="userSpaceOnUse">
                        <stop offset="0%" stop-color="#005BBB" />
                        <stop offset="100%" stop-color="#003B73" />
                    </linearGradient>
                </defs>
            </svg>

            <div class="lg:hidden absolute -top-10 -right-10 w-72 h-72 bg-blue-400/20 rounded-full blur-2xl"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-12 items-center">

            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 border border-blue-200 text-kf-navy text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-kf-blue animate-pulse"></span>
                    SOLUSI PAYROLL TERINTEGRASI
                </div>

                <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight">
                    Kelola Payroll Lebih <span class="text-kf-navy">Akurat</span>, <span class="text-kf-blue">Cepat</span> & Terpercaya
                </h1>

                <p class="text-slate-600 text-base leading-relaxed max-w-xl">
                    Sistem payroll terpadu untuk Kimia Farma Group yang mendukung pengelolaan data karyawan, perhitungan gaji, hingga pelaporan analitik dalam satu platform terintegrasi.
                </p>

                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="{{ url('/dashboard') }}" class="px-6 py-3.5 bg-kf-navy hover:bg-kf-blue text-white font-semibold rounded-xl shadow-md shadow-blue-900/10 transition flex items-center gap-2">
                        Jelajahi Fitur <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                    <a href="#demo" class="px-6 py-3.5 bg-white border border-slate-200 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 transition flex items-center gap-2">
                        <i class="fa-regular fa-circle-play text-kf-blue"></i> Tonton Video
                    </a>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-6 border-t border-slate-200">
                    <div>
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center mb-2"><i class="fa-solid fa-shield-halved"></i></div>
                        <h4 class="font-bold text-slate-800 text-xs">Aman & Terpercaya</h4>
                        <p class="text-[11px] text-slate-500">Data terenkripsi & backup berlapis</p>
                    </div>
                    <div>
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center mb-2"><i class="fa-solid fa-crosshair"></i></div>
                        <h4 class="font-bold text-slate-800 text-xs">Akurat & Presisi</h4>
                        <p class="text-[11px] text-slate-500">Perhitungan otomatis sesuai aturan</p>
                    </div>
                    <div>
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center mb-2"><i class="fa-solid fa-bolt"></i></div>
                        <h4 class="font-bold text-slate-800 text-xs">Efisien & Cepat</h4>
                        <p class="text-[11px] text-slate-500">Proses payroll massal hitungan menit</p>
                    </div>
                </div>
            </div>

            <!-- Preview Dashboard Frame -->
            <div class="lg:col-span-6 relative">
                <div class="relative mx-auto max-w-lg lg:max-w-none">
                    <div class="bg-kf-dark p-2.5 rounded-2xl shadow-2xl border border-slate-800">
                        <div class="bg-white rounded-xl overflow-hidden p-4 space-y-4">
                            <div class="grid grid-cols-3 gap-2 text-xs">
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                    <span class="text-[10px] text-slate-400 block">Total Pengeluaran Gaji</span>
                                    <span class="font-bold text-kf-navy text-sm">Rp 28,745,890,000</span>
                                </div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                    <span class="text-[10px] text-slate-400 block">Karyawan Terbayar</span>
                                    <span class="font-bold text-kf-navy text-sm">3,248 / 3,421</span>
                                </div>
                                <div class="bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                    <span class="text-[10px] text-slate-400 block">Total Potongan</span>
                                    <span class="font-bold text-kf-navy text-sm">Rp 6,128,450,000</span>
                                </div>
                            </div>
                            <div class="h-40 bg-slate-50 rounded-lg border border-slate-100 p-3 flex items-end justify-between gap-2">
                                <div class="w-1/12 bg-blue-200 h-1/3 rounded-t"></div>
                                <div class="w-1/12 bg-blue-300 h-1/2 rounded-t"></div>
                                <div class="w-1/12 bg-kf-blue h-2/3 rounded-t"></div>
                                <div class="w-1/12 bg-kf-navy h-4/5 rounded-t"></div>
                                <div class="w-1/12 bg-kf-dark h-full rounded-t"></div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-48 bg-kf-dark p-2 rounded-2xl shadow-2xl border border-slate-800 hidden sm:block">
                        <div class="bg-white rounded-xl p-3 text-[10px] space-y-2">
                            <div class="flex justify-between font-bold border-b pb-1">
                                <span>Slip Gaji</span>
                                <span class="text-kf-blue">Agustus 2026</span>
                            </div>
                            <div class="space-y-1 text-slate-600">
                                <div class="flex justify-between"><span>Gaji Pokok</span><span>Rp 8.500.000</span></div>
                                <div class="flex justify-between"><span>Tunjangan</span><span>Rp 3.200.000</span></div>
                                <div class="flex justify-between font-bold text-slate-800 pt-1 border-t"><span>Total THP</span><span class="text-kf-navy">Rp 11.700.000</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Trusted By Units -->
    <section class="py-10 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-6">Dipercaya oleh unit dan anak perusahaan Kimia Farma Group</p>
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12 opacity-80">
                <span class="font-bold text-kf-navy text-sm">kimia farma <span class="font-normal text-slate-500">Apotek</span></span>
                <span class="font-bold text-kf-navy text-sm">kimia farma <span class="font-normal text-slate-500">Trading & Distribution</span></span>
                <span class="font-bold text-kf-navy text-sm">kimia farma <span class="font-normal text-slate-500">Plant</span></span>
                <span class="font-bold text-kf-navy text-sm">kimia farma <span class="font-normal text-slate-500">Riset & Pengembangan</span></span>
                <span class="font-bold text-kf-navy text-sm">kimia farma <span class="font-normal text-slate-500">Diagnostika</span></span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-kf-blue uppercase tracking-widest">Fitur Unggulan</h2>
                <p class="text-3xl font-extrabold text-slate-900 sm:text-4xl">
                    Solusi Lengkap Pengelolaan SDM & Gaji
                </p>
                <p class="text-slate-600 text-sm sm:text-base">
                    Dirancang khusus untuk memenuhi standar operasional Kimia Farma Group dengan integrasi otomatis dan keamanan tinggi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1: Payroll -->
                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-200/80 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="w-14 h-14 bg-kf-navy text-white rounded-xl flex items-center justify-center text-2xl mb-6 shadow-md shadow-blue-900/20 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-calculator"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Kalkulasi Gaji Otomatis</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Perhitungan otomatis gaji pokok, tunjangan, insentif lembur, hingga potongan BPJS Kesehatan, BPJS Ketenagakerjaan, dan PPh 21 secara akurat.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-600 font-medium">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-kf-blue"></i> Hitung PPh 21 TER Terbaru</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-kf-blue"></i> Integrasi Potongan BPJS</li>
                    </ul>
                </div>

                <!-- Fitur 2: Presensi -->
                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-200/80 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="w-14 h-14 bg-orange-500 text-white rounded-xl flex items-center justify-center text-2xl mb-6 shadow-md shadow-orange-500/20 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-clock font-bold"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Presensi & Shift Apotek</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Pengaturan jadwal kerja shift fleksibel untuk staf apotek & unit kerja, terintegrasi dengan mesin absensi fingerprint maupun mobile GPS.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-600 font-medium">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-orange-500"></i> Roster Shift Otomatis</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-orange-500"></i> Geofencing Absensi Mobile</li>
                    </ul>
                </div>

                <!-- Fitur 3: ESS -->
                <div class="p-8 bg-slate-50 rounded-2xl border border-slate-200/80 hover:shadow-xl hover:-translate-y-1 transition duration-300 group">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-xl flex items-center justify-center text-2xl mb-6 shadow-md shadow-emerald-600/20 group-hover:scale-110 transition duration-300">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Portal Mandiri (ESS)</h3>
                    <p class="text-slate-600 text-sm leading-relaxed mb-4">
                        Akses mandiri karyawan untuk mengunduh slip gaji digital, pengajuan cuti, klaim medis, dan revisi absensi dari smartphone.
                    </p>
                    <ul class="space-y-2 text-xs text-slate-600 font-medium">
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-600"></i> Slip Gaji Enkripsi PDF</li>
                        <li class="flex items-center gap-2"><i class="fa-solid fa-circle-check text-emerald-600"></i> Pengajuan Cuti Online</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Workflow Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold text-kf-blue uppercase tracking-wider">CARA KERJA</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">Payroll Mudah dalam 4 Langkah</h2>
            </div>

            <div class="grid md:grid-cols-4 gap-8 relative">
                <div class="text-center space-y-4">
                    <div class="w-14 h-14 bg-kf-navy text-white font-bold rounded-2xl flex items-center justify-center mx-auto text-xl shadow-lg shadow-blue-900/20">1</div>
                    <h4 class="font-bold text-slate-800">Siapkan Data</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Input atau impor data karyawan dan komponen gaji.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="w-14 h-14 bg-kf-navy text-white font-bold rounded-2xl flex items-center justify-center mx-auto text-xl shadow-lg shadow-blue-900/20">2</div>
                    <h4 class="font-bold text-slate-800">Proses Perhitungan</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Sistem menghitung gaji, tunjangan, potongan, dan pajak secara otomatis.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="w-14 h-14 bg-kf-navy text-white font-bold rounded-2xl flex items-center justify-center mx-auto text-xl shadow-lg shadow-blue-900/20">3</div>
                    <h4 class="font-bold text-slate-800">Review & Approval</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Review hasil payroll, lakukan koreksi jika diperlukan, lalu approve.</p>
                </div>
                <div class="text-center space-y-4">
                    <div class="w-14 h-14 bg-kf-navy text-white font-bold rounded-2xl flex items-center justify-center mx-auto text-xl shadow-lg shadow-blue-900/20">4</div>
                    <h4 class="font-bold text-slate-800">Kirim & Bayar</h4>
                    <p class="text-xs text-slate-500 leading-relaxed">Kirim slip gaji ke karyawan dan ekspor file transfer bank.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner CTA -->
    <section class="py-8 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl min-h-[220px] flex items-center bg-kf-dark">
                <div class="absolute inset-y-0 left-0 w-full lg:w-1/2 bg-cover bg-left z-0" style="background-image: url('{{ asset('images/logo-bangunan.jpg') }}');">
                    <div class="absolute inset-0 bg-gradient-to-b lg:bg-gradient-to-r from-kf-dark/30 via-kf-dark/80 to-kf-dark"></div>
                </div>

                <div class="relative z-10 w-full p-6 sm:p-8 md:p-12 grid grid-cols-1 lg:grid-cols-12 items-center gap-6 md:gap-8 text-white">
                    <div class="hidden lg:block lg:col-span-4"></div>

                    <div class="lg:col-span-8 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="space-y-3 max-w-lg text-left">
                            <h3 class="text-xl sm:text-2xl md:text-3xl font-extrabold leading-snug">
                                Ready to Manage Your Company's Payroll More Efficiently and Accurately?
                            </h3>
                            <p class="text-blue-100 text-xs sm:text-sm leading-relaxed">
                                Join Kimia Farma and experience the convenience of integrated and reliable payroll management.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row gap-3 w-full md:w-auto shrink-0">
                            <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white text-kf-dark font-bold rounded-xl text-center text-xs md:text-sm hover:bg-slate-100 transition shadow-md flex items-center justify-center gap-2">
                                Try the System Demo <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                            <a href="#kontak" class="w-full sm:w-auto px-6 py-3.5 border border-white/40 bg-white/10 backdrop-blur-md text-white font-semibold rounded-xl text-center text-xs md:text-sm hover:bg-white/20 transition flex items-center justify-center gap-2">
                                Contact us <i class="fa-solid fa-phone text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
<footer id="kontak" class="bg-kf-dark text-slate-300 py-12 text-sm">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-5 gap-8">
        <div class="col-span-2 space-y-4">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo-kimia-farma-kecil.jpg') }}" alt="Logo Kimia Farma" class="h-12 w-auto object-contain rounded">
            </div>
            
            <p class="text-xs text-slate-300 leading-relaxed max-w-sm">
                Sistem penggajian terintegrasi untuk mendukung pengelolaan SDM dan payroll di seluruh unit bisnis Kimia Farma Group.
            </p>
            <div class="flex items-center gap-3 text-white pt-1">
                <a href="#" class="w-8 h-8 rounded-full border border-slate-500/50 flex items-center justify-center text-xs hover:border-white transition"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#" class="w-8 h-8 rounded-full border border-slate-500/50 flex items-center justify-center text-xs hover:border-white transition"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="w-8 h-8 rounded-full border border-slate-500/50 flex items-center justify-center text-xs hover:border-white transition"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-3 text-xs uppercase tracking-wider">PRODUK</h5>
            <ul class="space-y-2 text-xs">
                <li><a href="{{ url('/fitur') }}" class="hover:text-white transition">Fitur</a></li>
                <li><a href="{{ url('/modul') }}" class="hover:text-white transition">Modul</a></li>
                <li><a href="{{ url('/keunggulan') }}" class="hover:text-white transition">Keunggulan</a></li>
                <li><a href="#" class="hover:text-white transition">Keamanan</a></li>
                <li><a href="#" class="hover:text-white transition">Integrasi</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-3 text-xs uppercase tracking-wider">PERUSAHAAN</h5>
            <ul class="space-y-2 text-xs">
                <li><a href="{{ url('/tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-white transition">Karir</a></li>
                <li><a href="#" class="hover:text-white transition">Berita</a></li>
                <li><a href="{{ url('/kontak') }}" class="hover:text-white transition">Kontak</a></li>
            </ul>
        </div>

        <div>
            <h5 class="text-white font-semibold mb-3 text-xs uppercase tracking-wider">HUBUNGI KAMI</h5>
            <ul class="space-y-2 text-xs">
                <li class="flex items-start gap-2"><i class="fa-solid fa-location-dot mt-0.5"></i> Jl. Veteran No. 9 Jakarta Pusat 10110</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-envelope"></i> payroll@kimiafarma.co.id</li>
                <li class="flex items-center gap-2"><i class="fa-solid fa-phone"></i> (021) 384 7709</li>
            </ul>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 border-t border-slate-800/80 mt-10 pt-6 text-center text-xs text-slate-400">
        © 2026 PT Kimia Farma Tbk. Hak cipta dilindungi undang-undang.
    </div>
</footer>

<!-- Scripts JS -->
<script type="text/javascript">
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'id',
            includedLanguages: 'id,en',
            autoDisplay: false
        }, 'google_translate_element');
    }

    function changeLanguage(lang) {
        const select = document.querySelector('.goog-te-combo');
        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event('change'));
        }

        const btnId = document.getElementById('btn-id');
        const btnEn = document.getElementById('btn-en');

        if (lang === 'id') {
            btnId.className = "hover:text-kf-blue transition text-kf-navy font-bold";
            btnEn.className = "hover:text-kf-blue transition font-normal";
        } else {
            btnEn.className = "hover:text-kf-blue transition text-kf-navy font-bold";
            btnId.className = "hover:text-kf-blue transition font-normal";
        }
    }
</script>

<!-- Script Google Translate -->
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>