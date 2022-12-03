<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DanabantuanModel;
use App\Models\UsersModel;
use App\Models\WargaModel;

class Laporan extends BaseController {

    public function __construct() {
        $this->userModel = new UsersModel();
        $this->bantuanModel = new DanabantuanModel();
        $this->wargaModel = new WargaModel();
    }


    private $info = [
        'url' => 'laporan',
        'title' => 'Laporan'
    ];


    public function index() {
        $data = [
            'title' => 'Data Laporan',
            'info' => $this->info
        ];

        return view('laporan/index', $data);
    }

    public function pendamping() {
        $data = [
            'title' => 'Data Pendamping',
            'info' => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping()
        ];

        return view('/laporan/laporanPendamping', $data);
    }

    public function pengurus() {
        $data = [
            'title'         => 'Data Pengurus',
            'info'          => $this->info,
            'dataPengurus'  => $this->userModel->findAllPengurus()
        ];

        return view('/laporan/laporanPengurus', $data);
    }


    public function danabantuan() {
        $data = [
            'title'         => 'Data Dana Bantuan',
            'info'          => $this->info,
            'dataDanabantuan'  => $this->bantuanModel->findAll()
        ];

        return view('/laporan/laporanDanabantuan', $data);
    }

    public function warga() {
        $data = [
            'title'         => 'Data Laporan Warga',
            'info'          => $this->info,
            'dataWarga'  => $this->wargaModel->findAll()
        ];

        return view('/laporan/laporanWarga', $data);
    }


    public function cetak($id) {
    }
}
