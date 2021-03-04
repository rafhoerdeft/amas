<?php
class Data_table_perizinan extends CI_Model
{
    var $table = "tbl_perizinan pr";
    var $select_column = array(
        'pr.id_perizinan',
        'pm.no_pemohon',
        'pr.nomor_perizinan',
        'pr.tgl_terbit',
        'pr.kajian_perizinan',
        'pm.nama_pemohon',
        'pm.alamat_pemohon',
        'kec.nama_kecamatan AS nama_kecamatan_pemohon',
        'kc.nama_kecamatan AS nama_kecamatan_usaha',
        'des.nama_desa AS nama_desa_pemohon',
        'ds.nama_desa AS nama_desa_usaha',
        'pm.jabatan_pemohon',
        'pm.nama_usaha',
        'pm.alamat_usaha',
        'DATE_FORMAT(pm.tgl_pelaksanaan_mulai, "%d-%m-%Y") tgl_pelaksanaan_mulai',
        'DATE_FORMAT(pm.tgl_pelaksanaan_akhir, "%d-%m-%Y") tgl_pelaksanaan_akhir',
        'pm.jml_peserta',
    );
    
    var $select_column_search = array(
        'pr.id_perizinan',
        'pm.no_pemohon',
        'pr.nomor_perizinan',
        'DATE_FORMAT(pr.tgl_terbit, "%d-%m-%Y")',
        'pr.kajian_perizinan',
        'pm.nama_pemohon',
        'pm.alamat_pemohon',
        'kec.nama_kecamatan',
        'kc.nama_kecamatan',
        'des.nama_desa',
        'ds.nama_desa',
        'pm.jabatan_pemohon',
        'pm.nama_usaha',
        'pm.alamat_usaha',
        'DATE_FORMAT(pm.tgl_pelaksanaan_mulai, "%d-%m-%Y")',
        'DATE_FORMAT(pm.tgl_pelaksanaan_akhir, "%d-%m-%Y")',
        'pm.jml_peserta',
    );

    function make_query($status = '', $id_surat='')
    {
        if ($status == 'diterima') {
            $order_column = array(null, null, 'pm.no_pemohon', 'pr.nomor_perizinan', 'pr.tgl_terbit', 'pm.nama_pemohon', 'pm.alamat_pemohon', 'pm.jabatan_pemohon', 'pm.nama_usaha', 'pm.alamat_usaha');
        } else {
            $order_column = array(null, null, 'pm.no_pemohon', 'pr.nomor_perizinan', 'pr.tgl_terbit', 'pm.nama_pemohon', 'pm.alamat_pemohon', 'pm.jabatan_pemohon', 'pm.nama_usaha', 'pm.alamat_usaha', 'pr.kajian_perizinan');
        }

        if ($id_surat != '2') {
            $order_column[] = 'pm.tgl_pelaksanaan_mulai';
            $order_column[] = 'pm.jml_peserta';
        }

        $this->db->select($this->select_column);
        $this->db->where('pr.status_perizinan', $status);
        $this->db->where('pm.id_surat', $id_surat);
        $this->db->join('tbl_pemohon pm', 'pm.id_pemohon = pr.id_pemohon', 'left');
        $this->db->join('tbl_kecamatan kec', 'kec.kode_kecamatan = pm.kode_kecamatan_pemohon', 'left');
        $this->db->join('tbl_kecamatan kc', 'kc.kode_kecamatan = pm.kode_kecamatan_usaha', 'left');
        $this->db->join('tbl_desa des', 'des.kode_desa = pm.kode_desa_pemohon', 'left');
        $this->db->join('tbl_desa ds', 'ds.kode_desa = pm.kode_desa_usaha', 'left');
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->select_column_search as $item) {
            // if datatable send POST for search
            if ($_POST["search"]["value"]) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $_POST["search"]["value"]);
                } else {
                    $this->db->or_like($item, $_POST["search"]["value"]);
                }

                // last loop
                if (count($this->select_column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($_POST["order"])) {
            $this->db->order_by($order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_perizinan', 'DESC');
        }
    }

    function make_datatables($status = '', $id_surat='')
    {
        $this->make_query($status, $id_surat);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data($status = '', $id_surat='')
    {
        $this->make_query($status, $id_surat);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data($status = '', $id_surat='')
    {
        $this->db->select("*");
        $this->db->where('pr.status_perizinan', $status);
        $this->db->where('pm.id_surat', $id_surat);
        $this->db->join('tbl_pemohon pm', 'pm.id_pemohon = pr.id_pemohon', 'left');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
