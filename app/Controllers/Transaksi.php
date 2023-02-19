<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\WargaModel;

class Transaksi extends BaseController
{
    private $info = [
        'url' => 'transaksi',
        'title' => 'Transaksi'
    ];

    public function __construct()
    {
        $this->wargaModel = new  WargaModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Data Transaksi',
            'dataTransaksi' => $this->transaksiModel->findAll(),
            'info' => $this->info,
        ];

        return view("/transaksi/index", $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data ' . $this->info['title'],
            'validation' => $this->validation,
            'info' => $this->info,
            'dataWarga' => $this->wargaModel->findAll()
        ];

        return view("/transaksi/tambah", $data);
    }
}
