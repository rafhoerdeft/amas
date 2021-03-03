<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(null);

class User1 extends Adm_Controller
{

    function __construct()
    {
        parent::__construct();

		$this->secure->auth('Sim_asset_User1');

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
            assets_url . "app-assets/vendors/js/vendors.min.js",
            assets_url . "app-assets/js/core/app-menu.js",
            assets_url . "app-assets/js/core/app.js",
            assets_url . "app-assets/js/scripts/customizer.js",
            assets_url . "app-assets/vendors/js/ui/jquery.sticky.js",
            assets_url . "app-assets/js/scripts/footer.min.js",
        );

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

    // REKANAN ==============================================================

    public function dataRekanan() {

        $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
        $this->head[] = assets_url . "app-assets/vendors/css/tables/datatable/datatables.min.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/style-datepicker.css";
        $this->head[] = assets_url . "app-assets/vendors/css/extensions/sweetalert.css";
        // ================================================================
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/datatables.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js";
        $this->foot[] = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js";
        $this->foot[] = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js";
        $this->foot[] = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        $this->foot[] = base_url('assets/js/data_table.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        $script[] = "showDataTable('Data Rekanan Diskominfo', '', '".date('dmY')."', [ 0, 2, 3, 4]);";
        $script[] = "$('.date-range').datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd/mm/yyyy',
                        toggleActive: true,
                        orientation: 'bottom left'
                    });";
        // $script[] = '$(".select2").select2({ dropdownCssClass: "sizeFontSm" });';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '2';

        // ================================================================
        
        $dataRekanan = $this->MasterData->getWhereDataOrder('*', 'tbl_rekanan', "id_rekanan > 0", "id_rekanan", "DESC")->result();

        $content = array(
            'dataRekanan'   => $dataRekanan,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_rekanan',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function simpanDataRekanan() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $data = array(
                'nama_rekanan'   => $post['nama_rekanan'],  
                'alamat_rekanan' => $post['alamat_rekanan'],  
                'kota_rekanan'   => $post['kota_rekanan'],  
            );

