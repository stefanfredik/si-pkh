<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disabilitas extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'AUTO_INCREMENT' => true
            ],
            'id_warga' => [
                'type' => 'INT',
            ],
            'tanggal_terima' => [
                'type' => 'DATE'
            ],
            'keterangan' => [
                'type' => 'TEXT'
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('disabilitas');
    }

    public function down() {
        $this->forge->dropTable('disabilitas');
    }
}
