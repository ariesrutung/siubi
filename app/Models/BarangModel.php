<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'data_barang';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['nama_barang', 'satuan'];
    protected $returnType = 'array';
}
