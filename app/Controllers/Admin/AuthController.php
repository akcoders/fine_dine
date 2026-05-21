<?php

namespace App\Controllers\Admin;

use App\Models\AdminUserModel;

class AuthController extends BaseAdminController
{
    public function login(): string
    {
        if (session()->get('adminUser')) {
            return redirect()->to(site_url('admin'));
        }

        return $this->render('auth/login', [
            'title' => 'Admin Login',
        ]);
    }

    public function attemptLogin()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        $admin = (new AdminUserModel())->where('email', $email)->first();

        if (! $admin || ! $admin['is_active'] || ! password_verify($password, $admin['password_hash'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid login details.');
        }

        session()->set('adminUser', [
            'id'    => $admin['id'],
            'name'  => $admin['name'],
            'email' => $admin['email'],
        ]);

        (new AdminUserModel())->update($admin['id'], ['last_login_at' => date('Y-m-d H:i:s')]);

        return redirect()->to(site_url('admin'))->with('success', 'Welcome back.');
    }

    public function logout()
    {
        session()->remove('adminUser');

        return redirect()->to(site_url('admin/login'))->with('success', 'Logged out successfully.');
    }
}
