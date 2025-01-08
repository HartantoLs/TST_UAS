<?php

namespace App\Controllers;

class LouisDashboard extends BaseController
{
    public function index()
    {
        $session = session();
        
        // Cek apakah pengguna sudah login
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/authlouis/login');
        }

        $data = [
            'username' => $session->get('username'),
            'id' => $session->get('id'),
        ];

        return view('louisdashboard', $data);
    }
}
