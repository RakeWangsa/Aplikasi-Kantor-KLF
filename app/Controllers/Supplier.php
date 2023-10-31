<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
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


}
