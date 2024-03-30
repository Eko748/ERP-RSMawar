<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_jabatan' => 'Admin',
            ],
            [
                'nama_jabatan' => 'Dokter',
            ],
            [
                'nama_jabatan' => 'Perawat',
            ],
            [
                'nama_jabatan' => 'Petugas Medis',
            ],
            [
                'nama_jabatan' => 'HRD',
            ],
            // Tambahkan data jabatan lainnya sesuai kebutuhan
        ];

        $this->db->table('tbu_jabatan')->insertBatch($data);
    }
}
