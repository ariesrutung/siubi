<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<style>
    #tableDetail th {
        font-weight: normal !important;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Investasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Investasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Investasi</h3>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadDataModal">Tambah Data Investasi Baru</button>
                    </div>
                    <div class="card-body">
                        <table id="investasiTable" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Periode</th>
                                    <th>Jumlah Modal</th>
                                    <th>Tujuan</th>
                                    <th>Tgl Investasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal Tambah Data Investasi -->
<div class="modal fade" id="uploadDataModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="uploadDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadDataModalLabel">Modal Unggah Data Investasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadDataForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="periode" class="form-label">Periode</label>
                                <select class="form-control" id="periode" name="periode" required>
                                    <!-- Options will be populated by JavaScript -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="investor" class="form-label">Investor</label>
                                <select class="form-control" id="investor" name="investor" required>
                                    <option value="">Pilih Investor</option>
                                    <!-- Options will be populated by AJAX -->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="jumlah_modal" class="form-label">Jumlah Modal</label>
                                <input type="text" class="form-control" id="jumlah_modal" name="jumlah_modal" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_investasi" class="form-label">Tanggal Investasi</label>
                                <input type="date" class="form-control" id="tgl_investasi" name="tgl_investasi" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="bukti" class="form-label">Bukti</label><br>
                                <input type="file" id="bukti" name="bukti">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Detail Data Investasi -->
