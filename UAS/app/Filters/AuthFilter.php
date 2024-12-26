<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AuthFilter implements FilterInterface
{
    protected $key;

    public function __construct()
    {
        // Mengambil secret key dari .env
        $this->key = getenv('JWT_SECRET') ?: 'your-very-secure-secret-key';
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        // Mengambil token dari HTTP-only cookie
        $token = $_COOKIE['token'] ?? null;

        if (!$token) {
            // Jika token tidak ada, redirect ke login
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        try {
            // Mendekode token
            $decoded = JWT::decode($token, new Key($this->key, 'HS256'));

            // Menyimpan data pengguna ke session
            $session = session();
            $session->set('user', $decoded->data);
        } catch (\Exception $e) {
            // Jika token tidak valid, redirect ke login
            return redirect()->to('/login')->with('error', 'Token tidak valid atau telah kedaluwarsa.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah request
    }
}
