<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DanabantuanModel;
use App\Models\UsersModel;
use App\Models\WargaModel;
use CodeIgniter\API\ResponseTrait;

class WargaDisabilitas extends BaseController {
    use ResponseTrait;

    private $info = [
        'url' => 'disabilitas/warga',
        'title' => 'Warga Disabilitas'
    ];

    private $jenisBantuan = 'Bantuan Disabilitas';

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->userModel = new UsersModel();
        $this->bantuanModel = new DanabantuanModel();
    }

    public function index() {
        $data = [
            'title' => 'Data ' . $this->info['title'],
            'dataWarga' => $this->wargaModel->findAllWarga($this->jenisBantuan),
            'info' => $this->info,
            'danaBantuan' => $this->bantuanModel->findAll()
        ];

        return view("warga/disabilitas/index", $data);
    }

    public function tambah() {
        $data = [
            'title'        => 'Tambah Warga Disabilitas',
            'validation'    => $this->validation,
            'info'          => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping(),
        ];

        return view("/warga/disabilitas/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $data['jenis_bantuan'] = $this->jenisBantuan;

        $this->wargaModel->save($data);

        setSwall("Sukses Menambah Data Data");
        return redirect()->to($this->info['url']);
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

        return view('/warga/disabilitas/edit', $data);
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
        return redirect()->to($this->info['url']);
    }

    public function update($id) {
        $warga = $this->wargaModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->wargaModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }

    public function detail($id) {
        $warga = $this->wargaModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Detail ' . $warga['nama_lengkap'],
            'warga' => $warga,
            'info' => $this->info
        ];

        return view('/warga/disabilitas/detail', $data);
    }
}
