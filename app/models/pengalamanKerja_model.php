<?php

class pengalamanKerja_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getPengalamanKerja()
    {
        $this->db->query("SELECT * FROM pengalaman_kerja");
        return $this->db->resultSet();
    }

    public function store($data, $id)
    {
       foreach($data['nama_perusahaan'] as $key => $val){
            if($val == ''){
                continue;
            }
            $susun = [
                'id_calon_karyawan' => $id['last_id'],
                'nama_perusahaan' => $data['nama_perusahaan'][$key],
                'jabatan' => $data['jabatan'][$key],
                'dept' => $data['dept'][$key],
                'durasi' => $data['durasi'][$key],
                'alasan_berhenti' => $data['alasan_berhenti'][$key],
                'jobdesc' => $data['jobdesc'][$key],
                'gaji_terakhir' => $data['gaji_terakhir'][$key],
            ];
            $respon[] = $this->runStore($susun);
       }
       return $respon;
    }

    private function runStore($data)
    {
        $query = "INSERT INTO pengalaman_kerja VALUES ('', :id_calon_karyawan, :nama_perusahaan, :jabatan, :dept, :durasi, :alasan_berhenti, :jobdesc, :gaji_terakhir, :created_at, :updated_at)";

        $this->db->query($query);
        $this->db->bind('id_calon_karyawan', $data['id_calon_karyawan']);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('dept', $data['dept']);
        $this->db->bind('durasi', $data['durasi']);
        $this->db->bind('alasan_berhenti', $data['alasan_berhenti']);
        $this->db->bind('jobdesc', $data['jobdesc']);
        $this->db->bind('gaji_terakhir', $data['gaji_terakhir']);
        $this->db->bind('created_at', date('Y-m-d h:i:s'));
        $this->db->bind('updated_at', null);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function update($data)
    {
        $query = "UPDATE pengalaman_kerja SET
            id = :id,
            id_calon_karyawan = :id_calon_karyawan,
            nama_perusahaan = :nama_perusahaan,
            jabatan = :jabatan,
            dept = :dept,
            durasi = :durasi,
            alasan_berhenti = :alasan_berhenti,
            jobdesc = :jobdesc,
            gaji_terakhir = :gaji_terakhir,
            created_at = :created_at,
            updated_at = :updated_at
        WHERE id = :id
        ";

        $this->db->query($query);
        $this->db->bind('id', $data['id_pengalaman_kerja']);
        $this->db->bind('id_calon_karyawan', $data['pk_id_calon_karyawan']);
        $this->db->bind('nama_perusahaan', $data['nama_perusahaan']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('dept', $data['dept']);
        $this->db->bind('durasi', $data['durasi']);
        $this->db->bind('alasan_berhenti', $data['alasan_berhenti']);
        $this->db->bind('jobdesc', $data['jobdesc']);
        $this->db->bind('gaji_terakhir', $data['gaji_terakhir']);
        $this->db->bind('created_at', $data['created_at']);
        $this->db->bind('updated_at', date('Y-m-d h:i:s'));
        $this->db->bind('id', $data['id_pengalaman_kerja']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function destroy($data)
    {
        $query = "DELETE FROM pengalaman_kerja WHERE id_calon_karyawan = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}