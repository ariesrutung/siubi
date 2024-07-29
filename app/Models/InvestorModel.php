<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestorModel extends Model
{
    protected $table = 'investor';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['nama_lengkap', 'alamat', 'sumber_dana', 'nama_perusahaan', 'jabatan'];
    protected $returnType = 'array';
}
