<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RawatInap extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_rawat_inap' => [
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
            'tanggal_masuk' => [
                'type' => 'DATE',
            ],
            'tanggal_keluar' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'diagnosis' => [
                'type' => 'TEXT',
            ],
            'kondisi' => [
                'type' => 'ENUM("Baik", "Sedang", "Kritis")',
            ],
        ]);

        $this->forge->addPrimaryKey('id_rawat_inap');
        $this->forge->addForeignKey('id_pasien', 'tbe_pasien', 'id_pasien');
        $this->forge->addForeignKey('id_dokter', 'tbu_user', 'id_user');
        $this->forge->createTable('tbi_rawat_inap');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_rawat_inap');
    }
}
