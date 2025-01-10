<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        // Memuat model UserModel
        $this->userModel = new UserModel();

        // Memuat library session
        $this->session = \Config\Services::session();
        $this->session->start(); // Pastikan sesi dimulai

        // Memuat helper yang diperlukan
        helper(['url', 'form']);
    }

    // Menampilkan halaman Sign Up
    public function signup()
    {
        return view('auth/signup');
    }

    // Menangani proses pendaftaran pengguna baru
    public function register()
    {
        // Validasi input
        if (!$this->validate([
            'username'          => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email'             => 'required|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[6]|max_length[255]',
            'password_confirm'  => 'required|matches[password]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Menyimpan data pengguna baru menggunakan UserModel
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        // Menyimpan pesan sukses ke session
        $this->session->setFlashdata('success', 'Pendaftaran berhasil! Silakan login.');

        // Redirect ke halaman login
        return redirect()->to('/login');
    }

    // Menampilkan halaman Login
    public function login()
    {
        return view('auth/login');
    }

    // Menangani proses autentikasi pengguna
    public function authenticate()
    {
        // Validasi input
        if (!$this->validate([
            'email'    => 'required|valid_email',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Mendapatkan data pengguna berdasarkan email menggunakan UserModel
        $user = $this->userModel->where('email', $this->request->getPost('email'))->first();

        // Cek apakah pengguna ada dan password cocok
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            // Menyimpan data pengguna ke session
            $this->session->set('user', [
                'id'       => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
            ]);

            // Redirect ke dashboard
            return redirect()->to('/dashboard');
        } else {
            // Menyimpan pesan error ke session
            $this->session->setFlashdata('error', 'Email atau password salah.');

            // Redirect kembali ke halaman login
            return redirect()->to('/login');
        }
    }   

    public function authenticateWithUrl()
    {
        $email = $this->request->getGet('email'); // Ambil email dari query string
        $password = $this->request->getGet('password'); // Ambil password dari query string

        if (empty($email) || empty($password)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email dan password harus diisi.'
            ])->setStatusCode(400);
        }

        // Cari user berdasarkan email
        $user = $this->userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email atau password salah.'
            ])->setStatusCode(401);
        }

        // Simpan data user ke session
        $this->session->set('user', [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Login berhasil.',
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
            ],
        ]);
    }

    // Menangani proses logout pengguna
    public function logout()
    {
        // Menghapus data pengguna dari session
        $this->session->remove('user');
        $this->session->destroy();
        // Menyimpan pesan sukses ke session
        $this->session->setFlashdata('success', 'Anda telah berhasil logout.');

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
