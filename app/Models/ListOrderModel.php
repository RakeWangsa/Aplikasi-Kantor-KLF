<?php

namespace App\Models;

use CodeIgniter\Model;

class ListOrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'list_order';
    protected $primaryKey       = 'kode_order';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_order','kode_invoice','nama','no_telfon','alamat','gambar','kategori_produk','harga_produk','deadline','catatan_khusus','ongkir','discount','grand_total','kategori_supplier','nama_supplier','jumlah_barang','harga_supplier'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
