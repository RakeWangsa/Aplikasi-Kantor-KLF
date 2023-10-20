<?php

namespace App\Controllers;
use App\Models\ListOrderModel;

class ListOrder extends BaseController
{
    public function index(): string
    {
        $model = new ListOrderModel();
        $data = $model->findAll();

        // Mengurutkan data berdasarkan angka terakhir dalam kode_order
    usort($data, function ($a, $b) {
        $angkaA = intval(substr($a['kode_order'], strrpos($a['kode_order'], '/') + 1));
        $angkaB = intval(substr($b['kode_order'], strrpos($b['kode_order'], '/') + 1));
        return $angkaA - $angkaB;
    });
        return view('listOrder', ['data' => $data]);
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
    $semuaKodeOrder = $model->select('kode_order')->like('kode_order', $awalanKode, 'after')->findAll();

if ($semuaKodeOrder) {
    // Membuat array asosiatif yang menghubungkan kode_order dengan nilai numerik
    $dataNumerik = [];
    foreach ($semuaKodeOrder as $data) {
        $kode_order = $data['kode_order'];
        $dataNumerik[$kode_order] = intval(substr($kode_order, strrpos($kode_order, '/') + 1));
    }

    // Mengurutkan array asosiatif berdasarkan nilai numerik dalam urutan menurun
    arsort($dataNumerik);

    // Mengambil kode_order pertama (teratas) setelah pengurutan
    $orderTerakhir = key($dataNumerik);

    // Mengekstrak nomor order terakhir
    $nomorOrderTerakhir = intval(substr($orderTerakhir, strrpos($orderTerakhir, '/') + 1));
    
    // Menambahkan 1 untuk mendapatkan nomor order berikutnya
    $nomorOrder = $nomorOrderTerakhir + 1;
} else {
    $nomorOrder = 1;
}
$kodeOrder = "KLF/$tahun/$bulan/$nomorOrder";


    // $awalanKodeInvoice = "$namaDepan/$tahun/$bulan";
    // $invoiceTerakhir = $model->select('kode_invoice')
    // ->like('kode_invoice', $awalanKodeInvoice, 'after')
    // ->orderBy('kode_invoice', 'DESC')
    // ->first();
    
    // if ($invoiceTerakhir) {
    //     $parts = explode('/', $invoiceTerakhir['kode_invoice']);
    //     $nomorInvoiceTerakhir = end($parts);
    //     $nomorInvoice = intval($nomorInvoiceTerakhir) + 1 ;
    // }else{
    //     $nomorInvoice = 1 ;
    // }

    $awalanKodeInvoice = "$namaDepan/$tahun/$bulan";
    $semuaKodeInvoice = $model->select('kode_invoice')->like('kode_invoice', $awalanKodeInvoice, 'after')->findAll();

if ($semuaKodeInvoice) {
    // Membuat array asosiatif yang menghubungkan kode_order dengan nilai numerik
    $dataNumerik = [];
    foreach ($semuaKodeInvoice as $data) {
        $kode_invoice = $data['kode_invoice'];
        $dataNumerik[$kode_invoice] = intval(substr($kode_invoice, strrpos($kode_invoice, '/') + 1));
    }

    // Mengurutkan array asosiatif berdasarkan nilai numerik dalam urutan menurun
    arsort($dataNumerik);

    // Mengambil kode_order pertama (teratas) setelah pengurutan
    $invoiceTerakhir = key($dataNumerik);

    // Mengekstrak nomor order terakhir
    $nomorInvoiceTerakhir = intval(substr($invoiceTerakhir, strrpos($invoiceTerakhir, '/') + 1));
    
    // Menambahkan 1 untuk mendapatkan nomor order berikutnya
    $nomorInvoice = $nomorInvoiceTerakhir + 1;
} else {
    $nomorInvoice = 1;
}

    // Membuat format kode order
    
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

public function invoice(): string
    {
        return view('invoice');
    }

}
