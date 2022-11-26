<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DanabantuanModel;
use App\Models\UsersModel;
use App\Models\WargaModel;
use CodeIgniter\API\ResponseTrait;

class Warga extends BaseController {
    use ResponseTrait;

    private $info = [
        'url' => 'warga',
        'title' => 'Warga'
    ];


    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->userModel = new UsersModel();
        $this->bantuanModel = new DanabantuanModel();
    }

    public function index() {
        $tahun = $this->request->getGet('tahun');
        $periode = $this->request->getGet('periode');
        $bantuan = $this->request->getGet('bantuan');

        $dataWarga = $this->wargaModel->filter($tahun, $periode, $bantuan);


        $data = [
            'title' => 'Data Warga',
            'dataWarga' => $dataWarga,
            'info' => $this->info,
            'danaBantuan' => $this->bantuanModel->findAll()
        ];
        // echo $periode;

        // dd($data);

        return view("warga/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping(),
            'danaBantuan' => $this->bantuanModel->findAll()
        ];
        return view("/warga/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $this->wargaModel->save($data);

        setSwall("Sukses Menambah Data Data");
        return redirect()->to('/warga');
    }


    public function edit($id) {
        $warga = $this->wargaModel->find($id);

        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data ' . $warga['nama_lengkap'],
            'warga' => $warga,
            'info' => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping()
        ];

        return view('/warga/edit', $data);
    }

    public function detail($id) {
        $warga = $this->wargaModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $data = [
            'title' => 'Detail ' . $warga['nama_lengkap'],
            'warga' => $warga,
            'info' => $this->info
        ];

        return view('/warga/detail', $data);
    }


    public function update($id) {
        $warga = $this->wargaModel->find($id);

        $data = $this->request->getPost();
        $this->wargaModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }

    public function delete($id) {
        $warga = $this->wargaModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->wargaModel->delete($id);
        $data = $this->request->getPost();
        $this->wargaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghapus Data.");
        return redirect()->to('/warga');
    }
}
