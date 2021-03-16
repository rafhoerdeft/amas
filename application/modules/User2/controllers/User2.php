<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(null);

class User2 extends Adm_Controller
{

    function __construct()
    {
        parent::__construct();

		$this->secure->auth('Sim_asset_User2');


        $this->head = array(
            assets_url . "app-assets/css/vendors.css",
            assets_url . "app-assets/css/app.css",
            assets_url . "app-assets/css/core/menu/menu-types/horizontal-menu.css",
            assets_url . "app-assets/css/core/colors/palette-gradient.css",
            assets_url . "app-assets/css/components.min.css",
            base_url('assets/css/loading.css'),
            // assets_url . "assets/css/style.css",
        );
        $this->foot = array(
            // assets_url . "app-assets/vendors/js/vendors.min.js",
            assets_url . "app-assets/js/core/app-menu.js",
            assets_url . "app-assets/js/core/app.js",
            assets_url . "app-assets/js/scripts/customizer.js",
            assets_url . "app-assets/vendors/js/ui/jquery.sticky.js",
            assets_url . "app-assets/js/scripts/footer.min.js",
        );

        $dataKib = $this->MasterData->getData('tbl_jenis_kib')->result();

        $menu = array(
            'dataKib' => $dataKib,
        );
        $this->load->view('menu', $menu, TRUE);

    } 

    public function index()
    {
        $this->head[] = assets_url . "app-assets/fonts/simple-line-icons/style.css";
        $header['css'] = $this->head;
        $footer['js'] = $this->foot;
        $menu['active'] = '1';

        $data = array(
            'header' => $header,
            'menu'   => $menu,
            'konten' => 'dash',
            'footer' => $footer,
            // 'cont'   => $cont,
        );

        $this->load->view("view_master_admin", $data);
    }

    // ======================================================================

     // DATA ASET ==============================================================

