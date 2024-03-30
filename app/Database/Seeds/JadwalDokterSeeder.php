<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalDokterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_dokter' => 1,
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'id_dokter' => 1,
                'hari' => 'Rabu',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '16:00:00',
            ],
            [
                'id_dokter' => 2,
                'hari' => 'Selasa',
                'jam_mulai' => '09:00:00',
                'jam_selesai' => '17:00:00',
            ],
            // Tambahkan data jadwal dokter lainnya sesuai kebutuhan
        ];

        $this->db->table('tbi_jadwal_dokter')->insertBatch($data);
    }
}
