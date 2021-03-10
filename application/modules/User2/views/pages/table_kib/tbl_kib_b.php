<table id="dataTable" class="table table-hover table-bordered table-striped table-responsive" style="font-size: 8pt">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kode Lama</th>
            <th>Kode Baru</th>
            <th>No. Reg</th>
            <th>Merk/Type</th>
            <th>Ukuran/CC</th>
            <th>Bahan</th>
            <th>Warna</th>
            <th>Thn. Beli</th>
            <th>No. Pabrik</th>
            <th>No. Rangka</th>
            <th>No. Mesin</th>
            <th>No. Polisi</th>
            <th>BPKB</th>
            <th>Asal Usul</th>
            <th>Harga</th>
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
            <td align="center"><?= $val->merk_type ?></td>
            <td align="center"><?= $val->ukuran_cc ?></td>
            <td align="center"><?= $val->bahan ?></td>
            <td align="center"><?= $val->warna ?></td>
            <td align="center"><?= $val->thn_beli ?></td>
            <td align="center"><?= ($val->no_pabrik==''&&$val->no_pabrik==null)?'-':$val->no_pabrik ?></td>
            <td align="center"><?= ($val->no_rangka==''&&$val->no_rangka==null)?'-':$val->no_rangka ?></td>
            <td align="center"><?= ($val->no_mesin==''&&$val->no_mesin==null)?'-':$val->no_mesin ?></td>
            <td align="center"><?= ($val->no_polisi==''&&$val->no_polisi==null)?'-':$val->no_polisi ?></td>
            <td align="center"><?= ($val->no_bpkb==''&&$val->no_bpkb==null)?'-':$val->no_bpkb ?></td>
            <td align="center"><?= $val->asal_usul ?></td>
            <td align="right"><?= nominal($val->harga_aset) ?></td>
            <td><?= $val->ket_aset ?></td>
        </tr>
        <?php } ?>
    </tbody>

</table>