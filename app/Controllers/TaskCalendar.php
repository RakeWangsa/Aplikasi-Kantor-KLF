<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\OrderProdukDetailModel;
use App\Models\OrderProdukModel;
use App\Models\TaskCalendarModel;
use App\Models\TaskCatatanModel;
use App\Models\GambarProdukModel;

class TaskCalendar extends BaseController
{
    public function index(): string
    {
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->findAll();
        $jumlahTask = count($OrderData);
        $TaskCalendarModel = new TaskCalendarModel();
        $TaskCalendarData = $TaskCalendarModel->findAll();
        return view('taskCalendar', ['OrderData' => $OrderData, 'jumlahTask' => $jumlahTask, 'TaskCalendarData' => $TaskCalendarData]);
    }

    public function pilihBulan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        return redirect()->to(base_url('taskCalendar/calendarView/'.$bulan.'/'.$tahun));
    }

    public function calendarView($bulan,$tahun)
    {
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->findAll();
        $jumlahTask = count($OrderData);
        $TaskCalendarModel = new TaskCalendarModel();
        $TaskCalendarData = $TaskCalendarModel->findAll();

        $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        if($bulan==1){
            $jumlahHariBulanLalu = cal_days_in_month(CAL_GREGORIAN, 12, $tahun-1);
        }else{
            $jumlahHariBulanLalu = cal_days_in_month(CAL_GREGORIAN, $bulan-1, $tahun);
        }


        $awalHari = date('N', strtotime("$tahun-$bulan-01"));
        $tanggalSkrg = date('d');
        $bulanSkrg = date('m');
        $tahunSkrg = date('Y');
        $tanggal = "$tahun-$bulan-1";
        $namaBulan = date('F', strtotime($tanggal)); 

        return view('taskCalendar2', [
            'OrderData' => $OrderData, 
            'jumlahTask' => $jumlahTask, 
            'TaskCalendarData' => $TaskCalendarData,
            'awalHari' => $awalHari,
            'jumlahHari' => $jumlahHari,
            'tanggalSkrg' => $tanggalSkrg,
            'namaBulan' => $namaBulan,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'bulanSkrg' => $bulanSkrg,
            'tahunSkrg' => $tahunSkrg,
            'jumlahHariBulanLalu' => $jumlahHariBulanLalu,

        ]);
    }

    public function addSubtask($encodedParent)
    {
        // $encodedParent = $this->request->getGet('parent');
        $parent = base64_decode($encodedParent);
        $task = $this->request->getPost('task');
        $deadline = $this->request->getPost('deadline');

        $model = new TaskCalendarModel();

        $data = [
            'parent' => $parent,
            'task' => $task,
            'deadline' => $deadline,
            'status' => 'Belum Dikerjakan'
        ];
    
        $model->insert($data);
        return redirect()->to(base_url('taskCalendar'))->with('success', 'Subtask berhasil ditambahkan.');
    }

    public function editSubtask()
    {
        // Mendapatkan ID subtask yang akan diedit dari URL atau input lainnya
        $subtaskId = $this->request->getGet('id');
    
        // Validasi jika ID subtask ada dan adalah angka
        if (!is_numeric($subtaskId)) {
            return redirect()->to(base_url('taskCalendar'))->with('error', 'ID subtask tidak valid.');
        }
    
        // Mendapatkan data subtask yang akan diedit
        $model = new TaskCalendarModel();
        $subtask = $model->find($subtaskId);
    
        // Cek apakah data subtask ditemukan
        if (!$subtask) {
            return redirect()->to(base_url('taskCalendar'))->with('error', 'Subtask tidak ditemukan.');
        }
    
        // Lakukan validasi data yang akan diubah, jika perlu
    
        // Mendapatkan data yang dikirimkan melalui POST
        $task = $this->request->getPost('task');
        $deadline = $this->request->getPost('deadline');
    
        // Menyiapkan data yang akan diupdate
        $data = [
            'task' => $task,
            'deadline' => $deadline,
        ];
    
        // Melakukan update data subtask berdasarkan ID
        $model->update($subtaskId, $data);
    
        return redirect()->to(base_url('taskCalendar'))->with('success', 'Subtask berhasil diubah.');
    }
    

    public function deleteSubtask()
    {
        // Mendapatkan ID subtask yang akan dihapus dari URL atau input lainnya
        $subtaskId = $this->request->getGet('id');
    
        // Validasi jika ID subtask ada dan adalah angka
        if (!is_numeric($subtaskId)) {
            return redirect()->to(base_url('taskCalendar'))->with('error', 'ID subtask tidak valid.');
        }
    
        // Menghapus data subtask berdasarkan ID
        $model = new TaskCalendarModel();
        $model->where('id', $subtaskId)->orWhere('parent', $subtaskId)->delete();
    
        return redirect()->to(base_url('taskCalendar'))->with('success', 'Subtask berhasil dihapus.');
    }
    
    public function cetakQC(): string
    {
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->findAll();
        $jumlahTask = count($OrderData);
        $TaskCalendarModel = new TaskCalendarModel();
        $TaskCalendarData = $TaskCalendarModel->findAll();
        return view('taskCalendarCetakQC', ['OrderData' => $OrderData, 'jumlahTask' => $jumlahTask, 'TaskCalendarData' => $TaskCalendarData]);
    }

    public function cetakQCdownload()
    {
        $OrderModel = new OrderModel();
        $OrderData = $OrderModel->findAll();
        $jumlahTask = count($OrderData);
        $array=[];
        for ($i = 1; $i <= $jumlahTask; $i++) {
            $radio = $this->request->getPost('radio'.$i);
            if ($radio != NULL) {
                $array[] = $radio;
            }
        }

        $OrderProdukModel = new OrderProdukModel();
        $OrderProdukData = $OrderProdukModel->whereIn('kode_order', $array)->findAll();

        $OrderProdukDetailModel = new OrderProdukDetailModel();
        $OrderProdukDetailData = $OrderProdukDetailModel->findAll();

        $gambarModel = new GambarProdukModel();
        $gambarData = $gambarModel->findAll();

        return view('cetakQC', ['OrderData' => $OrderData, 'jumlahTask' => $jumlahTask, 'array' => $array, 'OrderProdukData' => $OrderProdukData, 'OrderProdukDetailData' => $OrderProdukDetailData, 'gambarData' => $gambarData]);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getGet('status');
        $task = $this->request->getGet('task');
        $decodedId = base64_decode($id);

        if($task=="order"){
            $model = new OrderModel();

            $data = [
                'status_task' => $status,
            ];
        
            $model->update($decodedId, $data);
        }else{
            $model = new TaskCalendarModel();

            $data = [
                'status' => $status,
            ];
        
            $model->update($decodedId, $data);
        }

        return redirect()->to(base_url('taskCalendar'))->with('success', 'Status berhasil diupdate.');
    }



    public function catatan($encodedId)
    {
        $id = base64_decode($encodedId);
        $task = $this->request->getGet('task');
        if($task=="order"){
            $OrderModel = new OrderModel();
            $OrderData = $OrderModel->find($id);

            $TaskCatatanModel = new TaskCatatanModel();
            $TaskCatatanData = $TaskCatatanModel->where('id_task',$id)->findAll();
            return view('taskCalendarCatatan', ['TaskCatatanData' => $TaskCatatanData, 'OrderData' => $OrderData, 'encodedId' => $encodedId]);
        }else{
            $TaskCalendarModel = new TaskCalendarModel();
            $TaskCalendarData = $TaskCalendarModel->find($id);
    
            $TaskCatatanModel = new TaskCatatanModel();
            $TaskCatatanData = $TaskCatatanModel->where('id_task',$id)->findAll();
            return view('taskCalendarCatatan', ['TaskCatatanData' => $TaskCatatanData, 'TaskCalendarData' => $TaskCalendarData, 'encodedId' => $encodedId]);
        }

    }

    public function inputCatatan($id)
    {
        $previousURL = $_SERVER['HTTP_REFERER'];
session()->setFlashdata('previousURL', $previousURL);

        $decodedId = base64_decode($id);

        $catatan = $this->request->getPost('catatan');
        $gambarFiles = $this->request->getFiles();

        $orderModel = new OrderModel();
        $TaskCatatanModel = new TaskCatatanModel();

        

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
    if(isset($namaFile)){
        $data = [
            'id_task' => $decodedId,
            'gambar' => $namaFile,
            'catatan' => $catatan,
        ];
    }else{
        $data = [
            'id_task' => $decodedId,
            'catatan' => $catatan,
        ];
    }

    $TaskCatatanModel->insert($data);


    if (is_string($previousURL) && !empty($previousURL)) {
        return redirect()->to($previousURL);
    } else {
        return redirect()->to(base_url());
    }
    }


}