            $input = $this->MasterData->inputData($data,'tbl_rekanan');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User1/dataRekanan');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataRekanan');
            }
        }
    }

    public function updateDataRekanan() {
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
                redirect(base_url() . 'User1/dataRekanan');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataRekanan');
            }
        }
    }

    public function deleteDataRekanan($value = '') {
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
            redirect(base_url('User1'));
        }
    }

    // ======================================================================

    public function dataIjin() {
        $this->load->helper('searchbar');

        $status         = $_POST['status'];
        $jenis_ijin     = $_POST['jenis_ijin'];
        $tahun          = $_POST['tahun'];
        $bulan          = $_POST['bulan'];

        $statusIjin = get_status_ijin();
        $dataStatusIjin = array();
        if($statusIjin['respon']) {
            $dataStatusIjin = $statusIjin['data'];
        }

        $jenisIjin = get_jenis_ijin();
        $dataJenisIjin = array();
        if($jenisIjin['respon']) {
            $dataJenisIjin = $jenisIjin['data'];
        }

        $tahunIjin = get_tahun_ijin();
        $dataTahunIjin = array();
        if($tahunIjin['respon']) {
            $dataTahunIjin = $tahunIjin['data'];
        }

        $bulanIjin = get_bulan_ijin();
        $dataBulanIjin = array();
        if($bulanIjin['respon']) {
            $dataBulanIjin = $bulanIjin['data'];
        }

        // var_dump($dataJenisPajak);exit();

        if (isset($status) OR ($status != null AND $status != '' AND !empty($status))) {
            $selectStatus = $status;
        } else {
            $selectStatus = $dataStatusIjin[0]['id'];
        }

        if (isset($jenis_ijin) OR ($jenis_ijin != null AND $jenis_ijin != '' AND !empty($jenis_ijin))) {
            $selectJenis = $jenis_ijin;
        } else {
            $selectJenis = 0;
        }

        if ($tahun != null AND $tahun != '' AND !empty($tahun)) {
            $selectTahun = $tahun;
        } else {
            $selectTahun = $dataTahunIjin[0]['tahun'];
        }

        if ($bulan != null AND $bulan != '' AND !empty($bulan)) {
            $selectBulan = $bulan;
        } else {
            $selectBulan = 0;
        }

        // $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
        $this->head[] = assets_url . "app-assets/vendors/css/tables/datatable/datatables.min.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css";
        $this->head[] = assets_url . "app-assets/vendors/bootstrap-datepicker/style-datepicker.css";
        // $this->head[] = assets_url . "app-assets/vendors/css/extensions/sweetalert.css";
        // ================================================================
        $this->foot[] = assets_url . "app-assets/vendors/js/tables/datatable/datatables.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        // $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        $this->foot[] = base_url('assets/js/get_data_ijin.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        $script[] = "showDataTable('" . base_url('User1/getDataIjin/' . $selectStatus . '/' . $selectJenis . '/' . $selectTahun . '/' . $selectBulan) . "', '" . $selectJenis . "');";
        $script[] = "$('.date-range').datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd/mm/yyyy',
                        toggleActive: true,
                        orientation: 'bottom left'
                    });";
        $script[] = '$(".select2").select2({ dropdownCssClass: "sizeFontSm" });';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '3';

        $cont = array(
            'selectStatus'    => $selectStatus,
            'selectJenis'     => $selectJenis,
            'selectTahun'     => $selectTahun,
            'selectBulan'     => $selectBulan,
            'dataJenisIjin'   => $dataJenisIjin, 
            'dataStatusIjin'  => $dataStatusIjin,
            'dataTahunIjin'   => $dataTahunIjin,
            'dataBulanIjin'   => $dataBulanIjin,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_ijin',
            'footer'    => $footer,
            'cont'      => $cont,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function getDataIjin($status = '', $jenis = '', $tahun = '', $bulan = '')
    {
        if (html_escape($this->input->POST())) {

            $post = array(
                "tahun"             => $tahun,
                "bulan"             => $bulan,
                "status"            => $status,
                "izin"              => $jenis,
                "search"            => $_POST["search"]["value"],
                "limit_start"       => $_POST['start'],
                "limit_length"      => $_POST['length'],
                "order_index"       => $_POST['order']['0']['column'],
                "order_short"       => $_POST['order']['0']['dir'],
                "count"             => false,
            );

            $getDataIjin = get_ijin($post);

            $data = array();
            if ($getDataIjin['respon']) {
                $fetch_data = $getDataIjin['data'];

                $i = $_POST['start'];
                foreach ($fetch_data as $row) {
                    $i++;
                    $columns = array(
                        $i,
                        ($row['tgl_daftar']!=null)?date('d-m-Y', strtotime($row['tgl_daftar'])):'',
                        $row['nama_pemohon'],
                        $row['nama_perusahaan'],
                        $row['alamat'],
                        $row['telpon'],
                        $row['nama_jenis_izin'],
                        $row['no_surat'],
                        $row['pejabat'],
                    );

                    if ($jenis == '11') {
                        $columns[] = $row['jenis_reklame'];
                        $columns[] = $row['naskah_reklame'];
                        $columns[] = $row['ukuran_reklame'];
                        $columns[] = $row['jml_reklame'];
                        $columns[] = $row['tinggi_reklame'];
                        $columns[] = $row['lokasi_reklame'];
                    }

                    $data[] = $columns;
                }
            }

            $post['count'] = true;
            $getCount = get_ijin($post);

            if ($getCount['respon']) {
                $totData = $getCount['data'];
            } else {
                $totData = 0;
            }
            
            $output = array(
                // "draw"			=>     intval($_POST["draw"]),  
                "draw"              =>     $_POST["draw"],
                "recordsTotal"      =>     $totData,
                "recordsFiltered"   =>     $totData,
                "data"              =>     $data
            );
            echo json_encode($output);
        }
    }

    // ============================================

    public function getDataDesa()
    {
        if (html_escape($this->input->POST())) {
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
        if (html_escape($this->input->POST())) {
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
