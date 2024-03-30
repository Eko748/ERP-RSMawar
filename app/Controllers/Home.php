<?php

namespace App\Controllers;

class Home extends BaseController
{
    private string $title;
    private array $data;

    public function __construct()
    {
        $this->title = 'Dashboard';
        $this->data = [
            'title' => $this->title
        ];
    }

    public function index(): string
    {
        return view('dashboard/index', $this->data);
    }
}
