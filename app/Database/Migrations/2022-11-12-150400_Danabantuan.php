<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Danabantuan extends Migration {
    public function up() {
        $data = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],

            'nama_bantuan' => [
                'type' => 'VARCHAR',
                'constraint' => 64
            ],

            'id_pengurus' => [
                'type' => 'INT',
                'null' => true
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
        ];

        $this->forge->addField($data);
        $this->forge->addKey('id', true);
        $this->forge->createTable('danabantuan');
    }

    public function down() {
        $this->forge->dropTable('danabantuan');
    }
}
