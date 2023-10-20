<?php

namespace App\Controllers;
use App\Models\ListOrderModel;

class ListOrder extends BaseController
{
    public function index(): string
    {
        return view('listOrder');
    }
    public function inputOrder(): string
    {
        return view('inputOrder');
    }
    
    public function simpanData()
{
    


    // Ambil data dari form
    $nama = $this->request->getPost('nama');
    $namaDepan = strtok($nama, " ");
    $no_telfon = $this->request->getPost('noTelfon');
    $alamat = $this->request->getPost('alamat');
    // $detailProdukGambar = $this->request->getPost('gambar');
    $detailProdukKategori = $this->request->getPost('detailProdukKategori');
    $detailProdukHarga = $this->request->getPost('detailProdukHarga');
    $detailProdukDeadline = $this->request->getPost('detailProdukDeadline');
    $detailProdukCatatan = $this->request->getPost('detailProdukCatatan');
    $ongkosKirim = $this->request->getPost('ongkosKirim');
    $discount = $this->request->getPost('discount');
    $grandTotal = $this->request->getPost('grandTotal');
    $kategoriSupplier = $this->request->getPost('kategoriSupplier');
    $namaSupplier = $this->request->getPost('namaSupplier');
    $jumlahBarang = $this->request->getPost('jumlahBarang');
    $supplierHarga = $this->request->getPost('supplierHarga');



    $tahun = date('y');
    $bulan = date('m');
    $awalanKode = "KLF/$tahun/$bulan";
    $model = new ListOrderModel();
    $orderTerakhir = $model->select('kode_order')
    ->like('kode_order', $awalanKode, 'after')
    ->orderBy('kode_order', 'DESC')
    ->first();

    if ($orderTerakhir) {
        $parts = explode('/', $orderTerakhir['kode_order']);
        $nomorOrderTerakhir = end($parts);
        $nomorOrder = $nomorOrderTerakhir+1 ;
    }else{
        $nomorOrder = 1 ;
    }


    $awalanKodeInvoice = "$namaDepan/$tahun/$bulan";
    $invoiceTerakhir = $model->select('kode_invoice')
    ->like('invoice', $awalanKode, 'after')
    ->orderBy('kode_invoice', 'DESC')
    ->first();
    
    if ($invoiceTerakhir) {
        $parts = explode('/', $orderTerakhir['kode_order']);
        $nomorInvoiceTerakhir = end($parts);
        $nomorInvoice = $nomorInvoiceTerakhir+1 ;
    }else{
        $nomorInvoice = 1 ;
    }

    // Membuat format kode order
    $kodeOrder = "KLF/$tahun/$bulan/$nomorOrder";
    $kodeInvoice = "$namaDepan/$tahun/$bulan/$nomorInvoice";




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
    // $model = new ListOrderModel();

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
        'kode_order' => $kodeOrder,
        'kode_invoice' => $kodeInvoice,
        'nama' => $nama,
        'no_telfon' => $no_telfon,
        'alamat' => $alamat,
        'gambar' => $gambarName,
        'kategori_produk' => $detailProdukKategori,
        'harga_produk' => $detailProdukHarga,
        'deadline' => $detailProdukDeadline,
        'catatan_khusus' => $detailProdukCatatan,
        'ongkir' => $ongkosKirim,
        'discount' => $discount,
        'grand_total' => $grandTotal,
        'kategori_supplier' => $kategoriSupplier,
        'nama_supplier' => $namaSupplier,
        'jumlah_barang' => $jumlahBarang,
        'harga_supplier' => $supplierHarga,
        
    ];

   

    $model->insert($data);

    // Tampilkan pesan sukses atau lakukan tindakan lain jika diperlukan
    return redirect()->to(base_url('listOrder'))->with('success', 'Order berhasil ditambahkan.');
}

}
