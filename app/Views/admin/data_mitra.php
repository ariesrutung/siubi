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
                <h1>Data Mitra</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Mitra</li>
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
                        <h3 class="card-title">Informasi Mitra</h3>
                    </div>
                    <div class="card-body">
                        <form id="updateMitraForm">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $mitra['id'] ?>">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nama_perseroan">Nama Perseroan:</label>
                                        <input type="text" class="form-control" id="nama_perseroan" name="nama_perseroan" value="<?= $mitra['nama_perseroan'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="alamat_lengkap_perseroan">Alamat Lengkap Perseroan:</label>
                                        <input type="text" class="form-control" id="alamat_lengkap_perseroan" name="alamat_lengkap_perseroan" value="<?= $mitra['alamat_lengkap_perseroan'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kegiatan_usaha_1">Kegiatan Usaha 1:</label>
                                        <input type="text" class="form-control" id="kegiatan_usaha_1" name="kegiatan_usaha_1" value="<?= $mitra['kegiatan_usaha_1'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kegiatan_usaha_2">Kegiatan Usaha 2:</label>
                                        <input type="text" class="form-control" id="kegiatan_usaha_2" name="kegiatan_usaha_2" value="<?= $mitra['kegiatan_usaha_2'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="modal_usaha">Modal Usaha:</label>
                                        <input type="text" class="form-control" id="modal_usaha" name="modal_usaha" value="<?= $mitra['modal_usaha'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap:</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $mitra['nama_lengkap'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $mitra['tanggal_lahir'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="alamat_lengkap_personal">Alamat Lengkap Personal:</label>
                                        <input type="text" class="form-control" id="alamat_lengkap_personal" name="alamat_lengkap_personal" value="<?= $mitra['alamat_lengkap_personal'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nik">NIK:</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $mitra['nik'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="npwp">NPWP:</label>
                                        <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $mitra['npwp'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nomor_sertifikat">Nomor Sertifikat:</label>
                                        <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" value="<?= $mitra['nomor_sertifikat'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nib">NIB:</label>
                                        <input type="text" class="form-control" id="nib" name="nib" value="<?= $mitra['nib'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="no_hp">No HP:</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $mitra['no_hp'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $mitra['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Perbaru Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#updateMitraForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= site_url('admin/update_mitra') ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal memperbarui data',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan: ' + error,
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>