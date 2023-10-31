<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
use App\Models\SupplierModel;
use App\Models\KategoriProdukModel;
use App\Models\KategoriProdukDetailModel;

class KategoriProduk extends BaseController
{
    public function index()
{
    $KategoriModel = new KategoriProdukModel();
    $KategoriData = $KategoriModel->findAll();
    $DetailModel = new KategoriProdukDetailModel();
    $DetailData = $DetailModel->findAll();
    return view('kategoriProduk', ['KategoriData' => $KategoriData, 'DetailData' => $DetailData]);
}   

public function addKategori()
    {
        $model = new KategoriProdukModel();
        $kategori = $this->request->getPost('kategori');
        $data = [
            'kategori' => $kategori,        
        ];
        $model->insert($data);
        return redirect()->to(base_url('kategoriProduk'))->with('success', 'Kategori berhasil ditambahkan.');
    }
    public function addSupplier($kategori)
    {
        $model = new SupplierModel();
        $nama = $this->request->getPost('nama');
        $data = [
            'kategori' => $kategori, 
            'nama' => $nama       
        ];
        $model->insert($data);
        return redirect()->to(base_url('supplier'))->with('success', 'Supplier berhasil ditambahkan.');
    }

}
