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

        // JUMLAH LAPORAN MASUK
		$select = "SUM((SELECT SUM(pr.jml_barang) FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan)) jml_pengadaan";
        $table = 'tbl_pengadaan pd';
        $where = "MONTH(tgl_pengadaan) = MONTH(now()) AND YEAR(tgl_pengadaan) = YEAR(now())";
		$this_month = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_pengadaan;
		$where = "pd.tgl_pengadaan > DATE_SUB(now(), INTERVAL 6 MONTH)";
        $last_6_month = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_pengadaan;
        $where = "YEAR(tgl_pengadaan) = YEAR(now())";
        $this_year = $this->MasterData->getWhereData($select,$table,$where)->row()->jml_pengadaan;

        $content = array(
            'this_month'    => $this_month,
            'last_6_month'  => $last_6_month,
            'this_year'     => $this_year,
        );

        $data = array(
            'header' => $header,
            'menu'   => $menu,
            'konten' => 'pages/dashboard',
            'footer' => $footer,
            'cont'   => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    // REKANAN ==============================================================

    public function dataRekanan() {

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
        $this->foot[] = base_url('assets/js/data_table.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        $script[] = "showDataTable('Data Rekanan Diskominfo', '', '".date('dmY')."', [ 0, 2, 3, 4]);";
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

    // KONTRAK ==============================================================

    public function dataKontrak() {

        $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
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
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        $this->foot[] = base_url('assets/js/data_table.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        $script[] = "showDataTable('Data Kontrak Rekanan', '', '".date('dmY')."', [ 0, 2, 3, 4, 5, 6, 7, 8]);";
        // $script[] = "$('.date-range').datepicker({
        //                 autoclose: true,
        //                 todayHighlight: true,
        //                 format: 'dd/mm/yyyy',
        //                 toggleActive: true,
        //                 orientation: 'bottom left'
        //             });";
        $script[] = '$(".select2").select2();';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '3';

        // ================================================================
        $select = array(
            '*',
            "(SELECT rk.nama_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) nama_rekanan",
            "(SELECT rk.alamat_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) alamat_rekanan",
            "(SELECT rk.kota_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) kota_rekanan",
            "(SELECT us.nama_user FROM tbl_user us WHERE us.id_user = kt.id_user) nama_ppkom",
        );
        $dataKontrak = $this->MasterData->getWhereDataOrder($select, 'tbl_kontrak kt', "kt.id_kontrak > 0", "kt.id_kontrak", "DESC")->result();

        // $dataPpkom   = $this->MasterData->getWhereData('*', 'tbl_user', "active = 1 AND id_role IN (SELECT rl.id_role FROM tbl_role rl WHERE rl.nama_role LIKE '%PPKom%')")->result();

        $dataRekanan = $this->MasterData->getWhereData('*', 'tbl_rekanan', "id_rekanan > 0")->result();

        $content = array(
            'dataKontrak'   => $dataKontrak,
            // 'dataPpkom'     => $dataPpkom,
            'dataRekanan'   => $dataRekanan,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_kontrak',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function simpanDataKontrak() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $data = array(
                'no_kontrak'     => $post['no_kontrak'],  
                'no_sp2d'        => $post['no_sp2d'],  
                'nilai_kontrak'  => str_replace('.', '', $post['nilai_kontrak']),  
                'id_rekanan'     => $post['rekanan'],  
                'id_user'        => $this->id_user,  
                // 'jenis_rekening' => $post['rekening'],
            );

            $input = $this->MasterData->inputData($data,'tbl_kontrak');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User1/dataKontrak');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataKontrak');
            }
        }
    }

    public function updateDataKontrak() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $id = decode($post['id']);

            $data = array(
                'no_kontrak'     => $post['no_kontrak'],  
                'no_sp2d'        => $post['no_sp2d'],  
                'nilai_kontrak'  => str_replace('.', '', $post['nilai_kontrak']),  
                'id_rekanan'     => $post['rekanan'],  
                'id_user'        => $this->id_user,  
                // 'jenis_rekening' => $post['rekening'],
            );

            $input = $this->MasterData->editData("id_kontrak = $id", $data, 'tbl_kontrak');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User1/dataKontrak');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataKontrak');
            }
        }
    }

    public function deleteDataKontrak($value = '') {
        if ($this->input->POST()) {
            $id = decode($this->input->POST('id'));
            $where = "id_kontrak = $id";
            $delete = $this->MasterData->deleteData($where, 'tbl_kontrak');
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

    // PENGADAAN ============================================================

    public function dataPengadaan() {

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
        $this->foot[] = base_url('assets/js/cetak_excel.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        $script[] = "showDataTable('Data Pengadaan', '', '".date('dmY')."', [ 0, 2, 3, 4, 5, 6, 7, 8, 9]);";
        $script[] = "$('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        format: 'dd/mm/yyyy',
                        toggleActive: true,
                        orientation: 'bottom left'
                    });";
        $script[] = '$(".select2").select2();';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '4';

        // ================================================================
        $select = array(
            'kt.*',
            'pd.*',
            "(SELECT rk.nama_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) nama_rekanan",
            "(SELECT rk.alamat_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) alamat_rekanan",
            "(SELECT rk.kota_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) kota_rekanan",
            "(SELECT us.nama_user FROM tbl_user us WHERE us.id_user = kt.id_user) nama_ppkom",
            "(SELECT COUNT(pr.id_pengadaan) FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan) jml_rincian",
            "(SELECT GROUP_CONCAT((SELECT br.harga_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) * pr.jml_barang SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) harga_pengadaan",

            "(SELECT GROUP_CONCAT((SELECT br.nama_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) nm_brg",
            "(SELECT GROUP_CONCAT((SELECT br.merk_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) merk_brg",
            "(SELECT GROUP_CONCAT((SELECT br.satuan_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) sat_brg",
            "(SELECT GROUP_CONCAT((SELECT br.harga_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) hrg_brg",
            "(SELECT GROUP_CONCAT(pr.jml_barang SEPARATOR ';') FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan  GROUP BY pr.id_pengadaan) jml_brg",
            // "(SELECT SUM((SELECT br.harga_barang FROM tbl_barang br WHERE br.id_barang = pr.id_barang) * pr.jml_barang) FROM tbl_pengadaan_rincian pr WHERE pr.id_pengadaan = pd.id_pengadaan GROUP BY pr.id_pengadaan) tot_harga",
        );
        $dataPengadaan = $this->MasterData->selectJoinOrder($select, 'tbl_pengadaan pd', 'tbl_kontrak kt', "pd.id_kontrak = kt.id_kontrak", "LEFT", "pd.id_pengadaan > 0", "pd.id_pengadaan", "DESC")->result();

        $select = array(
            '*',
            "(SELECT rk.nama_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) nama_rekanan",
            "(SELECT us.nama_user FROM tbl_user us WHERE us.id_user = kt.id_user) nama_ppkom",
        );
        $dataKontrak = $this->MasterData->getWhereDataOrder($select, 'tbl_kontrak kt', "kt.id_kontrak NOT IN (SELECT pd.id_kontrak FROM tbl_pengadaan pd)", "kt.id_kontrak", "DESC")->result();

        // $dataRekanan = $this->MasterData->getWhereData('*', 'tbl_rekanan', "id_rekanan > 0")->result();

        $content = array(
            'dataPengadaan'   => $dataPengadaan,
            'dataKontrak'   => $dataKontrak,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_pengadaan',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function simpanDataPengadaan() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $data = array(
                'id_kontrak'     => $post['kontrak'],  
                'tgl_pengadaan'  => date('Y-m-d', strtotime(str_replace('/', '-', $post['tgl_pengadaan']))),   
                'jenis_rekening' => $post['rekening'],  
            );

            $input = $this->MasterData->inputData($data,'tbl_pengadaan');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User1/dataPengadaan');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataPengadaan');
            }
        }
    }

    public function updateDataPengadaan() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $id = decode($post['id']);

            $data = array(
                // 'id_kontrak'     => $post['kontrak'],  
                'tgl_pengadaan'  => date('Y-m-d', strtotime(str_replace('/', '-', $post['tgl_pengadaan']))),  
                'jenis_rekening' => $post['rekening'],  
            );

            $input = $this->MasterData->editData("id_pengadaan = $id", $data, 'tbl_pengadaan');

            if ($input) {
                alert_success('Data berhasil disimpan.');
                redirect(base_url() . 'User1/dataPengadaan');
            } else {
                alert_failed('Data gagal disimpan.');
                redirect(base_url() . 'User1/dataPengadaan');
            }
        }
    }

    public function deleteDataPengadaan($value = '') {
        if ($this->input->POST()) {
            $id = decode($this->input->POST('id'));
            $where = "id_pengadaan = $id";
            $delete = $this->MasterData->deleteData($where, 'tbl_pengadaan');
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

    // RINCIAN PENGADAAN ============================================================

    public function rincianPengadaan($id = 0) {

        $id_pengadaan = decode($id);

        $this->head[] = assets_url . "app-assets/css/plugins/animate/animate.css";
        $this->head[] = assets_url . "app-assets/vendors/css/forms/selects/select2.min.css";
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
        $this->foot[] = assets_url . "app-assets/vendors/js/forms/select/select2.full.min.js";
        $this->foot[] = assets_url . "app-assets/vendors/js/extensions/sweetalert.min.js";
        // $this->foot[] = base_url('assets/js/data_table.js');
        $this->foot[] = base_url('assets/js/delete_data.js');
        // ================================================================
        // $script[] = "showDataTable('Rincian Pengadaan', '', '".date('dmY')."', [ 0, 2, 3, 4, 5, 6, 7]);";
        $script[] = "$('#dataTable').DataTable();";
        // $script[] = "$('.date-picker').datepicker({
        //                 autoclose: true,
        //                 todayHighlight: true,
        //                 format: 'dd/mm/yyyy',
        //                 toggleActive: true,
        //                 orientation: 'bottom left'
        //             });";
        $script[] = '$(".select2").select2();';
        // ================================================================
        $header['css']      = $this->head;
        $footer['js']       = $this->foot;
        $footer['script']   = $script;
        $menu['active']     = '4';

        // ================================================================

        $select = array(
            'kt.*',
            'pd.*',
            "(SELECT rk.nama_rekanan FROM tbl_rekanan rk WHERE rk.id_rekanan = kt.id_rekanan) nama_rekanan",
        );
        
        $dataPengadaan = $this->MasterData->selectJoin($select, 'tbl_kontrak kt', 'tbl_pengadaan pd', "kt.id_kontrak = pd.id_kontrak", "LEFT", "pd.id_pengadaan = $id_pengadaan",)->row();

        $dataRincian = $this->MasterData->selectJoinOrder('*', 'tbl_pengadaan_rincian pr', 'tbl_barang br', "br.id_barang = pr.id_barang", "LEFT", "pr.id_pengadaan = $id_pengadaan", "pr.id_pengadaan_rincian", "DESC")->result();

        $content = array(
            'dataRincian'   => $dataRincian,
            'dataPengadaan'   => $dataPengadaan,
        );

        $data = array(
            'header'    => $header,
            'menu'      => $menu,
            'konten'    => 'pages/data_pengadaan_rincian',
            'footer'    => $footer,
            'cont'      => $content,
        );

        $this->load->view("view_master_admin", $data);
    }

    public function simpanRincianPengadaan() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $this->db->trans_begin();

            $data = array(
                'nama_barang'     => $post['nama_barang'],   
                'merk_barang'     => $post['merk_barang'],   
                'satuan_barang'   => str_replace('.', '', $post['satuan_barang']),   
                'harga_barang'    => str_replace('.', '', $post['harga_barang']),   
                'tgl_masuk'       => $post['tgl_pengadaan'],   
            );

            $this->MasterData->inputData($data,'tbl_barang');

            $id_barang = $this->db->insert_id();

            $data = array(
                'id_pengadaan'  => decode($post['id_pengadaan']),   
                'id_barang'     => $id_barang,   
                'jml_barang'    => $post['jml_barang'],   
            );

            $input = $this->MasterData->inputData($data,'tbl_pengadaan_rincian');

            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    alert_failed('Data gagal disimpan.');
                    redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
            }
            else
            {
                    $this->db->trans_commit();
                    if ($input) {
                        alert_success('Data berhasil disimpan.');
                        redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
                    } else {
                        alert_failed('Data gagal disimpan.');
                        redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
                    }
            }
        }
    }

    public function updateRincianPengadaan() {
        $post = html_escape($this->input->POST());

        if ($post) {

            $this->db->trans_begin();

            $id = decode($post['id']);
            $id_barang = $this->db->query("SELECT id_barang FROM tbl_pengadaan_rincian WHERE id_pengadaan_rincian = $id")->row()->id_barang;

            $data = array(
                'nama_barang'     => $post['nama_barang'],   
                'merk_barang'     => $post['merk_barang'],   
                'satuan_barang'   => str_replace('.', '', $post['satuan_barang']),   
                'harga_barang'    => str_replace('.', '', $post['harga_barang']),   
                'tgl_masuk'       => $post['tgl_pengadaan'],   
            );

            $this->MasterData->editData("id_barang = $id_barang", $data, 'tbl_barang');

            $data = array(
                'id_pengadaan'  => decode($post['id_pengadaan']),   
                'id_barang'     => $id_barang,   
                'jml_barang'    => $post['jml_barang'],   
            );

            $input = $this->MasterData->editData("id_pengadaan_rincian = $id", $data, 'tbl_pengadaan_rincian');

            if ($this->db->trans_status() === FALSE)
            {
                    $this->db->trans_rollback();
                    alert_failed('Data gagal disimpan.');
                    redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
            }
            else
            {
                    $this->db->trans_commit();
                    if ($input) {
                        alert_success('Data berhasil disimpan.');
                        redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
                    } else {
                        alert_failed('Data gagal disimpan.');
                        redirect(base_url() . 'User1/rincianPengadaan/'. $post['id_pengadaan']);
                    }
            }
        }
    }

    public function deleteRincianPengadaan($value = '') {
        if ($this->input->POST()) {
            $id = decode($this->input->POST('id'));
            $where = "id_barang = $id";
            $delete = $this->MasterData->deleteData($where, 'tbl_barang');
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
