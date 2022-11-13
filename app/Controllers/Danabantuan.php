<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DanabantuanModel;
use App\Models\bantuanModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Danabantuan extends BaseController {
    use ResponseTrait;

    private $info = [
        'url' => 'danabantuan',
        'title' => 'Dana Bantuan'
    ];


    public function __construct() {
        $this->bantuanModel = new DanabantuanModel();
        $this->userModel = new UserModel();
    }

    public function index() {

        // dd($this->bantuanModel->findAll());
        $data = [
            'title' => 'Data Warga',
            'dataBantuan' => $this->bantuanModel->findAll(),
            'info' => $this->info,
        ];

        return view("bantuan/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataPengurus' => $this->userModel->findAllPengurus()
        ];
        return view("/bantuan/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $this->bantuanModel->save($data);

        setSwall("Sukses Menambah Data Data");
        return redirect()->to('/danabantuan');
    }


    public function edit($id) {
        $bantuan = $this->bantuanModel->find($id);
        $bantuan ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data ' . $bantuan['nama_bantuan'],
            'bantuan' => $bantuan,
            'info' => $this->info,
            'dataPengurus' => $this->userModel->findAllPengurus()
        ];

        return view('bantuan/edit', $data);
    }

    public function detail($id) {
        $warga = $this->bantuanModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Detail ' . $warga['nama_lengkap'],
            'warga' => $warga,
            'info' => $this->info
        ];

        return view('bantuan/detail', $data);
    }


    public function update($id) {
        $warga = $this->bantuanModel->find($id);

        $data = $this->request->getPost();
        $this->bantuanModel->update($id, $data);

        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }

    public function delete($id) {
        $warga = $this->bantuanModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->bantuanModel->delete($id);
        $data = $this->request->getPost();
        $this->bantuanModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghaspus Data.");
        return redirect()->to('/warga');
    }
}
