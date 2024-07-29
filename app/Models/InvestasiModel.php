<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestasiModel extends Model
{
    protected $table = 'investasi';
    protected $primaryKey = 'id';
    protected $allowedFields    = ['periode', 'investor', 'jumlah_modal', 'tujuan', 'tgl_investasi', 'status', 'tgl_mulai', 'tgl_akhir', 'bukti'];
    protected $returnType = 'array';


    public function get_investor_data($id)
    {
        $builder = $this->db->table('investasi');
        $builder->select('investasi.id, investasi.periode, investasi.jumlah_modal, investasi.tujuan, investasi.tgl_investasi, investasi.status, investasi.tgl_mulai, investasi.tgl_akhir, investasi.bukti, investor.id as investor_id, investor.nama_perusahaan, investor.nama_lengkap as investor_nama');
        $builder->join('investor', 'investor.id = investasi.investor');
        $builder->where('investasi.id', $id);
        $query = $builder->get();

        return $query->getRowArray(); // Mengembalikan data sebagai array
    }

    // Untuk ditampilkan di form tambah data belanja barang dan jasa halaman belanja barang
    public function getInvestorCompanies()
    {
        return $this->select('investor.nama_perusahaan, investasi.investor AS investor_id, investasi.id as investasi_id, investasi.periode, investasi.jumlah_modal, investasi.tujuan, investasi.tgl_investasi')
            ->join('investor', 'investor.id = investasi.investor')
            ->distinct()
            ->findAll();
    }

    public function getPeriodeByInvestor($investorId)
    {
        return $this->select('periode')
            ->where('investor', $investorId)
            ->distinct()
            ->findAll();
    }

    public function getInvestasiDetails($investorId, $periode)
    {
        return $this->where(['investor' => $investorId, 'periode' => $periode])->first();
    }
}
