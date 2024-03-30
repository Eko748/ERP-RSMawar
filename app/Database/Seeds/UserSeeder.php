<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Eko',
                'email' => 'eko@example.com',
                'password' => password_hash('secret123', PASSWORD_DEFAULT),
                'id_jabatan' => 1, // ID untuk Admin
            ],
            [
                'username' => 'Permana',
                'email' => 'permana@example.com',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'id_jabatan' => 2, // ID untuk Dokter
            ],
            // Tambahkan data pengguna lainnya sesuai kebutuhan
            [
                'username' => 'Admin1',
                'email' => 'admin1@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'id_jabatan' => 1, // ID untuk Admin
            ],
            [
                'username' => 'HRD1',
                'email' => 'hrd1@example.com',
                'password' => password_hash('hrd123', PASSWORD_DEFAULT),
                'id_jabatan' => 5, // ID untuk HRD
            ],
            [
                'username' => 'PetugasMedis1',
                'email' => 'petugasmedis1@example.com',
                'password' => password_hash('petugas123', PASSWORD_DEFAULT),
                'id_jabatan' => 4, // ID untuk Petugas Medis
            ],
            [
                'username' => 'Perawat1',
                'email' => 'perawat1@example.com',
                'password' => password_hash('perawat123', PASSWORD_DEFAULT),
                'id_jabatan' => 3, // ID untuk Perawat
            ],
            [
                'username' => 'PetugasMedis2',
                'email' => 'petugasmedis2@example.com',
                'password' => password_hash('petugas456', PASSWORD_DEFAULT),
                'id_jabatan' => 4, // ID untuk Petugas Medis
            ],
        ];

        $this->db->table('tbu_user')->insertBatch($data);
    }
}
