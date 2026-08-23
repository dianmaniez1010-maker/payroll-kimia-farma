@extends('layouts.app')

@section('title', 'Slip Gaji Digital - Kimia Farma')

@section('content')
<div class="space-y-6">

    <!-- PAGE TITLE & TOP ACTIONS -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Slip Gaji Digital</h2>
            <p class="text-xs text-slate-500">Pratinjau, unduh PDF, dan distribusikan slip gaji resmi karyawan.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition shadow-sm flex items-center gap-2">
                <i class="fa-solid fa-paper-plane text-slate-500"></i> Kirim Email Massal
            </button>
            <button class="px-4 py-2 bg-kf-navy text-white text-xs font-semibold rounded-xl hover:bg-kf-navyDark transition shadow-md flex items-center gap-2" onclick="window.print()">
                <i class="fa-solid fa-print text-kf-cyan"></i> Cetak PDF
            </button>
        </div>
    </div>

    <!-- MAIN SLIP GAJI PREVIEW CARD -->
    <div class="max-w-4xl mx-auto bg-white rounded-2xl border border-slate-200/80 shadow-lg p-8 space-y-6">
        
        <!-- HEADER SLIP GAJI -->
        <div class="flex items-center justify-between border-b border-slate-200 pb-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-slate-900 p-2 flex items-center justify-center shrink-0">
                    <img src="{{ asset('images/logo-kimia-farma-kecil.jpg') }}" alt="KF Logo" class="h-full object-contain">
                </div>
                <div>
                    <h3 class="font-extrabold text-slate-900 text-lg tracking-wide">PT KIMIA FARMA Tbk</h3>
                    <p class="text-xs text-slate-500">Jl. Veteran No. 9, Jakarta Pusat 10110</p>
                </div>
            </div>
            <div class="text-right">
                <span class="bg-blue-50 text-kf-navy text-xs font-bold px-3 py-1 rounded-full border border-blue-100">RAHASIA / CONFIDENTIAL</span>
                <h4 class="text-sm font-bold text-slate-700 mt-2">SLIP GAJI KARYAWAN</h4>
                <p class="text-xs text-slate-400">Periode: <span class="font-semibold text-slate-700">Agustus 2026</span></p>
            </div>
        </div>

        <!-- BIODATA KARYAWAN -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 bg-slate-50 p-4 rounded-xl text-xs">
            <div>
                <span class="text-slate-400 font-medium block">NIP / ID:</span>
                <span class="font-bold text-slate-800">KF-90241</span>
            </div>
            <div>
                <span class="text-slate-400 font-medium block">Nama Karyawan:</span>
                <span class="font-bold text-slate-800">Apt. Budi Santoso, S.Farm</span>
            </div>
            <div>
                <span class="text-slate-400 font-medium block">Jabatan:</span>
                <span class="font-bold text-slate-800">Apoteker Penanggung Jawab</span>
            </div>
            <div>
                <span class="text-slate-400 font-medium block">Unit Kerja:</span>
                <span class="font-bold text-slate-800">KF Apotek No. 012</span>
            </div>
        </div>

        <!-- BREAKDOWN PENERIMAAN & POTONGAN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-xs">
            
            <!-- KOLOM PENERIMAAN -->
            <div class="space-y-3">
                <div class="font-bold text-slate-900 text-sm border-b border-slate-200 pb-2 text-emerald-700 flex items-center justify-between">
                    <span>A. PENERIMAAN (INCOME)</span>
                    <i class="fa-solid fa-circle-plus"></i>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Gaji Pokok</span>
                    <span class="font-semibold">Rp 8.500.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Tunjangan Jabatan</span>
                    <span class="font-semibold">Rp 1.500.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Tunjangan Kinerja / Lokasi</span>
                    <span class="font-semibold">Rp 800.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>Upah Lembur (12 Jam)</span>
                    <span class="font-semibold">Rp 450.000</span>
                </div>
                <div class="flex justify-between text-slate-900 font-bold border-t border-slate-100 pt-2 text-xs">
                    <span>Total Penerimaan Kotor</span>
                    <span class="text-emerald-600">Rp 11.250.000</span>
                </div>
            </div>

            <!-- KOLOM POTONGAN -->
            <div class="space-y-3">
                <div class="font-bold text-slate-900 text-sm border-b border-slate-200 pb-2 text-rose-600 flex items-center justify-between">
                    <span>B. POTONGAN (DEDUCTION)</span>
                    <i class="fa-solid fa-circle-minus"></i>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>BPJS Kesehatan (1%)</span>
                    <span class="font-semibold">Rp 85.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>BPJS Ketenagakerjaan (JHT 2%)</span>
                    <span class="font-semibold">Rp 170.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>BPJS JP (Jaminan Pensiun 1%)</span>
                    <span class="font-semibold">Rp 85.000</span>
                </div>
                <div class="flex justify-between text-slate-600">
                    <span>PPh21 (Pajak Penghasilan)</span>
                    <span class="font-semibold">Rp 485.000</span>
                </div>
                <div class="flex justify-between text-slate-900 font-bold border-t border-slate-100 pt-2 text-xs">
                    <span>Total Potongan</span>
                    <span class="text-rose-500">Rp 825.000</span>
                </div>
            </div>

        </div>

        <!-- TOTAL GAJI BERSIH (TAKE HOME PAY) -->
        <div class="bg-kf-navy/5 border border-kf-navy/20 p-5 rounded-xl flex items-center justify-between">
            <div>
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider block">Gaji Bersih Diterima (Take Home Pay)</span>
                <span class="text-xs text-slate-400 italic">Transfer via Bank Mandiri • No. Rek: 137000XXXX123</span>
            </div>
            <div class="text-2xl font-extrabold text-kf-navy">
                Rp 10.425.000
            </div>
        </div>

        <!-- FOOTER & TANDA TANGAN DIGITAL -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
            <div>
                <p>Dokumen ini diterbitkan secara elektronik oleh Sistem HRIS PT Kimia Farma Tbk.</p>
                <p class="mt-0.5">Tidak memerlukan tanda tangan basah.</p>
            </div>
            <div class="text-right">
                <span class="font-semibold text-slate-600">Payroll Specialist</span>
                <p class="text-[10px] text-slate-400">Digital Signed ID: KF-SYS-2026-0819</p>
            </div>
        </div>

    </div>

</div>
@endsection