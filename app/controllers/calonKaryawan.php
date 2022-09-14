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

    public function store()
    {
        $storeBiodata = $this->model('calonKaryawan_model')->store($_POST);
        $getLastId = $this->model('calonKaryawan_model')->getLastId();

        if($storeBiodata > 0) {
            $storeRiwayatPendidikan1 = $this->model('riwayatPendidikan_model')->store1([$_POST, $getLastId]);
            $storeRiwayatPendidikan2 = $this->model('riwayatPendidikan_model')->store2([$_POST, $getLastId]);
            $storeRiwayatPendidikan3 = $this->model('riwayatPendidikan_model')->store3([$_POST, $getLastId]);
            if($storeRiwayatPendidikan1 > 0 || $storeRiwayatPendidikan2 > 0 || $storeRiwayatPendidikan3 > 0) {
                $storePengalamanKerja1 = $this->model('pengalamanKerja_model')->store1([$_POST, $getLastId]);
                $storePengalamanKerja2 = $this->model('pengalamanKerja_model')->store2([$_POST, $getLastId]);
                $storePengalamanKerja3 = $this->model('pengalamanKerja_model')->store3([$_POST, $getLastId]);
                if($storePengalamanKerja1 > 0 || $storePengalamanKerja2 > 0 || $storePengalamanKerja3 > 0) {
                    Flasher::setFlash('primary', 'Berhasil menambahkan biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                } else {
                    Flasher::setFlash('danger', 'Gagal menambahkan pengalaman kerja ' . $_POST['nama_depan'], ' !');
                    header('Location: ' . BASEURL . '/calonKaryawan');
                }
            } else {
                Flasher::setFlash('danger', 'Gagal menambahkan riwayat pendidikan ' . $_POST['nama_depan'], ' !');
                header('Location: ' . BASEURL . '/calonKaryawan');
            }
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
                    Flasher::setFlash('primary', 'Berhasil mengupdate biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], '<i class="bi bi-check2-circle"></i>');
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
                    Flasher::setFlash('primary', 'Berhasil menghapus biodata, riwayat pendidikan & pengalaman kerja ' . $_POST['nama_depan'], ' <i class="bi bi-check2-circle"></i>');
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
}