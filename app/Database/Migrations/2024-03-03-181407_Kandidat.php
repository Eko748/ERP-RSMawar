<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kandidat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kandidat'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_lowongan_kerja' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'nama'              => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email'             => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat'            => [
                'type' => 'TEXT',
            ],
            'telepon'           => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'resume'            => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'delete_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_kandidat');
        $this->forge->addForeignKey('id_lowongan_kerja', 'tbh_lowongan_kerja', 'id_lowongan_kerja', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbh_kandidat');
    }

    public function down()
    {
        $this->forge->dropTable('tbh_kandidat');
    }
}
