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
    public function addDetail($kategori)
    {
        $model = new KategoriProdukDetailModel();
        $jumlah = $this->request->getPost('jumlah');
        for ($i = 1; $i <= $jumlah; $i++) {
            $detail = $this->request->getPost('detail'.$i);
            $data = [
                'kategori' => $kategori, 
                'detail' => $detail     
            ];
            $model->insert($data);
        }
        
        return redirect()->to(base_url('kategoriProduk'))->with('success', 'Supplier berhasil ditambahkan.');
    }
    public function deleteKategori()
    {
        // Mendapatkan ID subtask yang akan dihapus dari URL atau input lainnya
        $kategori = $this->request->getGet('kategori');
    
        // Menghapus data subtask berdasarkan ID
        $kategoriProdukModel = new KategoriProdukModel();
        $kategoriProdukDetailModel = new KategoriProdukDetailModel();

        $kategoriProdukModel->where('kategori', $kategori)->delete();
        $kategoriProdukDetailModel->where('kategori', $kategori)->delete();
    
        return redirect()->to(base_url('kategoriProduk'))->with('success', 'Kategori produk berhasil dihapus.');
    }

}
