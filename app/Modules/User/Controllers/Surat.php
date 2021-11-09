<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Controllers\BaseController;
use App\Modules\User\Models\ModelProdi;
use App\Modules\User\Models\ModelMhs;
use App\Modules\User\Models\ModelSurat;

class Surat extends BaseController
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
            'surat' => $this->suratModel->getSurat(),
            'currentPage' => $currentPage
        ];
        return view('App\Modules\User\Views\home', $data);
    }

    public function create()
    {
        $data = [
            'mahasiswa' => $this->mhsModel->ambilData(),
            'prodi' => $this->prodiModel->getProdi(),
            'surat' => $this->suratModel->getSurat(),
            'validation' => \Config\Services::validation()
        ];
        return view('App\Modules\User\Views\fill', $data);
    }

    public function simpan()
    {
        // Validasi
        if (!$this->validate([
            'nim' => [
                'rules' => 'required|max_length[13]|integer',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'max_length' => '{field} maksimal 13 angka!',
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
                    'required' => '{field} harus diisi sesuai tahun anda masuk!',
                    'max_length' => '{field} maksimal 4 angka!'
                ]
            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'foto_mhs' => [
                'rules' => 'max_size[foto_mhs,5120]|ext_in[foto_mhs,jpg,png,jpeg,docx,pdf]',
                'errors' => [
                    'max_size' => 'ukuran gambar/dokumen terlalu besar',
                    'ext_in' => 'Yang anda upload bukan gambar atau dokumen',
                ]
            ],
        ])) {
            return redirect()->to(base_url('/Surat/create'))->withInput();
        }

        // ambil gambar
        $fileFoto = $this->request->getFile('foto_mhs');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default_user.png';
        } else {
            // generate nama file secara random
            $namaFoto = $fileFoto->getRandomName();

            // pindah ke folder gambar
            $fileFoto->move('img/upload/', $namaFoto);
        }

        $dataSimpan = [
            'nim' => $this->request->getPost('nim'),
            'foto_mhs' => $namaFoto,
            'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
            'semester' => $this->request->getPost('semester'),
            'email' => $this->request->getPost('email'),
            'angkatan' => $this->request->getPost('angkatan'),
            'keperluan' => $this->request->getPost('keperluan'),
            'tanggal_surat' => $this->request->getPost('tanggal_surat'),
            'id_prodi' => $this->request->getPost('prodi'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_jenisSurat' => $this->request->getPost('id_jenisSurat'),
        ];
        $this->mhsModel->save($dataSimpan);
        return redirect()->to(base_url('/surat/index'));
    }

    public function hapus($no_surat)
    {
        // cari gambar
        $mhs = $this->mhsModel->find($no_surat);

        // Hapus Gambar
        if ($mhs['foto_mhs'] != 'default_user.png') {
            unlink('img/upload/' . $mhs['foto_mhs']);
        }


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

        return view('App\Modules\User\Views\edit_data', $data);
    }

    public function update($no_surat)
    {
        if (!$this->validate([
            'foto_mhs' => [
                'rules' => 'max_size[foto_mhs,5120]|ext_in[foto_mhs,jpg,png,jpeg,docx,pdf]',
                'errors' => [
                    'max_size' => 'ukuran gambar/dokumen terlalu besar',
                    'ext_in' => 'Yang anda upload bukan gambar atau dokumen',
                ]
            ],
        ])) {
            return redirect()->to(base_url('/Surat/edit'))->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('foto_mhs');

        // Pengecekan Kondisi Gambar
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default_user.png';
        } else {
            // generate nama file secara random
            $namaFoto = $fileFoto->getRandomName();

            // memindahkan ke folder gambar
            $fileFoto->move('img/upload/', $namaFoto);
        }
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
            'foto_mhs' => $namaFoto
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('Surat/index');
    }
}
