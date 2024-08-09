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
        'investasi_id',
    ];
    protected $returnType = 'array';

    public function getLastId()
    {
        return $this->selectMax('id')->first();
    }

    public function get_filtered_data_belanja($searchValue = '', $start = 0, $length = 10)
    {
        // Subquery untuk mendapatkan data yang diperlukan
        $subquery = $this->db->table('belanja')
            ->select('
                belanja.investasi_id,
                belanja.no_invoice,
                MAX(belanja.nama_item) as nama_item,
                MAX(belanja.jumlah_item) as jumlah_item,
                MAX(belanja.tanggal_transaksi) as tanggal_transaksi,
                MAX(belanja.satuan) as satuan,
                MAX(belanja.harga_satuan) as harga_satuan,
                MAX(belanja.harga_total) as harga_total,
                MAX(investasi.periode) as periode,
                MAX(investor.nama_perusahaan) as nama_perusahaan,
                MAX(investasi.investor) as investor,
                MAX(investasi.jumlah_modal) as jumlah_modal,
                MAX(investasi.tujuan) as tujuan,
                MAX(investasi.tgl_investasi) as tgl_investasi
            ')
            ->join('investasi', 'investasi.id = belanja.investasi_id')
            ->join('investor', 'investor.id = investasi.investor');

        if ($searchValue) {
            $subquery->groupStart()
                ->like('belanja.no_invoice', $searchValue)
                ->orLike('belanja.nama_item', $searchValue)
                ->orLike('belanja.jumlah_item', $searchValue)
                ->orLike('belanja.tanggal_transaksi', $searchValue)
                ->orLike('belanja.satuan', $searchValue)
                ->orLike('belanja.harga_satuan', $searchValue)
                ->orLike('belanja.harga_total', $searchValue)
                ->orLike('investasi.periode', $searchValue)
                ->orLike('investasi.investor', $searchValue)
                ->orLike('investasi.jumlah_modal', $searchValue)
                ->orLike('investasi.tujuan', $searchValue)
                ->orLike('investasi.tgl_investasi', $searchValue)
                ->groupEnd();
        }

        // Mengelompokkan data berdasarkan semua kolom dalam SELECT list
        $subquery->groupBy('belanja.investasi_id, belanja.no_invoice');

        // Membatasi jumlah data yang diambil
        $subquery->limit($length, $start);

        // Menghitung total record dengan filter
        $totalRecordsWithFilter = $subquery->countAllResults(false);

        // Memesan hasil berdasarkan no_invoice
        $subquery->orderBy('belanja.no_invoice', 'DESC');

        // Mendapatkan hasil
        $filteredRecords = $subquery->get()->getResultArray();

        return ['data' => $filteredRecords, 'totalFiltered' => $totalRecordsWithFilter];
    }

    public function getDetailWithBarang($noInvoice)
    {
        return $this->select('
            belanja.no_invoice, 
            data_barang.nama_barang,
            belanja.jumlah_item,
            belanja.satuan,
            belanja.harga_satuan,
            belanja.harga_total,
            belanja.tanggal_transaksi
        ')
            ->join('data_barang', 'data_barang.id = belanja.nama_item')
            ->where('belanja.no_invoice', $noInvoice)
            ->findAll();
    }


    public function getInvoiceByInvestasiId($investasiId)
    {
        return $this->where('investasi_id', $investasiId)
            ->select('no_invoice, tanggal_transaksi')
            ->first();
    }

    public function getInvoiceByNoInvoice($noInvoice)
    {
        return $this->where('no_invoice', $noInvoice)
            ->select('no_invoice, tanggal_transaksi')
            ->first();
    }
}
