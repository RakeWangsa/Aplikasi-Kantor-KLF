<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
use App\Models\OrderProdukModel;
use App\Models\OrderProdukSupplierModel;
use App\Models\SupplierModel;
use App\Models\PaymentSupplierModel;

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
            // $supplier['kode_order'] = $produk ? $produk['kode_order'] : '';
        }

        $PaymentSupplierModel = new PaymentSupplierModel();
        $PaymentSupplierData = $PaymentSupplierModel->where('id_supplier', $decodedId)->findAll();
    
        return view('supplierInfo', ['OrderProdukSupplierData' => $OrderProdukSupplierData, 'SupplierData' => $SupplierData, 'PaymentSupplierData' => $PaymentSupplierData, 'encodedId' => $id]);
    }
    
    public function addPayment($id)
    {
        $decodedId = base64_decode($id);
        $model = new PaymentSupplierModel();
        $tanggal = $this->request->getPost('tanggal');
        $jumlahPayment = $this->request->getPost('jumlahPayment');
        $gambarFiles = $this->request->getFiles();

        
        // dd($tanggal);
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
            'id_supplier' => $decodedId,
            'tanggal' => $tanggal,
            'jumlah_payment' => $jumlahPayment,
            'bukti_payment' => $namaFile,   
        ];
        $model->insert($data);
        return redirect()->to(base_url('supplier/info/'.$id))->with('success', 'Payment berhasil ditambahkan.');
    }

}
