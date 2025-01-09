<?php

namespace App\Controllers;

use App\Models\LouisUserModel;

class AuthLouis extends BaseController
{
    public function login()
    {
        helper(['form']);
        echo view('authlouis/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new LouisUserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if ($user['password'] === $password) {
                $sessionData = [
                    'id' => $user['id'],
                    'username' => $user['name'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/louisdashboard.php');
            } else {
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    public function signup()
    {
        helper(['form']);
        echo view('authlouis/signup');
    }

    public function signupProcess()
    {
        $model = new LouisUserModel();

        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];

        $model->insert($data);
        return redirect()->to('/authlouis/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/authlouis/login');
    }
}
