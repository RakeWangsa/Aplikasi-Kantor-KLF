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
    $deleted = $model->delete($subtaskId);

    if ($deleted) {
        return redirect()->to(base_url('taskCalendar'))->with('success', 'Subtask berhasil dihapus.');
    } else {
        return redirect()->to(base_url('taskCalendar'))->with('error', 'Gagal menghapus subtask.');
    }
}

}
