<a href="<?= BASEURL ?>/calonKaryawan" data-bs-toggle="tooltip" title="Back"><i class="bi bi-arrow-left-square" style="font-size: 1.3rem"></i></a>
<div class="card mt-2">
    <div class="card-header">
        <h4 class="text-muted">Detail Pendidikan <?= $data['data'][0]['nama_depan'] ?></h4>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFormModal"><i class="bi bi-patch-plus"></i> Pendidikan</button>
    </div>
    <div class="card-body table-responsive mt-3">
        <table class="table table-hover" id="table_id">
            <thead>
                <tr>
                    <th>Jenis Pendidikan</th>
                    <th>Level / Jenjang - Program Keahlian</th>
                    <th>Lembaga Pendidikan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['data'] as $d) : ?>
                    <tr>
                        <td><?= $d['jenis_pendidikan'] ?></td>
                        <td>
                            <a href="javascript:editModal(<?= $d['id'] ?>)" data-bs-toggle="tooltip" title="Klik untuk mengedit">
                                <?= $d['jenjang_pendidikan'] ?> - <?= $d['program_keahlian'] ?>
                            </a>
                        </td>
                        <td><?= $d['nama_lembaga'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<form action="<?= BASEURL; ?>/calonKaryawan/pendidikanUpdate" method="POST">
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEditLabel">Edit Pendidikan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="displayEditForm" class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" onclick="deletePendidikan()" id="btnDelete" pendidikanKey="" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
        </div>
    </div>
    </div>
</form>

<script>
    function deletePendidikan()
    {
        var id = $('#btnDelete').attr('pendidikanKey')
        location.href = '<?= BASEURL . '/calonKaryawan/pendidikanDelete/' ?>' + id
    }
    function editModal(id) {
        const modalEdit = new bootstrap.Modal('#modalEdit', {
        keyboard: false
        })
        $.post(
            '<?= BASEURL . '/calonKaryawan/modalUpdate' ?>', //URL Target
            {id}, // Packing data
            function (data) { //jika berhasil
                modalEdit.show()
                $('#btnDelete').attr('pendidikanKey', id)
                $('#displayEditForm').html(data) //render tampilan ke modal
            }
        )
    }
</script>

<!-- Modal -->
<div class="modal fade" id="addFormModal" tabindex="-1" aria-labelledby="addFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFormModalLabel">Form Tambah Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL ?>/riwayatPendidikan/store" method="POST">
                <div class="modal-body">
                    <div id="BoxPendidikanAdd">
                        <div class="md-3">
                            <input type="text" name="nama_calon_karyawan" value="<?= $data['data'][0]['nama_depan'] ?>">
                            <input type="text" name="pendidikan[id_calon_karyawan][1]" value="<?= $data['data'][0]['id_calon_karyawan'] ?>">
                            <h6 class="text-primary" id="titleRiwayatPendidikan1"> Pendidikan #1</h6>
                            <div class="mb-3">
                                <label for="jenis_pendidikan1" class="form-label">Jenis Pendidikan</label>
                                <select name="pendidikan[jenis_pendidikan][1]" id="jenis_pendidikan1" class="form-select" required>
                                    <option value="Formal" selected>Formal</option>
                                    <option value="Non Formal" selected>Non Formal</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenjang_pendidikan1" class="form-label">Jenjang Pendidikan</label>
                                <input type="text" class="form-control" id="jenjang_pendidikan1" name="pendidikan[jenjang_pendidikan][1]" placeholder="Formal (S1/S2/..) Non Formal (Basic/Medium/Advanced)" autocomplete="off">
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
                            <button type="button" class="btn btn-success btn-sm" onclick="AddPendidikan()"><i class="bi bi-journal-plus"></i>Pendidikan</button>
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
            <input type="hidden" name="pendidikan[id_calon_karyawan][` + itemNum + `]" value="<?= $data['data'][0]['id_calon_karyawan'] ?>">
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
                <input type="text" class="form-control" id="jenjang_pendidikan` + itemNum + `" name="pendidikan[jenjang_pendidikan][` + itemNum + `]" placeholder="Formal (S1/S2/..) Non Formal (Basic/Medium/Advanced)" autocomplete="off">
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