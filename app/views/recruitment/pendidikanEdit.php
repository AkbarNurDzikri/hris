<h4 class="text-muted">Detail Pendidikan <?= $data['data'][0]['nama_depan'] ?></h4>
<a href="<?= BASEURL ?>/calonKaryawan"><i class="bi bi-arrow-left-square" style="font-size: 1.3rem"></i></a>
<div class="card mt-3">
    <div class="card-body table-responsive mt-3">
        <table class="table table-hover" id="table_id">
            <thead>
                <tr>
                    <th>Jenis Pendidikan</th>
                    <th>Level / Jenjang</th>
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