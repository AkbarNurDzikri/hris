<?php

class riwayatPendidikan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getRiwayatPendidikan($id)
    {
        $this->db->query("SELECT rp.*, ck.nama_depan FROM riwayat_pendidikan AS rp LEFT JOIN calon_karyawan AS ck ON rp.id_calon_karyawan = ck.id WHERE id_calon_karyawan = :id");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function store($data, $id)
    {
        foreach($data['nama_lembaga'] as $key => $val){
            if($val == ''){
                continue;
            }
            $rekap = [
                'id_calon_karyawan' => $id['last_id'],
                'jenis_pendidikan' => $data['jenis_pendidikan'][$key],
                'jenjang_pendidikan' => $data['jenjang_pendidikan'][$key],
                'program_keahlian' => $data['program_keahlian'][$key],
                'nama_lembaga' => $data['nama_lembaga'][$key],
                'alamat_lembaga' => $data['alamat_lembaga'][$key],
                'berijazah' => $data['berijazah'][$key]
            ];
           $respone[] = $this->RunStore($rekap);
        }
        return $respone;
    }

    private function RunStore($data)
    {
        $query = "INSERT INTO riwayat_pendidikan VALUES ('', :id_calon_karyawan, :jenis_pendidikan, :jenjang_pendidikan, :program_keahlian, :nama_lembaga, :alamat_lembaga, :berijazah, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('id_calon_karyawan', $data['id_calon_karyawan']);
        $this->db->bind('jenis_pendidikan', $data['jenis_pendidikan']);
        $this->db->bind('jenjang_pendidikan', $data['jenjang_pendidikan']);
        $this->db->bind('program_keahlian', $data['program_keahlian']);
        $this->db->bind('nama_lembaga', $data['nama_lembaga']);
        $this->db->bind('alamat_lembaga', $data['alamat_lembaga']);
        $this->db->bind('berijazah', $data['berijazah']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function update($data)
    {
        // var_dump($data)       ;
        // die;
            $query = "UPDATE riwayat_pendidikan SET
            id = :id,
            id_calon_karyawan = :id_calon_karyawan,
            jenis_pendidikan = :jenis_pendidikan,
            jenjang_pendidikan = :jenjang_pendidikan,
            program_keahlian = :program_keahlian,
            nama_lembaga = :nama_lembaga,
            alamat_lembaga = :alamat_lembaga,
            berijazah = :berijazah,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_calon_karyawan', $data['id_calon_karyawan']);
        $this->db->bind('jenis_pendidikan', $data['jenis_pendidikan']);
        $this->db->bind('jenjang_pendidikan', $data['jenjang_pendidikan']);
        $this->db->bind('program_keahlian', $data['program_keahlian']);
        $this->db->bind('nama_lembaga', $data['nama_lembaga']);
        $this->db->bind('alamat_lembaga', $data['alamat_lembaga']);
        $this->db->bind('berijazah', $data['berijazah']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM riwayat_pendidikan WHERE id_calon_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}