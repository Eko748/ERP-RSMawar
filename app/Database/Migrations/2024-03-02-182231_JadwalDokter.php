<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JadwalDokter extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal_dokter' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_dokter' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jam_mulai' => [
                'type' => 'TIME',
            ],
            'jam_selesai' => [
                'type' => 'TIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id_jadwal_dokter');
        $this->forge->addForeignKey('id_dokter', 'tbu_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbi_jadwal_dokter');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_jadwal_dokter');
    }
}
