<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table = 'data_perusahaan';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['nama_perseroan', 'alamat_lengkap_perseroan', 'kegiatan_usaha_1', 'kegiatan_usaha_2', 'modal_usaha', 'nama_lengkap', 'tanggal_lahir', 'alamat_lengkap_personal', 'nik', 'npwp', 'nomor_sertifikat', 'nib', 'no_hp', 'email', 'kota', 'provinsi', 'kode_pos'];
    protected $returnType = 'array';
}
