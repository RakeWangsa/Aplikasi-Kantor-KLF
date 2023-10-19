<?php

namespace App\Controllers;

class ListOrder extends BaseController
{
    public function index(): string
    {
        return view('listOrder');
    }
    public function inputOrder(): string
    {
        return view('inputOrder');
    }
}
