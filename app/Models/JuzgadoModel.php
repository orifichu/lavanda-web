<?php

namespace App\Models;

use CodeIgniter\Model;

class JuzgadoModel extends Model
{
    //variables auxiliares
    protected $data    = array();
    protected $id_link = 0;

    public function __construct()
	{
		$this->setTable('juzgados');
        $this->primaryKey       = 'id_juzgado';
        $this->useAutoIncrement =   true;
        $this->returnType       = 'object';

		parent::__construct();
	}

    public function query()
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doQuery(),
		];

        //afterFind

		return $eventData['data'];
    }

    public function listarTodo()
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doListarTodo(),
		];

        //afterFind

		return $eventData['data'];
    }

    public function restlistarTodo()
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doRestListarTodo(),
		];

        //afterFind

		return $eventData['data'];
    }

    protected function doRestListarTodo()
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->where('esta_activo', 1)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function restlistarPorId($id_juzgado)
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doRestListarPorId($id_juzgado),
		];

        //afterFind

		return $eventData['data'];
    }
    
    protected function doRestListarPorId($id_juzgado)
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->join('distritos', 'distritos.id_distrito = '.$this->table.'.id_distrito')
                    ->join('provincias', 'provincias.id_provincia = distritos.id_provincia')
                    ->join('departamentos', 'departamentos.id_departamento = provincias.id_departamento')
                    ->where('id_juzgado', $id_juzgado)
                    ->where('esta_activo', 1)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function restlistarPorTipo($id_tipo)
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doRestListarPorTipo($id_tipo),
		];

        //afterFind

		return $eventData['data'];
    }

    protected function doRestListarPorTipo($id_tipo)
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->join('distritos', 'distritos.id_distrito = '.$this->table.'.id_distrito')
                    ->join('provincias', 'provincias.id_provincia = distritos.id_provincia')
                    ->join('departamentos', 'departamentos.id_departamento = provincias.id_departamento')
                    ->where('id_tipo', $id_tipo)
                    ->where('esta_activo', 1)
                    ->orderBy('nombre_juzgado', 'ASC')
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

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

    public function guardar($id_link, $data)
    {
        //beforeUpdate

        //main event
        $eventData = [
			'data'      => $this->doGuardar($id_link, $data),
		];

        //afterUpdate

		return $eventData['data'];
    }

    protected function doQuery()
	{
        $db = $this->db();

        return $db->query("select * from {$this->table}")
			->getResult();
    }

    protected function doListarTodo()
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
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
        //echo $pQuery->getQueryString();exit();
        //$result = $pQuery->execute();
        $result = call_user_func_array(array($pQuery, "execute"), $this->data);

        //posibles $result a usar
        //ber "guardar" function

        return $result;
    }

    protected function doGuardar($id_link, $data)
	{
        //extract($data);
        $this->id_link = $id_link;
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

        // Run the Query
        //echo $pQuery->getQueryString();exit();
        $result = $pQuery->execute($id_link);

        //posibles $result a usar
        //$result = call_user_func_array(array($pQuery, "execute"), array_values($this->data));
        //$result = call_user_func_array(array($pQuery, "execute"), $this->data);

        return $result;
    }
}