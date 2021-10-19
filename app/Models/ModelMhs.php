<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMhs extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'no_surat';
    protected $allowedFields = ['nim', 'nama_mahasiswa', 'id_prodi', 'semester', 'jenis_kelamin', 'angkatan', 'email', 'tanggal_surat', 'id_jenisSurat', 'keperluan', 'file_surat'];

    public function ambilData()
    {
        return $this
            ->join('jenis_surat', 'jenis_surat.id_jenisSurat=mahasiswa.id_jenisSurat')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi')
            ->paginate(2, 'mahasiswa');
    }

    public function cariData($keyword)
    {
        $db = \Config\Database::connect();
        $keyword = $db->escapeLikeString($keyword);
        $query = "SELECT * FROM mahasiswa where nim LIKE '%$keyword%' or nama_mahasiswa like '%$keyword%'";
        return $db->query($query);
        return $this->table('mahasiswa')->like('nama_mahasiswa', $keyword)->orlike('nim', $keyword)->orlike('semester', $keyword)->orlike('tanggal_surat', $keyword)->findAll();
    }
}
