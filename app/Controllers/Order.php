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
use App\Models\OrderBiayaModel;
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

    $jumlah=count($semuaKodeOrder);

$nomorOrder = $jumlah + 1;

if($nomorOrder<10){
    $nomorOrder = "0".$nomorOrder;
}

} else {
    $nomorOrder = "01";
}
$kodeOrder = "KLF/$tahun/$bulanRomawi[$bulan]/$nomorOrder";



    $awalanKodeInvoice = "$namaDepan/$tahun/". $bulanRomawi[$bulan];
    $semuaKodeInvoice = $model->select('kode_invoice')->like('kode_invoice', $awalanKodeInvoice, 'after')->findAll();

if ($semuaKodeInvoice) {
    $jumlah=count($semuaKodeInvoice);

$nomorInvoice = $jumlah + 1;

if($nomorInvoice<10){
    $nomorInvoice = "0".$nomorInvoice;
}
} else {
    $nomorInvoice = "01";
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
        'status' => 'Hold',
        'status_task' => 'Belum Dikerjakan'
        
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

    $total_harga=$harga*$quantity;



    $data = [
        'id_order_produk' => $id_order_produk,
        'kode_order' => $decodedKodeOrder,
        'nama' => $namaProduk,
        'harga' => $harga,
        'quantity' => $quantity,
        'total_harga' => $total_harga,
        'kategori' => $kategori,
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
    $SupplierModel = new SupplierModel();

    $totalBiaya = 0;
    for ($i = 1; $i <= $jumlahSupplier; $i++) {
        $kategori_supplier = $this->request->getPost('kategori'.$i);
        $nama_supplier = $this->request->getPost('nama_supplier'.$i);
        $jumlah_barang = $this->request->getPost('jumlah_barang'.$i);
        $harga_supplier = $this->request->getPost('harga'.$i);

        $supplier = $SupplierModel->where('kategori', $kategori_supplier)->where('nama', $nama_supplier)->first();

        $total_harga_supplier=$harga_supplier*$jumlah_barang;
        $totalBiaya += $total_harga_supplier;
        $data = [
            'id_order_produk' => $id_order_produk,
            'id_supplier' => $supplier['id'],
            'kategori' => $kategori_supplier,
            'nama' => $nama_supplier,
            'jumlah_barang' => $jumlah_barang,
            'harga' => $harga_supplier,
            'total_harga' => $total_harga_supplier
        ];

        $OrderProdukSupplierModel->insert($data);

    }


    $data = [
        'total_biaya' => $totalBiaya,
    ];
    $model->update($id_order_produk, $data);




    $OrderModel = new OrderModel();
    $dpMasuk = $OrderModel->select('dp_masuk')->find($decodedKodeOrder);
    // $totalNilaiOrder=$nilaiOrder['nilaiOrder']+$total_harga;

    $totalData = $model->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
    $totalHargaOrder = 0; // Menginisialisasi total harga
    $totalBiayaOrder = 0; // Menginisialisasi total biaya

    foreach ($totalData as $data) {
        $totalHargaOrder += $data['total_harga']; // Menambahkan biaya ke totalHargaOrder
        $totalBiayaOrder += $data['total_biaya']; // Menambahkan biaya ke totalBiayaOrder
    }

    $grossProfit=$totalHargaOrder-$totalBiayaOrder;
    $grandTotal=$totalHargaOrder-$dpMasuk['dp_masuk'];

    $OrderData = [
        'nilaiOrder' => $totalHargaOrder,
        'total_biaya_order' => $totalBiayaOrder,
        'gross_profit' => $grossProfit,
        'grand_total' => $grandTotal,
    ];
    $OrderModel->update($decodedKodeOrder, $OrderData);

    
    $TaskModel = new TaskCalendarModel();
    $gambarModel = new GambarProdukModel();
    $gambarTask = $gambarModel->where('id_order_produk', $id_order_produk)->first();
    $dataTask = [
        'parent' => $decodedKodeOrder,
        'task' => $namaProduk,
        'deadline' => $deadline,
        'gambar' => $gambarTask['gambar'],
        'status' => 'Belum Dikerjakan'
    ];
    $TaskModel->insert($dataTask);

    $lastTask = $TaskModel->orderBy('id', 'DESC')->first();
    $data = [
        'id_task' => $lastTask['id'],
    ];
    $model->update($id_order_produk, $data);


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

        // $OrderProdukBiayaModel = new OrderProdukBiayaModel();
        // $OrderProdukBiayaData = $OrderProdukBiayaModel->where('id_order_produk', $decodedidOrderProduk)->findAll();

        // $kodeOrder=$OrderProdukData['kode_order'];



        return view('detailProduk', ['OrderProdukData' => $OrderProdukData, 
                                    'SupplierData' => $OrderProdukSupplierData, 
                                    'GambarProdukData' => $GambarProdukData,
                                    'OrderProdukDetailData' => $OrderProdukDetailData,
                                    // 'OrderProdukBiayaData' => $OrderProdukBiayaData
                                    // 'kodeOrder' => $kodeOrder
                                ]);

    }


public function invoice($kodeOrder)
{
    $decodedKodeOrder = base64_decode($kodeOrder);

    $model = new OrderModel();
    $OrderProdukModel = new OrderProdukModel();
    $OrderProdukDetailModel = new OrderProdukDetailModel();
    $paymentTermsModel = new PaymentTermsModel();
    $data = $model->where('kode_order', $decodedKodeOrder)->first();
    $termin = $paymentTermsModel->where('kode_order', $decodedKodeOrder)->first();
    $OrderProdukData = $OrderProdukModel->where('kode_order', $decodedKodeOrder)->findAll();
    $OrderProdukDetailData = $OrderProdukDetailModel->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
    $gambarModel = new GambarProdukModel();
    foreach ($OrderProdukData as &$produk) {
        $gambar = $gambarModel->where('id_order_produk', $produk['id_order_produk'])->first();
        $produk['gambar'] = $gambar ? $gambar['gambar'] : '';
    }
    $totalQuantity = 0;

    foreach ($OrderProdukData as $orderProduk) {
        $totalQuantity += $orderProduk['quantity'];
    }

    $PaymentModel = new PaymentModel();
    $PaymentData = $PaymentModel->findAll();
    
    return view('invoice', ['data' => $data, 'termin' => $termin, 'OrderProdukData' => $OrderProdukData, 'OrderProdukDetailData' => $OrderProdukDetailData, 'totalQuantity' => $totalQuantity, 'PaymentData' => $PaymentData]);
}


    public function cetakInvoice($kodeOrder): string
    {
        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new OrderModel();
        $OrderProdukModel = new OrderProdukModel();
        $OrderProdukDetailModel = new OrderProdukDetailModel();
        $paymentTermsModel = new PaymentTermsModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();
        $termin = $paymentTermsModel->where('kode_order', $decodedKodeOrder)->first();
        $OrderProdukData = $OrderProdukModel->where('kode_order', $decodedKodeOrder)->findAll();
        $OrderProdukDetailData = $OrderProdukDetailModel->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
        $gambarModel = new GambarProdukModel();
        foreach ($OrderProdukData as &$produk) {
            $gambar = $gambarModel->where('id_order_produk', $produk['id_order_produk'])->first();
            $produk['gambar'] = $gambar ? $gambar['gambar'] : '';
        }
        $totalQuantity = 0;
    
        foreach ($OrderProdukData as $orderProduk) {
            $totalQuantity += $orderProduk['quantity'];
        }
    
        $PaymentModel = new PaymentModel();
        $PaymentData = $PaymentModel->findAll();
        return view('cetakInvoice', ['data' => $data, 'termin' => $termin, 'OrderProdukData' => $OrderProdukData, 'OrderProdukDetailData' => $OrderProdukDetailData, 'totalQuantity' => $totalQuantity, 'PaymentData' => $PaymentData]);
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

    public function updateStatus($kodeOrder)
    {
        $status = $this->request->getGet('status');
        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new orderModel();

        $data = [
            'status' => $status,
        ];
    
        $model->update($decodedKodeOrder, $data);
        return redirect()->to(base_url('order/listOrder'))->with('success', 'Status berhasil diupdate.');
    }

    public function paymentTerms($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $termin1 = $this->request->getPost('termin1');
        $termin2 = $this->request->getPost('termin2');
        $termin3 = $this->request->getPost('termin3');

        $model = new PaymentTermsModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();

        $data = [
            'kode_order' => $decodedKodeOrder,
            'termin1' => $termin1,
            'termin2' => $termin2,
            'termin3' => $termin3,
        ];
    
        $model->insert($data);
        return redirect()->to(base_url('order/invoice/' . $kodeOrder))->with('success', 'Order berhasil ditambahkan.');
    }


    
    public function inputDiscount($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $model = new OrderModel();
        $discount = $this->request->getPost('discount');
        $data = [
            'discount' => $discount,
        ];
        $model->update($decodedKodeOrder, $data);

        $this->updateData($kodeOrder);
        return redirect()->to(base_url('order/detailOrder/'.$kodeOrder))->with('success', 'Discount berhasil ditambahkan.');
    }

    public function biaya($kodeOrder)
    {

        $decodedKodeOrder = base64_decode($kodeOrder);

        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->where('kode_order', $decodedKodeOrder)->first();
        $OrderBiayaModel = new OrderBiayaModel();
        $OrderBiayaData = $OrderBiayaModel->where('kode_order', $decodedKodeOrder)->findAll();
        $OrderProdukModel = new OrderProdukModel();
        $OrderProdukData = $OrderProdukModel->where('kode_order', $decodedKodeOrder)->findAll();
        
        return view('detailBiaya', ['OrderData' => $OrderData,'OrderBiayaData' => $OrderBiayaData, 'OrderProdukData' => $OrderProdukData]);

    }

    public function inputPengeluaran($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $OrderBiayaModel = new OrderBiayaModel();
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->where('kode_order', $decodedKodeOrder)->first();
        $detail = $this->request->getPost('detail');
        $biaya = $this->request->getPost('biaya');
        $data = [
            'kode_order' => $decodedKodeOrder,
            'detail' => $detail,
            'biaya' => $biaya
        ];
        $OrderBiayaModel->insert($data);

        $total_biaya_order = $OrderData['total_biaya_order']+$biaya;
        $data2 = [
            'total_biaya_order' => $total_biaya_order,
        ];
        $OrderModel->update($decodedKodeOrder, $data2);
        $this->updateData($kodeOrder);
        return redirect()->to(base_url('order/detailOrder/biaya/'.$kodeOrder))->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    private function updateData($kodeOrder)
    {
        $decodedKodeOrder = base64_decode($kodeOrder);
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->where('kode_order', $decodedKodeOrder)->first();
        $grossProfit = $OrderData['nilaiOrder']-$OrderData['discount']-$OrderData['total_biaya_order'];
        $grandTotal = $OrderData['nilaiOrder']-$OrderData['discount']-$OrderData['dp_masuk'];
        $data = [
            'gross_profit' => $grossProfit,
            'grand_total' => $grandTotal,
        ];
        $OrderModel->update($decodedKodeOrder, $data);
    }

    public function cetakLabel($kodeOrder)
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
        


        return view('label', ['data' => $data, 'encodedKodeOrder' => $kodeOrder, 'kodeOrder' => $decodedKodeOrder, 'produkData' => $produkData]);

    }
    public function printLabel($kodeOrder)
    {

        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();

        $gambarModel = new GambarProdukModel();
        $gambarData = $gambarModel->findAll();

        $produkModel = new OrderProdukModel();
        $produkData = $produkModel->where('kode_order', $decodedKodeOrder)->findAll();

        $i=1;
        foreach($produkData as &$produk){
            $kode = $this->request->getPost('kode'.$i);
            $jumlah = $this->request->getPost('input'.$i);

            if($produk['id_order_produk']==$kode){
                $order = $model->where('kode_order', $produk['kode_order'])->first();
                $produk['jumlah_cetak'] = $jumlah ? $jumlah : '';
                $produk['customer'] = $order ? $order['nama'] : '';
                $produk['no_telfon'] = $order ? $order['no_telfon'] : '';
                $produk['alamat'] = $order ? $order['alamat'] : '';
            }else{
                $produk['jumlah_cetak'] = '';
            }
            $i++;
        }
        


        return view('cetakLabel', ['data' => $data, 'encodedKodeOrder' => $kodeOrder, 'kodeOrder' => $decodedKodeOrder, 'produkData' => $produkData, 'gambarData' => $gambarData]);

    }

    public function editOrder($kodeOrder)
    {

        $decodedKodeOrder = base64_decode($kodeOrder);

        $model = new OrderModel();
        $data = $model->where('kode_order', $decodedKodeOrder)->first();
        


        return view('editOrder', ['data' => $data]);

    }

    public function editOrderSubmit($kodeOrder)
    {
    $decodedKodeOrder = base64_decode($kodeOrder);
    $nama = $this->request->getPost('nama');
    $no_telfon = $this->request->getPost('noTelfon');
    $email = $this->request->getPost('email');
    $alamat = $this->request->getPost('alamat');
    $tanggalOrder = $this->request->getPost('tanggalOrder');
    $deadlineOrder = $this->request->getPost('deadlineOrder');
    $ongkosKirim = $this->request->getPost('ongkosKirim');
    $model = new OrderModel();

    $data = [
        'nama' => $nama,
        'no_telfon' => $no_telfon,
        'email' => $email,
        'alamat' => $alamat,
        'tanggalOrder' => $tanggalOrder,
        'deadline' => $deadlineOrder,
        'ongkir' => $ongkosKirim,
    ];

   
    $model->update($decodedKodeOrder, $data);

    return redirect()->to(base_url('order/listOrder'))->with('success', 'Order berhasil ditambahkan.');
    }

    public function editProduk($kode)
    {
        $decodedKode = base64_decode($kode);
        $OrderProdukModel = new OrderProdukModel();
        $OrderProdukData = $OrderProdukModel->find($decodedKode);
        $kategoriModel = new KategoriSupplierModel();
        $kategoriData = $kategoriModel->findAll();
        $supplierModel = new SupplierModel();
        $supplierData = $supplierModel->findAll();
        $kategoriProdukModel = new KategoriProdukModel();
        $kategoriProdukData = $kategoriProdukModel->findAll();
        $kategoriProdukDetailModel = new KategoriProdukDetailModel();
        $kategoriProdukDetailData = $kategoriProdukDetailModel->findAll();
        $OrderProdukDetailModel = new OrderProdukDetailModel();


        $TaskCalendarModel = new TaskCalendarModel();
        $task = $TaskCalendarModel->where('id', $OrderProdukData['id_task'])->first();
        $OrderProdukData['deadline'] = $task ? $task['deadline'] : '';

        foreach ($kategoriProdukDetailData as &$data) {
            $OrderProdukDetailData = $OrderProdukDetailModel->where('id_order_produk',$OrderProdukData['id_order_produk'])->findAll();
            foreach($OrderProdukDetailData as $detail){
                if($data['detail']==$detail['detail']){
                    $data['nilai'] = $detail ? $detail['nilai'] : '';
                }
            }
        } 
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
        $OrderProdukSupplierData = $OrderProdukSupplierModel->where('id_order_produk',$OrderProdukData['id_order_produk'])->findAll();
        $jumlahSupplier=count($OrderProdukSupplierData);


        return view('editOrderProduk', [
            'encodedKode' => $kode , 
            'OrderProdukData' => $OrderProdukData, 
            'kategoriData' => $kategoriData, 
            'supplierData' => $supplierData, 
            'kategoriProdukData' => $kategoriProdukData, 
            'kategoriProdukDetailData' => $kategoriProdukDetailData, 
            'OrderProdukDetailData' => $OrderProdukDetailData,
            'OrderProdukSupplierData' => $OrderProdukSupplierData,
            'jumlahSupplier' => $jumlahSupplier,   
        ]);
    }


    public function editProdukSubmit($kodeOrder)
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

    $total_harga=$harga*$quantity;



    $data = [
        'id_order_produk' => $id_order_produk,
        'kode_order' => $decodedKodeOrder,
        'nama' => $namaProduk,
        'harga' => $harga,
        'quantity' => $quantity,
        'total_harga' => $total_harga,
        'kategori' => $kategori,
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
    $SupplierModel = new SupplierModel();

    $totalBiaya = 0;
    for ($i = 1; $i <= $jumlahSupplier; $i++) {
        $kategori_supplier = $this->request->getPost('kategori'.$i);
        $nama_supplier = $this->request->getPost('nama_supplier'.$i);
        $jumlah_barang = $this->request->getPost('jumlah_barang'.$i);
        $harga_supplier = $this->request->getPost('harga'.$i);

        $supplier = $SupplierModel->where('kategori', $kategori_supplier)->where('nama', $nama_supplier)->first();

        $total_harga_supplier=$harga_supplier*$jumlah_barang;
        $totalBiaya += $total_harga_supplier;
        $data = [
            'id_order_produk' => $id_order_produk,
            'id_supplier' => $supplier['id'],
            'kategori' => $kategori_supplier,
            'nama' => $nama_supplier,
            'jumlah_barang' => $jumlah_barang,
            'harga' => $harga_supplier,
            'total_harga' => $total_harga_supplier
        ];

        $OrderProdukSupplierModel->insert($data);

    }


    $data = [
        'total_biaya' => $totalBiaya,
    ];
    $model->update($id_order_produk, $data);




    $OrderModel = new OrderModel();
    $dpMasuk = $OrderModel->select('dp_masuk')->find($decodedKodeOrder);
    // $totalNilaiOrder=$nilaiOrder['nilaiOrder']+$total_harga;

    $totalData = $model->like('id_order_produk', $decodedKodeOrder, 'after')->findAll();
    $totalHargaOrder = 0; // Menginisialisasi total harga
    $totalBiayaOrder = 0; // Menginisialisasi total biaya

    foreach ($totalData as $data) {
        $totalHargaOrder += $data['total_harga']; // Menambahkan biaya ke totalHargaOrder
        $totalBiayaOrder += $data['total_biaya']; // Menambahkan biaya ke totalBiayaOrder
    }

    $grossProfit=$totalHargaOrder-$totalBiayaOrder;
    $grandTotal=$totalHargaOrder-$dpMasuk['dp_masuk'];

    $OrderData = [
        'nilaiOrder' => $totalHargaOrder,
        'total_biaya_order' => $totalBiayaOrder,
        'gross_profit' => $grossProfit,
        'grand_total' => $grandTotal,
    ];
    $OrderModel->update($decodedKodeOrder, $OrderData);

    
    $TaskModel = new TaskCalendarModel();
    $gambarModel = new GambarProdukModel();
    $gambarTask = $gambarModel->where('id_order_produk', $id_order_produk)->first();
    $dataTask = [
        'parent' => $decodedKodeOrder,
        'task' => $namaProduk,
        'deadline' => $deadline,
        'gambar' => $gambarTask['gambar'],
        'status' => 'Belum Dikerjakan'
    ];
    $TaskModel->insert($dataTask);

    $lastTask = $TaskModel->orderBy('id', 'DESC')->first();
    $data = [
        'id_task' => $lastTask['id'],
    ];
    $model->update($id_order_produk, $data);


    return redirect()->to(base_url('order/detailOrder/'.$kodeOrder))->with('success', 'Produk berhasil ditambahkan.');
    }
}
