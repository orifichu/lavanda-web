<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model
{
    //variables auxiliares
    protected $data    = array();
    protected $id_persona = 0;

    public function __construct()
	{
		$this->setTable('personas');
        $this->primaryKey       = 'id_persona';
        $this->useAutoIncrement =   true;
        $this->returnType       = 'object';

		parent::__construct();
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

    public function restlistarPorId($id_persona)
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doRestListarPorId($id_persona),
		];

        //afterFind

		return $eventData['data'];
    }
    
    protected function doRestListarPorId($id_persona)
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->join('tipos', 'tipos.id_tipo = '.$this->table.'.id_cargo')
                    ->where('id_persona', $id_persona)
                    ->where('esta_activo', 1)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function restlistarPorJuzgado($id_juzgado)
    {
        //beforeFind

        //main event
        $eventData = [
			'data'      => $this->doRestListarPorJuzgado($id_juzgado),
		];

        //afterFind

		return $eventData['data'];
    }
    
    protected function doRestListarPorJuzgado($id_juzgado)
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->join('tipos', 'tipos.id_tipo = '.$this->table.'.id_cargo')
                    ->join('juzgadospersonas', 'juzgadospersonas.id_persona = '.$this->table.'.id_persona')
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

    public function listarPersonas()
    {
        //beforeFind

        //main event
        $eventData = [
            'data' => $this->doListarPersonas(),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarPersonas()
    {
        $db = $this->db();

        $pQuery = $db->table($this->table)
                    ->join('tipos', 'tipos.id_tipo = personas.id_cargo')
                    ->where('esta_activo', 1)
                    ->orderBy('apellidos_persona', 'ASC')
                    ->orderBy('nombres_persona', 'ASC')
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function listarPersonasNotIn($data)
    {
        //beforeFind

        //main event
        $eventData = [
            'data' => $this->doListarPersonasNotIn($data),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarPersonasNotIn($data)
    {
        $db = $this->db();

        $pQuery = $db->table($this->table)
                    ->join('tipos', 'tipos.id_tipo = personas.id_cargo')
                    ->whereNotIn('id_persona', $data)
                    ->where('esta_activo', 1)
                    ->orderBy('apellidos_persona', 'ASC')
                    ->orderBy('nombres_persona', 'ASC')
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function BusquedaPersonaById($id_persona)     
    {
        //beforeFind

        //main event
        $eventData = [          
        'data' => $this->doBusquedaPersonaById($id_persona),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doBusquedaPersonaById($id_persona)
    {
        $db = $this->db();

        $pQuery = $db->table($this->table)
                    ->join('tipos', 'tipos.id_tipo = personas.id_cargo')
                    ->where('esta_activo', 1)
                    ->where('id_persona', $id_persona)
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();
        return $result[0];
    }

    public function BusquedaPersonaByJuzgadoId($id_juzgado)     
    {
        //beforeFind

        //main event
        $eventData = [          
        'data' => $this->doBusquedaPersonaByJuzgadoId($id_juzgado),
        ];

        //afterFind

        return $eventData['data'];
    }

    protected function doBusquedaPersonaByJuzgadoId($id_juzgado)
    {
        $db = $this->db();

        $pQuery = $db->table($this->table)
                    ->join('juzgadospersonas', 'juzgadospersonas.id_persona = personas.id_persona')
                    ->where('esta_activo', 1)
                    ->where('id_juzgado', $id_juzgado)
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

        return $result;
    }

    public function guardar($id_persona, $data)
    {
        //beforeUpdate

        //main event
        $eventData = [
			'data'      => $this->doGuardar($id_persona, $data),
		];

        //afterUpdate

		return $eventData['data'];
    }

    protected function doGuardar($id_persona, $data)
	{
        //extract($data);
        $this->id_persona = $id_persona;
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
        $result = $pQuery->execute($id_persona);

        //posibles $result a usar
        //$result = call_user_func_array(array($pQuery, "execute"), array_values($this->data));
        //$result = call_user_func_array(array($pQuery, "execute"), $this->data);

        return $result;
    }

 //    protected function doQuery()
	// {
 //        $db = $this->db();

 //        return $db->query("select * from {$this->table}")
	// 		->getResult();
 //    }

 //    protected function doListarTodo()
	// {
 //        $db = $this->db();

 //        // Prepare the Query
 //        $pQuery = $db->table($this->table)->get();

 //        // Run the Query
 //        $result = $pQuery->getResult();

 //        return $result;
 //    }


}