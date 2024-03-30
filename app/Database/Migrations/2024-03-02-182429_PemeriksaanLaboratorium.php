<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemeriksaanLaboratorium extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemeriksaan' => [
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
            'jenis_pemeriksaan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'hasil' => [
                'type' => 'TEXT',
            ],
            'tanggal_pemeriksaan' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addPrimaryKey('id_pemeriksaan');
        $this->forge->addForeignKey('id_pasien', 'tbe_pasien', 'id_pasien');
        $this->forge->addForeignKey('id_dokter', 'tbu_user', 'id_user');
        $this->forge->createTable('tbi_pemeriksaan_laboratorium');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_pemeriksaan_laboratorium');
    }
}
