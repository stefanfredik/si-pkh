<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dana as ModelsDana;
use App\Models\TransaksiModel;

class Dana extends BaseController {
    private $info = [
        'url' => 'dana',
        'title' => 'Dana'
    ];

    public function __construct() {
        $this->danaModel = new ModelsDana();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index() {
        // dd($this->transaksiModel->danaTerpakai("Periode 2", "61"));

        $data = [
            'title' => 'Data ' . $this->info['title'],
            'dana' => $this->danaModel->findAll(),
            'info' => $this->info,
        ];

        return view("/transaksi/dana/index", $data);
    }

    public function tambah() {
        $data = [
            'title'        => 'Tambah Dana',
            'validation'    => $this->validation,
            'info'          => $this->info
        ];

        return view("/transaksi/dana/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();

        $this->danaModel->save($data);

        setSwall("Sukses Menambah Data Data");
        return redirect()->to($this->info['url']);
    }

    public function edit($id) {
        $dana = $this->danaModel->find($id);

        $dana ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data',
            'dana' => $dana,
            'info' => $this->info,

        ];

        return view('/transaksi/dana/edit', $data);
    }

    public function update($id) {
        $dana = $this->danaModel->find($id);
        $dana ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->danaModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }

    public function delete($id) {
        $warga = $this->danaModel->find($id);
        $warga ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->danaModel->delete($id);
        $data = $this->request->getPost();
        $this->danaModel->save($data);

        $res = [
            'status' => 'success',
            'msg'   => 'Sukses Menghapus Data!',
        ];

        setSwall("Sukses Menghapus Data.");
        return redirect()->to($this->info['url']);
    }
}
