<?php

namespace App\Controllers;
use App\Models\katalogProdukModel;

class KatalogProduk extends BaseController
{
        public function index()
    {
        return view('katalogProduk', ['title' => 'Katalog Produk', 'active' => 'Katalog Produk']);
    }   
    public function addProduk()
    {
        $model = new katalogProdukModel();
        $nama = $this->request->getPost('nama');
        $gambar = $this->request->getPost('gambar');
        $jenis = $this->request->getPost('jenis');
        $sku = $this->request->getPost('sku');
        $dimensi = $this->request->getPost('dimensi');
        $harga = $this->request->getPost('harga');
        $spesifikasi = $this->request->getPost('spesifikasi');


        $gambarFiles = $this->request->getFiles();

        
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
            }
        }

        $data = [
            'nama' => $nama,      
            'gambar' => $namaFile,    
            'jenis' => $jenis,  
            'sku' => $sku,  
            'dimensi' => $dimensi,  
            'harga' => $harga,  
            'spesifikasi' => $spesifikasi,  
        ];
        $model->insert($data);
        return redirect()->to(base_url('katalogProduk'))->with('success', 'Produk berhasil ditambahkan.');
    }
}
