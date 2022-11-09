<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController {
    public function index() {
        $data = [
            'title' => 'Data User',
        ];

        return view("user/index", $data);
    }
}
