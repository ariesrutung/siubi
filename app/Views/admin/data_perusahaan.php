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
                <h1>Data Perusahaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Perusahaan</li>
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
                        <h3 class="card-title">Data Investasi</h3>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadDataModal">Tambah Data Investasi Baru</button>
                    </div>
                    <div class="card-body">
                        <form id="updatePerusahaanForm">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" value="<?= $perusahaan['id'] ?>">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nama_perseroan">Nama Perseroan:</label>
                                        <input type="text" class="form-control" id="nama_perseroan" name="nama_perseroan" value="<?= $perusahaan['nama_perseroan'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="alamat_lengkap_perseroan">Alamat Lengkap Perseroan:</label>
                                        <input type="text" class="form-control" id="alamat_lengkap_perseroan" name="alamat_lengkap_perseroan" value="<?= $perusahaan['alamat_lengkap_perseroan'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kegiatan_usaha_1">Kegiatan Usaha 1:</label>
                                        <input type="text" class="form-control" id="kegiatan_usaha_1" name="kegiatan_usaha_1" value="<?= $perusahaan['kegiatan_usaha_1'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kegiatan_usaha_2">Kegiatan Usaha 2:</label>
                                        <input type="text" class="form-control" id="kegiatan_usaha_2" name="kegiatan_usaha_2" value="<?= $perusahaan['kegiatan_usaha_2'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="modal_usaha">Modal Usaha:</label>
                                        <input type="text" class="form-control" id="modal_usaha" name="modal_usaha" value="<?= $perusahaan['modal_usaha'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap:</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $perusahaan['nama_lengkap'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $perusahaan['tanggal_lahir'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="alamat_lengkap_personal">Alamat Lengkap Personal:</label>
                                        <input type="text" class="form-control" id="alamat_lengkap_personal" name="alamat_lengkap_personal" value="<?= $perusahaan['alamat_lengkap_personal'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nik">NIK:</label>
                                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $perusahaan['nik'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="npwp">NPWP:</label>
                                        <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $perusahaan['npwp'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nomor_sertifikat">Nomor Sertifikat:</label>
                                        <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat" value="<?= $perusahaan['nomor_sertifikat'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nib">NIB:</label>
                                        <input type="text" class="form-control" id="nib" name="nib" value="<?= $perusahaan['nib'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="no_hp">No HP:</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $perusahaan['no_hp'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $perusahaan['email'] ?>">
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
        $('#updatePerusahaanForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '<?= site_url('admin/update_perusahaan') ?>',
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