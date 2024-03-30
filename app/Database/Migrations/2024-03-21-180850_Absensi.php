<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absensi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_absensi'  => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'unsigned' => true],
            'location'    => ['type' => 'VARCHAR', 'constraint' => 255],
            'latitude'    => ['type' => 'DOUBLE'],
            'longitude'   => ['type' => 'DOUBLE'],
            'image_path'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'keterangan'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id_absensi');
        $this->forge->addForeignKey('user_id', 'tbu_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbi_absensi');
    }

    public function down()
    {
        $this->forge->dropTable('tbi_absensi');
    }
}
