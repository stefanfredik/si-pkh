<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LansiaModel;
use App\Models\WargaModel;

class TransaksiLansia extends BaseController {
    private $info = [
        'url' => 'lansia/transaksi',
        'title' => 'Data Transaksi Lansia'
    ];

    private $jenisBantuan = 'Bantuan Lansia';

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->lansiaModel = new LansiaModel();
    }

    public function index() {
        $data = [
            'title' => 'Data Transaksi Lansia',
            'dataLansia' => $this->lansiaModel->findAll(),
            'info' => $this->info,
        ];

        // dd($data);

        return view("/transaksi/lansia/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataWarga' => $this->lansiaModel->findAllNonBantuanTunai($this->jenisBantuan)
        ];

        return view("/transaksi/lansia/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();
        $this->lansiaModel->save($data);

        setSwall("Sukses Menambah Data");

        return redirect()->to('/transaksi');
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

        return redirect()->to('/transaksi');
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

        return view('/transaksi/lansia/edit', $data);
    }

    public function update($id) {
        $lansia = $this->lansiaModel->find($id);
        $lansia ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->lansiaModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to('/transaksi');
    }
}
