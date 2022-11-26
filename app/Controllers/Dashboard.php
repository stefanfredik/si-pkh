<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\UsersModel as ModelsUsersModel;
use App\Models\WargaModel;
use Myth\Auth\Models\UsersModel;

class Dashboard extends BaseController {
    private $info = [
        'url' => 'dashboard',
        'title' => 'Dashboard'
    ];

    public function __construct() {
        $this->wargaModel = new WargaModel();
        $this->userModel = new ModelsUsersModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index() {
        $data = [
            'title' => 'Halaman Dashboard',
            'info' => $this->info,
            'jumWarga' => $this->wargaModel->countAll(),
            'jumUser' => $this->userModel->countAll(),
            'jumPengurus' => $this->userModel->countAllPengurus(),
            'jumPendamping' => $this->userModel->countAllPendamping()
        ];

        return view("home/index", $data);
    }
}
