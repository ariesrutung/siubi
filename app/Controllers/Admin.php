<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvestorModel;
use App\Models\InvestasiModel;
use App\Models\BarangModel;
use App\Models\PerusahaanModel;
use App\Models\BelanjaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data['title'] = 'Admin Dashboard';
        return $this->loadView('admin/dashboard', $data);
    }

    // --------------------------------------------------------------------
    // INVESTOR
    // --------------------------------------------------------------------

    public function investor()
    {
        $data['title'] = 'Manajemen Investor';
        return $this->loadView('admin/investor', $data);
    }

    public function investorData()
    {
        $request = service('request');
        $investorModel = new InvestorModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');

        $searchValue = $request->getPost('search');
        $searchValue = isset($searchValue['value']) ? $searchValue['value'] : '';

        $totalRecords = $investorModel->countAllResults();
        $totalRecordsWithFilter = $investorModel->like('nama_lengkap', $searchValue)
            ->orLike('alamat', $searchValue)
            ->orLike('sumber_dana', $searchValue)
            ->orLike('nama_perusahaan', $searchValue)
            ->orLike('jabatan', $searchValue)
            ->countAllResults(false);

        $records = $investorModel->like('nama_lengkap', $searchValue)
            ->orLike('alamat', $searchValue)
            ->orLike('sumber_dana', $searchValue)
            ->orLike('nama_perusahaan', $searchValue)
            ->orLike('jabatan', $searchValue)
            ->orderBy('id', 'DESC')
            ->findAll($length, $start);

        // Tambahkan penomoran
        $data = [];

        foreach ($records as $index => $record) {
            $record['number'] = $start + $index + 1; // Penomoran dimulai dari 1
            $record['aksi'] = '<a class="btn btn-primary btn-sm edit" data-id="' . $record['id'] . '"><i class="fas fa-edit"></i></a> '
                . '<a class="btn btn-danger btn-sm hapus" data-id="' . $record['id'] . '"><i class="fas fa-trash"></i></a>';
            $data[] = $record;
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordsWithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }


    public function upload_investor()
    {
        $request = service('request');

        // Ambil data dari form
        $nama_lengkap = $request->getPost('nama_lengkap');
        $jabatan = $request->getPost('jabatan');
        $nama_perusahaan = $request->getPost('nama_perusahaan');
        $sumber_dana = $request->getPost('sumber_dana');
        $alamat = $request->getPost('alamat');

        $investorModel = new InvestorModel();

        // Data untuk disimpan
        $data = [
            'nama_lengkap' => $nama_lengkap,
            'jabatan' => $jabatan,
            'nama_perusahaan' => $nama_perusahaan,
            'sumber_dana' => $sumber_dana,
            'alamat' => $alamat,

        ];

        // Simpan data ke database
        if ($investorModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }
    }


    public function delete_investor($id)
    {
        $investorModel = new InvestorModel();

        if ($investorModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil dihapus.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghapus data.']);
        }
    }


    public function update_investor()
    {
        $request = service('request');
        $investorModel = new InvestorModel();

        $data = [
            'nama_lengkap' => $request->getPost('edit_nama_lengkap'),
            'jabatan' => $request->getPost('edit_jabatan'), // Gunakan investor_id
            'nama_perusahaan' => $request->getPost('edit_nama_perusahaan'),
            'sumber_dana' => $request->getPost('edit_sumber_dana'),
            'alamat' => $request->getPost('edit_alamat'),
        ];

        // Lakukan update data
        if ($investorModel->update($request->getPost('editId'), $data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data.']);
        }
    }

    public function detail_investor($id)
    {
        $investorModel = new InvestorModel();
        $data = $investorModel->find($id);

        if ($data) {
            return $this->response->setJSON(['success' => true, 'data' => $data]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
    }

    // --------------------------------------------------------------------
    // INVESTASI
    // --------------------------------------------------------------------

    public function investasi()
    {
        $data['title'] = 'Manajemen Investasi';
        // return view('admin/investasi');
        return $this->loadView('admin/investasi', $data);
    }

    public function investasiData()
    {
        $request = service('request');
        $investasiModel = new InvestasiModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');

        $searchValue = $request->getPost('search');
        $searchValue = isset($searchValue['value']) ? $searchValue['value'] : '';

        $totalRecords = $investasiModel->countAllResults();
        $totalRecordsWithFilter = $investasiModel->like('periode', $searchValue)
            ->orLike('investor', $searchValue)
            ->orLike('jumlah_modal', $searchValue)
            ->orLike('tujuan', $searchValue)
            ->orLike('tgl_investasi', $searchValue)
            ->orLike('status', $searchValue)
            ->orLike('tgl_mulai', $searchValue)
            ->orLike('tgl_akhir', $searchValue)
            ->orLike('bukti', $searchValue)
            ->countAllResults(false);

        $records = $investasiModel->like('periode', $searchValue)
            ->orLike('investor', $searchValue)
            ->orLike('jumlah_modal', $searchValue)
            ->orLike('tujuan', $searchValue)
            ->orLike('tgl_investasi', $searchValue)
            ->orLike('status', $searchValue)
            ->orLike('tgl_mulai', $searchValue)
            ->orLike('tgl_akhir', $searchValue)
            ->orLike('bukti', $searchValue)
            ->orderBy('id', 'DESC')
            ->findAll($length, $start);

        // Tambahkan penomoran dan format jumlah_modal
        $data = [];
        foreach ($records as $index => $record) {
            $record['number'] = $start + $index + 1; // Penomoran dimulai dari 1
            $record['aksi'] = '<a class="btn btn-info btn-sm detail" data-id="' . $record['id'] . '"><i class="fas fa-eye"></i></a> '
                . '<a class="btn btn-primary btn-sm edit" data-id="' . $record['id'] . '"><i class="fas fa-edit"></i></a> '
                . '<a class="btn btn-danger btn-sm hapus" data-id="' . $record['id'] . '"><i class="fas fa-trash"></i></a>';
            $data[] = $record;
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordsWithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }

    public function get_investors()
    {
        $model = new InvestorModel();
        $investors = $model->findAll();

        return $this->response->setJSON([
            'data' => $investors
        ]);
    }

    public function upload_investasi()
    {
        $request = service('request');

        // Ambil data dari form
        $periode = $request->getPost('periode');
        $investor = $request->getPost('investor');
        $jumlah_modal = $request->getPost('jumlah_modal');
        $tujuan = $request->getPost('tujuan');
        $tgl_investasi = $request->getPost('tgl_investasi');
        $status = $request->getPost('status');
        $tgl_mulai = $request->getPost('tgl_mulai');
        $tgl_akhir = $request->getPost('tgl_akhir');

        // Membuat nama folder berdasarkan periode dan investor
        $folderName = $tgl_investasi . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $investor);

        // Path lengkap ke folder
        $uploadPath = FCPATH . 'uploads/bukti/' . $folderName;

        // Membuat folder jika belum ada
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Jika ada file
        $bukti = null;
        if ($file = $request->getFile('bukti')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $bukti = $file->getRandomName();
                $file->move($uploadPath, $bukti);
            }
        }

        $investasiModel = new InvestasiModel();

        // Data untuk disimpan
        $data = [
            'periode' => $periode,
            'investor' => $investor,
            'jumlah_modal' => $jumlah_modal,
            'tujuan' => $tujuan,
            'tgl_investasi' => $tgl_investasi,
            'status' => $status,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'bukti' => $folderName . '/' . $bukti // Menyimpan path relatif ke folder
        ];

        // Simpan data ke database
        if ($investasiModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }
    }


    public function delete_investasi($id)
    {
        $investasiModel = new InvestasiModel();

        if ($investasiModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil dihapus.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghapus data.']);
        }
    }


    public function detail_investasi($id)
    {
        $investasiModel = new InvestasiModel();
        $data = $investasiModel->get_investor_data($id);

        if ($data) {
            return $this->response->setJSON(['success' => true, 'data' => $data]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
    }

    public function update_investasi()
    {
        $request = service('request');
        $investasiModel = new InvestasiModel();

        $data = [
            'periode' => $request->getPost('editPeriode'),
            'investor' => $request->getPost('editInvestorId'), // Gunakan investor_id
            'jumlah_modal' => $request->getPost('editJumlahModal'),
            'tujuan' => $request->getPost('editTujuan'),
            'tgl_investasi' => $request->getPost('editTglInvestasi'),
            'status' => $request->getPost('editStatus'),
            'tgl_mulai' => $request->getPost('editTglMulai'),
            'tgl_akhir' => $request->getPost('editTglAkhir')
        ];

        // Ambil nama file bukti lama
        $bukti = $request->getPost('bukti_lama');

        // Jika ada file baru yang diunggah
        $file = $request->getFile('editBukti');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Pindahkan file baru dan simpan namanya
            $bukti = $file->getRandomName();
            $file->move(FCPATH . 'uploads/bukti', $bukti);
        }

        // Tambahkan nama file bukti ke data yang akan diupdate
        $data['bukti'] = $bukti;

        // Lakukan update data
        if ($investasiModel->update($request->getPost('editId'), $data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data.']);
        }
    }


    // --------------------------------------------------------------------
    // DATA BARANG
    // --------------------------------------------------------------------
    public function data_barang()
    {
        $data['title'] = 'Manajemen Data Barang';
        return $this->loadView('admin/data_barang', $data);
    }

    public function dataBarang()
    {
        $request = service('request');
        $barangModel = new BarangModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');

        $searchValue = $request->getPost('search');
        $searchValue = isset($searchValue['value']) ? $searchValue['value'] : '';

        $totalRecords = $barangModel->countAllResults();
        $totalRecordsWithFilter = $barangModel->like('nama_barang', $searchValue)
            ->orLike('satuan', $searchValue)
            ->countAllResults(false);

        $records = $barangModel->like('nama_barang', $searchValue)
            ->orLike('satuan', $searchValue)
            ->orderBy('id', 'DESC')
            ->findAll($length, $start);

        // Tambahkan penomoran
        $data = [];

        foreach ($records as $index => $record) {
            $record['number'] = $start + $index + 1; // Penomoran dimulai dari 1
            $record['aksi'] = '<a class="btn btn-primary btn-sm edit" data-id="' . $record['id'] . '"><i class="fas fa-edit"></i></a> '
                . '<a class="btn btn-danger btn-sm hapus" data-id="' . $record['id'] . '"><i class="fas fa-trash"></i></a>';
            $data[] = $record;
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordsWithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }

    public function upload_data_barang()
    {
        $request = service('request');

        // Ambil data dari form
        $nama_barang = $request->getPost('nama_barang');
        $satuan = $request->getPost('satuan');

        $barangModel = new BarangModel();

        // Data untuk disimpan
        $data = [
            'nama_barang' => $nama_barang,
            'satuan' => $satuan,
        ];

        // Simpan data ke database
        if ($barangModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil disimpan.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menyimpan data.']);
        }
    }

    public function delete_data_barang($id)
    {
        $barangModel = new BarangModel();

        if ($barangModel->delete($id)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil dihapus.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menghapus data.']);
        }
    }

    public function detail_data_barang($id)
    {
        $barangModel = new BarangModel();
        $data = $barangModel->find($id);

        if ($data) {
            return $this->response->setJSON(['success' => true, 'data' => $data]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak ditemukan.']);
        }
    }

    public function update_data_barang()
    {
        $request = service('request');
        $barangModel = new BarangModel();

        $data = [
            'nama_barang' => $request->getPost('edit_nama_barang'),
            'satuan' => $request->getPost('edit_satuan'),
        ];

        // Lakukan update data
        if ($barangModel->update($request->getPost('editId'), $data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui data.']);
        }
    }

    // --------------------------------------------------------------------
    // DATA PERUSAHAAN
    // --------------------------------------------------------------------

    public function data_perusahaan()
    {
        $modelPerusahaan = new PerusahaanModel();
        $data['perusahaan'] = $modelPerusahaan->findAll()[0]; // Mengambil data pertama
        $data['title'] = 'Manajemen Data Perusahaan';
        return $this->loadView('admin/data_perusahaan', $data);
    }

    public function update_perusahaan()
    {
        $model = new PerusahaanModel();
        $data = $this->request->getPost();

        $model->update(1, $data);

        return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    private function loadView(string $viewName, array $data = []): string
    {
        $uri = service('uri');
        $data['current_uri'] = $uri->getSegment(2); // Ambil segmen kedua dari URI

        return view($viewName, $data);
    }


    // --------------------------------------------------------------------
    // DATA BELANJA BARANG
    // --------------------------------------------------------------------
    public function belanja_barang()
    {
        $investasiModel = new InvestasiModel();
        $investors = $investasiModel->getInvestorCompanies();

        // Process to get unique investors with their periods
        $uniqueInvestors = [];
        foreach ($investors as $investor) {
            if (!isset($uniqueInvestors[$investor['investor_id']])) {
                $uniqueInvestors[$investor['investor_id']] = [
                    'nama_perusahaan' => $investor['nama_perusahaan'],
                    'investor_id' => $investor['investor_id'],
                    'periods' => []  // Initialize periods as an empty array
                ];
            }
            $uniqueInvestors[$investor['investor_id']]['periods'][] = [
                'periode' => $investor['periode'],
                'investasi_id' => $investor['investasi_id'],
                'jumlah_modal' => $investor['jumlah_modal'],
                'tujuan' => $investor['tujuan'],
                'tgl_investasi' => $investor['tgl_investasi']
            ];
        }

        // Convert associative array to indexed array for easier use in the view
        $data['investors'] = array_values($uniqueInvestors);
        $data['title'] = 'Manajemen Belanja Barang';

        return $this->loadView('admin/belanja_barang', $data);
    }

    public function getNewTransactionId()
    {
        $belanja = new BelanjaModel();
        $lastId = $belanja->getLastId();
        $nextId = isset($lastId['id']) ? $lastId['id'] + 1 : 1;

        // Format tahun
        $year = date('Y');

        // Format nomor urut dengan leading zeros
        $formattedNextId = str_pad($nextId, 5, '0', STR_PAD_LEFT);

        // Buat ID transaksi baru tanpa tanda kurung
        $newTransactionId = sprintf('INV-NPPG%s-%s', $year, $formattedNextId);

        return $this->response->setJSON(['no_invoice' => $newTransactionId]);
    }

    public function getPeriodeByInvestor($investorId)
    {
        $investasiModel = new InvestasiModel();
        $data = $investasiModel->getPeriodeByInvestor($investorId);
        return $this->response->setJSON($data);
    }

    public function getInvestasiDetails($investorId, $periode)
    {
        $investasiModel = new InvestasiModel();
        $data = $investasiModel->getInvestasiDetails($investorId, $periode);
        return $this->response->setJSON($data);
    }

    public function getNamaBarangOptions()
    {
        $barangModel = new BarangModel();
        $data = $barangModel->findAll();

        $options = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'nama_barang' => $item['nama_barang'],
                'satuan' => $item['satuan']
            ];
        }, $data);

        return $this->response->setJSON($options);
    }

    public function getBarangData()
    {
        $barangModel = new BarangModel();
        $id = $this->request->getGet('id');

        $data = $barangModel->find($id);

        return $this->response->setJSON($data);
    }

    public function dataBelanjaBarang()
    {
        $request = service('request');
        $belanjaModel = new BelanjaModel();

        $draw = $request->getPost('draw');
        $start = $request->getPost('start');
        $length = $request->getPost('length');

        $searchValue = $request->getPost('search');
        $searchValue = isset($searchValue['value']) ? $searchValue['value'] : '';

        // Total records without filtering
        $totalRecords = count($belanjaModel->findAll());

        // Records with filtering
        $filteredResult = $belanjaModel->get_filtered_data_belanja($searchValue, $start, $length);
        $filteredRecords = $filteredResult['data'];
        $totalRecordsWithFilter = $filteredResult['totalFiltered'];

        // Add numbering and actions
        $data = [];
        foreach ($filteredRecords as $index => $record) {
            $record['number'] = $start + $index + 1;
            $record['aksi'] = '<a class="btn btn-info btn-sm detail" data-id="' . $record['investasi_id'] . '"><i class="fas fa-eye"></i></a> '
                . '<a class="btn btn-primary btn-sm edit" data-id="' . $record['investasi_id'] . '"><i class="fas fa-edit"></i></a> '
                . '<a class="btn btn-danger btn-sm hapus" data-id="' . $record['investasi_id'] . '"><i class="fas fa-trash"></i></a>';
            $data[] = $record;
        }

        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecordsWithFilter,
            "data" => $data
        ];

        return $this->response->setJSON($response);
    }

    public function simpan_data_belanja()
    {
        $belanjaModel = new BelanjaModel();

        $data = $this->request->getPost();

        $no_invoice = $data['no_invoice'];
        $investasi_id = $data['investasi_id'];
        $items = $data['nama_barang'];
        $qtys = $data['qty'];
        $satuans = $data['satuan']; // Ubah dari $satuan menjadi $satuans
        $harga_satuans = $data['harga_satuan'];
        $total_hargas = $data['total_harga'];
        $investasi_id = $data['investasi_id'];

        $total_transaksi = 0;
        $tanggal_transaksi = date('Y-m-d H:i:s'); // Sesuaikan dengan format tanggal yang diinginkan

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            if (count($items) === count($qtys) && count($qtys) === count($satuans) && count($satuans) === count($harga_satuans) && count($harga_satuans) === count($total_hargas)) {
                foreach ($items as $index => $nama_item) {
                    $jumlah_item = $qtys[$index];
                    $satuan = $satuans[$index];
                    $harga_satuan = preg_replace('/[^0-9]/', '', $harga_satuans[$index]);
                    $harga_total = preg_replace('/[^0-9]/', '', $total_hargas[$index]);

                    $total_transaksi += $harga_total;

                    $belanjaModel->insert([
                        'no_invoice' => $no_invoice,
                        'nama_item' => $nama_item,
                        'jumlah_item' => $jumlah_item,
                        'tanggal_transaksi' => $tanggal_transaksi,
                        'satuan' => $satuan, // Menggunakan $satuan untuk setiap item
                        'harga_satuan' => $harga_satuan,
                        'harga_total' => $harga_total,
                        'total_transaksi' => $total_transaksi,
                        'investasi_id' => $investasi_id,
                    ]);
                }

                $db->transComplete();

                if ($db->transStatus() === false) {
                    throw new \Exception('Transaksi gagal.');
                }

                return $this->response->setJSON(['success' => true, 'message' => 'Data berhasil disimpan.']);
            } else {
                throw new \Exception('Panjang array tidak sama.');
            }
        } catch (\Exception $e) {
            $db->transRollback();
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // --------------------------------------------------------------------
    // DATA PENJUALAN BARANG
    // --------------------------------------------------------------------
    public function penjualan_barang()
    {
        $data['title'] = 'Manajemen Penjualan Barang';
        return $this->loadView('admin/penjualan_barang', $data);
    }
}
