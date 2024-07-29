<?php

namespace App\Models;

use CodeIgniter\Model;

class BelanjaModel extends Model
{
    protected $table = 'belanja';
    protected $primaryKey = 'id';
    protected $allowedFields    = [
        'no_invoice',
        'nama_item',
        'jumlah_item',
        'tanggal_transaksi',
        'satuan',
        'harga_satuan',
        'harga_total',
        'total_transaksi',
        'investasi_id',
    ];
    protected $returnType = 'array';

    public function getLastId()
    {
        return $this->selectMax('id')->first();
    }

    // public function get_data_belanja_by_id()
    // {
    //     $builder = $this->db->table('belanja');
    //     $builder->select('no_invoice, nama_item, jumlah_item, tanggal_transaksi, satuan, harga_satuan, harga_total, total_transaksi, investasi_id, periode, investor, jumlah_modal, tujuan, tgl_investasi');
    //     $builder->join('investasi', 'investasi.id = belanja.investasi_id');

    //     return $builder->get()->getResultArray();
    // }

    public function get_filtered_data_belanja($searchValue = '', $start = 0, $length = 10)
    {
        $builder = $this->db->table('belanja');
        $builder->select('
        belanja.investasi_id,
        MAX(belanja.no_invoice) as no_invoice,
        MAX(belanja.nama_item) as nama_item,
        MAX(belanja.jumlah_item) as jumlah_item,
        MAX(belanja.tanggal_transaksi) as tanggal_transaksi,
        MAX(belanja.satuan) as satuan,
        MAX(belanja.harga_satuan) as harga_satuan,
        MAX(belanja.harga_total) as harga_total,
        MAX(belanja.total_transaksi) as total_transaksi,
        MAX(investasi.periode) as periode,
        MAX(investor.nama_perusahaan) as nama_perusahaan,
        MAX(investasi.investor) as investor,
        MAX(investasi.jumlah_modal) as jumlah_modal,
        MAX(investasi.tujuan) as tujuan,
        MAX(investasi.tgl_investasi) as tgl_investasi
    ');
        $builder->join('investasi', 'investasi.id = belanja.investasi_id');
        $builder->join('investor', 'investor.id = investasi.investor');

        if ($searchValue) {
            $builder->groupStart()
                ->like('belanja.no_invoice', $searchValue)
                ->orLike('belanja.nama_item', $searchValue)
                ->orLike('belanja.jumlah_item', $searchValue)
                ->orLike('belanja.tanggal_transaksi', $searchValue)
                ->orLike('belanja.satuan', $searchValue)
                ->orLike('belanja.harga_satuan', $searchValue)
                ->orLike('belanja.harga_total', $searchValue)
                ->orLike('belanja.total_transaksi', $searchValue)
                ->orLike('investasi.periode', $searchValue)
                ->orLike('investasi.investor', $searchValue)
                ->orLike('investasi.jumlah_modal', $searchValue)
                ->orLike('investasi.tujuan', $searchValue)
                ->orLike('investasi.tgl_investasi', $searchValue)
                ->groupEnd();
        }

        // Mengelompokkan data berdasarkan investasi_id
        $builder->groupBy('belanja.investasi_id');

        // Menghitung total record dengan filter
        $totalRecordsWithFilter = $builder->countAllResults(false);

        // Membatasi jumlah data yang diambil
        $builder->limit($length, $start);

        // Memesan hasil berdasarkan MAX(belanja.id)
        $builder->orderBy('MAX(belanja.id)', 'DESC');

        // Mendapatkan hasil
        $filteredRecords = $builder->get()->getResultArray();

        return ['data' => $filteredRecords, 'totalFiltered' => $totalRecordsWithFilter];
    }
}
