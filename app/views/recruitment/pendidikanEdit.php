<div class="card">
    <div class="card-body p-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pendidikan</th>
                    <th>Lembaga</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($data['data'] as $d) : ?>
                <tr>
                    <td>
                        <a href="javascript:editModal(<?= $d['id'] ?>)">
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
</form>

<div class="mb-3">
    <a href="#top"><sup><i class="bi bi-chevron-up"></i></sup> <span style="font-size: 12px;">back to top</span></a>
</div>

<script>
    function editModal(id) {
        const modalEdit = new bootstrap.Modal('#modalEdit', {
        keyboard: false
        })
        modalEdit.show()
        $.post(
            '<?= BASEURL . '/calonKaryawan/modalUpdate' ?>', //URL Target
            {id}, // Packing data
            function (data) { //jika berhasil
                $('#displayEditForm').html(data) //render tampilan ke modal
            }
        )
    }
</script>