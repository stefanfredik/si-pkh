<?php

namespace App\Database\Seeds;

use App\Models\Coba;
use CodeIgniter\Database\Seeder;

class CobaSeeder extends Seeder {
    public function run() {
        $data = new Coba();

        $d = [
            'username' => "Username" . rand(1, 9999),
            'jenis_kelamin' => "P" . rand(1, 9999),
            'alamat'    => "alamat " . rand(1, 9999)

        ];

        $data->insert($d);



    }
}
