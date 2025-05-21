<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }

    public function login()
    {
        $userModel = new UserModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $user = $userModel->where('username', $username)->first();
        
        if ($user && password_verify($password, $user['password'])) {
            $session_data = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'isLoggedIn' => true
            ];
            
            session()->set($session_data);
            
            session()->setFlashdata('success', 'Login berhasil!');
            
            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau password salah!');
            
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        session()->destroy();
        
        session()->setFlashdata('success', 'Logout berhasil!');
        
        return redirect()->to('/login');
    }
}