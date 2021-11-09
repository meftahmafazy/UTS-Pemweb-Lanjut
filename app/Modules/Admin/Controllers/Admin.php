<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Controllers\BaseController;
use App\Modules\Admin\Models\ModelProdi;
use App\Modules\Admin\Models\ModelMhs;
use App\Modules\Admin\Models\ModelSurat;
use App\Modules\Admin\Models\ModelUser;

class Admin extends BaseController
{
    protected $userModel;
    protected $mhsModel;
    protected $prodiModel;
    protected $suratModel;

    public function __construct()
    {
        $this->userModel = new ModelUser();
        $this->mhsModel = new ModelMhs();
        $this->prodiModel = new ModelProdi();
        $this->suratModel = new ModelSurat();
    }


    public function indexSurat() //menampilkan data surat
    {
        $data = [
            'mahasiswa' => $this->mhsModel->ambilData(),
            'prodi' => $this->prodiModel->getProdi(),
            'surat' => $this->suratModel->getSurat(),
            'user' => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\index\data_surat', $data);
    }

    public function indexUser() //menampilkan data user
    {
        $data = [
            'user' => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\index\data_user', $data);
    }

    public function indexProdi() //menampilkan data prodi
    {
        $data = [
            'prodi' => $this->prodiModel->getProdi(),
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\index\data_prodi', $data);
    }
}
