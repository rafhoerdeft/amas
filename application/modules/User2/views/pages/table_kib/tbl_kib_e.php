<table id="dataTable" class="table table-hover table-bordered table-striped table-responsive" style="font-size: 8pt">
    <thead>
        <tr style="text-align: center;">
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Kode Lama</th>
            <th>Kode Baru</th>
            <th>No. Reg</th>
            <th>Judul Buku</th>
            <th>Spesifikasi Buku</th>
            <th>Asal Seni</th>
            <th>Pencipta Seni</th>
            <th>Bahan Seni</th>
            <th>Jenis Hewan/Tumbuhan</th>
            <th>Ukuran Hewan/Tumbuhan</th>
            <th>Jumlah</th>
            <th>Thn. Cetak/Beli</th>
            <th>Asal Usul</th>
            <th>Harga (Rp)</th>
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
            <td align="center"><?= $val->judul_buku ?></td>
            <td align="left"><?= $val->spesifikasi_buku ?></td>
            <td align="center"><?= $val->asal_seni ?></td>
            <td align="center"><?= $val->pencipta_seni ?></td>
            <td align="center"><?= $val->bahan_seni ?></td>
            <td align="center"><?= $val->jenis_hewan_tumbuhan ?></td>
            <td align="center"><?= $val->ukuran_hewan_tumbuhan ?></td>
            <td align="center"><?= $val->jumlah ?></td>
            <td align="center"><?= $val->thn_beli ?></td>
            <td align="left"><?= $val->asal_usul ?></td>
            <td align="right"><?= nominal($val->harga_aset) ?></td>
            <td><?= $val->ket_aset ?></td>
        </tr>
        <?php } ?>
    </tbody>

</table>