<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields = ['nama_prodi'];

    public function __construct()
    {
        parent::__construct();
        $db = \Config\Database::connect();
    }

    public function getProdi()
    {
        return $this->db->table("prodi")->get()->getResultArray();
    }
}
