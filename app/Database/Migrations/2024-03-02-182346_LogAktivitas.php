<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LogAktivitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_log_aktivitas' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'aktivitas' => [
                'type' => 'TEXT',
            ],
            'waktu' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id_log_aktivitas');
        $this->forge->addForeignKey('id_user', 'tbu_user', 'id_user');
        $this->forge->createTable('tbp_log_aktivitas');
    }

    public function down()
    {
        $this->forge->dropTable('tbp_log_aktivitas');
    }
}
