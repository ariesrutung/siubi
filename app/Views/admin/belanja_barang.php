<?= $this->extend('admin/template') ?>
<?= $this->section('content') ?>

<style>
    #fieldsTable th {
        font-weight: normal;
    }

    #fieldsTable th,
    #fieldsTable td {
        padding: 5px !important;
    }

    td.w-45 {
        width: 45% !important;
    }

    td.w-65 {
        width: 65% !important;
    }

    td.w-15 {
        width: 15% !important;
    }

    td.w-10 {
        width: 10% !important;
    }

    td.w-20 {
        width: 20% !important;
    }

    td.w-5 {
        width: 5% !important;
    }

    .is-invalid {
        border-color: red;
    }

    img.w-15.inv-logo {
        width: 15% !important;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Belanja Barang & Jasa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Belanja Barang & Jasa</li>
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
                        <h3 class="card-title">Data Belanja Barang & Jasa</h3>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#uploadDataModal">Tambah Data Belanja Barang & Jasa Baru</button>
                    </div>
                    <div class="card-body">
                        <table id="dataBelanjaTable" class="display table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Periode</th>
                                    <th>Investor</th>
                                    <th>Jumlah Investasi</th>
                                    <th>Tgl. Investasi</th>
                                    <th>Tujuan</th>
                                    <th class="text-center">Aksi</th>
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
                <h5 class="modal-title" id="uploadDataModalLabel">Modal Unggah Data Belanja Barang & Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadDataForm">
                <div class="modal-body">
                    <div class="row" id="inputFields">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="investor" class="form-label">Investor</label>
                                <select class="form-control" id="investor" name="investor" required>
                                    <option value="">Pilih Investor</option>
                                    <?php if (!empty($investors)) : ?>
                                        <?php foreach ($investors as $investor) : ?>
                                            <option value="<?= esc($investor['investor_id']); ?>" data-periods='<?= json_encode($investor['periods'] ?? []); ?>'>
                                                <?= esc($investor['nama_perusahaan']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="periode" class="form-label">Periode</label>
                                <select class="form-control" id="periode" name="periode" required>
                                    <option value="">Pilih Periode</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="modal_investasi" class="form-label">Jumlah Modal</label>
                                <input type="text" class="form-control" id="modal_investasi" name="modal_investasi" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_item" class="form-label">Nama Item</label>
                                <input class="form-control" id="nama_item" name="nama_item" readonly>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="no_invoice" class="form-label">No. Invoice</label>
                                <input type="text" class="form-control" id="no_invoice" name="no_invoice" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="investasi_id" class="form-label">ID Investasi</label>
                                <input type="text" class="form-control" id="investasi_id" name="investasi_id" required readonly>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row" id="additionalFields">
                        <div class="col-lg-12">
                            <table class="table" id="fieldsTable">
                                <thead>
                                    <tr>
                                        <th class="w-55">Nama Item/Barang</th>
                                        <th class="w-5">Qty</th>
                                        <th class="w-10">Harga Satuan</th>
                                        <th class="w-10">Total Harga</th>
                                        <th class="w-10">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="additionalFieldsContainer">
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8 d-flex align-items-center">
                                    <button type="button" id="addFieldButton" class="btn btn-primary">Tambah Item</button>
                                </div>
                                <div class="col-lg-4 d-flex align-items-center">
                                    <span>Total Transaksi</span>
                                    <input type="text" class="form-control" id="total_akhir" name="total_akhir" readonly>
                                </div>
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

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-success text-lg">
                    INVOICE
                </div>
            </div>
            <div class="modal-header">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="modal-title" id="detailModalLabel">No. Invoice: <span class="text-bold text-danger" id="no_invoice_header"></span></h5>
                        <span class="text-muted">Tanggal Transaksi: <strong class="text-danger" id="tanggal_transaksi"></strong></span>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
                <p></p>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="mb-3">Dari:</h6>
                                <div>
                                    <strong id="perusahaan_nama"></strong>
                                </div>
                                <div id="perusahaan_alamat"></div>
                                <div id="perusahaan_kota"></div>
                                <div id="perusahaan_email"></div>
                                <div id="perusahaan_phone"></div>
                            </div>
                            <div id="to" class="col-sm-6 text-right">
                                <h6 class="mb-3">Kepada:</h6>
                                <div>
                                    <strong id="mitra_nama"></strong>
                                </div>
                                <div id="mitra_alamat"></div>
                                <div id="mitra_kota"></div>
                                <div id="mitra_email"></div>
                                <div id="mitra_phone"></div>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Item</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tbody id="detailTableBody">
                                <!-- Data akan diisi oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info">Proses Pembayaran</button>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.detail', function() {
            var noInvoice = $(this).data('id');

            $.ajax({
                url: '<?= base_url("admin/get_detail_belanja") ?>',
                type: 'GET',
                data: {
                    no_invoice: noInvoice
                },
                success: function(response) {
                    if (response.invoiceData) {
                        var tanggalTransaksi = response.invoiceData.tanggal_transaksi;
                        var tanggalSaja = tanggalTransaksi.split(' ')[0];
                        var dateParts = tanggalSaja.split('-');
                        var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

                        $('#tanggal_transaksi').text(formattedDate);

                        var totalTransaksi = response.invoiceData.total_transaksi;
                        if (!isNaN(totalTransaksi)) {
                            $('#total_transaksi').val(formatRupiah(totalTransaksi));
                        } else {
                            $('#total_transaksi').val(totalTransaksi);
                        }

                        $('#no_invoice_header').text(response.invoiceData.no_invoice);
                    }

                    if (response.perusahaanData) {
                        var perusahaan = response.perusahaanData[0];
                        $('#perusahaan_nama').text(perusahaan.nama_perseroan);
                        $('#perusahaan_alamat').text(perusahaan.alamat_lengkap_perseroan);
                        $('#perusahaan_kota').text(perusahaan.kota + ', ' + perusahaan.provinsi + ', ' + perusahaan.kode_pos);
                        $('#perusahaan_email').text('Email: ' + perusahaan.email);
                        $('#perusahaan_phone').text('Phone: ' + perusahaan.no_hp);
                    }

                    if (response.mitraData) {
                        var mitra = response.mitraData[0];
                        $('#mitra_nama').text(mitra.nama_perseroan);
                        $('#mitra_alamat').text(mitra.alamat_lengkap_perseroan);
                        $('#mitra_kota').text(mitra.kota + ', ' + mitra.provinsi + ', ' + mitra.kode_pos);
                        $('#mitra_email').text('Email: ' + mitra.email);
                        $('#mitra_phone').text('Phone: ' + mitra.no_hp);
                    }

                    $('#detailTableBody').empty();
                    var no = 1;
                    var totalTransaksi = 0;
                    response.detailData.forEach(function(record) {
                        var hargaSatuan = !isNaN(record.harga_satuan) ? formatRupiah(record.harga_satuan) : record.harga_satuan;
                        var hargaTotal = !isNaN(record.harga_total) ? formatRupiah(record.harga_total) : record.harga_total;

                        if (!isNaN(record.harga_total)) {
                            totalTransaksi += parseFloat(record.harga_total);
                        }

                        var row = '<tr>' +
                            '<td class="text-center">' + no++ + '</td>' +
                            '<td>' + record.nama_barang + '</td>' +
                            '<td class="text-center">' + record.jumlah_item + '</td>' +
                            '<td class="text-center">' + record.satuan + '</td>' +
                            '<td class="text-right">' + hargaSatuan + '</td>' +
                            '<td class="text-right">' + hargaTotal + '</td>' +
                            '</tr>';
                        $('#detailTableBody').append(row);
                    });

                    $('#detailTableBody').parent().find('tfoot').remove();

                    var footerRow = '<tfoot>' +
                        '<tr>' +
                        '<td colspan="5" class="text-right"><strong>Total Transaksi</strong></td>' +
                        '<td class="text-right"> <strong>' + formatRupiah(totalTransaksi) + '</strong></td>' +
                        '</tr>' +
                        '</tfoot>';
                    $('#detailTableBody').parent().append(footerRow);

                    $('#detailModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('Gagal mengambil data detail.');
                }
            });
        });

        function formatRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++) {
                if (i % 3 == 0 && i != 0) {
                    rupiah += '.';
                }
                rupiah += angkarev[i];
            }
            return 'Rp. ' + rupiah.split('').reverse().join('');
        }

        var dataBelanjaTable = $('#dataBelanjaTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/dataBelanjaBarang') ?>",
                "type": "POST",
                "error": function(xhr, error, code) {
                    console.log("Error:", error);
                    console.log("Code:", code);
                    console.log("Response Text:", xhr.responseText);
                }
            },
            "columns": [{
                    "data": "number",
                    "orderable": false,
                    "className": "text-center"
                },
                {
                    "data": "periode",
                    "orderable": false,
                },
                {
                    "data": "nama_perusahaan",
                    "orderable": false
                },
                {
                    "data": "jumlah_modal",
                    "orderable": false
                },
                {
                    "data": "tgl_investasi",
                    "orderable": false
                },
                {
                    "data": "tujuan",
                    "orderable": false
                },
                {
                    "data": "aksi",
                    "orderable": false
                }
            ],
            "order": [],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true
        });

        $('#dataBelanjaTable').on('click', '.hapus', function() {
            const noInvoice = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('admin/hapusDataBelanja'); ?>',
                        type: 'POST',
                        data: {
                            no_invoice: noInvoice
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire('Terhapus!', response.message, 'success');
                                dataBelanjaTable.ajax.reload();
                            } else {
                                Swal.fire('Gagal!', response.message, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                        }
                    });
                }
            });
        });

        $('#uploadDataForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= site_url('admin/simpan_data_belanja') ?>',
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
                        }).then(() => {
                            $('#uploadDataModal').modal('hide');

                            $('#uploadDataForm')[0].reset();

                            $('#investor').val('').trigger('change');
                            $('#periode').empty().append('<option value="">Pilih Periode</option>');
                            $('#additionalFields').hide();

                            $('#dataBelanjaTable').DataTable().ajax.reload();
                        });
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
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const investorSelect = document.getElementById('investor');
        const periodeSelect = document.getElementById('periode');
        const modalInvestasiInput = document.getElementById('modal_investasi');
        const idInvestasiInput = document.getElementById('investasi_id');
        const namaItemInput = document.getElementById('nama_item');
        const idTransaksiInput = document.getElementById('no_invoice');
        const additionalFieldsRow = document.getElementById('additionalFields');

        function checkFields() {
            const investorFilled = investorSelect.value !== '';
            const periodeFilled = periodeSelect.value !== '';
            const modalInvestasiFilled = modalInvestasiInput.value.trim() !== '';
            const idInvestasiFilled = idInvestasiInput.value.trim() !== '';
            const namaItemFilled = namaItemInput.value.trim() !== '';
            const idTransaksiFilled = idTransaksiInput.value.trim() !== '';

            if (investorFilled && periodeFilled && modalInvestasiFilled && idInvestasiFilled && namaItemFilled && idTransaksiFilled) {
                additionalFieldsRow.style.display = 'flex';
            } else {
                additionalFieldsRow.style.display = 'none';
            }
        }

        function updateFields() {
            const selectedPeriode = periodeSelect.options[periodeSelect.selectedIndex];
            if (!selectedPeriode) {
                console.error('Selected periode option is null.');
                return;
            }
            const jumlahModal = selectedPeriode.getAttribute('data-jumlah_modal');
            const investasiID = selectedPeriode.getAttribute('data-investasi_id');
            const tujuan = selectedPeriode.getAttribute('data-tujuan');
            const tglInvestasi = selectedPeriode.getAttribute('data-tgl_investasi');

            modalInvestasiInput.value = jumlahModal || '';
            namaItemInput.value = tujuan || '';
            idInvestasiInput.value = investasiID || '';

            if (tglInvestasi) {
                fetch('<?= base_url('admin/getNewTransactionId'); ?>')
                    .then(response => response.json())
                    .then(data => {
                        idTransaksiInput.value = data.no_invoice;
                        checkFields();
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                checkFields();
            }
        }

        if (investorSelect) {
            investorSelect.addEventListener('change', function() {
                const selectedInvestor = this.options[this.selectedIndex];
                if (!selectedInvestor) {
                    console.error('Selected investor option is null.');
                    return;
                }
                const periods = selectedInvestor.getAttribute('data-periods');

                // Reset periode select dan input lainnya
                periodeSelect.innerHTML = '<option value="">Pilih Periode</option>';
                modalInvestasiInput.value = '';
                namaItemInput.value = '';
                idInvestasiInput.value = '';
                idTransaksiInput.value = '';

                if (periods) {
                    const periodsArray = JSON.parse(periods);
                    periodsArray.forEach(period => {
                        const option = document.createElement('option');
                        option.value = period.periode;
                        option.textContent = period.periode;
                        option.setAttribute('data-jumlah_modal', period.jumlah_modal);
                        option.setAttribute('data-tujuan', period.tujuan);
                        option.setAttribute('data-investasi_id', period.investasi_id);
                        option.setAttribute('data-tgl_investasi', period.tgl_investasi);
                        periodeSelect.appendChild(option);
                    });
                }

                // Check fields setelah mengisi periode
                checkFields();
            });
        }

        if (periodeSelect) {
            periodeSelect.addEventListener('change', updateFields);
        }

        // Initial check
        checkFields();

        const namaBarangSelect = document.getElementById('nama_barang');
        const satuanInput = document.getElementById('satuan');

        if (namaBarangSelect) {
            // Fetch daftar nama barang untuk dropdown
            fetch('<?= base_url('admin/getNamaBarangOptions'); ?>')
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        const option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.nama_barang;
                        option.setAttribute('data-satuan', item.satuan);
                        namaBarangSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error:', error));

            namaBarangSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (!selectedOption) {
                    console.error('Selected barang option is null.');
                    return;
                }
                const satuan = selectedOption.getAttribute('data-satuan');

                satuanInput.value = satuan || '';
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addFieldButton = document.getElementById('addFieldButton');
        const additionalFieldsContainer = document.getElementById('additionalFieldsContainer');
        const totalAkhirInput = document.getElementById('total_akhir');

        let fieldIndex = 1;

        function createFieldHtml(index) {
            return `
                    <tr class="additional-field" id="field_${index}">
                        <td class="w-55">
                            <select class="form-control" id="nama_barang_${index}" name="nama_barang[]" required>
                                <option value="">Pilih Nama Barang</option>
                                <!-- Options akan diisi dengan JavaScript -->
                            </select>
                        </td>
                        <td style="display: none;">
                            <input class="form-control" id="satuan_${index}" name="satuan[]">
                        </td>
                        <td class="w-10">
                            <input class="form-control qty" id="qty_${index}" name="qty[]" required>
                        </td>
                        <td class="w-20">
                            <input class="form-control harga_satuan" id="harga_satuan_${index}" name="harga_satuan[]" required>
                        </td>
                        <td class="w-20">
                            <input class="form-control total_harga" id="total_harga_${index}" name="total_harga[]" readonly>
                        </td>
                        <td class="w-5">
                            <button type="button" class="btn btn-danger btn-sm remove-field" data-index="${index}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
        }

        function validateFields() {
            let isValid = true;
            const rows = document.querySelectorAll('#additionalFieldsContainer tr');

            rows.forEach(row => {
                const inputs = row.querySelectorAll('input[required], select[required]');
                inputs.forEach(input => {
                    if (!input.value) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
            });

            return isValid;
        }

        function addDefaultField() {
            if (validateFields()) {
                const defaultFieldHtml = createFieldHtml(fieldIndex);
                additionalFieldsContainer.insertAdjacentHTML('beforeend', defaultFieldHtml);
                fieldIndex++;
                populateDropdown(`nama_barang_${fieldIndex - 1}`);
                addInputEvents(`qty_${fieldIndex - 1}`, `harga_satuan_${fieldIndex - 1}`, `total_harga_${fieldIndex - 1}`);
                addFormatRupiahEvent(`harga_satuan_${fieldIndex - 1}`);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Input tidak lengkap',
                    text: 'Pastikan semua field telah terisi sebelum menambah item baru.',
                });
            }
        }

        addFieldButton.addEventListener('click', addDefaultField);

        function populateDropdown(selectId) {
            fetch(`<?= base_url('admin/getNamaBarangOptions'); ?>`)
                .then(response => response.json())
                .then(data => {
                    const selectElement = document.getElementById(selectId);
                    if (selectElement) {
                        selectElement.innerHTML = '<option value="">Pilih Nama Barang</option>';
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.textContent = item.nama_barang;
                            option.setAttribute('data-satuan', item.satuan);
                            selectElement.appendChild(option);
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        document.addEventListener('change', function(event) {
            if (event.target.matches('[id^="nama_barang_"]')) {
                const selectedOption = event.target.options[event.target.selectedIndex];
                const satuanInput = document.getElementById(`satuan_${event.target.id.split('_')[2]}`);
                satuanInput.value = selectedOption.getAttribute('data-satuan') || '';
            }
        });

        document.addEventListener('click', function(event) {
            if (event.target.matches('.remove-field, .remove-field *')) {
                const button = event.target.closest('.remove-field');
                const row = button.closest('tr');
                row.remove();
                updateTotalAkhir();
            }
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

        function addFormatRupiahEvent(inputId) {
            const inputElement = document.getElementById(inputId);
            if (inputElement) {
                inputElement.addEventListener('input', function(e) {
                    var input = e.target.value.replace(/[^0-9,]/g, '');
                    e.target.value = formatRupiah(input, 'Rp. ');
                });
            }
        }

        function addInputEvents(qtyId, hargaSatuanId, totalHargaId) {
            const qtyInput = document.getElementById(qtyId);
            const hargaSatuanInput = document.getElementById(hargaSatuanId);

            function updateTotalHarga() {
                const qty = parseFloat(qtyInput.value) || 0;
                const hargaSatuan = parseFloat(hargaSatuanInput.value.replace(/[^0-9]/g, '')) || 0;
                const totalHarga = qty * hargaSatuan;
                document.getElementById(totalHargaId).value = formatRupiah(totalHarga.toString(), 'Rp. ');
                updateTotalAkhir();
            }

            qtyInput.addEventListener('input', updateTotalHarga);
            hargaSatuanInput.addEventListener('input', updateTotalHarga);
        }

        function updateTotalAkhir() {
            const totalHargaInputs = document.querySelectorAll('.total_harga');
            let totalAkhir = 0;
            totalHargaInputs.forEach(input => {
                const value = parseFloat(input.value.replace(/[^0-9]/g, '')) || 0;
                totalAkhir += value;
            });
            totalAkhirInput.value = formatRupiah(totalAkhir.toString(), 'Rp. ');
        }

        // Menambahkan baris default saat halaman dimuat
        addDefaultField();
    });
</script>

<?= $this->endSection() ?>