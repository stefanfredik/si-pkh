<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DanabantuanModel;
use App\Models\UsersModel;
use App\Models\WargaModel;
use CodeIgniter\API\ResponseTrait;

class Warga extends BaseController
{
    use ResponseTrait;

    private $info = [
        'url' => 'warga',
        'title' => 'Data Warga'
    ];

    public function __construct()
    {
        $this->wargaModel = new WargaModel();
        $this->bantuanModel = new DanabantuanModel();
        $this->userModel = new UsersModel();
        $this->danaBantuanModel = new DanabantuanModel();
    }

    public function index()
    {

        $jenisBantuan = $this->request->getVar("bantuan");
        $tahun = $this->request->getVar("tahun");
        $periode = $this->request->getVar("periode");

        // dd($this->wargaModel->filter(null, null, 'bantuan Tunai'));

        $data = [
            'title' => 'Data Warga ',
            'dataWarga' => $this->wargaModel->filter($tahun, $periode, $jenisBantuan),
            'info' => $this->info,
            'danaBantuan' => $this->bantuanModel->findAll()
        ];

        // dd($data);

        return view("datawarga/index", $data);
    }

    public function tambah()
    {
        $data = [
            'title'        => 'Tambah Warga Bantuan Tunai',
            'validation'    => $this->validation,
            'info'          => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping(),
            'danaBantuan' => $this->danaBantuanModel->findAll(),
        ];

        return view("/warga/tambah", $data);
    }

    public function add()
    {
        $data = $this->request->getPost();

        $this->wargaModel->save($data);

        setSwall("Sukses Menambah Data Data");
        return redirect()->to($this->info['url']);
    }
}
