@extends('layouts.app')

@section('title', 'Laporan & Analitik - Kimia Farma')

@section('content')
<div class="space-y-6">

    <!-- PAGE TITLE & TOP ACTIONS -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Laporan & Analitik Payroll</h2>
            <p class="text-xs text-slate-500">Visualisasi statistik biaya SDM, tren penggajian, dan ekspor laporan keuangan.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-file-pdf text-rose-600"></i> Export Ringkasan PDF
            </button>
            <button class="px-4 py-2 bg-emerald-600 text-white text-xs font-semibold rounded-xl hover:bg-emerald-700 transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-file-excel"></i> Export Excel (Pajak & Jamsostek)
            </button>
        </div>
    </div>

    <!-- STATISTIK RINGKASAN KPIS -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block mb-1">Total Budget Payroll YTD</span>
            <div class="text-xl font-extrabold text-slate-900">Rp 34,2 Milyar</div>
            <div class="mt-2 text-[11px] text-emerald-600 font-semibold flex items-center gap-1">
                <i class="fa-solid fa-circle-check"></i> Sesuai Alokasi Anggaran 2026
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block mb-1">Rata-rata THP Karyawan</span>
            <div class="text-xl font-extrabold text-slate-900">Rp 8.750.000</div>
            <div class="mt-2 text-[11px] text-slate-400 font-medium">Per Karyawan / Bulan</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block mb-1">Total Setoran PPh21 (YTD)</span>
            <div class="text-xl font-extrabold text-slate-900">Rp 1,48 Milyar</div>
            <div class="mt-2 text-[11px] text-blue-600 font-semibold flex items-center gap-1">
                <i class="fa-solid fa-building-columns"></i> Siap Pelaporan SPT
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <span class="text-xs font-semibold text-slate-500 block mb-1">Rasio Biaya Lembur vs Gaji</span>
            <div class="text-xl font-extrabold text-slate-900">3.8%</div>
            <div class="mt-2 text-[11px] text-emerald-600 font-semibold flex items-center gap-1">
                <i class="fa-solid fa-arrow-down"></i> Efisien (&lt; 5% Target)
            </div>
        </div>
    </div>

    <!-- GRAFIK & ANALITIK UTAMA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- GRAFIK TREN PENGELUARAN GAJI (2 KOLOM) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">Tren Realisasi Biaya Payroll (2026)</h3>
                    <p class="text-xs text-slate-400">Perbandingan Gaji Pokok, Tunjangan, dan Lembur per bulan</p>
                </div>
                <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 focus:outline-none">
                    <option value="2026">Tahun 2026</option>
                    <option value="2025">Tahun 2025</option>
                </select>
            </div>
            
            <div class="h-64 flex items-end justify-between gap-4 pt-8 px-2 border-b border-slate-100 pb-4">
                <!-- Bar Jan -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 65%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Jan</span>
                </div>
                <!-- Bar Feb -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 68%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Feb</span>
                </div>
                <!-- Bar Mar -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 85%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Mar</span>
                </div>
                <!-- Bar Apr -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 72%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Apr</span>
                </div>
                <!-- Bar Mei -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 75%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Mei</span>
                </div>
                <!-- Bar Jun -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 78%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Jun</span>
                </div>
                <!-- Bar Jul -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-navy/80 rounded-t-lg transition group-hover:bg-kf-navy" style="height: 80%;"></div>
                    <span class="text-[10px] text-slate-400 font-semibold">Jul</span>
                </div>
                <!-- Bar Ags (Aktif) -->
                <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                    <div class="w-full bg-kf-cyan rounded-t-lg transition" style="height: 82%;"></div>
                    <span class="text-[10px] text-kf-navy font-extrabold">Ags</span>
                </div>
            </div>
            
            <div class="flex items-center justify-center gap-6 mt-4 text-xs">
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-kf-navy"></span> Gaji Pokok & Tunjangan</div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-kf-cyan"></span> Periode Berjalan (Agustus)</div>
            </div>
        </div>

        <!-- DISTRIBUSI ANGGARAN PER UNIT (1 KOLOM) -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-slate-900 text-sm mb-1">Distribusi Alokasi Unit</h3>
                <p class="text-xs text-slate-400 mb-6">Persentase total payroll per bisnis unit</p>

                <div class="space-y-4 text-xs">
                    <div>
                        <div class="flex justify-between font-semibold mb-1">
                            <span class="text-slate-700">Kimia Farma Apotek (KFA)</span>
                            <span class="text-slate-900 font-bold">42%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-kf-navy rounded-full" style="width: 42%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between font-semibold mb-1">
                            <span class="text-slate-700">Manufaktur Plant Bandung</span>
                            <span class="text-slate-900 font-bold">28%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-kf-cyan rounded-full" style="width: 28%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between font-semibold mb-1">
                            <span class="text-slate-700">KFTD Distribusi & Logistik</span>
                            <span class="text-slate-900 font-bold">18%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-emerald-500 rounded-full" style="width: 18%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between font-semibold mb-1">
                            <span class="text-slate-700">Holding Pusat (Veteran)</span>
                            <span class="text-slate-900 font-bold">12%</span>
                        </div>
                        <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-purple-500 rounded-full" style="width: 12%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full mt-6 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-bold rounded-xl border border-slate-200 transition">
                Lihat Rincian Per Cabang
            </button>
        </div>

    </div>

</div>
@endsection