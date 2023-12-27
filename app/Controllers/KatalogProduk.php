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
        $data = [
            'nama' => $nama,      
            'gambar' => $gambar,    
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
