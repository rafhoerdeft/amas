<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      
      <div class="content-header-left col-md-10 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Data Aset - <?= $dataJenisKib->nama_kib ?></h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('User3') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Aset</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="content-header-right col-md-2 col-12 mb-2">
          <!-- <div class="dropdown"> -->
              <input type="hidden" name="delete_all" id="delete_all">
              <button id="btn_eksekusi" class="btn btn-info btn-block round px-2" id="dropdownBreadcrumbButton" type="button"
                  onclick="showModalEksekusi()" disabled>
                  <i class="la la-check font-small-3"></i> Eksekusi Aset
              </button>
          <!-- </div> -->
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

<div class="modal animated bounceInUp text-left" id="modal_rincian" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="modal_header" class="modal-header bg-success">
                <h4 class="modal-title white" id="modal_title">Rincian Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table id="tbl_rincian" class="table table-hover table-bordered table-striped table-responsive d-lg-table sizeFontSm">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Serial Number</th>
                            <th>Satuan</th>
                            <th>Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <!-- <button type="button" id="btn_reset" class="btn btn-success waves-effect" onclick="tableToExcel('tbl_rincian', 'RincianBarangPengadaan', 'RincianBarangPengadaan.xls')">EXPORT (.XLS)</button> -->
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal animated bounceInUp text-left" id="modal_histori" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="modal_header" class="modal-header bg-success">
                <h4 class="modal-title white" id="modal_title"><i class="la la-history"></i> Histori Aset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <table id="tbl_histori" class="table table-hover table-bordered table-striped table-responsive d-lg-table sizeFontSm">
                    <thead>
                        <tr>
                            <th>Tgl Eksekusi</th>
                            <!-- <th>Status</th> -->
                            <th>Lokasi</th>
                            <th>Keperluan</th>
                            <th>Penanggung Jawab</th>
                            <th>Pemegang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <!-- <button type="button" id="btn_reset" class="btn btn-success waves-effect" onclick="tableToExcel('tbl_rincian', 'RincianBarangPengadaan', 'RincianBarangPengadaan.xls')">EXPORT (.XLS)</button> -->
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">KELUAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal animated bounceInDown text-left" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="form_input" id="form_input" method="post" action="">
        
        <input type="hidden" name="id" id="id">
        <!-- <input type="hidden" name="kib" id="kib" value="<?php //echo encode($id_jenis_kib); ?>"> -->
        <input type="hidden" name="back" id="back" value="<?= base_url('User3/dataAset/'.encode($id_jenis_kib)) ?>">
        <input type="hidden" id="data_update_barang" name="data_update_barang">

        <?= token_csrf() ?>

        <div id="modal_header" class="modal-header bg-info">
          <h4 class="modal-title white" id="modal_title">Eksekusi Aset</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
              <h5>Jenis Eksekusi
                  <span class="required text-danger">*</span>
              </h5>
              <div class="controls">
                  <select id="id_aset_status" name="id_aset_status" class="form-control select2" onchange="changeExec(this)" required>
                    <option value="">Pilih Jenis Eksekusi</option>
                      <?php
                      foreach ($statusAset as $val) {
                      ?>
                          <option value="<?= $val->id_aset_status ?>"><?= $val->nama_status ?></option>
                      <?php
                      }
                      ?>
                  </select>
              </div>
          </div>

          <div class="form-group">
              <h5>Tanggal
                  <span class="required text-danger">*</span>
              </h5>
              <div class="controls">
                  <input type="text" class="form-control date-picker" id="tgl_histori" name="tgl_histori"
                      placeholder="DD/MM/YYYY" value="<?= date('d/m/Y') ?>" required>
              </div>
          </div>

          <div id="not_hapus" style="display: none;">
            <div class="form-group">
              <h5>Lokasi
                  <!-- <span class="required text-danger">*</span> -->
              </h5>
              <div class="controls">
                  <textarea name="lokasi_histori" id="lokasi_histori" rows="2" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <h5>Keperluan
                  <!-- <span class="required text-danger">*</span> -->
              </h5>
              <div class="controls">
                  <textarea name="keperluan_histori" id="keperluan_histori" rows="2" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <h5>Pemegang
                  <!-- <span class="required text-danger">*</span> -->
              </h5>
              <div class="controls">
                  <input type="text" name="pemegang" id="pemegang" class="form-control">
              </div>
            </div>
          </div>

          <div class="form-group">
            <h5>Keterangan
                <!-- <span class="required text-danger">*</span> -->
            </h5>
            <div class="controls">
                <textarea name="ket_histori" id="ket_histori" rows="2" class="form-control"></textarea>
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
      var dataid = $('#delete_all').val();
      $('#modal_form #id').val(dataid);
      $('#modal_form #id_aset_status').val('').change();
      $('#modal_form #tgl_histori').datepicker("setDate", "<?= date('d/m/Y') ?>");
      $('#modal_form #tgl_histori').datepicker("refresh");
      $('#modal_form #lokasi_histori').val('');
      $('#modal_form #keperluan_histori').val('');
      $('#modal_form #pemegang').val('');
      $('#modal_form #ket_histori').val('');

      if ($('textarea[name="sn_barang"]').length > 0) {
        var data_update_barang = [];
        $('textarea[name="sn_barang"]').each(function(e){
            let ids     = $(this).attr('id');
            let id      = ids.split("_")[1];
            let merk    = $('#merk_'+id).val();
            let sn      = $('#sn_'+id).val();
            
            data_update_barang.push({
                id_aset: id,
                merk_barang: merk,
                sn_barang: sn,
            });
        });

        $('#modal_form #data_update_barang').val(JSON.stringify(data_update_barang));
      }
  }

  function showModalEksekusi() {
    clear_data();
    $('#modal_form #form_input').attr('action', "<?= base_url().'User3/eksekusiAset'; ?>");

    $('#modal_form').modal({backdrop: 'static', keyboard: false}); 
  }

  function changeExec(data) {
    var value = $(data).val();
    var select = $(data).find('option:selected').text();
    
    if (select == 'Usulan Hapus' ||  value == '') {
      $('#not_hapus').hide();
    } else {
      $('#not_hapus').show();
    }
  }
