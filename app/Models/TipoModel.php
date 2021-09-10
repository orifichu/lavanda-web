<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoModel extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    /*Consultas para listar combos box*/
    public function listarTipos($id_padre)
    {
        //beforeFind

        //main event
        $eventData = ['data' => $this->doListarTipos($id_padre)];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarTipos($id_padre)
    {
        $db = $this->db();
        // $departamento = 1;

        // return $db->query("select * from {$this->table} where id_departamento = {$departamento}")->getResult();

        // Prepare the Query
        $pQuery = $db->table($this->table)->where('id_padre', $id_padre)->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }

    public function listarPorPadre($id_padre)
    {
        //beforeFind

        //main event
        $eventData = [			
            'data'      => $this->doListarPorPadre($id_padre),
		];

        //afterFind

		return $eventData['data'];
    }

    protected function doListarPorPadre($id_padre)
	{
        $db = $this->db();

        // Prepare the Query
        $pQuery = $db->table($this->table)
                    ->select('*')
                    ->where('id_padre', $id_padre)
                    ->orderBy('nombre_tipo', 'ASC')
                    ->get();

        // Run the Query
        $result = $pQuery->getResult();
        return $result;
    }
}