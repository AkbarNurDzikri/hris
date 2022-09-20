<div class="mb-3">
    <a href="<?= BASEURL ?>/calonKaryawan"><i class="bi bi-arrow-left-square" style="font-size: 1.3rem"></i></a>
</div>
<form action="<?= BASEURL; ?>/calonKaryawan/biodataUpdate" method="POST">
    <input type="hidden" name="id" value="<?= $data['data'][0]['id'] ?>">
    <input type="hidden" name="created_at" value="<?= $data['data'][0]['created_at'] ?>">
    <label for="" class="form-label" id="labelTop">Nama Lengkap</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama depan" autocomplete="off" value="<?= $data['data'][0]['nama_depan'] ?>" required>
        <span class="input-group-text">|</span>
        <input type="text" class="form-control" id="nama_tengah" name="nama_tengah" placeholder="Nama tengah" autocomplete="off" value="<?= $data['data'][0]['nama_tengah'] ?>">
        <span class="input-group-text">|</span>
        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama belakang" autocomplete="off" value="<?= $data['data'][0]['nama_belakang'] ?>">
    </div>
    <label for="tempat_lahir" class="form-labe">Tempat, Tanggal Lahir</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"  value="<?= $data['data'][0]['tempat_lahir'] ?>" required>
        <span class="input-group-text">,</span>
        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"  value="<?= $data['data'][0]['tgl_lahir'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
            <?php if($data['data'][0]['jenis_kelamin'] == 'L') : ?>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            <?php else : ?>
                    <option value="P">Perempuan</option>
                    <option value="L">Laki-laki</option>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="agama" class="form-label">Agama</label>
        <select name="agama" id="agama" class="form-select" required>
            <option value="<?= $data['data'][0]['agama'] ?>"><?= $data['data'][0]['agama'] ?></option>
            <option value="Islam">Islam</option>
            <option value="Katolik">Katolik</option>
            <option value="Protestan">Protestan</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" placeholder="Tulis alamat lengkap" required><?= $data['data'][0]['alamat'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
        <select name="status_pernikahan" id="status_pernikahan" class="form-select" required>
            <option value="<?= $data['data'][0]['status_pernikahan'] ?>"><?= $data['data'][0]['status_pernikahan'] ?></option>
            <option value="Menikah">Menikah</option>
            <option value="Belum Menikah">Belum Menikah</option>
            <option value="Duda">Duda</option>
            <option value="Janda">Janda</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?= $data['data'][0]['email'] ?>" required>
    </div>            
    <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="number" class="form-control" id="no_hp" name="no_hp" autocomplete="off" value="<?= $data['data'][0]['no_hp'] ?>" required>
    </div>            
    <div class="mb-3">
        <label for="no_ktp" class="form-label">No KTP</label>
        <input type="number" class="form-control" id="no_ktp" name="no_ktp" autocomplete="off" value="<?= $data['data'][0]['no_ktp'] ?>" required>
    </div>            
    <div class="mb-3">
        <label for="no_kk" class="form-label">No KK</label>
        <input type="number" class="form-control" id="no_kk" name="no_kk" autocomplete="off" value="<?= $data['data'][0]['no_kk'] ?>">
    </div>
    <div class="mb-3">
        <label for="nama_ayah" class="form-label">Nama Ayah</label>
        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" autocomplete="off" value="<?= $data['data'][0]['nama_ayah'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
        <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" placeholder="Tulis alamat Ayah lengkap" required><?= $data['data'][0]['alamat_ayah'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" autocomplete="off" value="<?= $data['data'][0]['pekerjaan_ayah'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
        <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah" autocomplete="off" value="<?= $data['data'][0]['no_hp_ayah'] ?>">
    </div>
    <div class="mb-3">
        <label for="nama_ibu" class="form-label">Nama Ibu</label>
        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" autocomplete="off" value="<?= $data['data'][0]['nama_ibu'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
        <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" placeholder="Tulis alamat Ibu lengkap" required><?= $data['data'][0]['alamat_ibu'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" autocomplete="off" value="<?= $data['data'][0]['pekerjaan_ibu'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="no_hp_ibu" class="form-label">No HP Ibu</label>
        <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu" autocomplete="off" value="<?= $data['data'][0]['no_hp_ibu'] ?>">
    </div>
    <div class="mb-3">
        <label for="hubungan_kontak_darurat" class="form-label">Hubungan Kontak Darurat</label>
        <input type="text" class="form-control" id="hubungan_kontak_darurat" name="hubungan_kontak_darurat" placeholder="Adik / Kakak / Sepupu / ..." autocomplete="off" value="<?= $data['data'][0]['hubungan_kontak_darurat'] ?>">
    </div>
    <div class="mb-3">
        <label for="nama_kontak_darurat" class="form-label">Nama Kontak Darurat</label>
        <input type="text" class="form-control" id="nama_kontak_darurat" name="nama_kontak_darurat" autocomplete="off" value="<?= $data['data'][0]['nama_kontak_darurat'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="alamat_kontak_darurat" class="form-label">Alamat Kontak Darurat</label>
        <textarea class="form-control" name="alamat_kontak_darurat" id="alamat_kontak_darurat" placeholder="Tulis alamat kontak darurat lengkap" required><?= $data['data'][0]['alamat_kontak_darurat'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="pekerjaan_kontak_darurat" class="form-label">Pekerjaan Kontak Darurat</label>
        <input type="text" class="form-control" id="pekerjaan_kontak_darurat" name="pekerjaan_kontak_darurat" autocomplete="off" value="<?= $data['data'][0]['pekerjaan_kontak_darurat'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="no_hp_kontak_darurat" class="form-label">No HP Kontak Darurat</label>
        <input type="number" class="form-control" id="no_hp_kontak_darurat" name="no_hp_kontak_darurat" value="<?= $data['data'][0]['no_hp_kontak_darurat'] ?>" autocomplete="off">
    </div>
    <div class="mb-3">
        <label for="referensi" class="form-label">Referensi</label>
        <input type="text" class="form-control" id="referensi" name="referensi" autocomplete="off" placeholder="Tulis jika ada" value="<?= $data['data'][0]['referensi'] ?>">
    </div>
    <label for="keinginan_gaji" class="form-label">Permintaan Gaji</label>
    <div class="input-group mb-3">
        <span class="input-group-text">Rp.</span>
        <input type="number" class="form-control" id="keinginan_gaji" name="keinginan_gaji" autocomplete="off" value="<?= $data['data'][0]['keinginan_gaji'] ?>" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary btn-sm">Update</button>
        <a href="<?= BASEURL ?>/calonKaryawan" class="btn btn-secondary btn-sm">Back</a>
    </div>
</form>