<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LansiaModel;
use App\Models\WargaModel;

class Lansia extends BaseController {
    private $info = [
        'url' => 'lansia',
        'title' => 'Lansia'
    ];

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->lansiaModel = new LansiaModel();
    }

    public function index() {
        $data = [
            'title' => 'Data Lansia',
            'dataLansia' => $this->lansiaModel->findAll(),
            'info' => $this->info,
        ];

        // dd($data);

        return view("lansia/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        return view("/lansia/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $this->lansiaModel->save($data);

        setSwall("Sukses Menambah Data");
        return redirect()->to('/lansia');
    }

    public function delete($id) {
        $lansia = $this->lansiaModel->find($id);
        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->lansiaModel->delete($id);
        // $data = $this->request->getPost();
        // $this->transaksiModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghapus Data.");
        return redirect()->to('/lansia');
    }

    public function edit($id) {
        $lansia = $this->lansiaModel->find($id);

        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data Lansia ' . str_pad($lansia['id'], 4, "0", STR_PAD_LEFT),
            'lansia' => $lansia,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        // dd($data);

        return view('/lansia/edit', $data);
    }

    public function update($id) {
        $lansia = $this->lansiaModel->find($id);
        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->lansiaModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }
}
