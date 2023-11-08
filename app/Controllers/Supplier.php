<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
use App\Models\OrderProdukModel;
use App\Models\OrderProdukSupplierModel;
use App\Models\SupplierModel;

class Supplier extends BaseController
{
    public function index()
{
    $KategoriModel = new KategoriSupplierModel();
    $KategoriData = $KategoriModel->findAll();
    $SupplierModel = new SupplierModel();
    $SupplierData = $SupplierModel->findAll();
    return view('supplier', ['KategoriData' => $KategoriData, 'SupplierData' => $SupplierData]);
}   

public function addKategori()
    {
        $model = new KategoriSupplierModel();
        $kategori = $this->request->getPost('kategori');
        $data = [
            'kategori' => $kategori,        
        ];
        $model->insert($data);
        return redirect()->to(base_url('supplier'))->with('success', 'Kategori berhasil ditambahkan.');
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

    public function info($id)
    {
        $decodedId = base64_decode($id);
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
        $OrderProdukSupplierData = $OrderProdukSupplierModel->where('id_supplier', $decodedId)->findAll();
    
        $SupplierModel = new SupplierModel();
        $SupplierData = $SupplierModel->find($decodedId);

        $OrderProdukModel = new OrderProdukModel();
    
        foreach ($OrderProdukSupplierData as &$supplier) {
            $produk = $OrderProdukModel->where('id_order_produk', $supplier['id_order_produk'])->first();
            $supplier['nama_produk'] = $produk ? $produk['nama'] : '';
        }
    
        return view('supplierInfo', ['OrderProdukSupplierData' => $OrderProdukSupplierData, 'SupplierData' => $SupplierData]);
    }
    

}
