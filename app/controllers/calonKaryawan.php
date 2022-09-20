<?php

class calonKaryawan extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'SDM',
            'breadcrumb_active' => 'Calon Karyawan',
            'href' => 'calonKaryawan',
            'data' => $this->model('calonKaryawan_model')->getCalonKaryawan()
        ];

        $this->view('template/header', $data);
        $this->view('recruitment/calonKaryawan', $data);
        $this->view('template/footer');
    }

    public function biodataEdit($id)
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'SDM',
            'breadcrumb_active' => 'Biodata Calon Karyawan / Edit',
            'href' => 'calonKaryawan',
            'data' => $this->model('calonKaryawan_model')->getBiodata($id)
        ];

        $this->view('template/header', $data);
        $this->view('recruitment/biodataEdit', $data);
        $this->view('template/footer');
    }

    public function biodataUpdate()
    {
        if($this->model('calonKaryawan_model')->updateBiodata($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil merubah biodata ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/calonKaryawan');
        }
    }

    public function pendidikanEdit($id)
    {
        if(!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL);
        }
        
        $data = [
            'title' => 'Dashboard',
            'breadcrumb' => 'SDM',
            'breadcrumb_active' => 'Pendidikan Calon Karyawan / Edit',
            'href' => 'calonKaryawan',
            'data' => $this->model('riwayatPendidikan_model')->getRiwayatPendidikan($id)
        ];
        $this->view('template/header', $data);
        $this->view('recruitment/pendidikanEdit', $data);
        $this->view('template/footer');
    }

    public function PendidikanUpdate()
    {
        // die(var_dump($_POST));
        if($this->model('riwayatPendidikan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil merubah pendidikan ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/calonKaryawan/pendidikanEdit/' . $_POST['idCalonKaryawan']);
        }
    }

    public function store()
    {
        // die(var_dump($_POST['pengalaman']));
        $storeBiodata = $this->model('calonKaryawan_model')->store($_POST);
        $getLastId = $this->model('calonKaryawan_model')->getLastId();

        if($storeBiodata > 0) {

            $this->model('riwayatPendidikan_model')->store($_POST['pendidikan'], $getLastId);
            $this->model('pengalamanKerja_model')->store($_POST['pendidikan'], $getLastId);
            Flasher::setFlash('success', 'Berhasil menambahkan biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/calonKaryawan');
            
        } else {
            Flasher::setFlash('danger', 'Gagal menambahkan calon karyawan ' . $_POST['nama_depan'], ' !');
            header('Location: ' . BASEURL . '/calonKaryawan');
        }
    }

    public function update()
    {
        $updateBiodata = $this->model('calonKaryawan_model')->update($_POST);

        if($updateBiodata > 0) {
            $updateRiwayatPendidikan = $this->model('riwayatPendidikan_model')->update($_POST);
            if($updateRiwayatPendidikan > 0) {
                $updatePengalamanKerja = $this->model('pengalamanKerja_model')->update($_POST);
                if($updatePengalamanKerja > 0) {
                    Flasher::setFlash('success', 'Berhasil mengupdate biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                } else {
                    Flasher::setFlash('danger', 'Gagal mengupdate pengalaman kerja ' . $_POST['nama_depan'], ' !');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                }
            } else {
                Flasher::setFlash('danger', 'Gagal mengupdate  riwayat pendidikan ' . $_POST['nama_depan'], ' !');
                header('Location: ' . BASEURL . '/calonKaryawan');
            }
        } else {
            Flasher::setFlash('danger', 'Gagal mengupdate biodata ' . $_POST['nama_depan'], ' !');
            header('Location: ' . BASEURL . '/calonKaryawan');
        }
    }

    public function destroy()
    {
        $deletePengalamanKerja = $this->model('pengalamanKerja_model')->destroy($_POST);

        if($deletePengalamanKerja >= 0) {
            $deleteRiwayatPendidikan = $this->model('riwayatPendidikan_model')->destroy($_POST);
            if($deleteRiwayatPendidikan > 0) {
                $deleteBiodata = $this->model('calonKaryawan_model')->destroy($_POST);
                if($deleteBiodata > 0) {
                    Flasher::setFlash('success', 'Berhasil menghapus biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], ' <i class="bi bi-check2-circle"></i>');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                } else {
                    Flasher::setFlash('danger', 'Gagal menghapus biodata ' . $_POST['nama_depan'], ' !');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                }
            } else {
                Flasher::setFlash('danger', 'Gagal menghapus riwayat pendidikan ' . $_POST['nama_depan'], ' !');
                header('Location: ' . BASEURL . '/calonKaryawan');
            }
        } else {
            Flasher::setFlash('danger', 'Gagal menghapus pengalaman kerja ' . $_POST['nama_depan'], ' !');
            header('Location: ' . BASEURL . '/calonKaryawan');
        }
    }

    public function modalUpdate()
    {
        // die(var_dump(($_POST)));
        if(empty($_POST)){
            die('ERROR 403');
        }
        $d = $this->model('riwayatPendidikan_model')->getRiwayatPendidikanbyId($_POST['id'])[0];

        ?>
        <input type="hidden" value="<?= $d['id_calon_karyawan'] ?>" name="idCalonKaryawan">
        <input type="hidden" value="<?= $d['id'] ?>" name="id">
        <div class="mb-3">
            <label for="jenis_pendidikan" class="form-label">Jenis Pendidikan</label>
            <select name="jenis_pendidikan" id="jenis_pendidikan" class="form-select" required>
                    <option <?= ($d['jenis_pendidikan'] == 'Formal')? 'selected' : '' ?> value="Formal">Formal</option>
                    <option <?= ($d['jenis_pendidikan'] == 'Non Formal')? 'selected' : '' ?> value="Non Formal">Non Formal</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenjang_pendidikan" class="form-label">Jenjang Pendidikan</label>
            <input type="text" class="form-control" id="jenjang_pendidikan" name="jenjang_pendidikan" autocomplete="off" value="<?= $d['jenjang_pendidikan'] ?>">
        </div>
        <div class="mb-3">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <input type="text" class="form-control" id="program_keahlian" name="program_keahlian" placeholder="IPA/IPS/Akuntansi/.." autocomplete="off" value="<?= $d['program_keahlian'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama_lembaga" class="form-label">Nama Lembaga</label>
            <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" placeholder="Universitas Indonesia" autocomplete="off" value="<?= $d['nama_lembaga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat_lembaga" class="form-label">Alamat Lembaga</label>
            <textarea name="alamat_lembaga" id="alamat_lembaga" class="form-control" required><?= $d['alamat_lembaga'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="berijazah" class="form-label">Berijazah</label>
            <select name="berijazah" id="berijazah" class="form-select">
                    <option <?= ($d['berijazah'] == 'Ya')? 'selected' : '' ?> value="Ya">Ya</option>
                    <option <?= ($d['berijazah'] == 'Tidak')? 'selected' : '' ?> value="Tidak">Tidak</option>
            </select>
        </div>
        <?php
    }
}