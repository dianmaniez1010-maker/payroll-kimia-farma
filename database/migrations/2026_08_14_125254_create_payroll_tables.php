<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel user / Karyawan
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Periode Penggajian (contoh: 2026-08)
            $table->string('month_year'); // atau gunakan $table->date('payment_date')
            
            // Komponen Gaji
            $table->decimal('basic_salary', 12, 2);  // Gaji Pokok
            $table->decimal('allowances', 12, 2)->default(0); // Total Tunjangan
            $table->decimal('deductions', 12, 2)->default(0); // Total Potongan (BPJS, Pajak, dll)
            $table->decimal('net_salary', 12, 2);   // Gaji Bersih (Pokok + Tunjangan - Potongan)
            
            // Status Pembayaran
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};