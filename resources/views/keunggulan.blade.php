<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kimia Farma Payroll Dashboard</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://unpkg.com/lucide@latest"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            kf: {
              navy: '#003B73',
              blue: '#005BBB',
              cyan: '#00A8CC',
              light: '#F5F9FD',
              green: '#10B981',
              orange: '#F59E0B',
              red: '#EF4444'
            }
          },
          boxShadow: {
            soft: '0 8px 30px rgba(15, 53, 87, .06)'
          }
        }
      }
    }
  </script>

  <style>
    * {
      scrollbar-width: thin;
      scrollbar-color: #cbd5e1 transparent;
    }

    body {
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", sans-serif;
      background: #f7faff;
      color: #0f2947;
    }

    .sidebar-gradient {
      background:
        radial-gradient(circle at 0% 0%, rgba(0,168,204,.18), transparent 32%),
        linear-gradient(180deg, #003b73 0%, #052b55 100%);
    }

    .nav-active {
      background: linear-gradient(90deg, rgba(0,168,204,.22), rgba(0,168,204,.08));
      border-left: 3px solid #00a8cc;
      color: white;
    }

    .chart-card {
      min-height: 370px;
    }

    .status-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      display: inline-block;
    }

    .glass {
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(12px);
    }
  </style>
</head>

<body>

