<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jabatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_jabatan' => [
                'type' => 'ENUM("Admin", "Dokter", "Perawat", "Petugas Medis", "HRD")',
            ],
        ]);

        $this->forge->addPrimaryKey('id_jabatan');
        $this->forge->createTable('tbu_jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('tbu_jabatan');
    }
}
