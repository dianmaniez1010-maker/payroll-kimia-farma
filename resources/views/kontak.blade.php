<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak & Bantuan - Payroll & HRIS Kimia Farma</title>
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

    <!-- Konten Halaman Kontak -->
    <main class="max-w-5xl mx-auto py-12 px-6">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-slate-900">Pusat Bantuan & Tim IT HRIS</h2>
            <p class="text-slate-500 mt-2">Hubungi tim Helpdesk Payroll untuk kendala akses akun atau pencetakan slip gaji.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 space-y-4">
                <h3 class="font-bold text-lg text-slate-900 mb-2">Kantor Pusat PT Kimia Farma Tbk</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Jl. Veteran No. 9, Jakarta Pusat<br>
                    DKI Jakarta 10110, Indonesia
                </p>
                <div class="text-xs text-slate-600 space-y-1 pt-2 border-t border-slate-100">
                    <p><strong>Email IT HRIS:</strong> hris-support@kimiafarma.co.id</p>
                    <p><strong>Internal Call:</strong> Ext. 404 / 405 (Jam Kerja)</p>
                </div>
            </div>

            <form class="bg-white p-6 rounded-2xl border border-slate-200 space-y-3">
                <h3 class="font-bold text-sm text-slate-900">Kirim Tiket Kendala</h3>
                <input type="text" placeholder="NIP Karyawan" class="w-full text-xs p-2.5 rounded-lg border border-slate-300 focus:outline-none focus:border-kf-blue">
                <input type="email" placeholder="Email Resmi KF" class="w-full text-xs p-2.5 rounded-lg border border-slate-300 focus:outline-none focus:border-kf-blue">
                <textarea placeholder="Deskripsi Kendala Payroll..." rows="3" class="w-full text-xs p-2.5 rounded-lg border border-slate-300 focus:outline-none focus:border-kf-blue"></textarea>
                <button type="button" class="w-full bg-kf-navy hover:bg-kf-blue text-white text-xs py-2.5 rounded-lg font-bold transition">Kirim Kendala</button>
            </form>
        </div>

        <!-- Google Maps Lokasi Kantor Pusat -->
        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="font-bold text-sm text-slate-900 mb-3 px-2"><i class="fa-solid fa-map-location-dot text-kf-blue mr-2"></i> Lokasi Kantor Pusat PT Kimia Farma Tbk</h3>
            <div class="w-full h-80 rounded-xl overflow-hidden border border-slate-100">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666324083437!2d106.82479507499026!3d-6.175392393812739!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d14210d79d%3A0x67db23a7fb0317e0!2sJl.%20Veteran%20No.9%2C%20RT.2%2FRW.3%2C%20Gambir%2C%20Kec.%20Gambir%2C%20Kota%20Jakarta%20Pusat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2010110!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
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