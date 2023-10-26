<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\PaymentTermsModel;

class KatalogProduk extends BaseController
{
        public function index()
    {
        return view('katalogProduk');
    }   
}
