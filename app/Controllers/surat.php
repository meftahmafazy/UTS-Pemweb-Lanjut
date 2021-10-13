<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProdi;
use App\Models\ModelMhs;
use App\Models\ModelSurat;

class surat extends BaseController
{

    protected $mhsModel;
    protected $prodiModel;
    protected $suratModel;

    public function __construct()
    {
        $this->mhsModel = new ModelMhs();
        $this->prodiModel = new ModelProdi();
        $this->suratModel = new ModelSurat();
    }

    public function index()
    {
        $mahasiswa = new ModelMhs();
        $prodi = new ModelProdi();
        $data['mahasiswa'] = $mahasiswa->ambilData();
        $data['prodi'] = $prodi->getProdi();
        return view("tampilan/home", $data);
    }

    public function create()
    {
        $mahasiswa = new ModelMhs();
        $validation = \config\Services::validation();
        return view("tampilan/fill");
    }

    public function simpan()
    {
        helper(['form', 'url']);
        $mahasiswa = new ModelMhs();

        $dataSimpan = [
            'nim' => $this->request->getPost('nim'),
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'semester' => $this->request->getPost('semester'),
            'email' => $this->request->getPost('email'),
            'angkatan' => $this->request->getPost('angkatan'),
            'keperluan' => $this->request->getPost('keperluan'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'id_prodi' => $this->request->getPost('prodi'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_jenisSurat' => $this->request->getPost('id_jenisSurat')
        ];
        $mahasiswa->save($dataSimpan);
        return redirect()->to(base_url('/surat/index'));
    }

    public function hapus($no_surat)
    {
        helper(['form', 'url']);

        $mahasiswa = new ModelMhs();

        $jumlahRecord = $mahasiswa->where('no_surat', $no_surat)->countAllResults();

        if ($jumlahRecord == 1) {
            $hapus = $mahasiswa->delete($no_surat);
            $pesan = "Data berhasil dihapus";
        } else {
            $pesan = "Data yang ingin dihapus tidak ada dalam database";
        }
        $data["mahasiswa"] = $mahasiswa->findAll();
        $data["pesan"] = $pesan;

        return redirect()->to(base_url('surat/index'));
    }

    public function edit($no_surat)
    {
        $prodi = $this->prodiModel->findAll();
        $surat = $this->suratModel->findAll();
        $data = [
            'validation' => \Config\Services::validation(),
            'mahasiswa' => $this->mhsModel->find($no_surat),
            'prodi' => $prodi,
            'surat' => $surat
        ];

        return view('tampilan/edit_data', $data);
    }

    public function update($no_surat)
    {
        $this->mhsModel->update($no_surat, [
            'nim' => $this->request->getVar('nim'),
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'semester' => $this->request->getVar('semester'),
            'email' => $this->request->getVar('email'),
            'angkatan' => $this->request->getVar('angkatan'),
            'keperluan' => $this->request->getVar('keperluan'),
            'tanggal_surat' => $this->request->getVar('tanggal_surat'),
            'id_prodi' => $this->request->getVar('prodi'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'id_jenisSurat' => $this->request->getVar('id_jenisSurat')

        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('surat/index');
    }
}
