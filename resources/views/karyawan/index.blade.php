@extends('layouts.app')

@section('title', 'Data Karyawan - Kimia Farma')

@section('content')
<div class="space-y-6">

    <!-- PAGE TITLE & TOP ACTIONS -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Data Karyawan & SDM</h2>
            <p class="text-xs text-slate-500">Kelola informasi personil, status kepegawaian, dan penetapan unit kerja.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-file-excel text-emerald-600"></i> Import Excel
            </button>
            <a href="{{ url('/karyawan/create') }}" class="px-4 py-2 bg-kf-navy text-white text-xs font-semibold rounded-xl hover:bg-kf-navyDark transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-user-plus text-kf-cyan"></i> Tambah Karyawan
            </a>
        </div>
    </div>

    <!-- FILTER & SEARCH BAR SECTION -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col md:flex-row items-center justify-between gap-4">
        
        <div class="relative w-full md:w-80">
            <input type="text" placeholder="Cari NIP, Nama, atau Jabatan..." class="w-full pl-9 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 text-xs focus:outline-none focus:border-kf-navy transition">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-slate-400 text-xs"></i>
        </div>

        <div class="flex flex-wrap items-center gap-3 w-full md:w-auto">
            <select class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 focus:outline-none">
                <option value="">Semua Unit Kerja</option>
                <option value="holding">Holding Pusat (Veteran)</option>
                <option value="apotek">Kimia Farma Apotek</option>
                <option value="plant">KF Plant Bandung</option>
                <option value="kftd">KFTD Distribution</option>
            </select>

            <select class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-600 focus:outline-none">
                <option value="">Status Kerja</option>
                <option value="tetap">Karyawan Tetap (Kartap)</option>
                <option value="pkwt">Kontrak (PKWT)</option>
            </select>
        </div>

    </div>

    <!-- TABEL DATA KARYAWAN -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px] border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-6">Karyawan</th>
                        <th class="py-3.5 px-4">NIP / Jabatan</th>
                        <th class="py-3.5 px-4">Unit Kerja & Lokasi</th>
                        <th class="py-3.5 px-4">Status Hub. Kerja</th>
                        <th class="py-3.5 px-4">Gaji Pokok Base</th>
                        <th class="py-3.5 px-4">Status Akun</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-kf-navy text-white flex items-center justify-center font-bold text-xs shadow-sm">
                                BS
                            </div>
                            <div>
                                <div class="font-bold text-slate-900">Apt. Budi Santoso, S.Farm</div>
                                <span class="text-[10px] text-slate-400">budi.santoso@kimiafarma.co.id</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-slate-800">KF-90241</div>
                            <span class="text-[10px] text-slate-500">Apoteker Penanggung Jawab</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-medium text-slate-800">KF Apotek No. 012</div>
                            <span class="text-[10px] text-slate-400">BM Jakarta Selatan</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="bg-blue-50 text-kf-navy px-2.5 py-1 rounded-full font-bold text-[10px]">Tetap (Kartap)</span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-800">Rp 8.500.000</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1 text-emerald-600 font-bold text-[10px]">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                            </span>
                        </td>
                        <td class="py-3.5 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-kf-navy hover:bg-slate-100 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800 flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs shadow-sm">
                                DR
                            </div>
                            <div>
                                <div class="font-bold text-slate-900">Dr. Dewi Rahmawati</div>
                                <span class="text-[10px] text-slate-400">dewi.r@kimiafarma.co.id</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-bold text-slate-800">KF-40112</div>
                            <span class="text-[10px] text-slate-500">Senior Researcher</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <div class="font-medium text-slate-800">R&D Formulation</div>
                            <span class="text-[10px] text-slate-400">Plant Bandung</span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="bg-purple-50 text-purple-700 px-2.5 py-1 rounded-full font-bold text-[10px]">Tetap (Kartap)</span>
                        </td>
                        <td class="py-3.5 px-4 font-bold text-slate-800">Rp 14.200.000</td>
                        <td class="py-3.5 px-4">
                            <span class="inline-flex items-center gap-1 text-emerald-600 font-bold text-[10px]">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                            </span>
                        </td>
                        <td class="py-3.5 px-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-kf-navy hover:bg-slate-100 rounded-lg transition" title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
            <span>Menampilkan 1-2 dari 3.421 Karyawan</span>
            <div class="flex items-center gap-1">
                <button class="px-3 py-1.5 bg-slate-100 rounded-lg font-semibold disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1.5 bg-kf-navy text-white rounded-lg font-semibold">1</button>
                <button class="px-3 py-1.5 bg-slate-100 rounded-lg font-semibold">Next</button>
            </div>
        </div>
    </div>

</div>
@endsection