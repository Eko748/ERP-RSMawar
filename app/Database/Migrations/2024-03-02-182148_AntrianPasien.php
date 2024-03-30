<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AntrianPasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_antrian' => [
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
            'tanggal_antri' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM("Antri", "Dilayani", "Selesai")',
            ],
        ]);

        $this->forge->addPrimaryKey('id_antrian');
        $this->forge->addForeignKey('id_pasien', 'tbe_pasien', 'id_pasien');
        $this->forge->createTable('tbe_antrian_pasien');
    }

    public function down()
    {
        $this->forge->dropTable('ttbe_antrian_pasien');
    }
}
