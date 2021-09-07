<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestPersona extends ResourceController
{
    protected $modelName = 'App\Models\PersonaModel';
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

    //listar persona por id
    public function listarPorId($id_persona)
    {
        $data = $this->model->restlistarPorId($id_persona);
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

    //listar persona por juzgado
    public function listarPorJuzgado($id_juzgado)
    {
        $data = $this->model->restlistarPorJuzgado($id_juzgado);
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
        $personas = array();

        foreach ($data as $row) {
            $persona = array();
            $tipo    = array();

            $tipo['id_tipo']     = $row->id_tipo;
            $tipo['id_padre']    = $row->id_padre;
            $tipo['nombre_tipo'] = $row->nombre_tipo;
            $cargo = (object) $tipo;
            
            $persona['id_persona']        = $row->id_persona;
            $persona['cargo']          = $cargo;
            $persona['nombres_persona']   = $row->nombres_persona;
            $persona['apellidos_persona'] = $row->apellidos_persona;
            $persona['dni']               = $row->dni;
            $persona['correo_persona']    = $row->correo_persona;
            $persona['telefono_persona']  = $row->telefono_persona;
            $persona['resolucion_juez']   = $row->resolucion_juez;
            $persona['periodo_juez']      = $row->periodo_juez;
            $persona['horario_atencion']  = $row->horario_atencion;
            $persona['esta_activo']       = $row->esta_activo;
            $persona = (object) $persona;

            $personas[] = $persona;
        }

        return $personas;
    }
}