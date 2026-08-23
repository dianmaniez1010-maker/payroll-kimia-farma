@extends('layouts.app')

@section('title', 'Dashboard Payroll & HR Analytics - Kimia Farma')

@section('content')
<div class="space-y-6">

    <!-- PAGE TITLE HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Executive Payroll Dashboard</h2>
            <p class="text-xs text-slate-500">Ringkasan finansial dan status penggajian karyawan Kimia Farma Group.</p>
        </div>
        
        <div class="flex items-center gap-2">
            <button class="flex-1 sm:flex-none px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition shadow-sm flex items-center justify-center gap-2">
                <i class="fa-solid fa-file-export text-slate-500"></i> Ekspor Laporan
            </button>
            <a href="#" class="flex-1 sm:flex-none px-4 py-2 bg-kf-navy text-white text-xs font-semibold rounded-xl hover:bg-kf-navyDark transition shadow-md shadow-blue-900/10 flex items-center justify-center gap-2">
                <i class="fa-solid fa-bolt text-kf-cyan"></i> Process Payroll Run
            </a>
        </div>
    </div>

    <!-- ================= KPI CARDS (TOP ROW) ================= -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Card 1: Total Pengeluaran -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Beban Payroll Bulan Ini</span>
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-kf-navy flex items-center justify-center text-sm"><i class="fa-solid fa-wallet"></i></div>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900">Rp 28.745.890.000</h3>
            <div class="mt-2 flex items-center gap-2 text-[11px]">
                <span class="text-emerald-600 font-bold flex items-center gap-0.5"><i class="fa-solid fa-arrow-trend-up"></i> +2.4%</span>
                <span class="text-slate-400">vs bulan lalu</span>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-kf-navy"></div>
        </div>

        <!-- Card 2: Karyawan Terbayar -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Status Pembayaran Gaji</span>
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm"><i class="fa-solid fa-user-check"></i></div>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900">3.248 <span class="text-xs font-normal text-slate-400">/ 3.421 Karyawan</span></h3>
            <div class="mt-2 flex items-center gap-2 text-[11px]">
                <span class="text-amber-500 font-bold">173 Pending</span>
                <span class="text-slate-400">| 95% Selesai</span>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-emerald-500"></div>
        </div>

        <!-- Card 3: Total PPh 21 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Estimasi PPh 21 (TER)</span>
                <div class="w-8 h-8 rounded-lg bg-cyan-50 text-kf-cyan flex items-center justify-center text-sm"><i class="fa-solid fa-receipt"></i></div>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900">Rp 3.412.500.000</h3>
            <div class="mt-2 flex items-center gap-2 text-[11px]">
                <span class="text-slate-500 font-medium">Potongan Pajak Resmi</span>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-kf-cyan"></div>
        </div>

        <!-- Card 4: Total BPJS -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm relative overflow-hidden">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Iuran BPJS (Kes & TK)</span>
                <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center text-sm"><i class="fa-solid fa-hospital-user"></i></div>
            </div>
            <h3 class="text-xl font-extrabold text-slate-900">Rp 2.715.950.000</h3>
            <div class="mt-2 flex items-center gap-2 text-[11px]">
                <span class="text-slate-500 font-medium">Beban Perusahaan + Karyawan</span>
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-purple-600"></div>
        </div>

    </div>

    <!-- ================= VISUALISASI GRAFIK ================= -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Line Chart: Tren Gaji 12 Bulan -->
        <div class="lg:col-span-8 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-slate-800 text-sm">Tren Pengeluaran Payroll (12 Bulan)</h3>
                    <p class="text-[11px] text-slate-400">Evolusi total beban gaji bersih Kimia Farma Group.</p>
                </div>
                <span class="text-xs font-semibold text-kf-navy bg-blue-50 px-2.5 py-1 rounded-lg border border-blue-100">Tahun 2026</span>
            </div>
            <div class="h-64">
                <canvas id="payrollTrendChart"></canvas>
            </div>
        </div>

        <!-- Donut Chart: Breakdown Komponen Gaji -->
        <div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm space-y-4 flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-slate-800 text-sm">Breakdown Komponen</h3>
                <p class="text-[11px] text-slate-400">Proporsi alokasi komponen gaji bulan ini.</p>
            </div>
            <div class="h-48 my-auto flex items-center justify-center">
                <canvas id="componentDonutChart"></canvas>
            </div>
            <div class="grid grid-cols-2 gap-2 text-[11px] pt-2 border-t border-slate-100">
                <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-kf-navy"></span> Gaji Pokok (65%)</div>
                <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-kf-cyan"></span> Tunjangan (20%)</div>
                <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span> Lembur / Overtime (10%)</div>
                <div class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Insentif (5%)</div>
            </div>
        </div>

    </div>

    <!-- ================= TABEL AKTIVITAS TERAKHIR & LOG APPROVAL ================= -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="font-bold text-slate-800 text-sm">Aktivitas Payroll & Approval Terakhir</h3>
                <p class="text-[11px] text-slate-400">Pengajuan lembur, penyesuaian insentif apoteker, dan status persetujuan.</p>
            </div>
            <a href="#" class="text-xs font-bold text-kf-navy hover:text-kf-cyan transition">Lihat Semua Logs →</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 text-slate-500 font-bold uppercase tracking-wider text-[10px] border-b border-slate-100">
                    <tr>
                        <th class="py-3.5 px-6">Karyawan / NIP</th>
                        <th class="py-3.5 px-4">Unit Kerja</th>
                        <th class="py-3.5 px-4">Jenis Transaksi</th>
                        <th class="py-3.5 px-4">Nominal / Nilai</th>
                        <th class="py-3.5 px-4">Tanggal Pengajuan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800 flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-blue-100 text-kf-navy flex items-center justify-center font-bold text-[10px]">AP</div>
                            <div>
                                <div class="font-bold">Apt. Budi Santoso, S.Farm</div>
                                <span class="text-[10px] text-slate-400">NIP: KF-90241</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">Apotek KF No. 012 - Jakarta</td>
                        <td class="py-3.5 px-4"><span class="bg-blue-50 text-kf-navy px-2 py-0.5 rounded font-semibold text-[10px]">Insentif Shift Malam</span></td>
                        <td class="py-3.5 px-4 font-bold text-slate-800">Rp 1.250.000</td>
                        <td class="py-3.5 px-4">18 Agu 2026</td>
                        <td class="py-3.5 px-4"><span class="bg-amber-100 text-amber-700 font-bold px-2.5 py-1 rounded-full text-[10px]">Pending Approval</span></td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-2.5 py-1 bg-kf-navy text-white rounded-lg text-[10px] hover:bg-kf-navyDark transition">Review</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800 flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-[10px]">DR</div>
                            <div>
                                <div class="font-bold">Dr. Dewi Rahmawati</div>
                                <span class="text-[10px] text-slate-400">NIP: KF-40112</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">R&D Formulation Bandung</td>
                        <td class="py-3.5 px-4"><span class="bg-purple-50 text-purple-700 px-2 py-0.5 rounded font-semibold text-[10px]">Tunjangan Bahaya Kimia</span></td>
                        <td class="py-3.5 px-4 font-bold text-slate-800">Rp 3.000.000</td>
                        <td class="py-3.5 px-4">17 Agu 2026</td>
                        <td class="py-3.5 px-4"><span class="bg-emerald-100 text-emerald-700 font-bold px-2.5 py-1 rounded-full text-[10px]">Approved</span></td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-[10px] hover:bg-slate-200 transition">Detail</button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="py-3.5 px-6 font-semibold text-slate-800 flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center font-bold text-[10px]">HS</div>
                            <div>
                                <div class="font-bold">Hendra Setiawan</div>
                                <span class="text-[10px] text-slate-400">NIP: KF-77109</span>
                            </div>
                        </td>
                        <td class="py-3.5 px-4">KFTD Logistik Surabaya</td>
                        <td class="py-3.5 px-4"><span class="bg-amber-50 text-amber-700 px-2 py-0.5 rounded font-semibold text-[10px]">Klaim Overtime (Lembur)</span></td>
                        <td class="py-3.5 px-4 font-bold text-slate-800">Rp 850.000</td>
                        <td class="py-3.5 px-4">16 Agu 2026</td>
                        <td class="py-3.5 px-4"><span class="bg-emerald-100 text-emerald-700 font-bold px-2.5 py-1 rounded-full text-[10px]">Approved</span></td>
                        <td class="py-3.5 px-6 text-right">
                            <button class="px-2.5 py-1 bg-slate-100 text-slate-600 rounded-lg text-[10px] hover:bg-slate-200 transition">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // Grafik Line: Tren Pengeluaran Gaji
    const ctxTrend = document.getElementById('payrollTrendChart').getContext('2d');
    new Chart(ctxTrend, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Total Pengeluaran (Rp Miliar)',
                data: [26.2, 26.5, 27.1, 28.0, 27.8, 28.2, 28.4, 28.7, null, null, null, null],
                borderColor: '#003B73',
                backgroundColor: 'rgba(0, 59, 115, 0.05)',
                borderWidth: 3,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#00A8CC',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { grid: { display: false }, ticks: { font: { size: 10 } } },
                x: { grid: { display: false }, ticks: { font: { size: 10 } } }
            }
        }
    });

    // Grafik Donut: Breakdown Komponen
    const ctxDonut = document.getElementById('componentDonutChart').getContext('2d');
    new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: ['Gaji Pokok', 'Tunjangan', 'Overtime', 'Insentif'],
            datasets: [{
                data: [65, 20, 10, 5],
                backgroundColor: ['#003B73', '#00A8CC', '#F59E0B', '#10B981'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            cutout: '75%'
        }
    });
</script>
@endpush