<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Investor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Investor</li>
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
                        <h3 class="card-title">Data Investor</h3>
                        <!-- <button class="btn btn-info btn-sm">Tambah Data Investor Baru</button> -->
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadDataModal">Tambah Data Investor Baru</button>
                    </div>
                    <div class="card-body">
                        <table id="investorTable" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="w-5">No.</th>
                                    <th class="w-15">Nama Lengkap</th>
                                    <th class="w-25">Alamat</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Jabatan</th>
                                    <th>Sumber Dana</th>
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
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="sumber_dana" class="form-label">Sumber Dana</label>
                                <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Perusahaan</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
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

<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modal Unggah Data Investasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="editId" name="editId">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="edit_nama_lengkap" name="edit_nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="edit_jabatan" name="edit_jabatan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="edit_nama_perusahaan" name="edit_nama_perusahaan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_sumber_dana" class="form-label">Sumber Dana</label>
                                <input type="text" class="form-control" id="edit_sumber_dana" name="edit_sumber_dana" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_alamat" class="form-label">Alamat Perusahaan</label>
                                <textarea type="text" class="form-control" id="edit_alamat" name="edit_alamat"></textarea>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        var investorTable = $('#investorTable').DataTable({
            // $('#investorTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/investor_data') ?>",
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
                    "data": "nama_lengkap",
                    "orderable": false
                },
                {
                    "data": "alamat",
                    "orderable": false
                },
                {
                    "data": "nama_perusahaan",
                    "orderable": false
                },
                {
                    "data": "jabatan",
                    "orderable": false
                },
                {
                    "data": "sumber_dana",
                    "orderable": false
                },
                {
                    "data": "aksi",
                    "orderable": false
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

        $('#uploadDataForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url('admin/upload_investor') ?>',
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
                        $('#uploadDataForm')[0].reset(); // Reset form
                        $('#investorTable').DataTable().ajax.reload(); // Reload DataTable
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


        $('#investorTable tbody').on('click', '.hapus', function() {
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
                        url: '<?= site_url('admin/delete_investor') ?>/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                );
                                investorTable.ajax.reload(null, false); // Reload data dengan tetap berada di halaman yang sama
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

        $('#investorTable tbody').on('click', '.edit', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= site_url('admin/detail_investor') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#editId').val(response.data.id);
                        $('#edit_nama_lengkap').val(response.data.nama_lengkap);
                        $('#edit_jabatan').val(response.data.jabatan);
                        $('#edit_nama_perusahaan').val(response.data.nama_perusahaan);
                        $('#edit_sumber_dana').val(response.data.sumber_dana);
                        $('#edit_alamat').val(response.data.alamat);

                        $('#editModal').modal('show');
                    } else {
                        Swal.fire('Gagal!', 'Gagal mengambil data detail: ' + response.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire('Error!', 'Terjadi kesalahan: ' + error, 'error');
                }
            });
        });

        // Mengirim data yang diperbarui ke server
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url('admin/update_investor') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#editModal').modal('hide');
                        investorTable.ajax.reload(null, false); // Reload tabel
                        Swal.fire('Berhasil!', 'Data berhasil diperbarui.', 'success');
                    } else {
                        Swal.fire('Gagal!', 'Gagal memperbarui data: ' + response.message, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                    Swal.fire('Error!', 'Terjadi kesalahan: ' + error, 'error');
                }
            });
        });

    });
</script>

<?= $this->endSection() ?>