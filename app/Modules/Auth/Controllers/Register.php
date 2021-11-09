<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\ModelUser;

class Register extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new ModelUser();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Auth\Views\v_register', $data);
    }

    public function simpan()
    {
        helper(['form']);

        // Validation
        $rules = [
            'nama_mhs'  =>  'required|min_length[3]|max_length[200]',
            'nim_mhs'   =>  'required|min_length[13]|max_length[13]',
            'email_mhs' =>  'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email_mhs]',
            'pass_mhs'  =>  'required|min_length[6]|max_length[200]',
            'confpass'  =>  'matches[pass_mhs]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'nama_mhs' => $this->request->getVar('nama_mhs'),
                'nim_mhs' =>  $this->request->getVar('nim_mhs'),
                'email_mhs' => $this->request->getVar('email_mhs'),

                'pass_mhs' => password_hash($this->request->getVar('pass_mhs'), PASSWORD_DEFAULT)
            ];

            $this->userModel->save($data);
            return redirect()->to('/login/index');
        } else {
            $data['validation'] = $this->validator;
            return redirect()->to(base_url('/register/index'))->withInput();
        }
    }
}
