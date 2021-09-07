<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestSede extends ResourceController
{
    protected $modelName = 'App\Models\SedeModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->restlistarTodo();

        $message = '';
        $status = '';
        if (count($data) == 0) {
            $message = 'No hay datos para mostrar.';
            $status = 'failed';
        } else {
            $status = 'success';
        }
        return $this->genericResponse($data, $message, $status);
    }

    private function genericResponse($data, $message, $status)
    {
        if ($status == 'failed') {
            $respond = array(
                'message'   => $message,
                'status' => $status
            );
        } else {
            $respond = array(
                'data'   => $data,
                'status' => $status
            );
        }

        return $this->respond($respond);
    }

    // ...
}