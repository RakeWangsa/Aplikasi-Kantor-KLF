<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\PaymentTermsModel;

class Order extends BaseController
{
    public function index(): string
{
    $model = new OrderModel();
    $data = $model->findAll();

    // Mengurutkan data berdasarkan tahun, bulan dalam angka Romawi, dan nomor order
    usort($data, function ($a, $b) {
        // Pecah kode_order menjadi komponen
        $partsA = explode('/', $a['kode_order']);
        $partsB = explode('/', $b['kode_order']);

        // Bandingkan tahun terlebih dahulu
        $tahunA = intval($partsA[1]);
        $tahunB = intval($partsB[1]);
        if ($tahunA !== $tahunB) {
            return $tahunA - $tahunB;
        }

        // Bandingkan bulan (dalam angka Romawi) kedua
        $romawiBulanA = array_search($partsA[2], ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"]);
        $romawiBulanB = array_search($partsB[2], ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"]);
        if ($romawiBulanA !== $romawiBulanB) {
            return $romawiBulanA - $romawiBulanB;
        }

        // Bandingkan nomor order terakhir
        $angkaA = intval($partsA[3]);
        $angkaB = intval($partsB[3]);
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
    $bulanRomawi = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
    $awalanKode = "KLF/$tahun/" . $bulanRomawi[$bulan];
    $model = new OrderModel();
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
$kodeOrder = "KLF/$tahun/$bulanRomawi[$bulan]/$nomorOrder";


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

    $awalanKodeInvoice = "$namaDepan/$tahun/". $bulanRomawi[$bulan];
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
    
    $kodeInvoice = "$namaDepan/$tahun/$bulanRomawi[$bulan]/$nomorInvoice";




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
    // $model = new OrderModel();

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
    return redirect()->to(base_url('order/listOrder'))->with('success', 'Order berhasil ditambahkan.');
}

public function invoice()
{
    $encodedKodeOrder = $this->request->getGet('kode_order');
    $kodeOrder = base64_decode($encodedKodeOrder);

    $model = new OrderModel();
    $paymentTermsModel = new PaymentTermsModel();
    $data = $model->where('kode_order', $kodeOrder)->first();
    $termin = $paymentTermsModel->where('kode_order', $kodeOrder)->first();
    
    return view('invoice', ['data' => $data, 'termin' => $termin]);
}


    public function cetakInvoice(): string
    {
        return view('cetakInvoice');
    }

    public function payment(): string
    {
        $encodedKodeOrder = $this->request->getGet('kode_order');
        $kodeOrder = base64_decode($encodedKodeOrder);
        $model = new OrderModel();
        $data = $model->where('kode_order', $kodeOrder)->first();
        return view('payment', ['data' => $data]);
    }

    public function paymentTerms()
    {
        $encodedKodeOrder = $this->request->getGet('kode_order');
        $kodeOrder = base64_decode($encodedKodeOrder);
        $termin1 = $this->request->getPost('termin1');
        $termin2 = $this->request->getPost('termin2');
        $termin3 = $this->request->getPost('termin3');

        $model = new PaymentTermsModel();
        $data = $model->where('kode_order', $kodeOrder)->first();

        $data = [
            'kode_order' => $kodeOrder,
            'termin1' => $termin1,
            'termin2' => $termin2,
            'termin3' => $termin3,
        ];
    
        $model->insert($data);
        return redirect()->to(base_url('order/invoice/?kode_order=' . $encodedKodeOrder))->with('success', 'Order berhasil ditambahkan.');
    }

    public function editOrder($kodeOrder)
    {

        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();
        


        return view('editOrder', ['data' => $data]);

    }
    

}
