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

    public function index($jenisBantuan = null) {
        // if ($jenisBantuan == null) {
        //     throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        // }

        $data = [
            'title' => 'Data Warga',
            'dataWarga' => $this->wargaModel->findAll(),
            'info' => $this->info,
            'danaBantuan' => $this->bantuanModel->findAll()
        ];

        if ($jenisBantuan == 'bantuantunai') {
            $data['title'] = 'Bantuan Tunai';

            return view("warga/bantuantunai/index", $data);
        } else  if ($jenisBantuan == 'lansia') {

            $data['title'] = 'Bantuan Lansia';
            return view("warga/lansia/index", $data);
        } else  if ($jenisBantuan == 'disabilitas') {

            $data['title'] = 'Bantuan Disabilitas';
            return view("warga/disabilitas/index", $data);
        }

        $tahun = $this->request->getGet('tahun');
        $periode = $this->request->getGet('periode');
        $bantuan = $this->request->getGet('bantuan');

        $dataWarga = $this->wargaModel->filter($tahun, $periode, $bantuan);

        // $data = [
        //     'title' => 'Data Warga',
        //     'dataWarga' => $dataWarga,
        //     'info' => $this->info,
        //     'danaBantuan' => $this->bantuanModel->findAll()
        // ];

        return view("warga/index", $data);
    }


    public function tambah($jenisBantuan = null) {
        if ($jenisBantuan == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'validation' => $this->validation,
            'info' => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping(),
            'danaBantuan' => $this->bantuanModel->findAll()
        ];

        if ($jenisBantuan == 'bantuantunai') {

            $data['title'] =  'Tambah Warga Bantuan Tunai';
            return view("/warga/bantuantunai/tambah", $data);
        } else if ($jenisBantuan == 'lansia') {

            $data['title'] =  'Tambah Warga Bantuan Lansia';
            return view("/warga/lansia/tambah", $data);
        } else if ($jenisBantuan == 'disabilitas') {

            $data['title'] =  'Tambah Warga Bantuan Disabilitas';
            return view("/warga/disabilitas/tambah", $data);
        }
    }

    public function add($jenisBantuan = null) {
        if ($jenisBantuan == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->request->getPost();
        if ($jenisBantuan == 'bantuantunai') {
            $data['jenis_bantuan'] = 'bantuantunai';
        } else if ($jenisBantuan == 'lansia') {
            $data['jenis_bantuan'] = 'lansia';
        } else if ($jenisBantuan == 'disabilitas') {
            $data['jenis_bantuan'] = 'disabilitas';
        }

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