<div class="min-h-screen flex">

  <!-- SIDEBAR -->
  <aside class="sidebar-gradient w-[260px] fixed inset-y-0 left-0 z-40 text-white flex flex-col">

    <!-- Logo -->
    <div class="h-[82px] px-6 flex items-center border-b border-white/10">
      <div>
        <div class="flex items-center gap-2">
          <div class="relative">
            <div class="absolute -top-1 left-1 w-10 h-2 rounded-full bg-orange-400 rotate-[-8deg]"></div>
            <span class="text-[22px] font-black italic tracking-tight">
              kimia farma
            </span>
          </div>
        </div>
        <p class="text-[10px] text-blue-200 mt-0.5 ml-1">
          Payroll & HRIS
        </p>
      </div>
    </div>

    <!-- User -->
    <div class="px-5 py-5 border-b border-white/10">
      <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center font-bold">
          AR
        </div>

        <div class="min-w-0">
          <p class="text-sm font-semibold truncate">Andi Rahmat</p>
          <p class="text-xs text-blue-200 truncate">Payroll Administrator</p>
        </div>

        <button class="ml-auto text-blue-200">
          <i data-lucide="chevron-down" class="w-4"></i>
        </button>
      </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">

      <p class="text-[10px] uppercase tracking-widest text-blue-300 font-bold px-3 mb-3">
        Main Menu
      </p>

      <a href="#" class="nav-active flex items-center gap-3 px-3 py-3 rounded-lg text-sm font-medium">
        <i data-lucide="layout-dashboard" class="w-[18px]"></i>
        Dashboard
      </a>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="users" class="w-[18px]"></i>
        Data Karyawan
      </a>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="calculator" class="w-[18px]"></i>
        Komponen Gaji
      </a>

      <a href="#" class="flex items-center justify-between px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <span class="flex items-center gap-3">
          <i data-lucide="wallet-cards" class="w-[18px]"></i>
          Proses Payroll
        </span>
        <span class="bg-orange-400 text-white text-[10px] px-2 py-0.5 rounded-full">
          3
        </span>
      </a>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="file-bar-chart" class="w-[18px]"></i>
        Laporan & Analitik
      </a>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="file-text" class="w-[18px]"></i>
        Slip Gaji
      </a>

      <p class="text-[10px] uppercase tracking-widest text-blue-300 font-bold px-3 mt-7 mb-3">
        System
      </p>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="shield-check" class="w-[18px]"></i>
        Keamanan
      </a>

      <a href="#" class="flex items-center gap-3 px-3 py-3 rounded-lg text-sm text-blue-100 hover:bg-white/10 transition">
        <i data-lucide="settings" class="w-[18px]"></i>
        Pengaturan
      </a>

    </nav>

    <!-- Server -->
    <div class="p-4">
      <div class="rounded-xl bg-white/10 border border-white/10 p-3">
        <div class="flex items-center gap-2">
          <span class="status-dot bg-emerald-400"></span>
          <span class="text-xs font-medium">All Systems Operational</span>
        </div>

        <p class="text-[10px] text-blue-200 mt-2">
          Payroll System v2.8.1
        </p>
      </div>
    </div>

  </aside>


  <!-- MAIN -->
  <main class="ml-[260px] flex-1 min-w-0">

    <!-- TOPBAR -->
    <header class="h-[82px] bg-white border-b border-slate-200 sticky top-0 z-30 px-8 flex items-center justify-between">

      <div class="flex items-center gap-4">

        <!-- Search -->
        <div class="relative w-[350px]">
          <i data-lucide="search"
             class="absolute left-3 top-1/2 -translate-y-1/2 w-4 text-slate-400"></i>

          <input
            type="text"
            placeholder="Cari NIP, nama karyawan, atau periode..."
            class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
          />

          <span class="absolute right-3 top-1/2 -translate-y-1/2 text-[10px] text-slate-400 border border-slate-200 rounded px-1.5 py-0.5">
            Ctrl K
          </span>
        </div>

      </div>

      <div class="flex items-center gap-4">

        <!-- Period -->
        <button class="flex items-center gap-2 border border-slate-200 bg-white rounded-xl px-3 py-2.5 text-sm">
          <i data-lucide="calendar-days" class="w-4 text-kf-blue"></i>
          <span>Agustus 2026</span>
          <i data-lucide="chevron-down" class="w-4 text-slate-400"></i>
        </button>

        <!-- Unit -->
        <button class="hidden xl:flex items-center gap-2 border border-slate-200 rounded-xl px-3 py-2.5 text-sm">
          <i data-lucide="building-2" class="w-4 text-kf-blue"></i>
          <span>Kimia Farma Group</span>
          <i data-lucide="chevron-down" class="w-4 text-slate-400"></i>
        </button>

        <!-- Notification -->
        <button class="relative w-10 h-10 rounded-xl hover:bg-slate-50 flex items-center justify-center">
          <i data-lucide="bell" class="w-[19px] text-slate-600"></i>
          <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
        </button>

        <div class="h-8 w-px bg-slate-200"></div>

        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center text-white text-xs font-bold">
          AR
        </div>

      </div>
    </header>


    <!-- CONTENT -->
    <div class="p-8">

      <!-- Header -->
      <section class="flex items-start justify-between mb-7">

        <div>
          <div class="flex items-center gap-2 mb-2">
            <span class="text-xs font-semibold text-kf-cyan uppercase tracking-wider">
              Payroll Overview
            </span>

            <span class="px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-bold">
              Live
            </span>
          </div>

          <h1 class="text-[28px] font-bold text-kf-navy">
            Selamat datang, Andi 👋
          </h1>

          <p class="text-sm text-slate-500 mt-1">
            Berikut ringkasan kondisi payroll Kimia Farma Group untuk periode Agustus 2026.
          </p>
        </div>

        <button class="bg-kf-blue hover:bg-blue-700 text-white rounded-xl px-4 py-2.5 text-sm font-semibold flex items-center gap-2 shadow-lg shadow-blue-900/10">
          <i data-lucide="play" class="w-4"></i>
          Proses Payroll
        </button>

      </section>


      <!-- KPI -->
      <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

        <!-- Card -->
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
              <i data-lucide="wallet" class="w-5 text-kf-blue"></i>
            </div>

            <span class="flex items-center gap-1 text-xs font-semibold text-emerald-600">
              <i data-lucide="trending-up" class="w-3.5"></i>
              4.8%
            </span>
          </div>

          <p class="text-xs text-slate-500 mt-5">Total Pengeluaran Gaji</p>

          <h2 class="text-[23px] font-bold text-kf-navy mt-1">
            Rp 28.745.890.000
          </h2>

          <p class="text-[11px] text-slate-400 mt-1">
            dibandingkan Rp 27,4 M bulan lalu
          </p>
        </div>


        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center">
              <i data-lucide="users" class="w-5 text-emerald-600"></i>
            </div>

            <span class="px-2 py-1 rounded-lg bg-emerald-50 text-emerald-600 text-[10px] font-bold">
              94.95%
            </span>
          </div>

          <p class="text-xs text-slate-500 mt-5">Karyawan Terbayar</p>

          <h2 class="text-[23px] font-bold text-kf-navy mt-1">
            3,248 <span class="text-sm font-normal text-slate-400">/ 3,421</span>
          </h2>

          <div class="mt-3 h-1.5 bg-slate-100 rounded-full overflow-hidden">
            <div class="h-full bg-emerald-500 rounded-full" style="width:94.95%"></div>
          </div>
        </div>


        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="w-11 h-11 rounded-xl bg-purple-50 flex items-center justify-center">
              <i data-lucide="receipt" class="w-5 text-purple-600"></i>
            </div>

            <span class="flex items-center gap-1 text-xs font-semibold text-emerald-600">
              <i data-lucide="trending-down" class="w-3.5"></i>
              4.1%
            </span>
          </div>

          <p class="text-xs text-slate-500 mt-5">Total Potongan</p>

          <h2 class="text-[23px] font-bold text-kf-navy mt-1">
            Rp 6.128.450.000
          </h2>

          <p class="text-[11px] text-slate-400 mt-1">
            PPh 21, BPJS & potongan lainnya
          </p>
        </div>


        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-soft">
          <div class="flex items-start justify-between">
            <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center">
              <i data-lucide="clock-3" class="w-5 text-orange-500"></i>
            </div>

            <span class="px-2 py-1 rounded-lg bg-orange-50 text-orange-600 text-[10px] font-bold">
              Perlu Review
            </span>
          </div>

          <p class="text-xs text-slate-500 mt-5">Menunggu Approval</p>

          <h2 class="text-[23px] font-bold text-kf-navy mt-1">
            173
          </h2>

          <p class="text-[11px] text-slate-400 mt-1">
            transaksi membutuhkan tindakan
          </p>
        </div>

      </section>


      <!-- CHART ROW -->
      <section class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">

        <!-- Payroll Trend -->
        <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-soft chart-card">

          <div class="flex items-start justify-between">
            <div>
              <h3 class="font-bold text-kf-navy">Tren Pengeluaran Gaji</h3>
              <p class="text-xs text-slate-400 mt-1">
                Total payroll 12 bulan terakhir
              </p>
            </div>

            <button class="flex items-center gap-2 text-xs border border-slate-200 rounded-lg px-3 py-2">
              12 Bulan
              <i data-lucide="chevron-down" class="w-3.5"></i>
            </button>
          </div>

          <div class="mt-6 h-[270px]">
            <canvas id="payrollChart"></canvas>
          </div>

        </div>


        <!-- Breakdown -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-soft chart-card">

          <div>
            <h3 class="font-bold text-kf-navy">Komponen Gaji</h3>
            <p class="text-xs text-slate-400 mt-1">
              Breakdown payroll bulan ini
            </p>
          </div>

          <div class="h-[210px] mt-2">
            <canvas id="donutChart"></canvas>
          </div>

          <div class="grid grid-cols-2 gap-y-3 mt-2">

            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
              <span class="text-xs text-slate-500">Gaji Pokok</span>
              <b class="text-xs ml-auto">54.2%</b>
            </div>

            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-cyan-500"></span>
              <span class="text-xs text-slate-500">Tunjangan</span>
              <b class="text-xs ml-auto">22.7%</b>
            </div>

            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
              <span class="text-xs text-slate-500">Overtime</span>
              <b class="text-xs ml-auto">11.3%</b>
            </div>

            <div class="flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
              <span class="text-xs text-slate-500">Bonus</span>
              <b class="text-xs ml-auto">7.8%</b>
            </div>

          </div>

        </div>

      </section>


      <!-- LOWER SECTION -->
      <section class="grid grid-cols-1 xl:grid-cols-3 gap-5">

        <!-- Employee Payroll Table -->
        <div class="xl:col-span-2 bg-white border border-slate-200 rounded-2xl shadow-soft overflow-hidden">

          <div class="p-6 border-b border-slate-100 flex items-center justify-between">

            <div>
              <h3 class="font-bold text-kf-navy">
                Status Payroll Karyawan
              </h3>

              <p class="text-xs text-slate-400 mt-1">
                Daftar proses payroll periode Agustus 2026
              </p>
            </div>

            <button class="text-xs text-kf-blue font-semibold flex items-center gap-1">
              Lihat Semua
              <i data-lucide="arrow-right" class="w-3.5"></i>
            </button>

          </div>


          <!-- Filter -->
          <div class="px-6 py-4 bg-slate-50 border-b border-slate-100 flex gap-2">

            <button class="bg-kf-blue text-white text-xs px-3 py-2 rounded-lg font-medium">
              Semua
            </button>

            <button class="bg-white border border-slate-200 text-slate-500 text-xs px-3 py-2 rounded-lg">
              Paid
            </button>

            <button class="bg-white border border-slate-200 text-slate-500 text-xs px-3 py-2 rounded-lg">
              Pending
            </button>

            <button class="bg-white border border-slate-200 text-slate-500 text-xs px-3 py-2 rounded-lg">
              Review
            </button>

          </div>


          <div class="overflow-x-auto">

            <table class="w-full text-sm">

              <thead>
                <tr class="text-left text-[11px] uppercase tracking-wide text-slate-400 border-b border-slate-100">
                  <th class="px-6 py-4">Karyawan</th>
                  <th class="px-4 py-4">Unit</th>
                  <th class="px-4 py-4">Net Pay</th>
                  <th class="px-4 py-4">Status</th>
                </tr>
              </thead>

              <tbody>

                <tr class="border-b border-slate-100 hover:bg-slate-50">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <div class="w-9 h-9 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                        BS
                      </div>
                      <div>
                        <p class="text-xs font-semibold text-kf-navy">
                          Budi Santoso
                        </p>
                        <p class="text-[10px] text-slate-400">
                          KF-001238 • Manager Finance
                        </p>
                      </div>
                    </div>
                  </td>

                  <td class="px-4 py-4 text-xs text-slate-500">
                    Head Office
                  </td>

                  <td class="px-4 py-4">
                    <p class="text-xs font-semibold text-kf-navy">
                      Rp 18.450.000
                    </p>
                  </td>

                  <td class="px-4 py-4">
                    <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[10px] font-bold">
                      Paid
                    </span>
                  </td>
                </tr>


                <tr class="border-b border-slate-100 hover:bg-slate-50">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <div class="w-9 h-9 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                        DP
                      </div>
                      <div>
                        <p class="text-xs font-semibold text-kf-navy">
                          Dewi Pratiwi
                        </p>
                        <p class="text-[10px] text-slate-400">
                          KF-002981 • Senior Pharmacist
                        </p>
                      </div>
                    </div>
                  </td>

                  <td class="px-4 py-4 text-xs text-slate-500">
                    Apotek
                  </td>

                  <td class="px-4 py-4">
                    <p class="text-xs font-semibold text-kf-navy">
                      Rp 11.820.500
                    </p>
                  </td>

                  <td class="px-4 py-4">
                    <span class="px-2.5 py-1 rounded-full bg-orange-50 text-orange-600 text-[10px] font-bold">
                      Review
                    </span>
                  </td>
                </tr>


                <tr class="border-b border-slate-100 hover:bg-slate-50">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <div class="w-9 h-9 rounded-lg bg-cyan-100 text-cyan-600 flex items-center justify-center text-xs font-bold">
                        RA
                      </div>
                      <div>
                        <p class="text-xs font-semibold text-kf-navy">
                          Rudi Ahmad
                        </p>
                        <p class="text-[10px] text-slate-400">
                          KF-003451 • Production Staff
                        </p>
                      </div>
                    </div>
                  </td>

                  <td class="px-4 py-4 text-xs text-slate-500">
                    Plant
                  </td>

                  <td class="px-4 py-4">
                    <p class="text-xs font-semibold text-kf-navy">
                      Rp 8.750.250
                    </p>
                  </td>

                  <td class="px-4 py-4">
                    <span class="px-2.5 py-1 rounded-full bg-blue-50 text-blue-600 text-[10px] font-bold">
                      Processing
                    </span>
                  </td>
                </tr>

              </tbody>

            </table>

          </div>

        </div>


        <!-- Activity -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-soft">

          <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div>
              <h3 class="font-bold text-kf-navy">Aktivitas Terbaru</h3>
              <p class="text-xs text-slate-400 mt-1">Aktivitas sistem terakhir</p>
            </div>

            <button class="w-8 h-8 rounded-lg hover:bg-slate-50 flex items-center justify-center">
              <i data-lucide="more-horizontal" class="w-4 text-slate-500"></i>
            </button>
          </div>


          <div class="p-6 space-y-6">

            <div class="flex gap-3">

              <div class="w-9 h-9 rounded-full bg-emerald-50 flex items-center justify-center flex-shrink-0">
                <i data-lucide="check" class="w-4 text-emerald-600"></i>
              </div>

              <div>
                <p class="text-xs text-slate-700">
                  Payroll <b>Apotek KF 012</b> telah disetujui.
                </p>

                <p class="text-[10px] text-slate-400 mt-1">
                  8 menit yang lalu
                </p>
              </div>

            </div>


            <div class="flex gap-3">

              <div class="w-9 h-9 rounded-full bg-orange-50 flex items-center justify-center flex-shrink-0">
                <i data-lucide="clock-3" class="w-4 text-orange-500"></i>
              </div>

              <div>
                <p class="text-xs text-slate-700">
                  <b>24 pengajuan lembur</b> menunggu approval.
                </p>

                <p class="text-[10px] text-slate-400 mt-1">
                  21 menit yang lalu
                </p>
              </div>

            </div>


            <div class="flex gap-3">

              <div class="w-9 h-9 rounded-full bg-blue-50 flex items-center justify-center flex-shrink-0">
                <i data-lucide="upload" class="w-4 text-blue-600"></i>
              </div>

              <div>
                <p class="text-xs text-slate-700">
                  File transfer <b>BNI Agustus 2026</b> berhasil dibuat.
                </p>

                <p class="text-[10px] text-slate-400 mt-1">
                  42 menit yang lalu
                </p>
              </div>

            </div>


            <div class="flex gap-3">

              <div class="w-9 h-9 rounded-full bg-purple-50 flex items-center justify-center flex-shrink-0">
                <i data-lucide="file-edit" class="w-4 text-purple-600"></i>
              </div>

              <div>
                <p class="text-xs text-slate-700">
                  Komponen <b>Tunjangan Shift</b> diperbarui.
                </p>

                <p class="text-[10px] text-slate-400 mt-1">
                  1 jam yang lalu
                </p>
              </div>

            </div>


            <div class="flex gap-3">

              <div class="w-9 h-9 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                <i data-lucide="alert-triangle" class="w-4 text-red-500"></i>
              </div>

              <div>
                <p class="text-xs text-slate-700">
                  <b>3 data rekening</b> membutuhkan validasi.
                </p>

                <p class="text-[10px] text-slate-400 mt-1">
                  2 jam yang lalu
                </p>
              </div>

            </div>

          </div>

        </div>

      </section>


      <!-- QUICK ACTION -->
      <section class="mt-6">

        <div class="bg-gradient-to-r from-[#003B73] to-[#005BBB] rounded-2xl p-6 text-white flex flex-col md:flex-row md:items-center justify-between gap-5 overflow-hidden relative">

          <div class="relative z-10">

            <div class="flex items-center gap-2 mb-2">
              <span class="w-8 h-8 rounded-lg bg-white/15 flex items-center justify-center">
                <i data-lucide="zap" class="w-4"></i>
              </span>

              <span class="text-xs text-blue-100 font-medium">
                Quick Action
              </span>
            </div>

            <h3 class="text-xl font-bold">
              Payroll Agustus hampir selesai
            </h3>

            <p class="text-sm text-blue-100 mt-1">
              173 transaksi masih membutuhkan review sebelum proses transfer.
            </p>

          </div>


          <div class="relative z-10 flex gap-3">

            <button class="bg-white text-kf-navy px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-50">
              Review Sekarang
            </button>

            <button class="border border-white/30 px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-white/10">
              Lihat Laporan
            </button>

          </div>


          <div class="absolute right-10 top-[-80px] w-64 h-64 bg-cyan-400/20 rounded-full blur-2xl"></div>

        </div>

      </section>

      <!-- FOOTER -->
      <footer class="mt-8 pb-4 flex items-center justify-between text-[11px] text-slate-400">
        <span>© 2026 PT Kimia Farma Tbk. Payroll & HRIS</span>
        <div class="flex gap-5">
          <span>Privacy</span>
          <span>Security</span>
          <span>Help Center</span>
        </div>
      </footer>

    </div>
  </main>
