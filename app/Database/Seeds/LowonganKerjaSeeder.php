<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LowonganKerjaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'       => 'Lowongan 1',
                'description' => 'Deskripsi lowongan 1',
                'requirement' => 'Persyaratan lowongan 1',
                'note'        => 'Catatan lowongan 1',
                'is_active'   => true,
                'expire'      => '2024-12-31 23:59:59',
            ],
            [
                'title'       => 'Lowongan 2',
                'description' => 'Deskripsi lowongan 2',
                'requirement' => 'Persyaratan lowongan 2',
                'note'        => 'Catatan lowongan 2',
                'is_active'   => true,
                'expire'      => '2024-12-31 23:59:59',
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        // Insert data into the table
        $this->db->table('tbh_lowongan_kerja')->insertBatch($data);
    }
}
