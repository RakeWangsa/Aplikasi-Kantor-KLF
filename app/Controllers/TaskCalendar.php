<?php

namespace App\Controllers;
use App\Models\OrderModel;

class TaskCalendar extends BaseController
{
    public function index(): string
    {
        $model = new OrderModel();
        $data = $model->findAll();
        $jumlahTask = count($data);
        return view('taskCalendar', ['data' => $data, 'jumlahTask' => $jumlahTask]);
    }
}
