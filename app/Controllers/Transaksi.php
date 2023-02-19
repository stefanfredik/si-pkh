<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Dana;
use App\Models\DisabilitasModel;
use App\Models\LansiaModel;
use App\Models\TransaksiModel;
use App\Models\WargaModel;

class Transaksi extends BaseController {
    private $info = [
        'url' => 'transaksi',
        'title' => 'Transaksi'
    ];

    public function __construct() {
        $this->wargaModel = new  WargaModel();
        $this->transaksiModel = new TransaksiModel();
        $this->disabilitasModel = new DisabilitasModel();
        $this->lansiaModel = new LansiaModel();
        $this->danaModel = new Dana();
    }

    public function index() {
        dd($this->wargaModel->findAllWarga('Bantuan Tunai'));
        $data = [
            'title' => 'Data Transaksi',
            'dataTransaksi' => $this->transaksiModel->findAll(),
            'dataDisabilitas' => $this->disabilitasModel->findAll(),
            'dataLansia' => $this->lansiaModel->findAll(),
            'info' => $this->info,
            'totalDana' => $this->danaModel->totalDanaAwal()['dana_awal'],
            'jumPenerima' => $this->transaksiModel->jumAllPenerima('Bantuan Tunai')
        ];

        return view("/transaksi/index", $data);
    }
}
