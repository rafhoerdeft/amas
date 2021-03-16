<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="luas_tanah">Luas Tanah :</label>
            <input type="text" class="form-control" name="luas_tanah" id="luas_tanah" required>
        </div>
        <div class="form-group">
            <label for="thn_beli">Tahun Beli :</label>
            <input type="text" class="form-control" onkeypress="return inputAngka(event);" name="thn_beli" id="thn_beli" value="1" maxlength="4" required>
        </div>
        <div class="form-group">
            <label for="letak">Lokasi :</label>
            <textarea name="letak" id="letak" rows="2" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="status_tanah">Status Tanah :</label>
            <input type="text" class="form-control" name="status_tanah" id="status_tanah" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tgl_sertifikat">Tanggal Sertifikat :</label>
            <input type="date" class="form-control" id="tgl_sertifikat" name="tgl_sertifikat" required>
        </div>
        <div class="form-group">
            <label for="no_sertifikat">No. Sertifikat :</label>
            <input type="text" class="form-control" name="no_sertifikat" id="no_sertifikat" required>
        </div>
        <div class="form-group">
            <label for="penggunaan">Penggunaan :</label>
            <input type="text" class="form-control" name="penggunaan" id="penggunaan" required>
        </div>
        <div class="form-group">
            <label for="asal_usul">Asal Usul :</label>
            <input type="text" class="form-control" name="asal_usul" id="asal_usul" required>
        </div>
    </div>
</div>