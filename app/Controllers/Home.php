<?php

namespace App\Controllers;
use App\Models\NamaModel;

class Home extends BaseController
{
    public function index(): string
{
    $model = new NamaModel();
    $data = $model->findAll();

    // Mengonversi data menjadi string dan mengembalikan hasilnya
    $dataString = json_encode($data);
    return $dataString;
}

    public function tesdb(): string
    {
        $model = new NamaModel();
        $data = $model->findAll();
        return view('tesdb', ['data' => $data]);
    }

    public function simpanData()
    {
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $no_telfon = $this->request->getPost('no_telfon');

        // Validasi data jika diperlukan

       

        // Redirect ke halaman lain atau tampilkan pesan sukses
        // return redirect()->to(base_url('tesdb'))->with('success', 'Data berhasil disimpan.');

        // Validasi gambar jika diperlukan

        $gambar = $this->request->getFile('gambar');

        // Pastikan nama file unik
        $namaFile = $gambar->getRandomName();

        // Pindahkan file ke direktori penyimpanan (misalnya, writable/uploads)
        $gambar->move(ROOTPATH . 'public/uploads', $namaFile);

         // Simpan data ke database menggunakan model
         $model = new NamaModel();
         $data = [
             'nama' => $nama,
             'alamat' => $alamat,
             'no_telfon' => $no_telfon,
             'foto' => $namaFile
         ];
 
         $model->insert($data);

        // Tampilkan pesan sukses atau lakukan tindakan lain jika diperlukan
        return redirect()->to(base_url('tesdb'))->with('success', 'Gambar berhasil diunggah.');
    }

    public function tesdb2()
    {
        $model = new NamaModel();
        $data = $model->findAll();
        return view('tesdb', ['data' => $data]);
    }
}
