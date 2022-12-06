<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WargaDisabilitas extends Migration {
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

            'nama_pengasuh' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'nama_ibukandung' => [
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

            'periode' => [
                'type' => 'VARCHAR',
                'constraint' => 32
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
        $this->forge->createTable('warga_disabilitas');
    }

    public function down() {
        $this->forge->dropTable('warga_disabilitas');
    }
}
