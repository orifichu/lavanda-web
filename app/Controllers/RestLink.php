<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestLink extends ResourceController
{
    protected $modelName = 'App\Models\LinkModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->listarTodo());
    }

    // ...
}