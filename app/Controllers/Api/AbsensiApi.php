<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use CodeIgniter\API\ResponseTrait;

class AbsensiApi extends BaseController
{
    use ResponseTrait;

    public function storeAbsensi()
    {
        helper(['form', 'url']);

        $id = $this->request->getPost('id_user');
        $image = $this->request->getFile('image');
        $longitude = $this->request->getPost('longitude');
        $latitude = $this->request->getPost('latitude');
        $locationName = $this->request->getPost('location');

        $newName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads/absensi', $newName);

        $absensiModel = new AbsensiModel();
        $absensiModel->insert([
            'user_id' => $id,
            'image_path' => $newName,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'location' => $locationName,
        ]);

        return $this->respondCreated(['message' => 'Data absensi berhasil disimpan']);
    }
}
