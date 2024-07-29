<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Barang & Jasa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Barang & Jasa</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Barang & Jasa</h3>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadDataModal">Tambah Data Barang & Jasa Baru</button>
                    </div>
                    <div class="card-body">
                        <table id="barangTable" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="w-5">No.</th>
                                    <th class="w-75">Nama Barang & Jasa</th>
                                    <th class="w-20">Satuan</th>
                                    <th class="w-5">Aksi</th>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadDataModalLabel">Modal Unggah Data Barang & Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadDataForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang & Jasa</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" id="satuan" name="satuan" required>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modal Unggah Data Barang & Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" id="editId" name="editId">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_nama_barang" class="form-label">Nama Barang & Jasa</label>
                                <input type="text" class="form-control" id="edit_nama_barang" name="edit_nama_barang" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="edit_satuan" class="form-label">Satuan</label>
                                <input type="text" class="form-control" id="edit_satuan" name="edit_satuan" required>
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
        var barangTable = $('#barangTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/dataBarang') ?>",
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
                    "data": "nama_barang",
                    "orderable": false
                },
                {
                    "data": "satuan",
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
                url: '<?= site_url('admin/upload_data_barang') ?>',
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
                        $('#barangTable').DataTable().ajax.reload(); // Reload DataTable
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


        $('#barangTable tbody').on('click', '.hapus', function() {
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
                        url: '<?= site_url('admin/delete_data_barang') ?>/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Terhapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                );
                                barangTable.ajax.reload(null, false); // Reload data dengan tetap berada di halaman yang sama
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

        $('#barangTable tbody').on('click', '.edit', function() {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= site_url('admin/detail_data_barang') ?>/' + id,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#editId').val(response.data.id);
                        $('#edit_nama_barang').val(response.data.nama_barang);
                        $('#edit_satuan').val(response.data.satuan);

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
                url: '<?= site_url('admin/update_data_barang') ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#editModal').modal('hide');
                        barangTable.ajax.reload(null, false); // Reload tabel
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