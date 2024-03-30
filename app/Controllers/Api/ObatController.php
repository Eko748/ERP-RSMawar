<?php

namespace App\Controllers\Api;

use App\Models\ObatModel;

class ObatController extends BaseApi
{
    public function index()
    {
        try {
            $model = new ObatModel();
            $obat = $model->findAll();

            if (!empty($obat)) {
                return $this->success($obat);
            } else {
                return $this->error(404, 'Data obat tidak ditemukan');
            }
        } catch (\Exception $e) {
            return $this->error(500, 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
