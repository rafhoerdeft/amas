<table id="dataTable" class="table table-hover table-bordered table-striped table-responsive" style="font-size: 8pt">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kode Lama</th>
            <th>Kode Baru</th>
            <th>No. Reg</th>
            <th>Konstruksi</th>
            <th>Panjang (m)</th>
            <th>Lebar (m)</th>
            <th>Luas (m2)</th>
            <th>Lokasi</th>
            <th>Tgl. Dokumen</th>
            <th>No. Dokumen</th>
            <th>Status Tanah</th>
            <th>No. Kode Tanah</th>
            <th>Asal Usul</th>
            <th>Harga</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
        </tr>
    </thead>

    <tbody>
        <?php $no=1; foreach ($dataAset as $val) { ?>
        <tr>
            <td align="center"><?= $no++ ?></td>
            <td nowrap align="center">
                <button type="button" onclick="hapusData(this)" 
                data-id="<?= encode($val->id_aset) ?>" 
                data-link="<?= base_url('User1/deleteDataAset') ?>" 
                data-csrfname="<?= $this->security->get_csrf_token_name(); ?>" 
                data-csrfcode="<?= $this->security->get_csrf_hash(); ?>" 
                class="btn btn-sm btn-danger" title="Hapus Data"><i class="la la-trash-o font-small-3"></i></button>

                <button type="button" 
                data-id="<?= encode($val->id_aset) ?>" 
                onclick="editModal(this)" class="btn btn-sm btn-info" title="Update Data"><i class="la la-edit font-small-3"></i></button> 
            </td>
            <td><?= $val->nama_aset ?></td>
            <td><?= ($val->kode_lama_aset=='' && $val->kode_lama_aset==null)?'-':$val->kode_lama_aset ?></td>
            <td><?= $val->kode_baru_aset ?></td>
            <td align="center"><?= $val->no_reg ?></td>
            <td align="center"><?= $val->konstruksi ?></td>
            <td align="center"><?= $val->panjang ?></td>
            <td align="center"><?= $val->lebar ?></td>
            <td align="center"><?= $val->luas ?></td>
            <td><?= $val->letak ?></td>
            <td align="center"><?= date('d/m/Y', strtotime($val->tgl_dokumen)) ?></td>
            <td align="center"><?= ($val->no_dokumen==''&&$val->no_dokumen==null)?'-':$val->no_dokumen ?></td>
            <td align="center"><?= $val->status_tanah ?></td>
            <td><?= ($val->no_kode_tanah==''&&$val->no_kode_tanah==null)?'-':$val->no_kode_tanah ?></td>
            <td align="center"><?= $val->asal_usul ?></td>
            <td align="right"><?= nominal($val->harga_aset) ?></td>
            <td align="center"><?= ($val->kondisi==''&&$val->kondisi==null)?'-':$val->kondisi ?></td>
            <td><?= $val->ket_aset ?></td>
        </tr>
        <?php } ?>
    </tbody>

</table>