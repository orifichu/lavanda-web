<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestJuzgado extends ResourceController
{
    protected $modelName = 'App\Models\JuzgadoModel';
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

    //listar juzgados de paz no letrado
    public function listarJPNL()
    {
        $data = $this->model->restlistarPorTipo(3);
        $data = $this->afinarData($data);

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

    //listar juzgado de paz no letrado por id
    public function listarPorId($id_juzgado)
    {
        $data = $this->model->restlistarPorId($id_juzgado);
        $data = $this->afinarData($data);

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

    private function afinarData($data)
    {
        $juzgados = array();

        foreach ($data as $row) {
            $juzgado      = array();
            $distrito     = array();
            $provincia    = array();
            $departamento = array();

            $departamento['id_departamento']          = $row->id_departamento;
            $departamento['descripcion_departamento'] = $row->descripcion_departamento;
            $departamento = (object) $departamento;
            
            $provincia['id_provincia']          = $row->id_provincia;
            $provincia['descripcion_provincia'] = $row->descripcion_provincia;
            $provincia['departamento']          = $departamento;
            $provincia = (object) $provincia;

            $distrito['id_distrito']          = $row->id_distrito;
            $distrito['descripcion_distrito'] = $row->descripcion_distrito;
            $distrito['provincia']            = $provincia;
            $distrito = (object) $distrito;

            $juzgado['id_juzgado']              = $row->id_juzgado;
            $juzgado['id_tipo']                 = $row->id_tipo;
            $juzgado['distrito']                = $distrito;
            $juzgado['nombre_juzgado']          = $row->nombre_juzgado;
            $juzgado['centro_poblado']          = $row->centro_poblado;
            $juzgado['competencia_territorial'] = $row->competencia_territorial;
            $juzgado['esta_activo']             = $row->esta_activo;
            $juzgado = (object) $juzgado;

            $juzgados[] = $juzgado;
        }

        return $juzgados;
    }
}