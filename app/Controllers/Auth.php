<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
{
    if (session('id_user')) {
        return redirect()->to(site_url('dashboard'));
    }
    return view('login');
}   
public function register(): string
{
    return view('register');
}  
public function login()
{
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Cari pengguna dengan username yang sesuai
    $userModel = new UserModel();
    $user = $userModel->where('username', $username)->first();

    if ($user && password_verify($password, $user['password'])) {
        // Kredensial benar, berhasil login
        // Di sini Anda dapat mengatur sesi atau pengalihan ke halaman lain
        // Contoh mengatur sesi:
        session()->set('id_user', $user['id']);
        session()->set('username', $user['username']);
        session()->set('name', $user['nama']);

        return redirect()->to(base_url('dashboard'));
    } else {
        // Kredensial salah, login gagal
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

            $password=$this->request->getPost('password');
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
    public function logout()
    {
        // Hapus semua data sesi
        session()->destroy();
    
        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect()->to(base_url('login'));
    }
    

}