@extends('layouts.app')

@section('title', 'Komponen Gaji - Kimia Farma')

@section('content')
<div x-data="{
    gajiPokok: 8500000,
    tunjanganJabatan: 2500000,
    tunjanganBahaya: 1500000,
    insentifApoteker: 750000,
    potonganBPJS: 255000,
    potonganPph21: 425000,
    
    get totalPenerimaan() {
        return Number(this.gajiPokok) + Number(this.tunjanganJabatan) + Number(this.tunjanganBahaya) + Number(this.insentifApoteker);
    },
    get totalPotongan() {
        return Number(this.potonganBPJS) + Number(this.potonganPph21);
    },
    get takeHomePay() {
        return this.totalPenerimaan - this.totalPotongan;
    },
    formatRupiah(val) {
        return 'Rp ' + Number(val).toLocaleString('id-ID');
    }
}">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Pengaturan & Form Komponen Gaji</h2>
            <p class="text-xs text-slate-500">Kelola tunjangan, insentif farmasi, serta rumus potongan payroll Kimia Farma.</p>
        </div>
        
        <button class="px-4 py-2 bg-kf-navy text-white text-xs font-semibold rounded-xl hover:bg-kf-navyDark transition shadow-md flex items-center gap-2">
            <i class="fa-solid fa-plus text-kf-cyan"></i> Tambah Komponen Baru
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Dynamic Form Builder -->
        <div class="lg:col-span-7 bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-6">
            <div class="border-b border-slate-100 pb-4">
                <h3 class="font-bold text-slate-800 text-sm flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-kf-navy"></i> Konfigurasi Komponen Karyawan Sampel
                </h3>
                <p class="text-[11px] text-slate-400">Ubah nilai variabel di bawah untuk menguji simulasi kalkulasi di panel kanan.</p>
            </div>

            <form class="space-y-4 text-xs">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Gaji Pokok (Nominal Base)</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                        <input type="number" x-model="gajiPokok" class="w-full pl-10 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 font-bold text-slate-800 focus:outline-none focus:border-kf-navy">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tunjangan Jabatan</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                            <input type="number" x-model="tunjanganJabatan" class="w-full pl-10 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 font-semibold focus:outline-none focus:border-kf-navy">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Tunjangan Bahaya Kimia (R&D/Plant)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                            <input type="number" x-model="tunjanganBahaya" class="w-full pl-10 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 font-semibold focus:outline-none focus:border-kf-navy">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Insentif Apoteker / Shift Malam</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                        <input type="number" x-model="insentifApoteker" class="w-full pl-10 pr-4 py-2 bg-slate-50 rounded-xl border border-slate-200 font-semibold focus:outline-none focus:border-kf-navy">
                    </div>
                </div>

                <hr class="border-slate-100 my-2">

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-semibold text-rose-700 mb-1">Potongan BPJS (TK 2% + Kes 1%)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                            <input type="number" x-model="potonganBPJS" class="w-full pl-10 pr-4 py-2 bg-rose-50/50 rounded-xl border border-rose-200 font-semibold text-rose-800 focus:outline-none focus:border-rose-400">
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-rose-700 mb-1">Potongan PPh 21 (TER)</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2.5 text-slate-400 font-bold">Rp</span>
                            <input type="number" x-model="potonganPph21" class="w-full pl-10 pr-4 py-2 bg-rose-50/50 rounded-xl border border-rose-200 font-semibold text-rose-800 focus:outline-none focus:border-rose-400">
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end gap-2">
                    <button type="button" class="px-4 py-2 bg-slate-100 text-slate-600 font-semibold rounded-xl hover:bg-slate-200 transition">Reset Default</button>
                    <button type="button" class="px-5 py-2 bg-kf-navy text-white font-bold rounded-xl hover:bg-kf-navyDark transition shadow-md">Simpan Perubahan Master</button>
                </div>
            </form>
        </div>

        <!-- Real-time Preview Card -->
        <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 via-slate-800 to-kf-navy text-white p-6 rounded-2xl shadow-xl flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -right-10 -bottom-10 opacity-5 pointer-events-none">
                <i class="fa-solid fa-calculator text-[220px]"></i>
            </div>

            <div>
                <div class="flex items-center justify-between border-b border-slate-700/60 pb-3 mb-4">
                    <span class="text-xs font-bold text-cyan-400 uppercase tracking-wider flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-ping"></span> Live Preview Calculation
                    </span>
                    <span class="text-[10px] bg-slate-700/80 px-2 py-0.5 rounded text-slate-300">Sample Karyawan</span>
                </div>

                <div class="flex items-center gap-3 mb-6 bg-slate-800/60 p-3 rounded-xl border border-slate-700/50">
                    <div class="w-10 h-10 rounded-full bg-kf-cyan text-slate-900 flex items-center justify-center font-bold text-sm">BS</div>
                    <div>
                        <h4 class="font-bold text-xs text-white">Apt. Budi Santoso, S.Farm</h4>
                        <p class="text-[10px] text-slate-400">Apoteker Penanggung Jawab • KF Apotek 012</p>
                    </div>
                </div>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between text-slate-300">
                        <span>Total Gross Earnings (Penerimaan)</span>
                        <span class="font-bold text-emerald-400" x-text="formatRupiah(totalPenerimaan)"></span>
                    </div>
                    <div class="flex justify-between text-slate-300">
                        <span>Total Deductions (Potongan)</span>
                        <span class="font-bold text-rose-400" x-text="'- ' + formatRupiah(totalPotongan)"></span>
                    </div>
                </div>

                <hr class="border-slate-700/60 my-4">

                <div class="bg-kf-navy/80 border border-cyan-500/30 p-4 rounded-xl text-center space-y-1">
                    <span class="text-[10px] uppercase tracking-widest text-cyan-300 font-bold">Estimated Take Home Pay (THP)</span>
                    <div class="text-2xl font-extrabold text-white tracking-tight" x-text="formatRupiah(takeHomePay)"></div>
                    <span class="text-[10px] text-slate-400 block">Siap ditransfer pada periode berjalan</span>
                </div>
            </div>

            <div class="mt-6 text-[10px] text-slate-400 text-center">
                <i class="fa-solid fa-shield-halved text-cyan-400"></i> Perhitungan mematuhi regulasi Pajak TER & BPJS TK 2026.
            </div>
        </div>
    </div>
</div>
@endsection