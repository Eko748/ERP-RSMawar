<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ObatModel;

class BaseApi extends ResourceController
{
    protected function success($data = null, $status = 200, $message = 'Success')
    {
        return $this->respond([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }

    protected function error($status = 500, $message = 'Error', $data = null)
    {
        return $this->respond([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
