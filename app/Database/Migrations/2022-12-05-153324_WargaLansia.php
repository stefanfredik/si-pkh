<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WargaLansia extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'AUTO_INCREMENT' => true
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 64

            ], 'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'no_nik' => [
                'type' => 'VARCHAR',
                'constraint' => 16
            ],
            'no_kk' => [
                'type' => 'VARCHAR',
                'constraint' => 16
            ],

            'tanggal_lahir' => [
                'type' => 'DATE'
            ],

            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],

            'rt_rw' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'desa' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'kabupaten' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'provinsi' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'pendamping' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'tahun' => [
                'type' => 'INT',
                'constraint' => 4
            ],

            'created_at' => [
                'type' => 'DATETIME'
            ], 'updated_at' => [
                'type' => 'DATETIME'
            ], 'last_login' => [
                'type' => 'DATETIME'
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('warga_lansia');
    }

    public function down() {
        $this->forge->dropTable('warga_lansia');
    }
}
