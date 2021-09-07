<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model
{
    protected $table = 'provincias';
    protected $primaryKey = 'id_provincias';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    /*Consultas para listar combos box*/
    public function listarProvincias()
    {
        //beforeFind

        //main event
        $eventData = ['data' => $this->doListarProvincias(1)];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarProvincias($departamento)
    {
        $db = $this->db();
        // $departamento = 1;

        // return $db->query("select * from {$this->table} where id_departamento = {$departamento}")->getResult();

        // Prepare the Query
        $pQuery = $db->table($this->table)->where('id_departamento', $departamento)->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }
}