<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        if (session()->has('user_id')) {
            return redirect()->to(site_url('employees'));
        }

        return view('auth/register');
    }

    
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',

            'email' => 'required|valid_email|max_length[150]|is_unique[app_users.email]',

            'password' => 'required|min_length[8]|max_length[72]',

            // 'password_confirm' => 'required|matches[password]',
        ];

        if (! $this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $name = trim((string) $this->request->getPost('name'));

        $email = strtolower(trim((string) $this->request->getPost('email')));

        $password = (string) $this->request->getPost('password');

     
        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $this->userModel->insert([
            'name'     => $name,
            'email'    => $email,
            'password' => $hashedPassword,
        ]);

        return redirect()->to(site_url('login'))
            ->with('success', 'Registration successful! Please login.');
    }

    
    public function login()
    {
        if (session()->has('user_id')) {
            return redirect()->to(site_url('employees'));
        }

        return view('auth/login');
    }

    public function authenticate()
    {
        $rules = [
            'email' => 'required|valid_email',

            'password' => 'required',
        ];

        if (! $this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $email = strtolower(trim((string) $this->request->getPost('email')));

        $password = (string) $this->request->getPost('password');

        
        $user = $this->userModel
            ->where('email', $email)
            ->first();

        if (! $user || ! password_verify($password, $user['password'])) {

            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email or password.');
        }

        
        session()->regenerate(true);

        
        session()->set([
            'user_id'   => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
        ]);

        return redirect()->to(site_url('employees'))
            ->with('success', 'Welcome back, ' . $user['name'] . '!');
    }

    // Logout
    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'))
            ->with('success', 'You have logged out successfully.');
    }
}