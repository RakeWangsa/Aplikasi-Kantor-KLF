<?php

namespace App\Controllers;
use App\Models\OrderModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $model = new OrderModel();
    $data = $model->findAll();
    $jumlahOrder = count($data);
    return view('dashboard', ['data' => $data, 'jumlahOrder' => $jumlahOrder]);
    }
}
