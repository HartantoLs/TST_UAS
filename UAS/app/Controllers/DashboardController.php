<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Mendapatkan session service
        $session = session();

        // Mendapatkan data pengguna dari session
        $user = $session->get('user');

        // Jika data pengguna tidak ada di session, arahkan ke login
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Kirim data pengguna ke view
        return view('dashboard', ['user' => $user]);
    }
}
