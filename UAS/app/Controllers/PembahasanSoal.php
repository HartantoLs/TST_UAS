<?php

namespace App\Controllers;

class PembahasanSoal extends BaseController
{
    public function index()
    {
        // Menampilkan view pembahasan soal
        return view('Pembahasan/index');
    }
}
