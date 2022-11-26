<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Pengurus extends BaseController {

    private $info = [
        'url' => 'pendamping',
        'title' => 'Pendamping'
    ];

    public function __construct() {
        $this->userModel = new UsersModel();
    }
    public function index() {
        $data = [
            'title' => 'Data Pengurus',
            'info' => $this->info,
            'dataPengurus' => $this->userModel->findAllPengurus()
        ];

        return view('/pengurus/index', $data);
    }
}
