<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Histori Aset</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url($this->controller) ?>">Home</a></li>
              <li class="breadcrumb-item active">Histori Aset</li>
            </ol>
          </div>
        </div>
      </div>

      <!-- <div class="content-header-right col-md-4 col-12 mb-2">
        <div class="dropdown float-md-right">
          <button class="btn btn-success btn-block round px-2" id="dropdownBreadcrumbButton" type="button" onclick="addModal()">
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
                
                <?= show_alert() ?>

                <div class="card-body">

                  <form action="<?= base_url($this->controller.'/historiAset') ?>" class="row" method="POST">
                    <?= token_csrf() ?>

                    <div class="col-lg-3 sizeFontSm" style="margin-bottom: 5px;">
                      <div class="input-daterange input-group date-range">
                        <input type="text" class="form-control sizeFontSm" id="tgl_awal" name="tgl_awal" placeholder="DD/MM/YYYY" value="<?= $selectTglAwal ?>" required/>
                        <div class="input-group-append">
                            <span class="input-group-text bg-info b-0 text-white sizeFontSm">SAMPAI</span>
                        </div>
                        <input type="text" class="form-control sizeFontSm" placeholder="DD/MM/YYYY" value="<?= $selectTglAkhir ?>" id="tgl_akhir" name="tgl_akhir" required/>
                      </div>
                    </div>

                    <div class="col-lg-2 sizeFontSm" style="margin-bottom: 5px;">
                        <div class="controls">
                            <select id="status" name="status" class="form-control select2">
                                <option value="0" selected>Semua Status</option>
                                <?php
                                foreach ($dataStatusAset as $sts) {
                                ?>
                                    <option <?= ($selectStatus == $sts->id_aset_status?'selected':'') ?> value="<?= $sts->id_aset_status ?>"><?= $sts->nama_status ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-2 sizeFontSm" style="margin-bottom: 5px;">
                        <div class="controls">
                            <select id="jenis" name="jenis" class="form-control select2">
                                <option value="0" selected>Semua Jenis</option>
                                <?php
                                foreach ($dataJenisAset as $jns) {
                                ?>
                                    <option <?= ($selectJenis == $jns->id_jenis_kib?'selected':'') ?> value="<?= $jns->id_jenis_kib ?>"><?= $jns->nama_kib ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 sizeFontSm" style="margin-bottom: 5px;">
                      <div class="controls">
                          <select id="id_skpd" name="id_skpd" class="form-control select2">
                            <option value="0" selected>Pilih SKPD</option>
                              <?php
                              foreach ($dataSkpd as $val) {
                              ?>
                                  <option <?= ($selectSkpd == $val->id_skpd?'selected':'') ?> value="<?= $val->id_skpd ?>"><?= $val->nama_skpd ?></option>
                              <?php
                              }
                              ?>
                          </select>
                      </div>
                    </div>

                    <div class="col-lg-2">
                      <button type="submit" class="btn btn-success btn-block" title="Tampilkan">
                        Tampil
                      </button>
                    </div>

                  </form>

                  <hr>

                  <style>
                    .no-wrap {
                      white-space: nowrap;
                    }
                  </style>

                  <?= formSearch('data_histori') ?>

                  <table id="data_histori" class="table table-hover table-bordered table-striped" style="font-size: 8pt">
                    <thead>
                      <tr style="text-align: center;">
                        <th>No</th>
                        <th>Tgl Eksekusi</th>
                        <th>Status</th>
                        <th>Jenis Aset</th>
                        <th>Nama Aset</th>
                        <th>Kode Lama</th>
                        <th>Kode Baru</th>
                        <th>No. Reg</th>
                        <th>Satuan</th>
                        <th>Merk/Type</th>
                        <th>Serial Number</th>
                        <th>SKPD</th>
                        <th>Lokasi</th>
                        <th>Pemegang</th>
                        <th>Penanggung Jawab</th>
                        <th>Keperluan</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>

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

<script type="text/javascript">

    function changeRupe(data){
        var val = formatRupiah($(data).val(), 'Rp. ');
        $(data).val(val);
    }

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        rupiah          = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
</script>