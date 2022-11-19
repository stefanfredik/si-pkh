<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\WargaModel;

class Transaksi extends BaseController {

    private $info = [
        'url' => 'transaksi',
        'title' => 'Transaksi'
    ];

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index() {
        $data = [
            'title' => 'Data Transaksi',
            'dataTransaksi' => $this->transaksiModel->findAll(),
            'info' => $this->info,
        ];

        // dd($data);

        return view("transaksi/index", $data);
    }

    public function tambah() {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        return view("/transaksi/tambah", $data);
    }


    public function add() {
        $data = $this->request->getPost();
        $this->transaksiModel->save($data);

        setSwall("Sukses Menambah Data Transaksi");
        return redirect()->to('/transaksi');
    }

    public function delete($id) {
        $transaksi = $this->transaksiModel->find($id);
        $transaksi ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $this->transaksiModel->delete($id);
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
        $transaksi = $this->transaksiModel->find($id);

        $transaksi ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = [
            'title' => 'Edit Data Transaksi ' . str_pad($transaksi['id'], 4, "0", STR_PAD_LEFT),
            'transaksi' => $transaksi,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        return view('/transaksi/edit', $data);
    }

    public function update($id) {
        $transaksi = $this->transaksiModel->find($id);
        $transaksi ?? throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = $this->request->getPost();
        $this->transaksiModel->update($id, $data);
        setSwall("Sukses Mengupdate Data");
        return redirect()->to($this->info['url']);
    }
}
