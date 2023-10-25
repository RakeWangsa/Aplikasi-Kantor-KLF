<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index(): string
{
    return view('login');
}   
public function register(): string
{
    return view('register');
}  
public function login()
{
    // Proses validasi login di sini
    // Contoh validasi sederhana: cek username dan password

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    if ($username === 'user' && $password === 'password') {
        // Berhasil login, Anda dapat mengatur sesi atau pengalihan ke halaman lain di sini
        return redirect()->to(base_url('dashboard'));
    } else {
        // Login gagal, Anda dapat menampilkan pesan kesalahan
        return view('login', ['error' => 'Login failed']);
    }
}

public function tambahAkun()
    {
        // Validasi input dari formulir
        $validation = service('validation');
        $validation->setRules([
            'username' => 'required|min_length[4]|is_unique[user.username]',
            'nama' => 'required',
            'password' => 'required|min_length[5]',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $userModel = new UserModel();

            $password=$this->request->getPost('username');
            $password_hash=password_hash($password, PASSWORD_BCRYPT);
            // Ambil data dari formulir
            $data = [
                'username' => $this->request->getPost('username'),
                'nama' => $this->request->getPost('nama'),
                'password' => $password_hash,
                'role' => 'admin'
            ];

            // Simpan data ke database
            $userModel->insert($data);

            return redirect()->to(base_url('login'))->with('success', 'Akun berhasil dibuat, silahkan login!');
        }else {
            // Validasi gagal, simpan pesan kesalahan.
            $errors = $validation->getErrors();
        
            // Kirim pesan kesalahan ke tampilan saat melakukan redirect.
            return view('register', ['errors' => $errors]);
        }
    }


}