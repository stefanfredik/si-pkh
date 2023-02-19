<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dana extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'AUTO_INCREMENT' => true
            ],
            'dana_awal' => [
                'type' => 'INT',
            ], 'periode' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],
            'tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 16
            ],

            'jenis_bantuan' => [
                'type' => 'VARCHAR',
                'constraint' => 16
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('dana');
    }

    public function down() {
        $this->forge->dropTable('dana');
    }
}
