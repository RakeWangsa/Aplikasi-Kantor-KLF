<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
use App\Models\OrderProdukModel;
use App\Models\OrderProdukSupplierModel;
use App\Models\SupplierModel;
use App\Models\PaymentSupplierModel;
use App\Models\TaskCalendarModel;
use App\Models\GambarProdukModel;

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

        $GambarProdukModel = new GambarProdukModel();
        $TaskCalendarModel = new TaskCalendarModel();
        $OrderProdukModel = new OrderProdukModel();

        $PaymentSupplierModel = new PaymentSupplierModel();
        $PaymentSupplierData = $PaymentSupplierModel->where('id_supplier', $decodedId)->findAll();
    
        $totalTagihan=0;
        foreach($OrderProdukSupplierData as $supplier){
            $totalTagihan+=$supplier['total_harga'];
        }
        foreach($PaymentSupplierData as $supplier){
            $totalTagihan-=$supplier['jumlah_payment'];
        }
    
        foreach ($OrderProdukSupplierData as &$supplier) {
            $produk = $OrderProdukModel->where('id_order_produk', $supplier['id_order_produk'])->first();
            $task = $TaskCalendarModel->where('parent', $produk['kode_order'])->where('task', $produk['nama'])->first();
            $gambar = $GambarProdukModel->where('id_order_produk', $supplier['id_order_produk'])->first();
            $supplier['nama_produk'] = $produk ? $produk['nama'] : '';
            $supplier['kode_order'] = $produk ? $produk['kode_order'] : '';
            $supplier['status'] = $task ? $task['status'] : '';
            $supplier['gambar'] = $gambar ? $gambar['gambar'] : '';
            // $supplier['kode_order'] = $produk ? $produk['kode_order'] : '';
        }



        return view('supplierInfo', [
            'OrderProdukSupplierData' => $OrderProdukSupplierData, 
            'SupplierData' => $SupplierData,
            'PaymentSupplierData' => $PaymentSupplierData,
            'encodedId' => $id,
            'totalTagihan' => $totalTagihan
        ]);
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
