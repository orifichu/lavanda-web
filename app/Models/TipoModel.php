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
    public function listarTipos()
    {
        //beforeFind

        //main event
        $eventData = ['data' => $this->doListarTipos(1)];

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
}