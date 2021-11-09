<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\ModelUser;

class Login extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new ModelUser();
    }

    public function index()
    {
        helper(['form']);
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\Auth\Views\v_login', $data);
    }

    public function auth()
    {

        $nim = $this->request->getVar('nim_mhs');
        $password = $this->request->getVar('pass_mhs');
        $data = $this->userModel->where('nim_mhs', $nim)->first();
        if ($data) {
            $pass_mhs = $data['pass_mhs'];
            $verify_pass = password_verify($password, $pass_mhs);
            if ($verify_pass) {
                $ses_data = [
                    'nama_mhs' => $data['nama_mhs'],
                    'email_mhs' => $data['email_mhs'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                session()->set($ses_data);
                if ($data['role'] == 'admin') {
                    return redirect()->to('/admin/indexSurat');
                }
                return redirect()->to('/surat/index');
            } else {
                session()->setFlashdata('msg', 'Password Salah!');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('msg', 'NIM Tidak ditemukan');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
