<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_mhs', 'nim_mhs', 'email_mhs', 'pass_mhs', 'role'];
}
