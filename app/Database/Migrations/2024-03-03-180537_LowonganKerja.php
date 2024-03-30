<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LowonganKerja extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lowongan_kerja'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'requirement' => [
                'type' => 'TEXT',
            ],
            'note' => [
                'type' => 'TEXT',
            ], 
            'is_active'   => [
                'type'       => 'BOOLEAN',
                'default'    => true,
            ],
            'expire' => [
                'type' => 'DATETIME',
                'null' => true,
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

        $this->forge->addPrimaryKey('id_lowongan_kerja');
        $this->forge->createTable('tbh_lowongan_kerja');
    }

    public function down()
    {
        $this->forge->dropTable('tbh_lowongan_kerja');
    }
}
