<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class pengguna extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new ModelUser();
    }


    public function tampil()
    {
        $data = [
            'user' => $this->userModel->findAll(),
            'pager' => $this->userModel->pager,
            'validation' => \Config\Services::validation()
        ];
        return view('tampilan/index_user', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('tampilan/fill_user', $data);
    }

    public function simpan()
    {
        $data = [
            'nama_mhs' => $this->request->getPost('nama_mhs'),
            'nim_mhs' =>  $this->request->getPost('nim_mhs'),
            'email_mhs' => $this->request->getPost('email_mhs'),
            'role' => $this->request->getPost('role'),
            'pass_mhs' => password_hash($this->request->getPost('pass_mhs'), PASSWORD_DEFAULT)
        ];

        $this->userModel->save($data);
        return redirect()->to('pengguna/tampil');
    }

    public function hapus($id_user)
    {
        $jumlahRecord = $this->userModel->where('id_user', $id_user)->countAllResults();

        if ($jumlahRecord == 1) {
            $hapus = $this->userModel->delete($id_user);
            $pesan = "Data berhasil dihapus";
        } else {
            $pesan = "Data yang ingin dihapus tidak ada dalam database";
        }

        $data["user"] = $this->userModel->findAll();

        return redirect()->to(base_url('pengguna/tampil'));
    }

    public function edit($id_user)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->find($id_user),
        ];

        return view('tampilan/edit_user', $data);
    }

    public function update($id_user)
    {
        $this->userModel->update($id_user, [
            'nama_mhs'  => $this->request->getVar('nama_mhs'),
            'nim_mhs'   =>  $this->request->getVar('nim_mhs'),
            'email_mhs' => $this->request->getVar('email_mhs'),
            'role'      => $this->request->getVar('role'),
            'pass_mhs'  => password_hash($this->request->getVar('pass_mhs'), PASSWORD_DEFAULT)
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('pengguna/tampil');
    }
}
