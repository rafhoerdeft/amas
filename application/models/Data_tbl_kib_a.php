<?php
class Data_tbl_kib_a extends CI_Model
{
    var $table = "tbl_aset ast";
    var $select_column = array(
        'id_aset',
        'nama_aset',
        'kode_lama_aset',
        'kode_baru_aset',
        'no_reg',
        'luas_tanah',
        'thn_beli',
        'letak',
        'status_tanah',
        'DATE_FORMAT(tgl_sertifikat, "%d-%m-%Y") tgl_sertifikat',
        'no_sertifikat',
        'penggunaan',
        'asal_usul',
        "(SELECT SUM(br.harga_barang) FROM tbl_barang br WHERE br.id_barang IN (SELECT ar.id_barang FROM tbl_aset_rincian ar WHERE ar.id_aset = ast.id_aset)) harga_aset",
        'ket_aset',
    );
    var $select_column_search = array(
        'id_aset',
        'nama_aset',
        'kode_lama_aset',
        'kode_baru_aset',
        'no_reg',
        'luas_tanah',
        'thn_beli',
        'letak',
        'status_tanah',
        'DATE_FORMAT(tgl_sertifikat, "%d-%m-%Y")',
        'no_sertifikat',
        'penggunaan',
        'asal_usul',
        'ket_aset',
    );

    function make_query($tbl, $id_jenis_kib)
    {
        $this->db->select($this->select_column);
        $this->db->where("ast.id_jenis_kib = $id_jenis_kib");
        $this->db->join($tbl.' kib', 'ast.id_kib = kib.id_kib', 'left');
        $this->db->from($this->table);

        $order_column = array(
            null, null, 
            'nama_aset',
            'kode_lama_aset',
            'kode_baru_aset',
            'no_reg',
            'luas_tanah',
            'thn_beli',
            'letak',
            'status_tanah',
            'tgl_sertifikat',
            'no_sertifikat',
            'penggunaan',
            'asal_usul',
            'harga_aset',
            'ket_aset',
        );
        
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
            $this->db->order_by('ast.id_aset', 'DESC');
        }
    }

    function make_datatables($tbl = '', $id_jenis_kib='')
    {
        $this->make_query($tbl, $id_jenis_kib);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data($tbl = '', $id_jenis_kib='')
    {
        $this->make_query($tbl, $id_jenis_kib);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_all_data($id_jenis_kib='')
    {
        $this->db->select("*");
        $this->db->where('id_jenis_kib', $id_jenis_kib);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
