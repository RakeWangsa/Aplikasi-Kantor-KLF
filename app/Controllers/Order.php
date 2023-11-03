<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\OrderProdukModel;
use App\Models\GambarProdukModel;
use App\Models\KategoriSupplierModel;
use App\Models\PaymentTermsModel;
use App\Models\SupplierModel;
use App\Models\KategoriProdukModel;
use App\Models\KategoriProdukDetailModel;
use App\Models\OrderProdukSupplierModel;
use App\Models\TaskCalendarModel;
use App\Models\OrderProdukDetailModel;
use App\Models\OrderProdukBiayaModel;
use App\Models\PaymentModel;

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
        $nama = $this->request->getPost('nama');
        if (is_array($nama)) {
            $nama = $nama[0]; 
        }
        $namaDepan = strtok($nama, " ");
    $no_telfon = $this->request->getPost('noTelfon');
    $email = $this->request->getPost('email');
    $alamat = $this->request->getPost('alamat');
    $tanggalOrder = $this->request->getPost('tanggalOrder');
    $deadlineOrder = $this->request->getPost('deadlineOrder');
    $ongkosKirim = $this->request->getPost('ongkosKirim');

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


    $data = [
        'kode_order' => $kodeOrder,
        'kode_invoice' => $kodeInvoice,
        'nama' => $nama,
        'no_telfon' => $no_telfon,
        'email' => $email,
        'alamat' => $alamat,
        'tanggalOrder' => $tanggalOrder,
        'deadline' => $deadlineOrder,
        'ongkir' => $ongkosKirim,
        'status' => 'Hold'
        
    ];

   

    $model->insert($data);

    return redirect()->to(base_url('order/listOrder'))->with('success', 'Order berhasil ditambahkan.');
    }


    public function detailOrder($kodeOrder)
    {

        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();

        $produkModel = new OrderProdukModel();
        $produkData = $produkModel->where('kode_order', $decodedKodeOrder)->findAll();

        $gambarModel = new GambarProdukModel();
        foreach ($produkData as &$produk) {
            $gambar = $gambarModel->where('id_order_produk', $produk['id_order_produk'])->first();
            $produk['gambar'] = $gambar ? $gambar['gambar'] : '';
        }
        


        return view('detailOrder', ['data' => $data, 'encodedKodeOrder' => $kodeOrder, 'kodeOrder' => $decodedKodeOrder, 'produkData' => $produkData]);

    }
    public function inputProduk($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $kategoriModel = new KategoriSupplierModel();
        $kategoriData = $kategoriModel->findAll();
        $supplierModel = new SupplierModel();
        $supplierData = $supplierModel->findAll();
        $kategoriProdukModel = new KategoriProdukModel();
        $kategoriProdukData = $kategoriProdukModel->findAll();
        $kategoriProdukDetailModel = new KategoriProdukDetailModel();
        $kategoriProdukDetailData = $kategoriProdukDetailModel->findAll();

        return view('inputOrderProduk', ['encodedKodeOrder' => $kodeOrder, 'kategoriData' => $kategoriData, 'supplierData' => $supplierData, 'kategoriProdukData' => $kategoriProdukData, 'kategoriProdukDetailData' => $kategoriProdukDetailData, 'kodeOrder' => $decodedKodeOrder]);
    }
    
    public function submitProduk($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $model = new OrderProdukModel();
        $semuaProduk = $model->select('id_order_produk')->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
        $jumlahProduk = count($semuaProduk);
        $id_produk = $jumlahProduk+1;
        $id_order_produk = $decodedKodeOrder .'/'. $id_produk;


        $namaProduk = $this->request->getPost('namaProduk');
        $gambarFiles = $this->request->getFiles();
    $kategori = $this->request->getPost('kategori');
    $harga = $this->request->getPost('harga');
    $quantity = $this->request->getPost('quantity');
    $discount = $this->request->getPost('discount');
    $deadline = $this->request->getPost('deadline');
    $catatan_khusus = $this->request->getPost('catatan_khusus');
    $jumlahDetail = $this->request->getPost('jumlahDetail');
    $jumlahSupplier = $this->request->getPost('jumlahSupplier');

    $gambarProdukModel = new GambarProdukModel();
    $gambarFiles['gambar'] = array_reverse($gambarFiles['gambar']);

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

            $dataGambar = [
                'id_order_produk' => $id_order_produk,
                'gambar' => $namaFile,
            ];
            $gambarProdukModel->insert($dataGambar);
        }
    }

    $total_harga=$harga*$quantity-$discount;



    $data = [
        'id_order_produk' => $id_order_produk,
        'kode_order' => $decodedKodeOrder,
        'nama' => $namaProduk,
        'harga' => $harga,
        'quantity' => $quantity,
        'total_harga' => $total_harga,
        'kategori' => $kategori,
        'discount' => $discount,
        'catatan_khusus' => $catatan_khusus,
        
    ];
    $model->insert($data);



    $OrderProdukDetailModel = new OrderProdukDetailModel();
    for ($i = 1; $i <= $jumlahDetail; $i++) {
        $detail = $this->request->getPost('detail'.$kategori.$i);
        $nilai = $this->request->getPost('nilai'.$kategori.$i);
    
        // Memeriksa apakah $detail tidak kosong
        if ($detail !== null && $detail !== '') {
            $detailData = [
                'id_order_produk' => $id_order_produk,
                'detail' => $detail,
                'nilai' => $nilai 
            ];
            $OrderProdukDetailModel->insert($detailData);
        }
    }
    


    $OrderProdukSupplierModel = new OrderProdukSupplierModel();
    $OrderProdukBiayaModel = new OrderProdukBiayaModel();

    for ($i = 1; $i <= $jumlahSupplier; $i++) {
        $kategori_supplier = $this->request->getPost('kategori'.$i);
        $nama_supplier = $this->request->getPost('nama_supplier'.$i);
        $jumlah_barang = $this->request->getPost('jumlah_barang'.$i);
        $harga_supplier = $this->request->getPost('harga'.$i);
        $detail_supplier= $nama_supplier.'-'.$kategori_supplier;
        $data = [
            'id_order_produk' => $id_order_produk,
            'kategori' => $kategori_supplier,
            'nama' => $nama_supplier,
            'jumlah_barang' => $jumlah_barang,
            'harga' => $harga_supplier,
        ];
        $biayaData = [
            'id_order_produk' => $id_order_produk,
            'detail' => $detail_supplier,
            'biaya' => $harga_supplier,
        ];
        $OrderProdukSupplierModel->insert($data);
        $OrderProdukBiayaModel->insert($biayaData);
    }

    $OrderProdukBiayaData = $OrderProdukBiayaModel->where('id_order_produk', $id_order_produk)->findAll();
    
    $totalBiaya = 0; // Menginisialisasi total biaya

    foreach ($OrderProdukBiayaData as $data) {
        $totalBiaya += $data['biaya']; // Menambahkan biaya ke totalBiaya
    }

    $data = [
        'total_biaya' => $totalBiaya,
    ];
    $model->update($id_order_produk, $data);




    $OrderModel = new OrderModel();
    // $nilaiOrder = $OrderModel->select('nilaiOrder')->find($decodedKodeOrder);
    // $totalNilaiOrder=$nilaiOrder['nilaiOrder']+$total_harga;

    $totalData = $model->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
    $totalHargaOrder = 0; // Menginisialisasi total harga
    $totalBiayaOrder = 0; // Menginisialisasi total biaya

    foreach ($totalData as $data) {
        $totalHargaOrder += $data['total_harga']; // Menambahkan biaya ke totalHargaOrder
        $totalBiayaOrder += $data['total_biaya']; // Menambahkan biaya ke totalBiayaOrder
    }

    $grossProfit=$totalHargaOrder-$totalBiayaOrder;


    $OrderData = [
        'nilaiOrder' => $totalHargaOrder,
        'total_biaya_order' => $totalBiayaOrder,
        'gross_profit' => $grossProfit
    ];
    $OrderModel->update($decodedKodeOrder, $OrderData);

    
    $TaskModel = new TaskCalendarModel();
    $gambarModel = new GambarProdukModel();
    $gambarTask = $gambarModel->where('id_order_produk', $id_order_produk)->first();
    $dataTask = [
        'parent' => $decodedKodeOrder,
        'task' => $namaProduk,
        'deadline' => $deadline,
        'gambar' => $gambarTask['gambar']
    ];
    $TaskModel->insert($dataTask);


    return redirect()->to(base_url('order/detailOrder/'.$kodeOrder))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function detailProduk($idOrderProduk)
    {

        $decodedidOrderProduk = base64_decode($idOrderProduk);

        $OrderProdukModel = new OrderProdukModel();
        $OrderProdukData = $OrderProdukModel->where('id_order_produk', $decodedidOrderProduk)->first();

        $GambarProdukModel = new GambarProdukModel();
        $GambarProdukData = $GambarProdukModel->where('id_order_produk', $decodedidOrderProduk)->findAll();

        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
        $OrderProdukSupplierData = $OrderProdukSupplierModel->where('id_order_produk', $decodedidOrderProduk)->findAll();

        $OrderProdukDetailModel = new OrderProdukDetailModel();
        $OrderProdukDetailData = $OrderProdukDetailModel->where('id_order_produk', $decodedidOrderProduk)->findAll();

        $OrderProdukBiayaModel = new OrderProdukBiayaModel();
        $OrderProdukBiayaData = $OrderProdukBiayaModel->where('id_order_produk', $decodedidOrderProduk)->findAll();

        // $kodeOrder=$OrderProdukData['kode_order'];



        return view('detailProduk', ['OrderProdukData' => $OrderProdukData, 
                                    'SupplierData' => $OrderProdukSupplierData, 
                                    'GambarProdukData' => $GambarProdukData,
                                    'OrderProdukDetailData' => $OrderProdukDetailData,
                                    'OrderProdukBiayaData' => $OrderProdukBiayaData
                                    // 'kodeOrder' => $kodeOrder
                                ]);

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

    public function payment($kodeOrder): string
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();
        $PaymentModel = new PaymentModel();
        $PaymentData = $PaymentModel->where('kode_order', $decodedKodeOrder)->findAll();
        return view('payment', ['data' => $data,'PaymentData' => $PaymentData]);
    }

    public function inputPayment($kodeOrder): string
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();
        $PaymentModel = new PaymentModel();
        $PaymentData = $PaymentModel->where('kode_order', $decodedKodeOrder)->findAll();
        return view('inputPayment', ['data' => $data,'PaymentData' => $PaymentData]);
    }

    public function submitPayment($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);

        $customer = $this->request->getPost('customer');
        $tanggal = $this->request->getPost('tanggal');
        $jumlahPayment = $this->request->getPost('jumlahPayment');
        $buktiPayment = $this->request->getPost('buktiPayment');

        $gambarFiles = $this->request->getFiles();

        $orderModel = new OrderModel();
        $model = new PaymentModel();

        

    foreach ($gambarFiles['buktiPayment'] as $gambar) {
        // Pastikan ada file yang diunggah
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Pastikan nama file unik
            // $namaFile = base64_encode($gambar->getRandomName());

            $uuid = uniqid(); // Generate a unique ID
            $ekstensiAsli = pathinfo($gambar->getName(), PATHINFO_EXTENSION); // Dapatkan ekstensi asli dari nama file

            $namaFile = $uuid . '.' . $ekstensiAsli; // Gabungkan ID unik dan ekstensi asli untuk nama file


            // Pindahkan file ke direktori penyimpanan
            $gambar->move(ROOTPATH . 'public/uploads', $namaFile);

            $data = [
                'kode_order' => $decodedKodeOrder,
                'nama' => $customer,
                'tanggal' => $tanggal,
                'jumlah_payment' => $jumlahPayment,
                'bukti_payment' => $namaFile,
            ];
            $model->insert($data);
        }
    }

    $totalDpMasuk = 0;
    $PaymentData = $model->where('kode_order', $decodedKodeOrder)->findAll();
    foreach ($PaymentData as $dp) {
        $totalDpMasuk += $dp['jumlah_payment'];
    }

    $nilaiOrder = $orderModel->where('kode_order', $decodedKodeOrder)->first();
    $grandTotal = $nilaiOrder['nilaiOrder']-$totalDpMasuk;
    $orderData= [
        'dp_masuk' => $totalDpMasuk,
        'grand_total' => $grandTotal,
    ];
    $orderModel->update($decodedKodeOrder, $orderData);

        return redirect()->to(base_url('order/payment/' . $kodeOrder))->with('success', 'Payment berhasil ditambahkan.');
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
