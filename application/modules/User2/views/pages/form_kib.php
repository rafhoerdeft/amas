<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">

            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Tambah Aset - <?= $dataJenisKib->nama_kib ?></h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('User2') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a
                                    href="<?= base_url('User2/dataAset/'.encode($id_jenis_kib)) ?>">Data Aset</a></li>
                            <li class="breadcrumb-item active">Tambah Aset</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- <div class="content-header-right col-md-4 col-12 mb-2">
                <div class="dropdown float-md-right">
                    <button class="btn btn-success btn-block round px-2" id="dropdownBreadcrumbButton" type="button"
                        onclick="addModal()">
                        <i class="la la-plus font-small-3"></i> Tambah Data
                    </button>
                </div>
            </div> -->

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

                                    <form action="#" class="tab-steps wizard-circle">
                                        <input type="text" id="pilih_aset">
                                        <input type="text" id="aset_utama">
                                        <!-- Step 1 -->
                                        <h6>Step 1</h6>
                                        <fieldset>
                                            <table id="dataTable"
                                                class="table table-hover table-bordered table-striped table-responsive d-xl-table"
                                                style="font-size: 8pt">
                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th>No</th>
                                                        <th>Pilih Aset</th>
                                                        <th>Aset Utama</th>
                                                        <th>Nama Barang</th>
                                                        <th>Merk Barang</th>
                                                        <th>Satuan</th>
                                                        <th>Harga (Rp)</th>
                                                        <th>Jumlah</th>
                                                        <!-- <th>Total (Rp)</th> -->
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $no=0; $tot_harga = 0; foreach ($dataBarang as $val) { $no++;?>
                                                    <tr>
                                                        <td align="center"><?= $no ?></td>
                                                        <td nowrap align="center">
                                                            <div class="skin skin-check">
                                                                <input type="checkbox" name="pilih_aset[]" id="brg_<?= $val->id_barang ?>"
                                                                    value="<?= $val->id_barang ?>">
                                                            </div>
                                                        </td>
                                                        <td nowrap align="center">
                                                            <div class="skin skin-radio">
                                                                <input type="radio" name="aset_utama"
                                                                id="ast_<?= $val->id_barang ?>" value="<?= $val->id_barang ?>" data-nama="<?= $val->nama_barang ?>" 
                                                                data-satuan="<?= $val->satuan_barang ?>" 
                                                                data-harga="<?= $val->harga_barang ?>" 
                                                                data-jml="<?= nominal($val->jml_barang) ?>" disabled>
                                                            </div>
                                                        </td>
                                                        <td><?= $val->nama_barang ?></td>
                                                        <td><?= $val->merk_barang ?></td>
                                                        <td align="cener"><?= $val->satuan_barang ?></td>
                                                        <td align="right"><?= nominal($val->harga_barang) ?></td>
                                                        <td align="center"><?= nominal($val->jml_barang) ?></td>
                                                        <!-- <td align="right">
                                                            <?php //echo nominal($val->harga_barang * $val->jml_barang); ?>
                                                        </td> -->
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>

                                            </table>
                                            <hr>
                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6>Step 2</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="proposalTitle1">Proposal Title :</label>
                                                        <input type="text" class="form-control" id="proposalTitle1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress2">Email Address :</label>
                                                        <input type="email" class="form-control" id="emailAddress2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="videoUrl1">Video URL :</label>
                                                        <input type="url" class="form-control" id="videoUrl1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="jobTitle1">Job Title :</label>
                                                        <input type="text" class="form-control" id="jobTitle1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shortDescription1">Short Description :</label>
                                                        <textarea name="shortDescription" id="shortDescription1"
                                                            rows="4" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    function pilihAset(id, type) {
        var select = $('#pilih_aset').val();
        var value = '';

        if(type=='ifChecked'){
            if (select == '') {
                value = id;
                $('#ast_'+id).iCheck('check');
            } else {
                // if (!select.includes(id)) {
                    value += select + ';' + id;
                // } else {
                //     value = select;
                // }
            }
            $('#ast_'+id).iCheck('enable');
        } else {
            var arr = select.split(";");
            var result = arr.filter(function(val){
                return val != id; 
            });
            value = result.toString();
            $('#ast_'+id).iCheck('uncheck');
            $('#ast_'+id).iCheck('disable');

            if (value == '') {
                $('#aset_utama').val('');
            }
        }

        $('#pilih_aset').val(value);
    }

    function asetUtama(data) {
        let id      = $(data).val();
        let nama    = $(data).data().nama;
        let satuan  = $(data).data().satuan;
        let harga   = $(data).data().harga;
        let jml     = $(data).data().jml;
        
        $('#aset_utama').val(id);
    }
</script>

<script>
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