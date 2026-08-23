@extends('layouts.app')

@section('title', 'Proses Payroll Hub - Kimia Farma')

@section('content')
<div class="space-y-6" x-data="{ tab: 'proses' }">

    <!-- PAGE TITLE & TOP ACTIONS -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Proses Payroll Hub</h2>
            <p class="text-xs text-slate-500">Hitung komponen gaji, kalkulasi BPJS & PPh21, serta eksekusi penggajian bulanan.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-rotate text-slate-500"></i> Hitung Ulang (Recalculate)
            </button>
            <button class="px-4 py-2 bg-emerald-600 text-white text-xs font-semibold rounded-xl hover:bg-emerald-700 transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> Lock & Transfer Payroll
            </button>
        </div>
    </div>

    <!-- SUMMARY CARDS PAYROLL PERIODE INI -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-semibold text-slate-500">Total Tagihan Payroll</span>
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center text-xs">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
            <div class="text-xl font-extrabold text-slate-900">Rp 4.285.400.000</div>
            <div class="mt-2 text-[11px] text-emerald-600 font-semibold flex items-center gap-1">
                <i class="fa-solid fa-arrow-up"></i> +2.4% <span class="text-slate-400 font-normal">dari periode lalu</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-semibold text-slate-500">Karyawan Diproses</span>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs">
                    <i class="fa-solid fa-user-check"></i>
                </div>
            </div>
            <div class="text-xl font-extrabold text-slate-900">3.418 / 3.421</div>
            <div class="mt-2 text-[11px] text-amber-600 font-semibold flex items-center gap-1">
                <i class="fa-solid fa-triangle-exclamation"></i> 3 Karyawan pending
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-semibold text-slate-500">Estimasi BPJS (Kantor+Pekerja)</span>
                <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-xs">
                    <i class="fa-solid fa-shield-heart"></i>
                </div>
            </div>
            <div class="text-xl font-extrabold text-slate-900">Rp 342.100.000</div>
            <div class="mt-2 text-[11px] text-slate-400 font-medium">BPJS Kes & Ketenagakerjaan</div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-semibold text-slate-500">Estimasi Pemotongan PPh21</span>
                <div class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center text-xs">
                    <i class="fa-solid fa-receipt"></i>
                </div>
            </div>
            <div class="text-xl font-extrabold text-slate-900">Rp 185.750.000</div>
            <div class="mt-2 text-[11px] text-slate-400 font-medium">TER / PPh21 Pasal 21</div>
        </div>
    </div>

    <!-- FILTER & ACTION TAB BAR -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
        
        <div class="flex items-center gap-2 bg-slate-100 p-1 rounded-xl text-xs font-bold">
            <button @click="tab = 'proses'" :class="tab === 'proses' ? 'bg-white text-kf-navy shadow-sm' : 'text-slate-500 hover:text-slate-800'" class="px-4 py-2 rounded-lg transition">Daftar Kalkulasi Gaji</button>
            <button @click="tab = 'lembur'" :class="tab === 'lembur' ? 'bg-white text-kf-navy shadow-sm' : 'text-slate-500 hover:text-slate-800'" class="px-4 py-2 rounded-lg transition">Kalkulator Lembur & Insentif</button>
        </div>

        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
            <div class="relative w-full md:w-64">
                <input type="text" placeholder="Cari Nama / NIP..." class="w-full pl-9 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs focus:outline-none focus:border-kf-navy transition">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
            </div>
            <select class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 focus:outline-none">
                <option value="">Status Kalkulasi</option>
                <option value="ready">Ready (Siap Lock)</option>
                <option value="draft">Draft / Perlu Review</option>
                <option value="error">Error Formula</option>
            </select>
        </div>

    </div>

    <!-- TABEL PENGAJUAN / KALKULASI PAYROLL -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px] border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-6">Karyawan</th>
                        <th class="py-3.5 px-4">Gaji Pokok</th>
                        <th class="py-3.5 px-4">Tunjangan (+)</th>
                        <th class="py-3.5 px-4">Lembur & Variable</th>
                        <th class="py-3.5 px-4">Potongan (-)</th>
                        <th class="py-3.5 px-4 text-kf-navy">Gaji Bersih (THP)</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-6 text-right">Rincian</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    
                    <!-- Karyawan 1 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800">
                            <div class="font-bold text-slate-900">Apt. Budi Santoso, S.Farm</div>
                            <span class="text-[10px] text-slate-400">NIP: KF-90241 • APJ Apotek</span>
                        </td>
                        <td class="py-3.5 px-4 font-semibold text-slate-700">Rp 8.500.000</td>
                        <td class="py-3.5 px-4 text-emerald-600 font-semibold">+ Rp 2.300.000</td>
                        <td class="py-3.5 px-4 text-emerald-600 font-semibold">+ Rp 450.000</td>
                        <td class="py-3.5 px-4 text-rose-500 font-semibold">- Rp 825.000</td>
                        <td class="py-3.5 px-4 font-extrabold text-kf-navy text-sm">Rp 10.425.000</td>
                        <td class="py-3.5 px-4">
                            <span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full font-bold text-[10px] inline-flex items-center gap-1">
                                <i class="fa-solid fa-check"></i> Calculated
                            </span>
                        </td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-3 py-1.5 bg-slate-100 hover:bg-kf-navy hover:text-white rounded-lg transition text-slate-600 font-semibold text-[11px]">
                                Detail Breakdown
                            </button>
                        </td>
                    </tr>

                    <!-- Karyawan 2 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800">
                            <div class="font-bold text-slate-900">Dr. Dewi Rahmawati</div>
                            <span class="text-[10px] text-slate-400">NIP: KF-40112 • Senior Researcher</span>
                        </td>
                        <td class="py-3.5 px-4 font-semibold text-slate-700">Rp 14.200.000</td>
                        <td class="py-3.5 px-4 text-emerald-600 font-semibold">+ Rp 4.100.000</td>
                        <td class="py-3.5 px-4 text-slate-400 font-medium">+ Rp 0</td>
                        <td class="py-3.5 px-4 text-rose-500 font-semibold">- Rp 1.950.000</td>
                        <td class="py-3.5 px-4 font-extrabold text-kf-navy text-sm">Rp 16.350.000</td>
                        <td class="py-3.5 px-4">
                            <span class="bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-full font-bold text-[10px] inline-flex items-center gap-1">
                                <i class="fa-solid fa-check"></i> Calculated
                            </span>
                        </td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-3 py-1.5 bg-slate-100 hover:bg-kf-navy hover:text-white rounded-lg transition text-slate-600 font-semibold text-[11px]">
                                Detail Breakdown
                            </button>
                        </td>
                    </tr>

                    <!-- Karyawan 3 (Pending Warning) -->
                    <tr class="hover:bg-slate-50/80 transition bg-amber-50/30">
                        <td class="py-3.5 px-6 font-semibold text-slate-800">
                            <div class="font-bold text-slate-900">Rian Hidayat, A.Md</div>
                            <span class="text-[10px] text-slate-400">NIP: KF-88102 • Logistik Plant</span>
                        </td>
                        <td class="py-3.5 px-4 font-semibold text-slate-700">Rp 4.800.000</td>
                        <td class="py-3.5 px-4 text-emerald-600 font-semibold">+ Rp 900.000</td>
                        <td class="py-3.5 px-4 text-amber-600 font-bold">+ Pending Rev</td>
                        <td class="py-3.5 px-4 text-rose-500 font-semibold">- Rp 410.000</td>
                        <td class="py-3.5 px-4 font-extrabold text-slate-400 text-sm">Rp 5.290.000</td>
                        <td class="py-3.5 px-4">
                            <span class="bg-amber-100 text-amber-800 px-2.5 py-1 rounded-full font-bold text-[10px] inline-flex items-center gap-1">
                                <i class="fa-solid fa-clock"></i> Absensi Pending
                            </span>
                        </td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-3 py-1.5 bg-amber-500 text-white hover:bg-amber-600 rounded-lg transition font-semibold text-[11px]">
                                Cek Masalah
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- FOOTER PAGINATION -->
        <div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
            <span>Menampilkan 1-3 dari 3.421 Karyawan</span>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1.5 bg-slate-100 rounded-lg font-semibold disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1.5 bg-kf-navy text-white rounded-lg font-semibold">1</button>
                <button class="px-3 py-1.5 bg-slate-100 rounded-lg font-semibold">Next</button>
            </div>
        </div>
    </div>

</div>
@endsection