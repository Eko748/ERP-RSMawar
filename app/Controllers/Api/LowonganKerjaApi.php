<?php

namespace App\Controllers\Api;

use App\Models\LowonganKerjaModel;

class LowonganKerjaApi extends BaseApi
{
    public function index()
    {
        try {
            $model = new LowonganKerjaModel();
            $obat = $model->findAll();

            if (!empty($obat)) {
                return $this->success($obat);
            } else {
                return $this->error(404, 'Data lowongan kerja tidak ditemukan');
            }
        } catch (\Exception $e) {
            return $this->error(500, 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
