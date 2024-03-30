<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenggunaanRuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penggunaan_ruangan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pasien' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_dokter' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal_mulai' => [
                'type' =>
                'DATE',
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
            ],
            'ruangan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
        ]);

        $this->forge->addPrimaryKey('id_penggunaan_ruangan');
        $this->forge->addForeignKey('id_pasien', 'tbe_pasien', 'id_pasien');
        $this->forge->addForeignKey('id_dokter', 'tbu_user', 'id_user');
        $this->forge->createTable('tbi_penggunaan_ruangan');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_penggunaan_ruangan');
    }
}
