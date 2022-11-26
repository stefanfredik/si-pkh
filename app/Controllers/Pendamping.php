<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Pendamping extends BaseController {
    private $info = [
        'url' => 'pendamping',
        'title' => 'Pendamping'
    ];

    public function __construct() {
        $this->userModel = new UsersModel();
    }

    public function index() {
        $data = [
            'title' => 'Data Pendamping',
            'info' => $this->info,
            'dataPendamping' => $this->userModel->findAllPendamping()
        ];

        return view('/pendamping/index', $data);
    }
}
