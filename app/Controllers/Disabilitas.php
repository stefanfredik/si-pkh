<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DisabilitasModel;
use App\Models\LansiaModel;
use App\Models\WargaModel;

class Disabilitas extends BaseController {
    private $info = [
        'url' => 'disabilitas',
        'title' => 'Disabilitas'
    ];

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->disabilitasModel = new DisabilitasModel();
    }

    public function index() {
        $data = [
            'title' => 'Data Disabilitas',
            'dataDisabilitas' => $this->disabilitasModel->findAll(),
            'info' => $this->info,
        ];

        return view("disabilitas/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        return view("/disabilitas/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $this->disabilitasModel->save($data);

        setSwall("Sukses Menambah Data");
        return redirect()->to('/disabilitas');
    }

    public function delete($id) {
        $lansia = $this->disabilitasModel->find($id);
        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        $this->disabilitasModel->delete($id);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghapus Data.");
        return redirect()->to('/disabilitas');
    }

    public function edit($id) {
        $lansia = $this->disabilitasModel->find($id);

        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data Lansia ' . str_pad($lansia['id'], 4, "0", STR_PAD_LEFT),
            'lansia' => $lansia,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        // dd($data);

        return view('/disabilitas/edit', $data);
    }

    public function update($id) {
        $lansia = $this->disabilitasModel->find($id);
        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->disabilitasModel->update($id, $data);

        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }
}
