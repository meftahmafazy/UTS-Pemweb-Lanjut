<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelMhs;
use App\Models\ModelProdi;
use App\Models\ModelSurat;


class admin extends BaseController
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
        return view('admin/index/data_surat', $data);
    }

    public function indexUser() //menampilkan data user
    {
        $data = [
            'user' => $this->userModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/index/data_user', $data);
    }

    public function indexProdi() //menampilkan data prodi
    {
        $data = [
            'prodi' => $this->prodiModel->getProdi(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/index/data_prodi', $data);
    }
}
