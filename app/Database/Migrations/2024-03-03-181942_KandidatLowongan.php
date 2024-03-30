<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KandidatLowongan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kandidat_lowongan' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kandidat'          => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'id_lowongan_kerja'    => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'created_at'           => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'           => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_kandidat_lowongan');
        $this->forge->addForeignKey('id_kandidat', 'tbh_kandidat', 'id_kandidat', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lowongan_kerja', 'tbh_lowongan_kerja', 'id_lowongan_kerja', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbh_kandidat_lowongan');
    }

    public function down()
    {
        $this->forge->dropTable('tbh_kandidat_lowongan');
    }
}