<div class="modal fade" id="detailModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Investasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-9">
                        <table id="tableDetail" class="table">
                            <tbody>
                                <tr>
                                    <th>Periode</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailPeriode"></td>
                                </tr>
                                <tr>
                                    <th>Investor</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailInvestor"></td>
                                </tr>
                                <tr>
                                    <th>Pemilik</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailPemilik"></td>
                                </tr>
                                <tr>
                                    <th>Jumlah Modal</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailJumlahModal"></td>
                                </tr>
                                <tr>
                                    <th>Tujuan</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailTujuan"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Investasi</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailTglInvestasi"></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailStatus"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Mulai</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailTglMulai"></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Akhir</th>
                                    <td>:</td>
                                    <td class="text-bold" id="detailTglAkhir"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <img class="w-100" id="detailBuktiImg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Investasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <input type="hidden" id="editId" name="editId">
                <div class="modal-body">
                    <input type="hidden" id="editBuktiLama" name="bukti_lama">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="editPeriode" class="form-label">Periode</label>
                                        <input type="text" class="form-control" id="editPeriode" name="editPeriode">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="mb-3">
                                        <label for="editInvestor" class="form-label">Investor</label>
                                        <input type="text" class="form-control" id="editInvestor" name="editInvestor" readonly>
                                        <input type="hidden" id="editInvestorId" name="editInvestorId">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editJumlahModal" class="form-label">Jumlah Modal</label>
                                <input type="text" class="form-control" id="editJumlahModal" name="editJumlahModal">
                            </div>
                            <div class="mb-3">
                                <label for="editTujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" id="editTujuan" name="editTujuan">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="editTglInvestasi" class="form-label">Tanggal Investasi</label>
                                        <input type="date" class="form-control" id="editTglInvestasi" name="editTglInvestasi">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="editStatus" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="editStatus" name="editStatus">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="editTglMulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="editTglMulai" name="editTglMulai">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="editTglAkhir" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="editTglAkhir" name="editTglAkhir">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="editBukti" class="form-label">Bukti</label>
                                <input type="file" class="form-control mt-2" id="editBukti" name="editBukti">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <img id="editBuktiImg" alt="Bukti" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#investasiTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/investasi_data') ?>",
                "type": "POST",
                "data": function(d) {
                    console.log(d); // Debugging
                },
                "error": function(xhr, error, code) {
                    console.log("Error:", error);
                    console.log("Code:", code);
                    console.log("Response Text:", xhr.responseText);
                }
            },
            "columns": [{
                    "data": "number",
                    "orderable": false
                },
                {
                    "data": "periode",
                    "orderable": false
                },
                {
                    "data": "jumlah_modal",
                    "orderable": false
                },
                {
                    "data": "tujuan",
                    "orderable": false
                },
                {
                    "data": "tgl_investasi",
                    "orderable": false
                },
                {
                    "data": "status",
                    "orderable": false
                },
                {
                    "data": "aksi",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "order": [], // Disable initial sort
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

        function loadPeriode() {
            var $periodeSelect = $('#periode');
            var currentYear = new Date().getFullYear();
            var months = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            $periodeSelect.empty(); // Clear existing options

            $.each(months, function(index, month) {
                var value = month + ' ' + currentYear;
                $periodeSelect.append('<option value="' + value + '">' + value + '</option>');
            });
        }

        // Load months when the modal is shown
        $('#uploadDataModal').on('show.bs.modal', function() {
            loadPeriode();
        });

        // Event listener untuk tombol hapus
        $('#investasiTable tbody').on('click', '.hapus', function() {
            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= site_url('admin/delete_investasi') ?>/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                );
                                table.ajax.reload(null, false); // Reload data dengan tetap berada di halaman yang sama
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    'Gagal menghapus data: ' + response.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error:", error);
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan: ' + error,
                                'error'
                            );
                        }
                    });
                }
            });
        });


        // Event listener untuk tombol detail
        $('#investasiTable tbody').on('click', '.detail', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= site_url('admin/detail_investasi') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#detailPeriode').text(response.data.periode);
                        $('#detailInvestor').text(response.data.nama_perusahaan);
                        $('#detailPemilik').text(response.data.investor_nama);
                        $('#detailJumlahModal').text(response.data.jumlah_modal);
                        $('#detailTujuan').text(response.data.tujuan);
                        $('#detailTglInvestasi').text(response.data.tgl_investasi);
                        $('#detailStatus').text(response.data.status);
                        $('#detailTglMulai').text(response.data.tgl_mulai);
                        $('#detailTglAkhir').text(response.data.tgl_akhir);

                        // Mengatur sumber gambar bukti
                        var buktiPath = '<?= base_url('uploads/bukti') ?>/' + response.data.bukti;
                        $('#detailBuktiImg').attr('src', buktiPath);

                        $('#detailModal').modal('show');
                    } else {
                        alert('Gagal mengambil data detail: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        });


        // Menampilkan modal edit dengan data yang sudah ada
        $('#investasiTable tbody').on('click', '.edit', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= site_url('admin/detail_investasi') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#editId').val(response.data.id); // Pastikan response.data.id memiliki nilai yang benar
                        $('#editPeriode').val(response.data.periode);
                        $('#editInvestor').val(response.data.nama_perusahaan); // Gunakan nama_perusahaan untuk tampilan
                        $('#editInvestorId').val(response.data.investor_id); // Gunakan investor_id untuk database
                        $('#editJumlahModal').val(response.data.jumlah_modal);
                        $('#editTujuan').val(response.data.tujuan);
                        $('#editTglInvestasi').val(response.data.tgl_investasi);
                        $('#editStatus').val(response.data.status);
                        $('#editTglMulai').val(response.data.tgl_mulai);
                        $('#editTglAkhir').val(response.data.tgl_akhir);

                        // Set gambar lama
                        var buktiPath = '<?= base_url('uploads/bukti') ?>/' + response.data.bukti;
                        $('#editBuktiImg').attr('src', buktiPath);
                        $('#editBuktiLama').val(response.data.bukti);

                        $('#editModal').modal('show');
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Gagal mengambil data detail: ' + response.message,
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan: ' + error,
                        'error'
                    );
                }
            });
        });

        // Mengirim data yang diperbarui ke server
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url('admin/update_investasi') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#editModal').modal('hide');
                        $('#investasiTable').DataTable().ajax.reload(); // Reload tabel
                        Swal.fire(
                            'Berhasil!',
                            'Data berhasil diperbarui.',
                            'success'
                        );
                    } else {
                        Swal.fire(
                            'Gagal!',
                            'Gagal memperbarui data: ' + response.message,
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan: ' + error,
                        'error'
                    );
                }
            });
        });

        function loadInvestors() {
            $.ajax({
                url: '<?= site_url('admin/get_investors') ?>',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var $investorSelect = $('#investor');
                    $investorSelect.empty(); // Clear existing options
                    $investorSelect.append('<option value="">Pilih Investor</option>'); // Add default option

                    $.each(response.data, function(index, investor) {
                        $investorSelect.append('<option value="' + investor.id + '">' + investor.nama_lengkap + ' - ' + investor.nama_perusahaan + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        }

        // Load investors when the modal is shown
        $('#uploadDataModal').on('show.bs.modal', function() {
            loadInvestors();
        });

        $('#uploadDataForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url('admin/upload_investasi') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log("Response:", response);
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Data berhasil dikirim!',
                        });
                        $('#uploadDataModal').modal('hide');
                        $('#investasiTable').DataTable().ajax.reload(); // Reload DataTable
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal mengirim data: ' + response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan: ' + error,
                    });
                }
            });
        });


        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.getElementById('jumlah_modal').addEventListener('input', function(e) {
            var input = e.target.value.replace(/[^0-9,]/g, '');
            e.target.value = formatRupiah(input, 'Rp. ');
        });


    });
</script>


<?= $this->endSection() ?>