<table id="dataTable" class="table table-hover table-bordered table-striped table-responsive d-xl-table" style="font-size: 8pt">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kode Lama</th>
            <th>Kode Baru</th>
            <th>No. Reg</th>
            <th>Luas (m2)</th>
            <th>Thn Beli</th>
            <th>Lokasi</th>
            <th>Status Tanah</th>
            <th>Tgl. Sertif</th>
            <th>No. Sertif</th>
            <th>Penggunaan</th>
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
            <td><?= $val->kode_lama_aset ?></td>
            <td><?= $val->kode_baru_aset ?></td>
            <td align="center"><?= $val->no_reg ?></td>
            <td align="center"><?= $val->luas ?></td>
            <td align="center"><?= $val->thn_beli ?></td>
            <td><?= $val->letak ?></td>
            <td align="center"><?= $val->status_tanah ?></td>
            <td align="center"><?= date('d/m/Y', strtotime($val->tgl_sertifikat)) ?></td>
            <td align="center"><?= $val->no_sertifikat ?></td>
            <td><?= $val->penggunaan ?></td>
            <td align="center"><?= $val->asal_usul ?></td>
            <td align="right"><?= nominal($val->harga_barang) ?></td>
            <td><?= $val->ket_aset ?></td>
        </tr>
        <?php } ?>
    </tbody>

    </table>