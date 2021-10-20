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
        $currentPage = $this->request->getVar('page_mahasiswa') ?  $this->request->getVar('page_mahasiswa') :
            1;

        $data = [
            'mahasiswa' => $this->mhsModel->ambilData(),
            'pager' => $this->mhsModel->pager,
            'prodi' => $this->prodiModel->getProdi(),
            'currentPage' => $currentPage
        ];
        return view("tampilan/home", $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view("tampilan/fill", $data);
    }

    public function simpan()
    {
        // Validasi
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|max_length[13]|integer',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'max_length[13]' => '{field} maksimal 13 angka!',
                    'integer' => '{field} berupa angka!'
                ]
            ],
            'nama_mahasiswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'semester' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'angkatan' => [
                'rules' => 'required|max_length[4]',
                'errors' => [
                    'required' => '{field} harus diisi sesuai tahun andak masuk!',
                    'max_length[4]' => '{field} maksimal 4 angka!'
                ]
            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi tanggal anda mengajukan surat'
                ]
            ],
            'id_prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'id_jenisSurat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus dipilih'
                ]
            ],
            'foto_mhs' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to(base_url('/surat/create'))->withInput()->with('validation', $validation);
        }

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
            'id_jenisSurat' => $this->request->getPost('id_jenisSurat'),
            'foto_mhs' => $this->request->getPost('foto_mhs')
        ];
        $this->mhsModel->save($dataSimpan);
        return redirect()->to(base_url('/surat/index'));
    }

    public function hapus($no_surat)
    {
        $jumlahRecord = $this->mhsModel->where('no_surat', $no_surat)->countAllResults();

        if ($jumlahRecord == 1) {
            $hapus = $this->mhsModel->delete($no_surat);
            $pesan = "Data berhasil dihapus";
        } else {
            $pesan = "Data yang ingin dihapus tidak ada dalam database";
        }

        $data["mahasiswa"] = $this->mhsModel->findAll();

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
            'id_jenisSurat' => $this->request->getVar('id_jenisSurat'),
            'foto_mhs' => $this->request->getVar('foto_mhs')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('surat/index');
    }
}