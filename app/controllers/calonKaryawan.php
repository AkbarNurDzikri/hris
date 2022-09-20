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
        if(empty($_POST)){
            die('ERROR 403');
        }
        $data = $this->model('riwayatPendidikan_model')->getRiwayatPendidikanbyId($_POST['id'])[0];
        $this->view('recruitment\modal\pendidikanUpdate', $data);
    }
}