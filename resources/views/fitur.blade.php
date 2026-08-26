<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Utama - Payroll & HRIS Kimia Farma</title>
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
                     
                   <!-- Tombol Garis Tiga (Mobile Menu Button) -->
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

    <!-- Konten Halaman Fitur -->
    <main class="max-w-6xl mx-auto py-12 px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900">Fitur Utama Sistem Payroll & HRIS</h2>
            <p class="text-slate-500 mt-2">Didesain khusus untuk efisiensi operasional penggajian PT Kimia Farma Tbk.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-kf-navy mb-4 font-bold">01</div>
                <h3 class="font-bold text-lg mb-2 text-slate-900">Kalkulasi Gaji Otomatis</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Perhitungan otomatis gaji pokok, tunjangan jabatan, insentif lembur, serta potongan wajib tanpa risiko human error.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center text-kf-cyan mb-4 font-bold">02</div>
                <h3 class="font-bold text-lg mb-2 text-slate-900">Integrasi BPJS & PPh 21 TER</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Sesuai dengan tarif efektif rata-rata (TER) pajak PPh 21 terbaru dan regulasi potongan BPJS Kesehatan & Ketenagakerjaan.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600 mb-4 font-bold">03</div>
                <h3 class="font-bold text-lg mb-2 text-slate-900">E-Slip Gaji Terenkripsi</h3>
                <p class="text-xs text-slate-600 leading-relaxed">Penerbitan slip gaji digital berformat PDF terenkripsi yang dapat diakses karyawan secara mandiri dan aman.</p>
            </div>
        </div>
    </main>

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