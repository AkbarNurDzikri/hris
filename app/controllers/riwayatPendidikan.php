<?php

class riwayatPendidikan extends Controller
{
    // Multiple Create
    public function store()
    {
        // die(var_dump($_POST['pendidikan']));
        if($this->model('riwayatPendidikan_model')->additionalStore($_POST['pendidikan']) > 0) {
            Flasher::setFlash('success', 'Berhasil menambahkan pendidikan ' . $_POST['nama_calon_karyawan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/calonKaryawan');
            
        } else {
            Flasher::setFlash('danger', 'Gagal menambahkan pendidikan', ' !');
            header('Location: ' . BASEURL . '/calonKaryawan');
        }
    }
    // End Multiple Create

    // Biodata
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
    // End Biodata

    // Pendidikan
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
            'data' => $this->model('riwayatPendidikan_model')->getAllRiwayatPendidikan($id)
        ];
        $this->view('template/header', $data);
        $this->view('recruitment/pendidikanEdit', $data);
        $this->view('template/footer');
    }

    // Modal Update
    public function modalUpdate()
    {
        if(empty($_POST)){
            die('ERROR 403');
        }
        $data = $this->model('riwayatPendidikan_model')->getRiwayatPendidikanbyId($_POST['id'])[0];
        $this->view('recruitment\modal\pendidikanUpdate', $data);
    }
    // End Modal Update

    public function PendidikanUpdate()
    {
        if($this->model('riwayatPendidikan_model')->update($_POST) > 0) {
            Flasher::setFlash('success', 'Berhasil merubah pendidikan ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
            header('Location: ' . BASEURL . '/calonKaryawan/pendidikanEdit/' . $_POST['idCalonKaryawan']);
        }
    }

    public function pendidikanDelete($id)
    {
        if($this->model('riwayatPendidikan_model')->delete($id) > 0) {
            Flasher::setFlash('success', 'Berhasil Menghapus pendidikan', '<i class="bi bi-check2-circle"></i>');
            echo '<script>history.go(-1)</script>';
        }
    }
    // End Pendidikan
}