    public function dataAset($id = '') {

        $this->load->helper('searchbar');

        $id_jenis_kib = decode($id);

        $kib = $this->MasterData->getWhereData('*', 'tbl_jenis_kib', "id_jenis_kib = $id_jenis_kib");

        $cekKib = $kib->num_rows();

        if ($cekKib==0) {
            redirect(base_url('User2/dataAset/'.encode(1)));
        }

        $dataJenisKib = $kib->row();

        // ===============================================================================

        $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        // $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
        $this->head[] = assets_url . "app-assets/vendors/css/tables/datatable/datatables.min.css";
        // $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css";
        // $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/style-datepicker.css";
        $this->head[] = assets_url . "app-assets/vendors/css/extensions/sweetalert.css";
        // ================================================================
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/datatables.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js";
        $this->foot[] = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js";
        $this->foot[] = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js";
        // $this->foot[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js";
        // $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        // $this->foot[] = base_url('assets/js/data_table.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        $this->foot[] = base_url('assets/js/'.$dataJenisKib->nama_tbl_kib.'.js');
        // ================================================================
        // $script[] = "showDataTable('Data Aset Diskominfo', '', '".date('dmY')."', [ 0, 2, 3, 4]);";
        $script[] = "showDataTable('" . base_url('User2/getDataAset/' . $dataJenisKib->nama_tbl_kib . '/' . encode($id_jenis_kib)) . "')";
        // $script[] = "$('.date-range').datepicker({
        //                 autoclose: true,
        //                 todayHighlight: true,
        //                 format: 'dd/mm/yyyy',
        //                 toggleActive: true,
        //                 orientation: 'bottom left'
        //             });";
        // $script[] = '$(".select2").select2({ dropdownCssClass: "sizeFontSm" });';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '2';
        $menu['active_sub']     = '2.'.$id_jenis_kib;

        // ================================================================
        
        // $select = array(
        //     'ast.*',
        //     'kib.*',
        //     "(SELECT SUM(br.harga_barang) FROM tbl_barang br WHERE br.id_barang IN (SELECT ar.id_barang FROM tbl_aset_rincian ar WHERE ar.id_aset = ast.id_aset)) harga_aset",
        // );
        // $dataAset = $this->MasterData->selectJoinOrder($select, 'tbl_aset ast', $dataJenisKib->nama_tbl_kib.' kib', "ast.id_kib = kib.id_kib", 'LEFT', "ast.id_jenis_kib = $id_jenis_kib", 'ast.id_aset', 'DESC')->result();

        $content = array(
            'id_jenis_kib'   => $id_jenis_kib,
            'dataJenisKib'   => $dataJenisKib,
            // 'dataAset'       => $dataAset,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_aset',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function addDataAset($id = '') {

        $id_jenis_kib = decode($id);

        $kib = $this->MasterData->getWhereData('*', 'tbl_jenis_kib', "id_jenis_kib = $id_jenis_kib");

        $cekKib = $kib->num_rows();

        if ($cekKib==0) {
            redirect(base_url('User2/dataAset/'.encode(1)));
        }

        $dataJenisKib = $kib->row();

        // ===============================================================================

        $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
        $this->head[] = assets_url . "app-assets/vendors/css/tables/datatable/datatables.min.css";
        $this->head[] = assets_url . "app-assets/css/plugins/forms/wizard.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/style-datepicker.css";
        $this->head[] = assets_url . "app-assets/vendors/css/extensions/sweetalert.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/icheck/icheck.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/icheck/custom.css";
        // ================================================================
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/datatables.min.js";
        // $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/icheck/icheck.min.js";
        // $this->foot[] = assets_url . "app-assets/js/scripts/forms/wizard-steps.js";
        $this->foot[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/jquery.steps.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        // $this->foot[] = base_url('assets/js/data_table.js');
        // $this->foot[] = base_url('assets/js/delete_data.js');
        // $this->foot[] = base_url('assets/js/'.$dataJenisKib->nama_tbl_kib.'.js');
        // ================================================================
        // $script[] = "showDataTable('Data Aset Diskominfo', '', '".date('dmY')."', [ 0, 2, 3, 4]);";
        // $script[] = "showDataTable('" . base_url('User2/getDataAset/' . $dataJenisKib->nama_tbl_kib . '/' . encode($id_jenis_kib)) . "')";
        $script[] = '$("#dataTable").DataTable();';
        $script[] = "$('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd/mm/yyyy',
                        toggleActive: true,
                        orientation: 'bottom left'
                    });";
        $script[] = '$(".select2").select2();';
        $script[] = '$(".tab-steps").steps({
                        headerTag: "h6",
                        bodyTag: "fieldset",
                        transitionEffect: "fade",
                        titleTemplate: "<span class=step>#index#</span> #title#",
                        labels: {
                            finish: "Simpan",
                            next: "Lanjut",
                            previous: "Sebelumnya",
                            loading: "Loading..." 
                        },
                        onFinished: function (event, currentIndex) {
                            var form = $(this);
                            
                            // Trigger HTML5 validity.
                            var reportValidity = form[0].reportValidity();

                            // Then submit if form is OK.
                            if(reportValidity){
                                form.submit();
                            } 
                        }
                    });';
        $script[] = "$('.skin-check input').on('ifChecked ifUnchecked', function(event){
                        pilihAset(this, event.type);
                    }).iCheck({
                        checkboxClass: 'icheckbox_flat-green'
                    });";
        $script[] = "$('.skin-radio input').on('ifChecked ifUnchecked', function(event){
                        asetUtama(this, event.type);
                    }).iCheck({
                        radioClass: 'iradio_square-red'
                    });";
       
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '2';
        $menu['active_sub']     = '2.'.$id_jenis_kib;

        // ================================================================
    
        $dataBarang = $this->MasterData->selectJoinOrder('*', 'tbl_pengadaan pd', 'tbl_barang br', "pd.id_barang = br.id_barang", "LEFT", "br.id_barang NOT IN (SELECT ar.id_barang FROM tbl_aset_rincian ar)", "pd.id_pengadaan", "DESC")->result();

        $content = array(
            'id_jenis_kib'   => $id_jenis_kib,
            'dataJenisKib'   => $dataJenisKib,
            'dataBarang'     => $dataBarang,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/form_kib',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function simpanDataAset() {
        $post = html_escape($this->input->POST());

        // echo json_encode($post);exit();

        if ($post) {

            $this->db->trans_begin();

            $data_kib = array();
            foreach ($post as $key => $val) {
                if (
                    $key!='pilih_aset' && 
                    $key!='pilih_jml_aset' &&
                    $key!='aset_utama' && 
                    $key!='kib' && 
                    $key!='tbl_kib' && 
                    $key!='dataTable_length' && 
                    $key!='plh_ast' && 
                    $key!='ast_utm' && 
                    $key!='nama_aset' && 
                    $key!='jml_aset' && 
                    $key!='kode_baru_aset' && 
                    $key!='no_reg' && 
                    $key!='status_masuk_aset' && 
                    $key!='satuan_aset' && 
                    $key!='ket_aset' 
                ) {
                    if ($key=='harga') {
                        $data_kib[$key] = str_replace('.', '', $val);
                    } else {
                        $data_kib[$key] = $val;
                    }
                }
            }

            $input = $this->MasterData->inputData($data_kib, $post['tbl_kib']);

            $id_kib = $this->db->insert_id();

            $data_aset = array(
                'id_jenis_kib'      => $post['kib'],  
                'id_kib'            => $id_kib,  
                'nama_aset'         => $post['nama_aset'],  
                'jml_aset'          => $post['jml_aset'],  
                'satuan_aset'       => $post['satuan_aset'],  
                'kode_baru_aset'    => $post['kode_baru_aset'],  
                'no_reg'            => $post['no_reg'],  
                'status_masuk_aset' => $post['status_masuk_aset'],  
                'ket_aset'          => $post['ket_aset'],  
            );

            $input = $this->MasterData->inputData($data_aset,'tbl_aset');

            $id_aset = $this->db->insert_id();

            if ($post['status_masuk_aset'] != 'pengadaan') {
                $data_brg = array(
                    'nama_barang'   => $post['nama_aset'],
                    'satuan_barang' => $post['satuan_aset'],
                    'harga_barang'  => str_replace('.', '', $post['harga']),
                    'tgl_masuk'     => date('Y-m-d'),
                );
                $input = $this->MasterData->inputData($data_brg,'tbl_barang');

                $id_barang = $this->db->insert_id();

                $data_rincian = array(
                    'id_aset'       => $id_aset,
                    'id_barang'     => $id_barang,
                    'jml_barang'    => $post['jml_aset'],
                    'posisi'        => 1
                );
                $input = $this->MasterData->inputData($data_rincian,'tbl_aset_rincian');
                
            } else {
                $rincian_barang = explode(';', $post['pilih_aset']);
                $rincian_jml_barang = explode(';', $post['pilih_jml_aset']);

                foreach ($rincian_barang as $key => $val) {
                    $data_rincian = array(
                        'id_aset'       => $id_aset,
                        'id_barang'     => $val,
                        'jml_barang'    => $rincian_jml_barang[$key],
                        'posisi'        => ($val==$post['aset_utama'])?1:2
                    );
                    $input = $this->MasterData->inputData($data_rincian,'tbl_aset_rincian');
                }
            }

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User2/addDataAset/'. encode($post['kib']));
            }
            else {
                $input = $this->db->trans_commit();
                if ($input) {
                    alert_success('Data berhasil disimpan.');
                    redirect(base_url() . 'User2/addDataAset/'. encode($post['kib']));
                } else {
                    alert_failed('Data gagal disimpan.');
                    redirect(base_url() . 'User2/addDataAset/'. encode($post['kib']));
                }
            }
        }
    }

    public function updateDataAset() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $id = decode($post['id']);

            $data = array(
                'nama_rekanan'   => $post['nama_rekanan'],  
                'alamat_rekanan' => $post['alamat_rekanan'],  
                'kota_rekanan'   => $post['kota_rekanan'],  
            );

            $input = $this->MasterData->editData("id_rekanan = $id", $data, 'tbl_rekanan');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User2/dataRekanan');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User2/dataRekanan');
            }
        }
    }

    public function deleteDataAset($value = '') {
        if ($this->input->POST()) {
            $id = decode($this->input->POST('id'));
            $where = "id_rekanan = $id";
            $delete = $this->MasterData->deleteData($where, 'tbl_rekanan');
            if ($delete) {
                alert_success('Data berhasil dihapus.');
                echo 'Success';
            } else {
                alert_failed('Data gagal dihapus.');
                echo 'Gagal';
            }
        } else {
            redirect(base_url('User2'));
        }
    }

    public function getDataAset($tbl='', $id='')
    {
        if ($this->input->POST()) {
            $id_jenis_kib = decode($id);
            $this->load->model("Data_tbl_kib", "DataTable");
            $fetch_data = $this->DataTable->make_datatables($tbl, $id_jenis_kib);

            $data = array();
            $i = $_POST['start'];
            foreach ($fetch_data as $val) {
                $btn = '';
                $i++;
                $btn_hapus = '<button type="button" onclick="hapusData(this)" 
                data-id="'. encode($val->id_aset) .'" 
                data-link="'. base_url('User2/deleteDataAset') .'" 
                data-csrfname="'. $this->security->get_csrf_token_name() .'" 
                data-csrfcode="'. $this->security->get_csrf_hash() .'" 
                class="btn btn-sm btn-danger" title="Hapus Data"><i class="la la-trash-o font-small-3"></i></button> ';
                $btn_edit = ' <a href="' . base_url('User2/editDataAset/' . encode($val->id_aset)) . '" type="button" class="btn btn-sm btn-primary" title="Update Data"><i class="la la-edit font-small-3"></i></a> ';

                $btn .= $btn_hapus;
                $btn .= $btn_edit;

                $columns = array(
                    $i,
                    $btn,
                    $val->nama_aset,
                    ($val->kode_lama_aset=='' && $val->kode_lama_aset==null)?'-':$val->kode_lama_aset,
                    $val->kode_baru_aset,
                    $val->no_reg,
                    $val->jml_aset,
                    $val->satuan_aset,
                );

                if ($id_jenis_kib == 1) {
                    $columns[] = $val->luas_tanah;
                    $columns[] = $val->thn_beli;
                    $columns[] = $val->letak;
                    $columns[] = $val->status_tanah;
                    $columns[] = date('d/m/Y', strtotime(str_replace('/', '-', $val->tgl_sertifikat)));
                    $columns[] = $val->no_sertifikat;
                    $columns[] = $val->penggunaan;
                } else if ($id_jenis_kib == 2) {
                    $columns[] = $val->merk_type;
                    $columns[] = $val->ukuran_cc;
                    $columns[] = $val->bahan;
                    $columns[] = $val->warna;
                    $columns[] = $val->thn_beli;
                    $columns[] = ($val->no_pabrik==''&&$val->no_pabrik==null)?'-':$val->no_pabrik;
                    $columns[] = ($val->no_rangka==''&&$val->no_rangka==null)?'-':$val->no_rangka;
                    $columns[] = ($val->no_mesin==''&&$val->no_mesin==null)?'-':$val->no_mesin;
                    $columns[] = ($val->no_polisi==''&&$val->no_polisi==null)?'-':$val->no_polisi;
                    $columns[] = ($val->no_bpkb==''&&$val->no_bpkb==null)?'-':$val->no_bpkb;
                } else if ($id_jenis_kib == 3) {
                    $columns[] = $val->kondisi;
                    $columns[] = $val->bertingkat;
                    $columns[] = $val->beton;
                    $columns[] = $val->luas_lantai;
                    $columns[] = $val->letak;
                    $columns[] = date('d/m/Y', strtotime(str_replace('/', '-', $val->tgl_dokumen)));
                    $columns[] = $val->no_dokumen;
                    $columns[] = $val->luas_bangunan;
                    $columns[] = $val->status_tanah;
                    $columns[] = $val->no_kode_tanah;
                } else if ($id_jenis_kib == 4) {
                    $columns[] = ($val->kondisi==''&&$val->kondisi==null)?'-':$val->kondisi;
                    $columns[] = $val->konstruksi;
                    $columns[] = $val->panjang;
                    $columns[] = $val->lebar;
                    $columns[] = $val->luas;
                    $columns[] = $val->letak;
                    $columns[] = date('d/m/Y', strtotime(str_replace('/', '-', $val->tgl_dokumen)));
                    $columns[] = ($val->no_dokumen==''&&$val->no_dokumen==null)?'-':$val->no_dokumen;
                    $columns[] = $val->status_tanah;
                    $columns[] = ($val->no_kode_tanah==''&&$val->no_kode_tanah==null)?'-':$val->no_kode_tanah;
                } else if ($id_jenis_kib == 5) {
                    $columns[] = $val->judul_buku;
                    $columns[] = $val->spesifikasi_buku;
                    $columns[] = $val->asal_seni;
                    $columns[] = $val->pencipta_seni;
                    $columns[] = $val->bahan_seni;
                    $columns[] = $val->jenis_hewan_tumbuhan;
                    $columns[] = $val->ukuran_hewan_tumbuhan;
                    $columns[] = $val->jumlah;
                    $columns[] = $val->thn_beli;
                } else {
                    $columns[] = $val->kondisi;
                    $columns[] = $val->bertingkat;
                    $columns[] = $val->beton;
                    $columns[] = $val->luas_lantai;
                    $columns[] = $val->letak;
                    $columns[] = date('d/m/Y', strtotime(str_replace('/', '-', $val->tgl_dokumen)));
                    $columns[] = $val->no_dokumen;
                    $columns[] = date('d/m/Y', strtotime(str_replace('/', '-', $val->tgl_mulai)));
                    $columns[] = $val->status_tanah;
                    $columns[] = $val->no_kode_tanah;
                }

                $columns[] = $val->asal_usul;
                $columns[] = nominal($val->harga_aset);
                $columns[] = $val->ket_aset;

                $data[] = $columns;
            }
            $output = array(
                "draw"               =>     $_POST["draw"],
                "recordsTotal"       =>     $this->DataTable->get_all_data($id_jenis_kib),
                "recordsFiltered"    =>     $this->DataTable->get_filtered_data($tbl, $id_jenis_kib),
                "data"               =>     $data
            );
            echo json_encode($output);
        }
    }

    // ============================================

    public function getDataDesa()
    {
        if ($this->input->POST()) {
            $kode_kec = $this->input->POST('kode_kecamatan');
            $where = "kode_kecamatan = '$kode_kec'";
            $data = $this->MasterData->getDataWhere('tbl_desa', $where)->result();
            if ($data) {
                $result = array(
                    'response' => true,
                    'data' => $data
                );
            } else {
                $result = array(
                    'response' => false
                );
            }
        } else {
            $result = array(
                'response' => false
            );
        }
        echo json_encode($result);
    }

    public function uploadFile()
    {
        $this->load->view('upload_file');
    }

    public function prosesUpload()
    {
        if ($this->input->POST()) {
            $this->load->helper('upload');
            $name_post = 'file_upload';
            $size_file = 2048;
            $overwrite = true;
            $allow     = '*';
            $path_file = 'assets/upload';
            $new_path = 'assets/upload/thumb';
            $width     = 250;
            $height    = 250;
            $x         = 100;
            $y         = 100;
            // $upload = upload_files($name_post, $size_file, $overwrite, $allow, $path_file);
            // $upload = upload_photo($name_post, $size_file, $overwrite, $path_file, $width, $height, TRUE, $new_path);
            $upload = upload_crop_photo($name_post, $size_file, $overwrite, $path_file, $width, $height, $x, $y);
            if ($upload['respons']) {
                echo "File ".$upload['data']." berhasil diupload.";
            } else {
                echo "Gaga diupload. <br>".$upload['data'];
            }
        }
    }
}
