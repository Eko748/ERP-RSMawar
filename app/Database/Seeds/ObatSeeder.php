<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_obat' => 'Paracetamol',
                'jenis_obat' => 'Tablet',
                'stok' => 100,
                'harga' => 5000.00,
            ],
            [
                'nama_obat' => 'Amoxicillin',
                'jenis_obat' => 'Kapsul',
                'stok' => 50,
                'harga' => 8000.00,
            ],
            [
                'nama_obat' => 'Actemra',
                'jenis_obat' => 'Kapsul',
                'stok' => 50,
                'harga' => 8000.00,
            ],        ];

        $this->db->table('tbi_obat')->insertBatch($data);
    }
}
