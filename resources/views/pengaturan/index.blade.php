@extends('layouts.app')

@section('title', 'Pengaturan Sistem - Kimia Farma')

@section('content')
<div class="space-y-6" x-data="{ activeTab: 'payroll' }">

    <!-- PAGE TITLE & TOP ACTIONS -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Pengaturan Sistem</h2>
            <p class="text-xs text-slate-500">Konfigurasi parameter BPJS, perpajakan PPh21, integrasi API, dan hak akses pengguna.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-kf-navy text-white text-xs font-semibold rounded-xl hover:bg-kf-navyDark transition shadow-md flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk text-kf-cyan"></i> Simpan Perubahan
            </button>
        </div>
    </div>

    <!-- TAB NAVIGATION BAR -->
    <div class="bg-white p-2 rounded-2xl border border-slate-200/80 shadow-sm flex flex-wrap gap-2 text-xs font-bold">
        <button @click="activeTab = 'payroll'" :class="activeTab === 'payroll' ? 'bg-kf-navy text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50'" class="px-4 py-2.5 rounded-xl transition flex items-center gap-2">
            <i class="fa-solid fa-calculator"></i> Parameter Payroll & BPJS
        </button>
        <button @click="activeTab = 'pajak'" :class="activeTab === 'pajak' ? 'bg-kf-navy text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50'" class="px-4 py-2.5 rounded-xl transition flex items-center gap-2">
            <i class="fa-solid fa-receipt"></i> Tarip PPh21 (TER)
        </button>
        <button @click="activeTab = 'integrasi'" :class="activeTab === 'integrasi' ? 'bg-kf-navy text-white shadow-sm' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50'" class="px-4 py-2.5 rounded-xl transition flex items-center gap-2">
            <i class="fa-solid fa-network-wired"></i> Integrasi Mesin Absensi & Bank
        </button>
    </div>

    <!-- TAB CONTENT 1: PARAMETER PAYROLL & BPJS -->
    <div x-show="activeTab === 'payroll'" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-6">
        <div>
            <h3 class="font-bold text-slate-900 text-sm">Persentase Iuran BPJS</h3>
            <p class="text-xs text-slate-400">Atur potongan resmi pemerintah untuk Kesehatan dan Ketenagakerjaan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
            <!-- BPJS Kesehatan -->
            <div class="p-4 border border-slate-200 rounded-xl space-y-4">
                <div class="font-bold text-slate-800 flex items-center justify-between">
                    <span>BPJS Kesehatan</span>
                    <span class="bg-blue-50 text-kf-navy px-2 py-0.5 rounded text-[10px]">Aktif</span>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-slate-500 font-semibold block mb-1">Tanggungan Perusahaan (%)</label>
                        <input type="number" value="4.0" step="0.1" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                    </div>
                    <div>
                        <label class="text-slate-500 font-semibold block mb-1">Potongan Karyawan (%)</label>
                        <input type="number" value="1.0" step="0.1" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                    </div>
                </div>
                <div>
                    <label class="text-slate-500 font-semibold block mb-1">Batas Maksimal Gaji BPJS Kes (Rp)</label>
                    <input type="text" value="12.000.000" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                </div>
            </div>

            <!-- BPJS Ketenagakerjaan -->
            <div class="p-4 border border-slate-200 rounded-xl space-y-4">
                <div class="font-bold text-slate-800 flex items-center justify-between">
                    <span>BPJS Ketenagakerjaan (JHT & JP)</span>
                    <span class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded text-[10px]">Aktif</span>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-slate-500 font-semibold block mb-1">JHT Karyawan (%)</label>
                        <input type="number" value="2.0" step="0.1" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                    </div>
                    <div>
                        <label class="text-slate-500 font-semibold block mb-1">Jaminan Pensiun Karyawan (%)</label>
                        <input type="number" value="1.0" step="0.1" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                    </div>
                </div>
                <div>
                    <label class="text-slate-500 font-semibold block mb-1">Batas Maksimal Gaji JP (Rp)</label>
                    <input type="text" value="10.547.400" class="w-full p-2 bg-slate-50 border border-slate-200 rounded-lg font-bold text-slate-800">
                </div>
            </div>
        </div>
    </div>

    <!-- TAB CONTENT 2: PPH21 TER -->
    <div x-show="activeTab === 'pajak'" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-6">
        <div>
            <h3 class="font-bold text-slate-900 text-sm">Metode Kalkulasi PPh21</h3>
            <p class="text-xs text-slate-400">Pilih skema pemotongan pajak penghasilan karyawan yang berlaku di Kimia Farma.</p>
        </div>

        <div class="space-y-3 text-xs">
            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50">
                <input type="radio" name="pph_method" checked class="text-kf-navy focus:ring-kf-navy">
                <div>
                    <span class="font-bold text-slate-800 block">Metode TER (Tarif Efektif Rata-rata) - PP 58/2023</span>
                    <span class="text-slate-400 text-[11px]">Skema perhitungan pajak resmi pemerintah (Kategori A, B, C).</span>
                </div>
            </label>

            <label class="flex items-center gap-3 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50">
                <input type="radio" name="pph_method" class="text-kf-navy focus:ring-kf-navy">
                <div>
                    <span class="font-bold text-slate-800 block">Metode Netto (Perusahaan Menanggung Pajak)</span>
                    <span class="text-slate-400 text-[11px]">Pajak dihitung sebagai tunjangan pajak (Gross Up).</span>
                </div>
            </label>
        </div>
    </div>

    <!-- TAB CONTENT 3: INTEGRASI SYSTEM -->
    <div x-show="activeTab === 'integrasi'" class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-6">
        <div>
            <h3 class="font-bold text-slate-900 text-sm">Status Sinkronisasi Sistem External</h3>
            <p class="text-xs text-slate-400">Koneksi API ke Mesin Fingerprint/Absensi Mobile & Bank Payroll (Mandiri / BNI).</p>
        </div>

        <div class="space-y-3 text-xs">
            <div class="flex items-center justify-between p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center text-sm">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <div>
                        <div class="font-bold text-slate-800">API Host-to-Host Bank Mandiri</div>
                        <span class="text-[10px] text-slate-400">Digunakan untuk transfer gaji massal otomatis.</span>
                    </div>
                </div>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold rounded-full text-[10px]">Connected</span>
            </div>

            <div class="flex items-center justify-between p-4 border border-slate-200 rounded-xl">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-sm">
                        <i class="fa-solid fa-fingerprint"></i>
                    </div>
                    <div>
                        <div class="font-bold text-slate-800">Database Absensi Mobile KF</div>
                        <span class="text-[10px] text-slate-400">Sync data presensi & lembur bulanan.</span>
                    </div>
                </div>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 font-bold rounded-full text-[10px]">Connected</span>
            </div>
        </div>
    </div>

</div>
@endsection