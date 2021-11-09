<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{

    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields = ['nama_prodi', 'tanggal_berdiri', 'prodi_created_at'];

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
