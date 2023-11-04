<?php

namespace App\Controllers;
use App\Models\OrderModel;

class Dashboard extends BaseController
{
    public function index(): string
    {
        $model = new OrderModel();
    
        // Mendapatkan bulan saat ini dalam angka Romawi
        $bulanSekarang = date('n'); // Mendapatkan angka bulan saat ini, misal: 10 untuk Oktober
    
        // Konversi angka bulan menjadi Romawi
        $romawi = $this->convertToRoman($bulanSekarang);
    
        // Mencari data dengan bulan yang sesuai
        $data = $model->like('kode_order', '%/' . date('y') . '/' . $romawi . '/%')->findAll();
        
        $jumlahOrder = count($data);
        return view('dashboard', ['data' => $data, 'jumlahOrder' => $jumlahOrder]);
    }
    
    // Fungsi untuk mengonversi angka ke angka Romawi
    private function convertToRoman($num) {
        $n = intval($num);
        $result = '';
        $romanNumber = [
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        ];
    
        foreach ($romanNumber as $roman => $value) {
            $matches = intval($n / $value);
            $result .= str_repeat($roman, $matches);
            $n = $n % $value;
        }
    
        return $result;
    }
    
    
}
