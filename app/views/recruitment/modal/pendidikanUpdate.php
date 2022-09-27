<input type="hidden" value="<?= $data['id_calon_karyawan'] ?>" name="idCalonKaryawan">
<input type="hidden" value="<?= $data['id'] ?>" name="id">
<div class="mb-3">
    <label for="jenis_pendidikan" class="form-label">Jenis Pendidikan</label>
    <select name="jenis_pendidikan" id="jenis_pendidikan" class="form-select" required>
            <option <?= ($data['jenis_pendidikan'] == 'Formal')? 'selected' : '' ?> value="Formal">Formal</option>
            <option <?= ($data['jenis_pendidikan'] == 'Non Formal')? 'selected' : '' ?> value="Non Formal">Non Formal</option>
    </select>
</div>
<div class="mb-3">
    <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
    <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" autocomplete="off" value="<?= $data['jenjang_pendidikan'] ?>">
</div>
<div class="mb-3">
    <label for="program_keahlian" class="form-label">Program Keahlian</label>
    <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" value="<?= $data['program_keahlian'] ?>" required>
</div>
<div class="mb-3">
    <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
    <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" placeholder="Universitas Indonesia" autocomplete="off" value="<?= $data['nama_lembaga'] ?>" required>
</div>
<div class="mb-3">
    <label for="alamat_lembaga" class="form-label">Alamat Lembaga</label>
    <textarea name="alamat_lembaga" id="alamat_lembaga" class="form-control" required><?= $data['alamat_lembaga'] ?></textarea>
</div>
<div class="mb-3">
    <label for="berijazah" class="form-label">Berijazah</label>
    <select name="berijazah" id="berijazah" class="form-select">
            <option <?= ($data['berijazah'] == 'Ya')? 'selected' : '' ?> value="Ya">Ya</option>
            <option <?= ($data['berijazah'] == 'Tidak')? 'selected' : '' ?> value="Tidak">Tidak</option>
    </select>
</div>