</div>


<script>
  lucide.createIcons();

  // Payroll Trend
  const payrollCtx = document.getElementById('payrollChart');

  new Chart(payrollCtx, {
    type: 'line',
    data: {
      labels: [
        'Sep','Okt','Nov','Des','Jan','Feb',
        'Mar','Apr','Mei','Jun','Jul','Agu'
      ],
      datasets: [{
        label: 'Payroll',
        data: [
          22.5, 23.1, 24.8, 24.1,
          25.7, 26.4, 27.1, 26.5,
          27.8, 27.2, 28.1, 28.7
        ],
        borderColor: '#005BBB',
        backgroundColor: 'rgba(0,91,187,.08)',
        borderWidth: 2.5,
        fill: true,
        tension: .4,
        pointRadius: 3,
        pointBackgroundColor: '#fff',
        pointBorderColor: '#005BBB',
        pointBorderWidth: 2
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          backgroundColor: '#003B73',
          padding: 12,
          displayColors: false,
          callbacks: {
            label: function(context) {
              return ' Rp ' + context.raw + ' M';
            }
          }
        }
      },
      scales: {
        y: {
          border: { display: false },
          grid: {
            color: '#eef2f7'
          },
          ticks: {
            color: '#94a3b8',
            font: { size: 10 },
            callback: function(value) {
              return value + ' M';
            }
          }
        },
        x: {
          border: { display: false },
          grid: {
            display: false
          },
          ticks: {
            color: '#94a3b8',
            font: { size: 10 }
          }
        }
      }
    }
  });


  // Donut
  const donutCtx = document.getElementById('donutChart');

  new Chart(donutCtx, {
    type: 'doughnut',
    data: {
      labels: [
        'Gaji Pokok',
        'Tunjangan',
        'Overtime',
        'Bonus',
        'Lainnya'
      ],
      datasets: [{
        data: [54.2, 22.7, 11.3, 7.8, 4],
        backgroundColor: [
          '#2563EB',
          '#06B6D4',
          '#F97316',
          '#8B5CF6',
          '#CBD5E1'
        ],
        borderWidth: 0,
        hoverOffset: 5
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '70%',
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });
</script>

</body>
</html>