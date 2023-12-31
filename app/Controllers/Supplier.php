<?php

namespace App\Controllers;

use App\Models\KategoriSupplierModel;
use App\Models\OrderProdukModel;
use App\Models\OrderProdukSupplierModel;
use App\Models\SupplierModel;
use App\Models\PaymentSupplierModel;
use App\Models\TaskCalendarModel;
use App\Models\GambarProdukModel;
use App\Models\OrderModel;
use App\Models\OrderProdukDetailModel;
use App\Models\SpkModel;
use App\Models\SpkProdukModel;

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

        $SpkModel = new SpkModel();
        $SpkData = $SpkModel->where('id_supplier', $decodedId)->findAll();

        $GambarProdukModel = new GambarProdukModel();
        $TaskCalendarModel = new TaskCalendarModel();
        $OrderProdukModel = new OrderProdukModel();
        $OrderModel = new OrderModel();
        $SpkProdukModel = new SpkProdukModel();

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
            $order = $OrderModel->where('kode_order', $produk['kode_order'])->first();
            $task = $TaskCalendarModel->where('parent', $produk['kode_order'])->where('task', $produk['nama'])->first();
            $gambar = $GambarProdukModel->where('id_order_produk', $supplier['id_order_produk'])->first();
            $spk = $SpkProdukModel->where('id_order_produk_supplier', $supplier['id'])->first();

            $supplier['nama_produk'] = $produk ? $produk['nama'] : '';
            $supplier['customer'] = $order ? $order['nama'] : '';
            $supplier['status'] = $task ? $task['status'] : '';
            $supplier['gambar'] = $gambar ? $gambar['gambar'] : '';
            $supplier['kode_spk'] = $spk ? $spk['kode_spk'] : '-';
        }



        return view('supplierInfo', [
            'OrderProdukSupplierData' => $OrderProdukSupplierData, 
            'SupplierData' => $SupplierData,
            'PaymentSupplierData' => $PaymentSupplierData,
            'encodedId' => $id,
            'totalTagihan' => $totalTagihan,
            'SpkData' => $SpkData,
        ]);
    }
    
    public function addPayment($id)
    {
        $decodedId = base64_decode($id);
        $model = new PaymentSupplierModel();
        $tanggal = $this->request->getPost('tanggal');
        $jumlahPayment = $this->request->getPost('jumlahPayment');
        $kodeSpk = $this->request->getPost('kode_spk');
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
            'kode_spk' => $kodeSpk, 
            'tanggal' => $tanggal,
            'jumlah_payment' => $jumlahPayment,
            'bukti_payment' => $namaFile,
        ];
        $model->insert($data);



        $SpkProdukModel = new SpkProdukModel();
        $SpkProdukData = $SpkProdukModel->where('kode_spk', $kodeSpk)->findAll();
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
    
        $orderProdukSupplierDataArray = [];
    
        foreach ($SpkProdukData as $spkData) {
            $idOrderProdukSupplier = $spkData['id_order_produk_supplier'];
            $orderProdukSupplierData = $OrderProdukSupplierModel->where('id', $idOrderProdukSupplier)->findAll();
            // Tambahkan data ke dalam array
            $orderProdukSupplierDataArray = array_merge($orderProdukSupplierDataArray, $orderProdukSupplierData);
        }
        
    
        $totalHarga=0;
        foreach ($orderProdukSupplierDataArray as &$data) {
            $totalHarga += $data['total_harga'];
        }

    
    
        $PaymentSupplierModel = new PaymentSupplierModel();
        $PaymentSupplierData = $PaymentSupplierModel->where('kode_spk', $kodeSpk)->findAll();
        $DP=0;
        foreach($PaymentSupplierData as $payment){
            $DP+=$payment['jumlah_payment'];
        }
        $kekurangan=$totalHarga-$DP;

        $SpkModel = new SpkModel();
        if($kekurangan<=0){
            $data = [
                'status' => 'Lunas',
            ];
            $SpkModel->update($kodeSpk, $data);
        }


        return redirect()->to(base_url('supplier/info/'.$id))->with('success', 'Payment berhasil ditambahkan.');
    }

    public function spk($kode)
{
    $decodedKode = base64_decode($kode);

    $SpkProdukModel = new SpkProdukModel();
    $SpkProdukData = $SpkProdukModel->where('kode_spk', $decodedKode)->findAll();

    $OrderProdukSupplierModel = new OrderProdukSupplierModel();

    $orderProdukSupplierDataArray = [];

    foreach ($SpkProdukData as $spkData) {
        $idOrderProdukSupplier = $spkData['id_order_produk_supplier'];
        $orderProdukSupplierData = $OrderProdukSupplierModel->where('id', $idOrderProdukSupplier)->findAll();
        // Tambahkan data ke dalam array
        $orderProdukSupplierDataArray = array_merge($orderProdukSupplierDataArray, $orderProdukSupplierData);
    }

    $TaskCalendarModel = new TaskCalendarModel();
    $OrderProdukModel = new OrderProdukModel();
    $OrderModel = new OrderModel();
    $OrderProdukDetailModel = new OrderProdukDetailModel();
    $GambarProdukModel = new GambarProdukModel();

    $totalHarga=0;
    foreach ($orderProdukSupplierDataArray as &$data) {
        $produk = $OrderProdukModel->where('id_order_produk', $data['id_order_produk'])->first();
        $task = $TaskCalendarModel->where('id', $produk['id_task'])->first();
        $order = $OrderModel->where('kode_order', $produk['kode_order'])->first();
        $detail = $OrderProdukDetailModel->where('id_order_produk', $produk['id_order_produk'])->findAll();
        $gambar = $GambarProdukModel->where('id_order_produk', $produk['id_order_produk'])->first();
        $data['gambar'] = $gambar ? $gambar['gambar'] : '';
        $data['customer'] = $order ? $order['nama'] : '';
        $data['deadline'] = $task ? $task['deadline'] : '';
        $data['catatan_khusus'] = $produk ? $produk['catatan_khusus'] : '';
        $data['detail'] = $detail;


        $totalHarga += $data['total_harga'];
    }
    $SpkModel = new SpkModel();
    $SpkData = $SpkModel->where('kode_spk', $decodedKode)->first();
    $SupplierModel = new SupplierModel();
    $SupplierData = $SupplierModel->where('id', $SpkData['id_supplier'])->first();


    $PaymentSupplierModel = new PaymentSupplierModel();
    $PaymentSupplierData = $PaymentSupplierModel->where('kode_spk', $decodedKode)->findAll();
    $DP=0;
    foreach($PaymentSupplierData as $payment){
        $DP+=$payment['jumlah_payment'];
    }
    $kekurangan=$totalHarga-$DP;
    return view('spk', ['orderProdukSupplierDataArray' => $orderProdukSupplierDataArray, 'kodeSpk' => $decodedKode, 'encodedKode' => $kode, 'SupplierData' => $SupplierData, 'totalHarga' => $totalHarga, 'DP' => $DP, 'kekurangan' => $kekurangan, 'PaymentSupplierData' => $PaymentSupplierData]);
}


    public function addSpk($id)
    {
        $decodedId = base64_decode($id);
        $SupplierModel = new SupplierModel();
        $SupplierData = $SupplierModel->find($decodedId);
        $tahun = date('y');
        $bulan = date('m');
        $bulanRomawi = ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];

        if (preg_match('/\((.*?)\)/', $SupplierData['kategori'], $matches)) {
            $kategori = $matches[1];
        }
        $awalanKode = "$kategori/{$SupplierData['nama']}/$tahun/{$bulanRomawi[$bulan]}";

