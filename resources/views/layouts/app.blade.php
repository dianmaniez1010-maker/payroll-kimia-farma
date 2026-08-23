<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kimia Farma - Payroll & HRIS')</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        kf: {
                            navy: '#003B73',
                            navyDark: '#0B436D',
                            cyan: '#00A8CC',
                            blueAccent: '#0080FF',
                            bg: '#F8FAFC',
                            success: '#10B981',
                            warning: '#F59E0B',
                            danger: '#EF4444'
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
    </style>
    @stack('styles')
</head>
<body class="text-slate-800 antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- ================= 1. SIDEBAR NAVIGATION ================= -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 lg:static lg:translate-x-0 w-64 bg-slate-900 text-white flex flex-col justify-between shrink-0 shadow-xl z-30 transition-transform duration-300 ease-in-out">
    <div>
        <!-- Header Sidebar -->
        <div class="p-4 border-b border-slate-800 flex items-center justify-between gap-3">
            <!-- Logo Tanpa Kotak & Ukuran Lebih Besar -->
            <div class="flex items-center justify-center flex-1 py-1">
                <img src="{{ asset('images/logo-kimia-farma-kecil.jpg') }}" alt="KF Logo" class="h-12 w-auto object-contain mix-blend-screen">
            </div>
            <!-- Tombol close khusus HP -->
            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <div class="px-5 pt-2">
            <span class="block text-center text-[10px] bg-kf-navy py-1 rounded text-cyan-300 font-semibold border border-kf-cyan/30">Payroll & HRIS</span>
        </div>
    </div>

        <!-- Navigasi Utama -->
        <nav class="p-4 space-y-1 text-xs font-medium overflow-y-auto flex-1">
            
            <!-- Tombol Kembali ke Website Publik -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition text-xs font-medium border border-slate-700/50 mb-3">
                <i class="fa-solid fa-globe text-kf-cyan"></i>
                <span>Lihat Website Utama</span>
                <i class="fa-solid fa-arrow-right-from-bracket text-[10px] ml-auto text-slate-500"></i>
            </a>

            <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider">Utama</div>
            
            <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('dashboard*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-chart-pie {{ Request::is('dashboard*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Dashboard Analytics</span>
            </a>

            <a href="{{ url('/karyawan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('karyawan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-users {{ Request::is('karyawan*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Data Karyawan</span>
            </a>

            <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider pt-4">Penggajian</div>

            <a href="{{ url('/komponen-gaji') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('komponen-gaji*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-sliders {{ Request::is('komponen-gaji*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Komponen Gaji</span>
            </a>

            <a href="{{ url('/payroll') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('payroll*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-calculator {{ Request::is('payroll*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Proses Payroll Hub</span>
            </a>

            <a href="{{ url('/slip-gaji') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('slip-gaji*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-file-invoice-dollar {{ Request::is('slip-gaji*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Slip Gaji Digital</span>
            </a>

            <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider pt-4">Laporan & Sistem</div>

            <a href="{{ url('/laporan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('laporan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-chart-line {{ Request::is('laporan*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Laporan & Analitik</span>
            </a>

            <a href="{{ url('/pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('pengaturan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <i class="fa-solid fa-gear {{ Request::is('pengaturan*') ? 'text-kf-cyan' : '' }}"></i>
                <span>Pengaturan Sistem</span>
            </a>
        </nav>

    <!-- Footer Sidebar -->
    <div class="p-4 border-t border-slate-800 text-[11px] text-slate-400">
        <div class="flex items-center justify-between mb-1">
            <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Server Online</span>
            <span class="text-slate-500">v2.4.0</span>
        </div>
        <p class="text-[10px] text-slate-500">PT Kimia Farma Tbk © 2026</p>
    </div>
</aside>

    <!-- Overlay untuk mobile saat sidebar terbuka -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/50 z-20 lg:hidden" style="display: none;"></div>

    <!-- ================= MAIN CONTENT CONTAINER ================= -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden w-full">
        
        <!-- TOP HEADER BAR -->
        <header class="h-16 bg-white border-b border-slate-200 px-4 md:px-6 flex items-center justify-between shrink-0 z-10">
            <!-- Tombol Hamburger untuk Mobile & Global Search -->
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-xl">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <!-- Global Search -->
                <div class="relative w-40 sm:w-64 md:w-80">
                    <input type="text" placeholder="Cari NIP, Nama..." class="w-full pl-9 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs focus:outline-none focus:border-kf-navy transition">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
                </div>
            </div>

            <!-- Right Top Bar Actions -->
            <div class="flex items-center gap-2 md:gap-4">
                <!-- Pemilih Periode Gaji Aktif (Hidden di HP kecil agar tidak penuh) -->
                <div class="hidden xl:flex items-center gap-2 bg-slate-100 border border-slate-200 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-700">
                    <i class="fa-regular fa-calendar-check text-kf-navy"></i>
                    <span>Periode:</span>
                    <select class="bg-transparent font-bold text-kf-navy focus:outline-none cursor-pointer">
                        <option value="2026-08" selected>Agustus 2026</option>
                        <option value="2026-07">Juli 2026</option>
                        <option value="2026-06">Juni 2026</option>
                    </select>
                </div>

                <!-- Switch Unit / Cabang (Hidden di mobile kecil) -->
                <div class="hidden md:flex items-center gap-2 bg-blue-50 border border-blue-100 px-3 py-1.5 rounded-xl text-xs font-semibold text-kf-navy">
                    <i class="fa-solid fa-building-flag"></i>
                    <select class="bg-transparent font-bold focus:outline-none cursor-pointer">
                        <option value="all">Semua Unit Bisnis</option>
                        <option value="holding">Holding Pusat</option>
                        <option value="apotek">Kimia Farma Apotek</option>
                        <option value="plant">KF Plant Bandung</option>
                        <option value="kftd">KFTD Distribution</option>
                    </select>
                </div>

                <!-- Notifikasi System -->
                <button class="relative p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition">
                    <i class="fa-regular fa-bell text-base"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
                </button>

                <!-- Profile Admin Dropdown -->
                <div class="flex items-center gap-3 pl-2 md:pl-3 border-l border-slate-200">
                    <div class="w-9 h-9 rounded-full bg-kf-navy text-white flex items-center justify-center font-bold text-xs shadow-md">AD</div>
                    <div class="hidden md:block text-left">
                        <h4 class="text-xs font-bold text-slate-800 leading-none">Admin HRIS</h4>
                        <span class="text-[10px] text-slate-400">Payroll Specialist</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- DASHBOARD BODY CONTENT (DINAMIS) -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 space-y-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>