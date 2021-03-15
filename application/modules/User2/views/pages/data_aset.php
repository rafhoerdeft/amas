<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Data Aset - <?= $dataJenisKib->nama_kib ?></h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('User2') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Aset</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="content-header-right col-md-4 col-12 mb-2">
        <div class="dropdown float-md-right">
          <a href="<?= base_url('User2/addDataAset/'.encode($id_jenis_kib)) ?>" class="btn btn-success btn-block round px-2" id="dropdownBreadcrumbButton" type="button" onclick="addModal()">
            <i class="la la-plus font-small-3"></i> Tambah Data
          </a>
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

                  <?= formSearch('data_aset') ?>

                  <!-- Load table jenis KIB -->
                  <?= $this->load->view('table_kib/'.$dataJenisKib->nama_tbl_kib) ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>

<div class="modal animated bounceInDown text-left" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
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
          <div class="form-group">
            <h5>Nomor Kontrak
                <span class="required text-danger">*</span>
            </h5>
            <div class="controls">
                <input type="text" id="no_kontrak" name="no_kontrak" class="form-control" placeholder="Isi nomor kontrak" required>
            </div>
          </div>

          <div class="form-group">
              <h5>Tanggal Kontrak
                  <span class="required text-danger">*</span>
              </h5>
              <div class="controls">
                  <input type="text" class="form-control date-picker" id="tgl_kontrak" name="tgl_kontrak"
                      placeholder="DD/MM/YYYY" value="<?= date('d/m/Y') ?>" required>
              </div>
          </div>

          <div class="form-group">
            <h5>Nomor SP2D
                <span class="required text-danger">*</span>
            </h5>
            <div class="controls">
                <input type="text" id="no_sp2d" name="no_sp2d" class="form-control" placeholder="Isi nomor kontrak" required>
            </div>
          </div>

          <div class="form-group">
            <h5>Nilai Kontrak (Rp)
                <span class="required text-danger">*</span>
            </h5>
            <div class="controls">
                <input type="text" id="nilai_kontrak" name="nilai_kontrak" class="form-control" placeholder="Isi nomor kontrak" onkeyup="changeRupe(this)" onkeypress="return inputAngka(event);" required>
            </div>
          </div>

          <div class="form-group">
              <h5>Rekanan
                  <span class="required text-danger">*</span>
              </h5>
              <div class="controls">
                  <select id="rekanan" name="rekanan" class="form-control select2" required>
                      <option value="">Pilih Rekanan</option>
                      <?php
                      foreach ($dataRekanan as $val) {
                      ?>
                          <option value="<?= $val->id_rekanan ?>"><?= $val->nama_rekanan ?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
          </div>

          <div class="form-group">
              <h5>PPKom
                  <span class="required text-danger">*</span>
              </h5>
              <div class="controls">
                  <input type="text" id="ppkom" name="ppkom" class="form-control" value="<?= $this->nama_user ?>" readonly required>
                  <!-- <select id="ppkom" name="ppkom" class="form-control select2" required>
                      <option value="">Pilih PPKom</option>
                      <?php
                      //foreach ($dataPpkom as $val) {
                      ?>
                          <option value="<?php //echo $val->id_user; ?>"><?php //echo $val->nama_user; ?></option>
                      <?php
                      //}
                      ?>
                  </select> -->
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

        </div>

        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-danger"><i class="la la-close"></i> Keluar</button>
          <button type="button" class="btn btn-info" ><i class="la la-save"></i> Simpan</button> -->

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
      $('#modal_form #no_kontrak').val('');
      $('#modal_form #no_sp2d').val('');
      $('#modal_form #nilai_kontrak').val('');
      $('#modal_form #rekanan').val('').change();
      // $('#modal_form #ppkom').val('').change();
      $('#modal_form #rekening').val('').change();
      $('#modal_form #tgl_kontrak').datepicker("setDate", "<?= date('d/m/Y') ?>");
      $('#modal_form #tgl_kontrak').datepicker("refresh");
  }

  function addModal() {
      clear_data();
      $('#modal_form #modal_title').html('Tambah Data Kontrak');
      $('#modal_form #form_input').attr('action', "<?= base_url().'User1/simpanDataKontrak'; ?>");
      $('#modal_form #modal_header').removeClass("bg-info").addClass("bg-success");
      $('#modal_form').modal({backdrop: 'static', keyboard: false}); 
  }

  function editModal(data) {
      var id            = $(data).data().id;
      var no_kontrak    = $(data).data().nokontrak;
      var no_sp2d       = $(data).data().nosp2d;
      var nilai         = $(data).data().nilai;
      var rekanan       = $(data).data().rekanan;
      var ppkom         = $(data).data().ppkom;
      var rekening      = $(data).data().rekening;
      var tgl = $(data).data().tgl;

      clear_data();
      $('#modal_form #modal_title').html('Update Data Kontrak');
      $('#modal_form #form_input').attr('action', "<?= base_url().'User1/updateDataKontrak'; ?>");
      $('#modal_form #modal_header').removeClass("bg-success").addClass("bg-info");

      $('#modal_form #id').val(id);
      $('#modal_form #no_kontrak').val(no_kontrak);
      $('#modal_form #no_sp2d').val(no_sp2d);
      $('#modal_form #nilai_kontrak').val(nilai);
      $('#modal_form #rekanan').val(rekanan).change();
      // $('#modal_form #ppkom').val(ppkom).change();
      $('#modal_form #rekening').val(rekening).change();
      $('#modal_form #tgl_kontrak').datepicker("setDate", tgl);
      $('#modal_form #tgl_kontrak').datepicker("refresh");
      
      $('#modal_form').modal({backdrop: 'static', keyboard: false}); 
  }
</script>

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