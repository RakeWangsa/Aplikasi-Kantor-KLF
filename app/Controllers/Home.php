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
 public function tes(): string
{
    return view('tes');
}

    public function tesdb()
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
    // $gambarNames = [];

    $gambarName = "";

    // Loop untuk mengunggah setiap file gambar
    foreach ($gambarFiles['gambar'] as $gambar) {
        // Pastikan ada file yang diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Pastikan nama file unik
            // $namaFile = base64_encode($gambar->getRandomName());

            $uuid = uniqid(); // Generate a unique ID
            $ekstensiAsli = pathinfo($gambar->getName(), PATHINFO_EXTENSION); // Dapatkan ekstensi asli dari nama file

            $namaFile = $uuid . '.' . $ekstensiAsli; // Gabungkan ID unik dan ekstensi asli untuk nama file


            // Pindahkan file ke direktori penyimpanan
            $gambar->move(ROOTPATH . 'public/uploads', $namaFile);

            // Simpan nama file ke array
            // $gambarNames[] = $namaFile;

            $gambarName .= $namaFile . ',';
        }
    }
    // Hapus koma tambahan pada akhir string
    $gambarName = rtrim($gambarName, ',');
    // Simpan data ke database menggunakan model
    $model = new NamaModel();

    // foreach ($gambarNames as $namaFile) {
    //     $data = [
    //         'nama' => $nama,
    //         'alamat' => $alamat,
    //         'no_telfon' => $no_telfon,
    //         'foto' => $namaFile
    //     ];

    //     $model->insert($data);
    // }

    $data = [
        'nama' => $nama,
        'alamat' => $alamat,
        'no_telfon' => $no_telfon,
        'foto' => $gambarName,
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
