<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Home'
        ];
        
        return view('home/index',$data);
    }
}
