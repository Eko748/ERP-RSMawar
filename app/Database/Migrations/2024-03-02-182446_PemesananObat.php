<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemesananObat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pemesanan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_obat' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'jumlah' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'total_harga' => [
                'type' => 'DECIMAL(10,2)',
            ],
            'tanggal_pemesanan' => [
                'type' => 'DATE',
            ],
        ]);

        $this->forge->addPrimaryKey('id_pemesanan');
        $this->forge->addForeignKey('id_obat', 'tbi_obat', 'id_obat');
        $this->forge->createTable('tbi_pemesanan_obat');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_pemesanan_obat');
    }
}
