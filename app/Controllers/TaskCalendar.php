<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\TaskCalendarModel;

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

    public function addSubtask()
    {
        $encodedParent = $this->request->getGet('parent');
        $parent = base64_decode($encodedParent);
        $task = $this->request->getPost('task');
        $deadline = $this->request->getPost('deadline');

        $model = new TaskCalendarModel();

        $data = [
            'parent' => $parent,
            'task' => $task,
            'deadline' => $deadline,
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
    

}
