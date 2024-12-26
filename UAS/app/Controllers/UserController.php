<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        // Memuat model UserModel
        $this->userModel = new UserModel();

        // Memuat helper yang diperlukan (opsional)
        helper(['url', 'form']);
    }

    // Method untuk menampilkan daftar pengguna
    public function index()
    {
        // Mengambil semua data pengguna
        $data['users'] = $this->userModel->findAll();

        // Mengirim data ke view
        return view('/index', $data);
    }
}
