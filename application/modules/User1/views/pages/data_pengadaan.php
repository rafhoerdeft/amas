<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Data Pengadaan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('User1') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Pengadaan</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="content-header-right col-md-4 col-12 mb-2">
                <div class="dropdown float-md-right">
                    <button class="btn btn-success btn-block round px-2" id="dropdownBreadcrumbButton" type="button"
                        onclick="addModal()">
                        <i class="la la-plus font-small-3"></i> Tambah Data
                    </button>
                </div>
            </div>

        </div>
        <div class="content-body">
            <section class="inputmask" id="inputmask">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <!-- <h4 class="card-title">Data Rekenan</h4> -->
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li> -->
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body">

                                    <?= show_alert() ?>

                                    <style>
                                    .no-wrap {
                                        white-space: nowrap;
                                    }
                                    </style>

                                    <table id="dataTable" class="table table-hover table-bordered table-striped"
                                        style="font-size: small">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>No. Kontrak</th>
                                                <th>Nama Penyedia</th>
                                                <th>PPKom</th>
                                                <th>Tgl Pengadaan</th>
                                                <th>Nilai (Rp)</th>
                                                <th>Rincian</th>
                                                <th>Selisih (Rp)</th>
                                                <th>Jns. Rekening</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $no=1; foreach ($dataPengadaan as $val) { ?>
                                            <tr>
                                                <td align="center"><?= $no++ ?></td>
                                                <td nowrap align="center">
                                                    <a href="<?= base_url('User1/rincianDataPengadaan/'.encode($val->id_pengadaan)) ?>"
                                                        type="button" class="btn btn-sm btn-primary"
                                                        title="Tambah Rincian"><i
                                                            class="la la-plus font-small-3"></i></a>

                                                    <button type="button" onclick="hapusData(this)"
                                                        data-id="<?= encode($val->id_pengadaan) ?>"
                                                        data-link="<?= base_url('User1/deleteDataPengadaan') ?>"
                                                        data-csrfname="<?= $this->security->get_csrf_token_name(); ?>"
                                                        data-csrfcode="<?= $this->security->get_csrf_hash(); ?>"
                                                        class="btn btn-sm btn-danger" title="Hapus Data"><i
                                                            class="la la-trash-o font-small-3"></i></button>

                                                    <button type="button" 
                                                        data-id="<?= encode($val->id_pengadaan) ?>"
                                                        data-kontrak="<?= $val->id_kontrak ?>"
                                                        data-rekening="<?= $val->jenis_rek ?>"
                                                        data-tgl="<?= date('d/m/Y', strtotime($val->tgl_pengadaan)) ?>"
                                                        onclick="editModal(this)" class="btn btn-sm btn-info"
                                                        title="Update Data"><i
                                                            class="la la-edit font-small-3"></i></button>
                                                </td>
                                                <td><?= $val->no_kontrak ?></td>
                                                <td><?= $val->nama_rekanan ?></td>
                                                <td><?= $val->nama_ppkom ?></td>
                                                <td align="center"><?= date('d/m/Y', strtotime($val->tgl_pengadaan)) ?></td>
                                                <td align="right"><?= nominal($val->nilai_kontrak) ?></td>
                                                <td align="center">
                                                    <?= $val->jml_rincian==0?'Kosong':'<button class="btn btn-sm btn-info">Detail</button>' ?>
                                                </td>
                                                <td align="right">0</td>
                                                <td align="center">
                                                    <?= ($val->jenis_rek==null || $val->jenis_rek=='')?'-':$val->jenis_rek ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<div class="modal animated bounceInDown text-left" id="modal_form" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="form_input" id="form_input" method="post" action="">

                <input type="hidden" name="id" id="id">

                <?= token_csrf() ?>

                <div id="modal_header" class="modal-header bg-success">
                    <h4 class="modal-title white" id="modal_title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group" id="input_kontrak">
                        <h5>No. Kontrak
                            <span class="required text-danger">*</span>
                        </h5>
                        <div class="controls">
                            <select id="kontrak" name="kontrak" class="form-control select2" required>
                                <option value="">Pilih Nomor Kontrak</option>
                                <?php
                                foreach ($dataKontrak as $val) {
                                ?>
                                    <option value="<?= $val->id_kontrak ?>"> <?= $val->no_kontrak ?> - <?= $val->nama_rekanan ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Jenis Rekening
                            <span class="required text-danger">*</span>
                        </h5>
                        <div class="controls">
                            <select id="rekening" name="rekening" class="form-control select2" required>
                                <option value="">Pilih Jenis Rekening</option>
                                <option value="Modal">Modal</option>
                                <option value="Barang Jasa">Barang Jasa</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Tgl Pengadaan
                            <span class="required text-danger">*</span>
                        </h5>
                        <div class="controls">
                            <input type="text" class="form-control date-picker" id="tgl_pengadaan" name="tgl_pengadaan"
                                placeholder="DD/MM/YYYY" value="<?= date('d/m/Y') ?>" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" id="btn_simpan" class="btn btn-primary waves-effect">SIMPAN</button>
                    <button type="reset" id="btn_reset" class="btn btn-warning waves-effect">RESET</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function clear_data() {
    $('#modal_form #id').val('');
    $('#modal_form #kontrak').val('').change();
    $('#modal_form #rekening').val('').change();
    $('#modal_form #tgl_pengadaan').val("<?= date('d/m/Y') ?>");
}

function addModal() {
    clear_data();
    $('#modal_form #modal_title').html('Tambah Data Pengadaan');
    $('#modal_form #form_input').attr('action', "<?= base_url().'User1/simpanDataPengadaan'; ?>");
    $('#modal_form #modal_header').removeClass("bg-info").addClass("bg-success");

    $('#modal_form #kontrak').attr('required',true);
    $('#modal_form #input_kontrak').show();

    $('#modal_form').modal({
        backdrop: 'static',
        keyboard: false
    });
}

function editModal(data) {
    var id = $(data).data().id;
    var kontrak = $(data).data().kontrak;
    var rekening = $(data).data().rekening;
    var tgl = $(data).data().tgl;

    clear_data();
    $('#modal_form #modal_title').html('Update Data Pengadaan');
    $('#modal_form #form_input').attr('action', "<?= base_url().'User1/updateDataPengadaan'; ?>");
    $('#modal_form #modal_header').removeClass("bg-success").addClass("bg-info");

    $('#modal_form #id').val(id);
    // $('#modal_form #kontrak').val(kontrak).change();
    $('#modal_form #kontrak').attr('required',false);
    $('#modal_form #input_kontrak').hide();

    $('#modal_form #rekening').val(rekening).change();
    $('#modal_form #tgl_pengadaan').val(tgl);

    $('#modal_form').modal({
        backdrop: 'static',
        keyboard: false
    });
}

function rincianModal(data) {
    $('#modal_form').modal({
        backdrop: 'static',
        keyboard: false
    });
}
</script>

<script type="text/javascript">
function changeRupe(data) {
    var val = formatRupiah($(data).val(), 'Rp. ');
    $(data).val(val);
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}
</script>