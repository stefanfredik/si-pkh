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
        'title' => 'Data Warga'
    ];

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->bantuanModel = new DanabantuanModel();
        $this->userModel = new UsersModel();
        $this->danaBantuanModel = new DanabantuanModel();
    }


    public function index() {

        $jenisBantuan = $this->request->getVar("bantuan");
        $tahun = $this->request->getVar("tahun");
        $periode = $this->request->getVar("periode");

        $data = [
            'title' => 'Data Warga ',
            'dataWarga' => $this->wargaModel->filter($tahun, $periode, $jenisBantuan),
            'info' => $this->info,
            'danaBantuan' => $this->bantuanModel->findAll()
        ];

        // dd($data);

        return view("datawarga/index", $data);
    }

    public function tambah() {
        $data = [
            'title'        => 'Tambah Warga Bantuan Tunai',
            'validation'    => $this->validation,
            'info'          => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping(),
            'danaBantuan' => $this->danaBantuanModel->findAll(),
        ];

        return view("/warga/tambah", $data);
    }

    public function add() {
        $data = $this->request->getPost();

        $this->wargaModel->save($data);

        setSwall("Sukses Menambah Data Data");
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

        if ($data['warga']['jenis_bantuan'] == 'Bantuan Tunai') {
            return view('/warga/bantuantunai/edit', $data);
        }

        if ($data['warga']['jenis_bantuan'] == 'Bantuan Disabilitas') {
            return view('/warga/disabilitas/edit', $data);
        }

        if ($data['warga']['jenis_bantuan'] == 'Bantuan Lansia') {
            return view('/warga/lansia/edit', $data);
        }
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

        // dd($warga);


        if ($data['warga']['jenis_bantuan'] == 'Bantuan Tunai') {
            return view('/warga/bantuantunai/detail', $data);
        }

        if ($data['warga']['jenis_bantuan'] == 'Bantuan Disabilitas') {
            return view('/warga/disabilitas/detail', $data);
        }

        if ($data['warga']['jenis_bantuan'] == 'Bantuan Lansia') {
            return view('/warga/lansia/detail', $data);
        }
    }
}
