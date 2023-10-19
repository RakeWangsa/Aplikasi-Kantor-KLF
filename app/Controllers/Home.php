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

    // Ambil file gambar
    $gambarFiles = $this->request->getFiles();

    // Buat direktori penyimpanan jika tidak ada
    // $targetDir = WRITEPATH . 'uploads/';

    // if (!is_dir($targetDir)) {
    //     mkdir($targetDir, 0777, true);
    // }

    // Simpan nama-nama file yang diunggah
    $gambarNames = [];

    // Loop untuk mengunggah setiap file gambar
    foreach ($gambarFiles['gambar'] as $gambar) {
        // Pastikan ada file yang diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Pastikan nama file unik
            $namaFile = $gambar->getRandomName();

            // Pindahkan file ke direktori penyimpanan
            $gambar->move(ROOTPATH . 'public/uploads', $namaFile);

            // Simpan nama file ke array
            $gambarNames[] = $namaFile;
        }
    }

    // Simpan data ke database menggunakan model
    $model = new NamaModel();

    foreach ($gambarNames as $namaFile) {
        $data = [
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telfon' => $no_telfon,
            'foto' => $namaFile
        ];

        $model->insert($data);
    }

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
