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
                <div class="flex items-center justify-center flex-1 py-1">
                    <img src="{{ asset('images/logo-kimia-farma-kecil.jpg') }}" alt="KF Logo" class="h-12 w-auto object-contain mix-blend-screen">
                </div>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="px-5 pt-2">
                <span class="block text-center text-[10px] bg-kf-navy py-1 rounded text-cyan-300 font-semibold border border-kf-cyan/30">Payroll & HRIS</span>
            </div>
        </div>

        <!-- Navigasi Utama Sidebar -->
<nav class="p-4 space-y-1 text-xs font-medium overflow-y-auto flex-1">
    <a href="{{ url('/') }}" class="flex items-center gap-3 px-3 py-2.5 text-slate-400 hover:text-white hover:bg-slate-800 rounded-xl transition text-xs font-medium border border-slate-700/50 mb-3">
        <i class="fa-solid fa-globe text-kf-cyan"></i>
        <span>{{ __('Lihat Website Utama') }}</span>
        <i class="fa-solid fa-arrow-right-from-bracket text-[10px] ml-auto text-slate-500"></i>
    </a>

    <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider">{{ __('Utama') }}</div>
    
    <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('dashboard*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-chart-pie {{ Request::is('dashboard*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Dashboard Analytics') }}</span>
    </a>

    <a href="{{ url('/karyawan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('karyawan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-users {{ Request::is('karyawan*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Data Karyawan') }}</span>
    </a>

    <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider pt-4">{{ __('Penggajian') }}</div>

    <a href="{{ url('/komponen-gaji') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('komponen-gaji*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-sliders {{ Request::is('komponen-gaji*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Komponen Gaji') }}</span>
    </a>

    <a href="{{ url('/payroll') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('payroll*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-calculator {{ Request::is('payroll*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Proses Payroll Hub') }}</span>
    </a>

    <a href="{{ url('/slip-gaji') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('slip-gaji*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-file-invoice-dollar {{ Request::is('slip-gaji*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Slip Gaji Digital') }}</span>
    </a>

    <div class="px-3 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-wider pt-4">{{ __('Laporan & Sistem') }}</div>

    <a href="{{ url('/laporan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('laporan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-chart-line {{ Request::is('laporan*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Laporan & Analitik') }}</span>
    </a>

    <a href="{{ url('/pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition {{ Request::is('pengaturan*') ? 'bg-kf-navy text-white font-semibold shadow-sm' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
        <i class="fa-solid fa-gear {{ Request::is('pengaturan*') ? 'text-kf-cyan' : '' }}"></i>
        <span>{{ __('Pengaturan Sistem') }}</span>
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

    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-slate-900/50 z-20 lg:hidden" style="display: none;"></div>

    <!-- ================= MAIN CONTENT CONTAINER ================= -->
    <div class="flex-1 flex flex-col h-screen overflow-hidden w-full">
        
        <!-- TOP HEADER BAR -->
        <header class="h-16 bg-white border-b border-slate-200 px-4 md:px-6 flex items-center justify-between shrink-0 z-10">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 text-slate-600 hover:bg-slate-100 rounded-xl">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <div class="relative w-40 sm:w-64 md:w-80">
                    <input type="text" placeholder="Cari NIP, Nama..." class="w-full pl-9 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs focus:outline-none focus:border-kf-navy transition">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
                </div>
            </div>

            <div class="flex items-center gap-2 md:gap-4">
                <div class="hidden xl:flex items-center gap-2 bg-slate-100 border border-slate-200 px-3 py-1.5 rounded-xl text-xs font-semibold text-slate-700">
                    <i class="fa-regular fa-calendar-check text-kf-navy"></i>
                    <span data-lang-id="Periode:" data-lang-en="Period:">Periode:</span>
                    <select class="bg-transparent font-bold text-kf-navy focus:outline-none cursor-pointer">
                        <option value="2026-08" selected>Agustus 2026</option>
                        <option value="2026-07">Juli 2026</option>
                        <option value="2026-06">Juni 2026</option>
                    </select>
                </div>

                <div class="hidden md:flex items-center gap-2 bg-blue-50 border border-blue-100 px-3 py-1.5 rounded-xl text-xs font-semibold text-kf-navy">
                    <i class="fa-solid fa-building-flag"></i>
                    <select class="bg-transparent font-bold focus:outline-none cursor-pointer">
                        <option value="all" data-lang-id="Semua Unit Bisnis" data-lang-en="All Business Units">Semua Unit Bisnis</option>
                        <option value="holding">Holding Pusat</option>
                        <option value="apotek">Kimia Farma Apotek</option>
                        <option value="plant">KF Plant Bandung</option>
                        <option value="kftd">KFTD Distribution</option>
                    </select>
                </div>

                <button class="relative p-2 rounded-xl text-slate-500 hover:bg-slate-100 transition">
                    <i class="fa-regular fa-bell text-base"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
                </button>

                <!-- SWITCH BAHASA IND | ENG NATIVE LARAVEL -->
<div class="flex items-center text-xs font-semibold text-slate-600 gap-1 px-2 py-1 bg-slate-50 border border-slate-200 rounded-xl">
    <a href="{{ route('lang.switch', 'id') }}" class="hover:text-kf-cyan transition {{ app()->getLocale() == 'id' ? 'text-kf-navy font-bold' : 'text-slate-400' }}">IND</a>
    <span class="text-slate-300">|</span>
    <a href="{{ route('lang.switch', 'en') }}" class="hover:text-kf-cyan transition {{ app()->getLocale() == 'en' ? 'text-kf-navy font-bold' : 'text-slate-400' }}">ENG</a>
</div>

<div class="flex items-center gap-3 pl-2 md:pl-3 border-l border-slate-200">
    <div class="w-9 h-9 rounded-full bg-kf-navy text-white flex items-center justify-center font-bold text-xs shadow-md">AD</div>
    <div class="hidden md:block text-left">
        <h4 class="text-xs font-bold text-slate-800 leading-none">Admin HRIS</h4>
        <span class="text-[10px] text-slate-400">Payroll Specialist</span>
    </div>
</div>
            </div>
        </header>

<!-- MAIN CONTENT -->
        <main class="flex-1 overflow-y-auto p-4 md:p-6 space-y-6">
            @yield('content')
        </main>
    </div>
<script>
// Kamus terjemahan untuk area konten putih & header
const dictionary = {
    // Header & Filter
    "Periode:": "Period:",
    "Semua Unit Bisnis": "All Business Units",
    "Ekspor Laporan": "Export Report",

    // Title & Subtitle Dashboard
    "Executive Payroll Dashboard": "Executive Payroll Dashboard",
    "Ringkasan finansial dan status penggajian karyawan Kimia Farma Group.": "Financial summary and payroll status of Kimia Farma Group employees.",

    // Card Stats
    "BEBAN PAYROLL BULAN INI": "THIS MONTH'S PAYROLL EXPENSE",
    "STATUS PEMBAYARAN GAJI": "SALARY PAYMENT STATUS",
    "ESTIMASI PPH 21 (TER)": "ESTIMATED INCOME TAX 21",
    "IURAN BPJS (KES & TK)": "BPJS CONTRIBUTION (HEALTH & WORK)",
    "vs bulan lalu": "vs last month",
    "Karyawan": "Employees",
    "Pending": "Pending",
    "Selesai": "Completed",
    "Potongan Pajak Resmi": "Official Tax Deduction",
    "Beban Perusahaan + Karyawan": "Company + Employee Expense",

    // Chart Titles
    "Tren Pengeluaran Payroll (12 Bulan)": "Payroll Expense Trend (12 Months)",
    "Evolusi total beban gaji bersih Kimia Farma Group.": "Evolution of total net salary expenses of Kimia Farma Group.",
    "Breakdown Komponen": "Component Breakdown",
    "Proporsi alokasi komponen gaji bulan ini.": "Allocation proportion of this month's salary components.",
    "Gaji Pokok": "Basic Salary",
    "Tunjangan": "Allowances"
};

function switchLanguage(lang) {
    localStorage.setItem('app_lang', lang);

    // 1. Terjemahkan elemen bermerek data-lang-id (Sidebar)
    document.querySelectorAll('[data-lang-id]').forEach(el => {
        const text = lang === 'en' ? el.getAttribute('data-lang-en') : el.getAttribute('data-lang-id');
        if (text) {
            if (el.tagName === 'OPTION') { el.text = text; }
            else { el.innerText = text; }
        }
    });

    // 2. Terjemahkan otomatis area konten putih berdasarkan kamus dictionary
    const walker = document.createTreeWalker(
        document.querySelector('main') || document.body,
        NodeFilter.SHOW_TEXT,
        null,
        false
    );

    let node;
    while (node = walker.nextNode()) {
        const trimmed = node.nodeValue.trim();
        if (lang === 'en') {
            if (dictionary[trimmed]) {
                node.nodeValue = node.nodeValue.replace(trimmed, dictionary[trimmed]);
            }
        } else {
            // Kembalikan ke Bahasa Indonesia jika dipindah ke ID
            for (const [idText, enText] of Object.entries(dictionary)) {
                if (trimmed === enText) {
                    node.nodeValue = node.nodeValue.replace(trimmed, idText);
                }
            }
        }
    }

    // 3. Update style tombol IND | ENG
    const btnId = document.getElementById('btn-id');
    const btnEn = document.getElementById('btn-en');
    if (btnId && btnEn) {
        if (lang === 'en') {
            btnEn.className = 'hover:text-kf-cyan transition text-kf-navy font-bold';
            btnId.className = 'hover:text-kf-cyan transition text-slate-400';
        } else {
            btnId.className = 'hover:text-kf-cyan transition text-kf-navy font-bold';
            btnEn.className = 'hover:text-kf-cyan transition text-slate-400';
        }
    }
}

// Jalankan otomatis saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    const savedLang = localStorage.getItem('app_lang') || 'id';
    switchLanguage(savedLang);
});
</script>

    @stack('scripts')
</body>
</html>