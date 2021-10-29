<?php

namespace App\Database\Seeds;

use App\Models\ModelUser;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user_object = new ModelUser();

        $user_object->insertBatch([
            [
                "nama_mhs" => "admin",
                "nim_mhs" => "admin",
                "email_mhs" => "admin@gmail.com",
                "role" => "admin",
                "pass_mhs" => password_hash("adminphp", PASSWORD_DEFAULT)
            ],
        ]);
    }
}
