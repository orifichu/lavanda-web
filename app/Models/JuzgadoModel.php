<?php

namespace App\Models;

use CodeIgniter\Model;

class JuzgadoModel extends Model
{
    protected $table      = 'juzgados';
    protected $primaryKey = 'id_juzgado';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object';

    /*Insercion del nuevo juzgado*/
    public function insertar($data)
    {
        //beforeUpdate

        //main event
        $eventData = [
            'data'      => $this->doInsertar($data),
        ];

        //afterUpdate

        return $eventData['data'];
    }

    protected function doInsertar($data)
    {
        $this->data = $data;

        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->prepare(function($db)
        {
            return $db->table($this->table)
                    ->insert($this->data);
        });

        // Run the Query
        $result = call_user_func_array(array($pQuery, "execute"), $this->data);

        return $result;
    }

    /*Lista de juzgados*/
    public function listarJuzgados()
    {
        //beforeFind

        //main event
        $eventData = [
            'data' => $this->doListarJuzgados(),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarJuzgados()
    {
        $db = $this->db();

        // $pQuery = $db->table('juzgados')
        $pQuery = $db->table($this->table)
                    ->join('distritos', 'distritos.id_distrito = juzgados.id_distrito')
                    ->where('esta_activo', 1)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    /*busqueda de un juzgado por ID*/
    public function BusquedaJuzgadoById($id_juzgado)
    {
        //beforeFind

        //main event
        $eventData = [
            'data' => $this->doBusquedaJuzgadoById($id_juzgado),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doBusquedaJuzgadoById($id_juzgado)
    {
        $db = $this->db();

        // $pQuery = $db->table('juzgados')
        $pQuery = $db->table($this->table)
                    ->join('distritos', 'distritos.id_distrito = juzgados.id_distrito')
                    ->join('provincias', 'provincias.id_provincia = distritos.id_provincia')
                    ->join('tipos', 'tipos.id_tipo = juzgados.id_tipo')
                    ->where('esta_activo', 1)
                    ->where('id_juzgado', $id_juzgado)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result[0];
    }

    /*editar un juzgado*/
    public function EditarJuzgado($txtIdJuzgado, $data)
    {
        //beforeUpdate

        //main event
        $eventData = [
            'data'      => $this->doEditarJuzgado($txtIdJuzgado, $data),
        ];

        //afterUpdate

        return $eventData['data'];
    }

    protected function doEditarJuzgado($txtIdJuzgado, $data)
    {
        $this->id_juzgado = $txtIdJuzgado;
        $this->data    = $data;

        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->prepare(function($db)
        {
            return $db->table($this->table)
                    ->set($this->data)
                    ->where($this->primaryKey, '?', false)
                    ->getCompiledUpdate();
        });

        $result = $pQuery->execute($txtIdJuzgado);

        return $result;
    }
}