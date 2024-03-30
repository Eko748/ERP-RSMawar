<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Obat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_obat' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_obat' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_obat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'stok' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'harga' => [
                'type' => 'DECIMAL(10,2)',
            ],
        ]);

        $this->forge->addPrimaryKey('id_obat');
        $this->forge->createTable('tbi_obat');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_obat');
    }
}
