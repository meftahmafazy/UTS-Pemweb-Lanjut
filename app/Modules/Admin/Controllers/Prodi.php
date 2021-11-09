<?php

namespace App\Modules\Admin\Controllers;

use App\Modules\Admin\Controllers\BaseController;
use App\Modules\Admin\Models\ModelProdi;


class Prodi extends BaseController
{

    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel = new ModelProdi();
    }

    public function index()
    {
        $data = [
            'prodi' => $this->prodiModel->getProdi(),
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\index\data_prodi', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Admin\Views\input\fill_prodi', $data);
    }
}
