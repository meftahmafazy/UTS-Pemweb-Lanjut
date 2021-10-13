<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSurat extends Model
{

    protected $table = 'jenis_surat';
    protected $primaryKey = 'id_jenisSurat';
    protected $allowedFields = ['nama_jenisSurat'];

    public function __construct()
    {
        parent::__construct();
        $db = \config\Database::connect();
    }

    public function getSurat()
    {
        return $this->db->table("jenis_surat")->get()->getResultArray();
    }
}
