<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController {

    private $info = [
        'url' => 'warga',
        'title' => 'Warga'
    ];


    public function index() {
        $data = [
            'title' => 'Data Laporan',
            'info' => $this->info
        ];


        return view('laporan/index', $data);
    }
}
