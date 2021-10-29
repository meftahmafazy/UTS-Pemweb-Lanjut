<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProdi;

class prodi extends BaseController
{

    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel = new ModelProdi;
    }

    public function index()
    {
        $data = [
            'prodi' => $this->prodiModel->getProdi(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/data_prodi', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/input/fill_prodi', $data);
    }
}
