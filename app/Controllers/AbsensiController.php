<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Absensi;
use CodeIgniter\HTTP\ResponseInterface;

class AbsensiController extends BaseController
{
    private string $title;
    private $model;
    private array $data;

    public function __construct()
    {
        $this->title = 'Absensi';
        $this->model = new Absensi();
        $this->data = [
            'title' => $this->title,
        ];
    }

    public function index(): string
    {
        return view('absensi/index', $this->data);
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $data = $this->model->findAll();
            return $this->response->setJSON($data);
        } else {
            return redirect()->to('/absensi');
        }
    }

}
