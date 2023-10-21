<?php

namespace App\Controllers;
use App\Models\ListOrderModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $model = new ListOrderModel();
    $data = $model->findAll();
    return view('dashboard', ['data' => $data]);
    }
}