</script>

<script>
    function deleteAll() {
        var dataid      = $('#delete_all').val();
        var link        = "<?= base_url('User3/deleteAsetAll') ?>";
        var csrfname    = "<?= $this->security->get_csrf_token_name(); ?>";
        var csrfcode    = "<?= $this->security->get_csrf_hash(); ?>"
        var table       = "aset";
        var data = {
            dataid:dataid,
            link:link,
            table:table,
            csrfname:csrfname,
            csrfcode:csrfcode,
        };
        hapusDataAll(data);
    }

    function pilihAset(data, type) {
        let id = $(data).val();
        let jenis = $(data).data().jenis;
        
        if (id == 0) {
            if(type=='ifChecked'){
                $('.skin-check input:checkbox').iCheck('check');
            } else {
                $('.skin-check input:checkbox').iCheck('uncheck');
            }
        } else {
            var select_id  = $('#delete_all').val();
            var value_id   = '';

            if(type=='ifChecked'){
                if (jenis == 2) {
                  //ambil isian dalam element td
                  var td = $(data).parent().parent().parent().parent().children();
                  //ambil value dalam input td SN
                  var td_sn = td.eq(8);
                  var val_td_sn = td_sn.html();
                  td_sn.html("<textarea id='sn_"+id+"' name='sn_barang' rows='1' style='width: 100%;'>"+val_td_sn+"</textarea>");

                  var td_merk = td.eq(9);
                  var val_td_merk = td_merk.html();
                  td_merk.html("<textarea id='merk_"+id+"' name='merk_barang' rows='2' style='width: 100%;'>"+val_td_merk+"</textarea>");
                }
                
                if (select_id == '') {
                    value_id  = id;
                    $('#btn_delete').attr('disabled',false);
                    $('#btn_eksekusi').attr('disabled',false);
                } else {
                    value_id += select_id + ';' + id;
                }
            } else {
                if (jenis == 2) {
                  //ambil isian dalam element td
                  var td = $(data).parent().parent().parent().parent().children();

                  var td_sn = td.eq(8);
                  var val_td_sn = td_sn.children().val();
                  td_sn.html(val_td_sn);

                  var td_merk = td.eq(9);
                  var val_td_merk = td_merk.children().val();
                  td_merk.html(val_td_merk);
                }

                var arr = select_id.split(";");
                var result = arr.filter(function(val){
                    return val != id; 
                });
                value_id = result.join(';');

                if (result.length == 0) {
                    $('#btn_delete').attr('disabled',true);
                    $('#btn_eksekusi').attr('disabled',true);
                }
            }
            $('#delete_all').val(value_id);
        }

        // $('#data_aset').DataTable({
        //   'drawCallback': function (settings) {
        //     var api = this.api();
        //     api.fixedHeader.adjust();
        //   }
        // });
    }

    function cekChangePage() {
      var select_id  = $('#delete_all').val();
      var arr = select_id.split(";");
      arr.forEach(function(value, index) {
        $('.skin-check input:checkbox[value="'+value+'"]').iCheck('check');
      });
    }
</script>

<script>
  function rincianModal(data) {

      var nama    = $(data).data().nama.split(';');
      var merk    = $(data).data().merk.split(';');
      var sn      = $(data).data().sn.split(';');
      var satuan  = $(data).data().satuan.split(';');
      var harga   = $(data).data().harga.toString().split(';');

      var row = '';
      for (let i = 0; i < nama.length; i++) {
          row +=  "<tr>"+
                      "<td>"+nama[i]+"</td>"+
                      "<td>"+merk[i]+"</td>"+
                      "<td>"+sn[i]+"</td>"+
                      "<td>"+satuan[i]+"</td>"+
                      "<td align='right'>"+formatRupiah(harga[i].toString(), 'Rp. ')+"</td>"+
                  "</tr>";
      }

      $('#modal_rincian #tbl_rincian tbody').html(row);

      $('#modal_rincian').modal({
          backdrop: 'static',
          keyboard: false
      });
  }

  function historiModal(data) {

      var penanggung  = $(data).data().penanggung.split(';');
      var pemegang    = $(data).data().pemegang.split(';');
      var ket         = $(data).data().ket.split(';');
      var keperluan   = $(data).data().keperluan.split(';');
      var lokasi      = $(data).data().lokasi.split(';');
      var tgl         = $(data).data().tgl.split(';');

      var row = '';
      for (let i = 0; i < tgl.length; i++) {
          row +=  "<tr>"+
                      "<td align='center'>"+tgl[i]+"</td>"+
                      "<td>"+lokasi[i]+"</td>"+
                      "<td>"+keperluan[i]+"</td>"+
                      "<td>"+penanggung[i]+"</td>"+
                      "<td>"+pemegang[i]+"</td>"+
                      "<td>"+ket[i]+"</td>"+
                  "</tr>";
      }

      $('#modal_histori #tbl_histori tbody').html(row);

      $('#modal_histori').modal({
          backdrop: 'static',
          keyboard: false
      });
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