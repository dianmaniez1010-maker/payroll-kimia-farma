<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIK)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/fitur', function () {
    return view('fitur');
})->name('fitur');

Route::get('/modul', function () {
    return view('modul');
})->name('modul');

Route::get('/keunggulan', function () {
    return view('keunggulan');
})->name('keunggulan');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');


/*
|--------------------------------------------------------------------------
| MODUL SYSTEM HRIS & PAYROLL (INTERNAL)
|--------------------------------------------------------------------------
*/

// 1. Dashboard Analytics (Beranda Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// 2. Data Karyawan
Route::get('/karyawan', function () {
    return view('karyawan.index');
});

Route::get('/karyawan/create', function () {
    return view('karyawan.create');
});

// 3. Penggajian & Komponen
Route::get('/komponen-gaji', function () {
    return view('komponen-gaji');
});

Route::get('/payroll', function () {
    return view('payroll.index');
});

Route::get('/slip-gaji', function () {
    return view('slip-gaji.index');
});

// 4. Laporan & Pengaturan
Route::get('/laporan', function () {
    return view('laporan.index');
});

Route::get('/pengaturan', function () {
    return view('pengaturan.index');
});

use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');