<table id="data_aset" class="table table-hover table-bordered table-striped" style="font-size: 8pt">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>
                <div class="skin skin-check-all">
                    <input type="checkbox" name="plh_aset_all" id="check_all" value="0">
                </div>
            </th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kode Lama</th>
            <th>Kode Baru</th>
            <th>No. Reg</th>
            <!-- <th>Jumlah</th> -->
            <th>Satuan</th>
            <th>Kondisi</th>
            <th>Konst. Bertingkat</th>
            <th>Konst. Beton</th>
            <th>Luas Lantai</th>
            <th>Lokasi</th>
            <th>Tgl. Dokumen</th>
            <th>No. Dokumen</th>
            <th>Tgl. Mulai Kerja</th>
            <th>Status Tanah</th>
            <th>No. Kode Tanah</th>
            <th>Asal Usul</th>
            <th>Nilai Kontrak (Rp)</th>
            <th>Keterangan</th>
        </tr>
    </thead>

    <!-- <tbody>
        <?php //$no=1; foreach ($dataAset as $val) { ?>
        <tr>
            <td align="center"><?php //echo $no++; ?></td>
            <td nowrap align="center">
                <button type="button" onclick="hapusData(this)" 
                data-id="<?php //echo encode($val->id_aset); ?>" 
                data-link="<?php //echo base_url('User1/deleteDataAset'); ?>" 
                data-csrfname="<?php //echo $this->security->get_csrf_token_name(); ?>" 
                data-csrfcode="<?php //echo $this->security->get_csrf_hash(); ?>" 
                class="btn btn-sm btn-danger" title="Hapus Data"><i class="la la-trash-o font-small-3"></i></button>

                <button type="button" 
                data-id="<?php //echo encode($val->id_aset); ?>" 
                onclick="editModal(this)" class="btn btn-sm btn-info" title="Update Data"><i class="la la-edit font-small-3"></i></button> 
            </td>
            <td><?php //echo $val->nama_aset; ?></td>
            <td><?php //echo $val->kode_lama_aset; ?></td>
            <td><?php //echo $val->kode_baru_aset; ?></td>
            <td align="center"><?php //echo $val->no_reg; ?></td>
            <td align="center"><?php //echo $val->kondisi; ?></td>
            <td align="center"><?php //echo $val->bertingkat; ?></td>
            <td align="center"><?php //echo $val->beton; ?></td>
            <td align="center"><?php //echo $val->luas_lantai; ?></td>
            <td><?php //echo $val->letak; ?></td>
            <td align="center"><?php //echo date('d/m/Y', strtotime($val->tgl_dokumen)); ?></td>
            <td align="left"><?php //echo $val->no_dokumen; ?></td>
            <td align="center"><?php //echo date('d/m/Y', strtotime($val->tgl_mulai)); ?></td>
            <td align="center"><?php //echo $val->status_tanah; ?></td>
            <td><?php //echo $val->no_kode_tanah; ?></td>
            <td align="center"><?php //echo $val->asal_usul; ?></td>
            <td align="right"><?php //echo nominal($val->harga_aset); ?></td>
            <td><?php //echo $val->ket_aset; ?></td>
        </tr>
        <?php //} ?>
    </tbody> -->

</table>