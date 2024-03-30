<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TagihanPasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tagihan_pasien' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_pasien' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => true,
            ],
            'total_tagihan' => [
                'type' => 'DECIMAL(10,2)',
            ],
            'tanggal_tagihan' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM("Belum Lunas", "Lunas")',
            ],
        ]);

        $this->forge->addPrimaryKey('id_tagihan_pasien');
        $this->forge->addForeignKey('id_pasien', 'tbe_pasien', 'id_pasien', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbe_tagihan_pasien');
    }

    public function down()
    {
        $this->forge->dropTable('tbe_tagihan_pasien');
    }
}
