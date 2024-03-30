<?php

namespace App\Controllers;

use App\Models\LowonganKerjaModel;

class LowonganKerjaController extends BaseController
{
    private string $title;
    private $model;
    private array $data;

    public function __construct()
    {
        $this->title = 'Karir';
        $this->model = new LowonganKerjaModel();
        $this->data = [
            'title' => $this->title,
        ];
    }

    public function index(): string
    {
        return view('karir/index', $this->data);
    }

    public function data()
    {
        if ($this->request->isAJAX()) {
            $draw = intval($this->request->getGet('draw'));
            $start = intval($this->request->getGet('start'));
            $length = intval($this->request->getGet('length'));
            $searchValue = $this->request->getGet('search')['value'];
            $columns = ['title', 'description', 'requirement', 'note', 'expire', 'is_active'];
            $totalData = $this->model->countAll();
            $totalFiltered = $totalData;

            if (!empty($searchValue)) {
                $this->model->groupStart();
                foreach ($columns as $column) {
                    $this->model->orLike($column, $searchValue);
                }
                $this->model->groupEnd();
                $totalFiltered = $this->model->countAllResults(false);
            }

            $this->model->limit($length, $start);
            $data = $this->model->findAll();

            $response = [
                'draw' => $draw,
                'recordsTotal' => $totalData,
                'recordsFiltered' => $totalFiltered,
                'data' => $data
            ];

            return $this->response->setJSON($response);
        } else {
            return redirect()->to('/karir');
        }
    }
}
