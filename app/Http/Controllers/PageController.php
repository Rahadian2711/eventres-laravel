<?php

// ── 1. Tambahkan method ini ke dalam file: app/Http/Controllers/PageController.php
//       (buat file baru kalau belum ada)

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }
}


// ── 2. Tambahkan route ini di: routes/web.php
//
// Route::get('/tentang-kami', [App\Http\Controllers\PageController::class, 'about'])->name('about');
