<div class="my-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newFormModal">
        <i class="bi bi-patch-plus"></i> Calon Karyawan
    </button>
</div>
<div class="card">
    <div class="card-body table-responsive mt-3">
        <table class="table table-hover" id="table_id">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Pendidikan</th>
                    <th>Pengalaman</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ;?>
                <?php foreach($data['data'] as $d) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><a href="<?= BASEURL ?>/calonKaryawan/biodataEdit/<?= $d['id'] ?>" data-bs-toggle="tooltip"
                            data-bs-title="Biodata Lengkap"><?= $d['nama_depan'] ?> <?= $d['nama_tengah'] ?>
                            <?= $d['nama_belakang'] ?></a></td>
                    <td><a href="<?= BASEURL ?>/calonKaryawan/pendidikanEdit/<?= $d['id'] ?>" data-bs-toggle="tooltip"
                            data-bs-title="Riwayat Pendidikan Lengkap"><?= $d['jenjang_pendidikan'] ?>
                            <?= $d['program_keahlian'] ?> @<?= $d['nama_lembaga'] ?></a></td>
                    <td><a href="<?= BASEURL ?>/calonKaryawan/pengalamanEdit/<?= $d['id'] ?>" data-bs-toggle="tooltip"
                            data-bs-title="Pengalaman Kerja Lengkap"><?= $d['nama_perusahaan'] ?> (<?= $d['jabatan'] ?>
                            <?= $d['dept'] ?>, <?= ROUND($d['durasi']/12, 1) ?> Tahun)</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- New Form Modal -->