// tes
$SpkModel = new SpkModel();
$cek = $SpkModel->select('kode_spk')->like('kode_spk', $awalanKode, 'after')->findAll();

if ($cek) {

    $jumlah=count($cek);

$spkKe = $jumlah + 1;

if($spkKe<10){
    $spkKe = "0".$spkKe;
}

} else {
$spkKe = "01";
}
$kodeSpk = "$kategori/{$SupplierData['nama']}/$tahun/{$bulanRomawi[$bulan]}/$spkKe";
        

        $data = [
            'kode_spk' => $kodeSpk,
            'id_supplier' => $decodedId,
            'status' => "Belum Lunas",
        ];

        $SpkModel->insert($data);
        return redirect()->to(base_url('supplier/info/'.$id))->with('success', 'Payment berhasil ditambahkan.');
    }


    public function inputSpk($id)
    {
        $decodedId = base64_decode($id);
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
        $OrderProdukSupplierData = $OrderProdukSupplierModel->where('id_supplier', $decodedId)->findAll();

        // $SupplierModel = new SupplierModel();
        // $SupplierData = $SupplierModel->find($decodedId);

        $SpkModel = new SpkModel();
        $SpkData = $SpkModel->where('id_supplier', $decodedId)->findAll();

        $GambarProdukModel = new GambarProdukModel();
        $TaskCalendarModel = new TaskCalendarModel();
        $OrderProdukModel = new OrderProdukModel();
        $OrderModel = new OrderModel();
        $SpkProdukModel = new SpkProdukModel();

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
            $order = $OrderModel->where('kode_order', $produk['kode_order'])->first();
            $task = $TaskCalendarModel->where('parent', $produk['kode_order'])->where('task', $produk['nama'])->first();
            $gambar = $GambarProdukModel->where('id_order_produk', $supplier['id_order_produk'])->first();
            $spk = $SpkProdukModel->where('id_order_produk_supplier', $supplier['id'])->first();

            $supplier['nama_produk'] = $produk ? $produk['nama'] : '';
            $supplier['customer'] = $order ? $order['nama'] : '';
            $supplier['status'] = $task ? $task['status'] : '';
            $supplier['gambar'] = $gambar ? $gambar['gambar'] : '';
            $supplier['kode_spk'] = $spk ? $spk['kode_spk'] : '-';
        }



        return view('inputSpk', [
            'OrderProdukSupplierData' => $OrderProdukSupplierData, 
            'encodedId' => $id,
            // 'SupplierData' => $SupplierData,
            // 'PaymentSupplierData' => $PaymentSupplierData,
            // 'encodedId' => $id,
            'SpkData' => $SpkData,
        ]);
    }


    public function submitSpk($id)
    {
        $decodedId = base64_decode($id);
        $SpkProdukModel = new SpkProdukModel();
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
        $OrderProdukSupplierData = $OrderProdukSupplierModel->where('id_supplier', $decodedId)->findAll();
        $kodeSpk = $this->request->getPost('kode_spk');
        $jumlah=count($OrderProdukSupplierData);
        for ($i = 1; $i <= $jumlah; $i++) {
            $radio = $this->request->getPost('radio'.$i);
            if ($radio != NULL) {
                $data = [
                    'kode_spk' => $kodeSpk,
                    'id_order_produk_supplier' => $radio,
                ];
            }
        }
        $SpkProdukModel->insert($data);
        
        return redirect()->to(base_url('supplier/info/'.$id))->with('success', 'Payment berhasil ditambahkan.');
    }


    public function cetakSpk($kode)
    {
        $decodedKode = base64_decode($kode);
    
        $SpkProdukModel = new SpkProdukModel();
        $SpkProdukData = $SpkProdukModel->where('kode_spk', $decodedKode)->findAll();
    
        $OrderProdukSupplierModel = new OrderProdukSupplierModel();
    
        $orderProdukSupplierDataArray = [];
    
        foreach ($SpkProdukData as $spkData) {
            $idOrderProdukSupplier = $spkData['id_order_produk_supplier'];
            $orderProdukSupplierData = $OrderProdukSupplierModel->where('id', $idOrderProdukSupplier)->findAll();
            // Tambahkan data ke dalam array
            $orderProdukSupplierDataArray = array_merge($orderProdukSupplierDataArray, $orderProdukSupplierData);
        }
    
        $TaskCalendarModel = new TaskCalendarModel();
        $OrderProdukModel = new OrderProdukModel();
        $OrderModel = new OrderModel();
        $OrderProdukDetailModel = new OrderProdukDetailModel();
        $GambarProdukModel = new GambarProdukModel();
    
        $totalHarga=0;
        foreach ($orderProdukSupplierDataArray as &$data) {
            $produk = $OrderProdukModel->where('id_order_produk', $data['id_order_produk'])->first();
            $task = $TaskCalendarModel->where('id', $produk['id_task'])->first();
            $order = $OrderModel->where('kode_order', $produk['kode_order'])->first();
            $detail = $OrderProdukDetailModel->where('id_order_produk', $produk['id_order_produk'])->findAll();
            $gambar = $GambarProdukModel->where('id_order_produk', $produk['id_order_produk'])->first();
            $data['gambar'] = $gambar ? $gambar['gambar'] : '';
            $data['customer'] = $order ? $order['nama'] : '';
            $data['deadline'] = $task ? $task['deadline'] : '';
            $data['catatan_khusus'] = $produk ? $produk['catatan_khusus'] : '';
            $data['detail'] = $detail;
    
    
            $totalHarga += $data['total_harga'];
        }
        $SpkModel = new SpkModel();
        $SpkData = $SpkModel->where('kode_spk', $decodedKode)->first();
        $SupplierModel = new SupplierModel();
        $SupplierData = $SupplierModel->where('id', $SpkData['id_supplier'])->first();
    
    
        $PaymentSupplierModel = new PaymentSupplierModel();
        $PaymentSupplierData = $PaymentSupplierModel->where('kode_spk', $decodedKode)->findAll();
        $DP=0;
        foreach($PaymentSupplierData as $payment){
            $DP+=$payment['jumlah_payment'];
        }
        $kekurangan=$totalHarga-$DP;
        $hariIni = date('d/m/Y');
        return view('cetakSpk', ['orderProdukSupplierDataArray' => $orderProdukSupplierDataArray, 'hariIni' => $hariIni, 'kodeSpk' => $decodedKode, 'encodedKode' => $kode, 'SupplierData' => $SupplierData, 'totalHarga' => $totalHarga, 'DP' => $DP, 'kekurangan' => $kekurangan, 'PaymentSupplierData' => $PaymentSupplierData]);
    }
}