<div class="modal fade" id="newFormModal" tabindex="-1" aria-labelledby="newFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFormModalLabel">Add New Calon Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="tab-content" id="myTabContent">
                <form action="<?= BASEURL; ?>/calonKaryawan/store" method="POST">
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="biodata-tab" data-bs-toggle="tab"
                                    data-bs-target="#biodata-tab-pane" type="button" role="tab"
                                    aria-controls="biodata-tab-pane" aria-selected="true">Biodata</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="riwayatPendidikan-tab" data-bs-toggle="tab"
                                    data-bs-target="#riwayatPendidikan-tab-pane" type="button" role="tab"
                                    aria-controls="riwayatPendidikan-tab-pane" aria-selected="false">Riwayat
                                    Pendidikan</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pengalamanKerja-tab" data-bs-toggle="tab"
                                    data-bs-target="#pengalamanKerja-tab-pane" type="button" role="tab"
                                    aria-controls="pengalamanKerja-tab-pane" aria-selected="false">Pengalaman
                                    Kerja</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="biodata-tab-pane" role="tabpanel"
                                aria-labelledby="biodata-tab" tabindex="0">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan"
                                        placeholder="Nama depan" autocomplete="off" required>
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_tengah" name="nama_tengah"
                                        placeholder="Nama tengah" autocomplete="off">
                                    <span class="input-group-text">|</span>
                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang"
                                        placeholder="Nama belakang" autocomplete="off">
                                </div>
                                <label for="tempat_lahir" class="form-labe">Tempat, Tanggal Lahir</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                        required>
                                    <span class="input-group-text">,</span>
                                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" id="agama" class="form-select" required>
                                        <option value="" disabled selected>Pilih</option>
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
                                    <textarea class="form-control" name="alamat" id="alamat"
                                        placeholder="Tulis alamat lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-select"
                                        required>
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" autocomplete="off"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_ktp" class="form-label">No KTP</label>
                                    <input type="number" class="form-control" id="no_ktp" name="no_ktp"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input type="number" class="form-control" id="no_kk" name="no_kk"
                                        autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                                    <textarea class="form-control" name="alamat_ayah" id="alamat_ayah"
                                        placeholder="Tulis alamat Ayah lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ayah" class="form-label">No HP Ayah</label>
                                    <input type="number" class="form-control" id="no_hp_ayah" name="no_hp_ayah"
                                        autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                                    <textarea class="form-control" name="alamat_ibu" id="alamat_ibu"
                                        placeholder="Tulis alamat Ibu lengkap" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_ibu" class="form-label">No HP Ibu</label>
                                    <input type="number" class="form-control" id="no_hp_ibu" name="no_hp_ibu"
                                        autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="hubungan_kontak_darurat" class="form-label">Hubungan Kontak
                                        Darurat</label>
                                    <input type="text" class="form-control" id="hubungan_kontak_darurat"
                                        name="hubungan_kontak_darurat" placeholder="Adik / Kakak / Sepupu / ..."
                                        autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="nama_kontak_darurat" class="form-label">Nama Kontak Darurat</label>
                                    <input type="text" class="form-control" id="nama_kontak_darurat"
                                        name="nama_kontak_darurat" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_kontak_darurat" class="form-label">Alamat Kontak Darurat</label>
                                    <textarea class="form-control" name="alamat_kontak_darurat"
                                        id="alamat_kontak_darurat" placeholder="Tulis alamat kontak darurat lengkap"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan_kontak_darurat" class="form-label">Pekerjaan Kontak
                                        Darurat</label>
                                    <input type="text" class="form-control" id="pekerjaan_kontak_darurat"
                                        name="pekerjaan_kontak_darurat" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp_kontak_darurat" class="form-label">No HP Kontak Darurat</label>
                                    <input type="number" class="form-control" id="no_hp_kontak_darurat"
                                        name="no_hp_kontak_darurat" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="referensi" class="form-label">Referensi</label>
                                    <input type="text" class="form-control" id="referensi" name="referensi"
                                        autocomplete="off" placeholder="Tulis jika ada">
                                </div>
                                <label for="keinginan_gaji" class="form-label">Permintaan Gaji</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" id="keinginan_gaji" name="keinginan_gaji"
                                        autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <a href="#newFormModalLabel"><sup><i class="bi bi-chevron-up"></i></sup> <span
                                            style="font-size: 12px;">back to top</span></a>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="riwayatPendidikan-tab-pane" role="tabpanel" aria-labelledby="riwayatPendidikan-tab" tabindex="0">
                                <!-- Riwayat Pendidikan -->
                                <div id="BoxPendidikanAdd">
                                    <div class="md-3">
                                        <h6 class="text-primary" id="titleRiwayatPendidikan1"> Pendidikan #1 <span class="text-muted">Wajib</span></h6>
                                        <div class="mb-3">
                                            <label for="jenis_pendidikan1" class="form-label">Jenis Pendidikan</label>
                                            <select name="pendidikan[jenis_pendidikan][1]" id="jenis_pendidikan1" class="form-select" required>
                                                <option value="Formal" selected>Formal</option>
                                                <option value="Non Formal" selected>Non Formal</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenjang_pendidikan1" class="form-label">Jenjang Pendidikan</label>
                                            <input type="text" class="form-control" id="jenjang_pendidikan1" name="pendidikan[jenjang_pendidikan][1]" placeholder="Pendidikan terakhir (SMK/SMA/S1/..)" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="program_keahlian1" class="form-label">Program Keahlian</label>
                                            <input type="text" class="form-control" id="program_keahlian1" name="pendidikan[program_keahlian][1]" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_lembaga1" class="form-label">Nama Lembaga</label>
                                            <input type="text" class="form-control" id="nama_lembaga1" name="pendidikan[nama_lembaga][1]" placeholder="Universitas Indonesia" autocomplete="off" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat_lembaga1" class="form-label">Alamat Lembaga</label>
                                            <textarea name="pendidikan[alamat_lembaga][1]" id="alamat_lembaga1" class="form-control" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Berijazah</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan[berijazah][1]" id="ya1" value="Ya" checked>
                                                <label class="form-check-label" for="ya1">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pendidikan[berijazah][1]" id="tidak1" value="Tidak">
                                                <label class="form-check-label" for="tidak1">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" onclick="AddPendidikan()"><i class="bi bi-journal-plus"></i>Pendidikan</button>
                                <script>
                                    $('#titleRiwayatPendidikan1').hide()

                                    function AddPendidikan() {
                                        var itemNum = document.querySelectorAll('#BoxPendidikanAdd>.md-3').length + 1

                                        if (itemNum > 1) {
                                            $('#titleRiwayatPendidikan1').show()
                                        }

                                        var html = `
                                        <div class="md-3" id="pendidikanInput` + itemNum + `">
                                        <hr class="bg-primary">
                                            <h6 class="text-primary" id="titleRiwayatPendidikan` + itemNum + `">Pendidikan #` + itemNum + ` <a href="javascript:hapusPendidikan('` + itemNum + `')" class="text-danger">Hapus</a></h6>
                                            <div class="mb-3">
                                                <label for="jenis_pendidikan` + itemNum + `" class="form-label">Jenis Pendidikan</label>
                                                <select name="pendidikan[jenis_pendidikan][` + itemNum + `]" id="jenis_pendidikan` + itemNum + `" class="form-select" required>
                                                    <option value="Formal" selected>Formal</option>
                                                    <option value="Non Formal" selected>Non Formal</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenjang_pendidikan` + itemNum + `" class="form-label">Jenjang Pendidikan</label>
                                                <input type="text" class="form-control" id="jenjang_pendidikan` + itemNum + `" name="pendidikan[jenjang_pendidikan][` + itemNum + `]" placeholder="Pendidikan terakhir (SMK/SMA/S1/..)" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label for="program_keahlian` + itemNum + `" class="form-label">Program Keahlian</label>
                                                <input type="text" class="form-control" id="program_keahlian` + itemNum + `" name="pendidikan[program_keahlian][` + itemNum + `]" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_lembaga` + itemNum + `" class="form-label">Nama Lembaga</label>
                                                <input type="text" class="form-control" id="nama_lembaga` + itemNum + `" name="pendidikan[nama_lembaga][` + itemNum + `]" placeholder="Universitas Indonesia" autocomplete="off" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alamat_lembaga` + itemNum + `" class="form-label">Alamat Lembaga</label>
                                                <textarea name="pendidikan[alamat_lembaga][` + itemNum + `]" id="alamat_lembaga` + itemNum + `" class="form-control" required></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Berijazah</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pendidikan[berijazah][` + itemNum + `]" id="ya` + itemNum + `" value="Ya" checked>
                                                    <label class="form-check-label" for="ya` + itemNum + `">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="pendidikan[berijazah][` + itemNum + `]" id="tidak` + itemNum + `" value="Tidak">
                                                    <label class="form-check-label" for="tidak` + itemNum + `">
                                                        Tidak
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                            `;
                                        $('#BoxPendidikanAdd').append(html)
                                    }

                                    function hapusPendidikan(id) {
                                        var itemNum = document.querySelectorAll('#BoxPendidikanAdd>.md-3').length
                                        $('#pendidikanInput' + id).remove()
                                        if (itemNum > 1) {
                                            $('#titleRiwayatPendidikan1').show()
                                        } else {
                                            $('#titleRiwayatPendidikan1').hide()
                                        }
                                    }
                                </script>

                            </div>

                            <div class="tab-pane fade" id="pengalamanKerja-tab-pane" role="tabpanel" aria-labelledby="pengalamanKerja-tab" tabindex="0">
                                <div id="boxPengalamanKerja">
                                    <div class="mb-3 item-pengalaman">
                                        <!-- Pengalaman Kerja  -->
                                        <h6 class="text-primary" id="titlePengalamKerja1">Pengalaman Kerja #1</h6>
                                        <div class="mb-3">
                                            <label for="nama_perusahaan1" class="form-label">Nama Perusahaan</label>
                                            <input type="text" class="form-control" id="nama_perusahaan1" name="pengalaman[nama_perusahaan][]" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jabatan1" class="form-label">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan1" name="pengalaman[jabatan][]" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="dept1" class="form-label">Department</label>
                                            <input type="text" class="form-control" id="dept1" name="pengalaman[dept][]" autocomplete="off">
                                        </div>
                                        <label for="durasi1" class="form-label">Durasi Kerja</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="durasi1" name="pengalaman[durasi][]" autocomplete="off">
                                            <span class="input-group-text">Bulan</span>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alasan_berhenti1" class="form-label">Alasan Berhenti</label>
                                            <input type="text" class="form-control" id="alasan_berhenti1" name="pengalaman[alasan_berhenti][]" autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jobdesc1" class="form-label">Uraian Pekerjaan</label>
                                            <textarea name="pengalaman[jobdesc][]" id="jobdesc1" class="form-control"></textarea>
                                        </div>
                                        <label for="gaji_terakhir1" class="form-label">Gaji Terakhir</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="number" class="form-control" id="gaji_terakhir1" name="pengalaman[gaji_terakhir][]">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <button type="button" class="btn btn-success" onclick="AddPengalamanKerja()"><i class="bi bi-journal-plus"></i> Pengalaman</button>
                                </div>
                                <script>
                                    $('#titlePengalamKerja1').hide()

                                    function AddPengalamanKerja() {
                                        var itemNum = document.querySelectorAll('#boxPengalamanKerja>.item-pengalaman').length + 1

                                        if (itemNum > 1) {
                                            $('#titlePengalamKerja1').show()
                                        }

                                        var html = `
                                        <div class="mb-3 item-pengalaman" id="pengalamanItem` + itemNum + `">
                                            <!-- Pengalaman Kerja  -->
                                            <h6 class="text-primary">Pengalaman Kerja #` + itemNum + ` <a href="javascript:hapusPengalaman('` + itemNum + `')" class="text-danger">Hapus</a></h6>
                                            <div class="mb-3">
                                                <label for="nama_perusahaan` + itemNum + `" class="form-label">Nama Perusahaan</label>
                                                <input type="text" class="form-control" id="nama_perusahaan` + itemNum + `" name="pengalaman[nama_perusahaan][]" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jabatan` + itemNum + `" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="jabatan` + itemNum + `" name="pengalaman[jabatan][]" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label for="dept` + itemNum + `" class="form-label">Department</label>
                                                <input type="text" class="form-control" id="dept` + itemNum + `" name="pengalaman[dept][]" autocomplete="off">
                                            </div>
                                            <label for="durasi` + itemNum + `" class="form-label">Durasi Kerja</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="durasi` + itemNum + `" name="pengalaman[durasi][]" autocomplete="off">
                                                <span class="input-group-text">Bulan</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alasan_berhenti` + itemNum + `" class="form-label">Alasan Berhenti</label>
                                                <input type="text" class="form-control" id="alasan_berhenti` + itemNum + `" name="pengalaman[alasan_berhenti][]" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobdesc` + itemNum + `" class="form-label">Uraian Pekerjaan</label>
                                                <textarea name="pengalaman[jobdesc][]" id="jobdesc` + itemNum + `" class="form-control"></textarea>
                                            </div>
                                            <label for="gaji_terakhir` + itemNum + `" class="form-label">Gaji Terakhir</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Rp.</span>
                                                <input type="number" class="form-control" id="gaji_terakhir` + itemNum + `" name="pengalaman[gaji_terakhir][]">
                                            </div>
                                        </div>
                                            `;
                                        $('#boxPengalamanKerja').append(html)
                                    }

                                    function hapusPengalaman(id) {
                                        var itemNum = document.querySelectorAll('#boxPengalamanKerja>.item-pengalaman').length
                                        $('#pengalamanItem' + id).remove()
                                        if (itemNum > 1) {
                                            $('#titlePengalamKerja1').show()
                                        } else {
                                            $('#titlePengalamKerja1').hide()
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Form Modal -->
<?php foreach($data['data'] as $d) : ?>
    <div class="modal fade" id="deleteFormModal<?= $d['id'] ?>" tabindex="-1" aria-labelledby="deleteFormModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFormModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= BASEURL; ?>/calonKaryawan/destroy" method="POST">
                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                    <input type="hidden" name="nama_depan" value="<?= $d['nama_depan'] ?>">
                    <div class="container text-center mt-3">
                        <p>Calon Karyawan "<b><?= $d['nama_depan'] ?></b>" akan dihapus secara permanen <i
                                class="bi bi-exclamation-octagon text-warning"></i></p>
                        <h3 class="text-danger">Yakin hapus data ini <i class="bi bi-question-octagon"></i></h3>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Yes</button>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>