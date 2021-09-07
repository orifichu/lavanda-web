<?php

namespace App\Models;

use CodeIgniter\Model;

class DistritoModel extends Model
{
    protected $table = 'distritos';
    protected $primaryKey = 'id_distrito';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';

    /*Consultas para listar combos box*/
    public function busquedaDistritoById($cmbProvincia)
    {
        //beforeFind

        //main event
        $eventData = ['data' => $this->doListarDistritos($cmbProvincia)];

        //afterFind

        return $eventData['data'];
    }

    protected function doListarDistritos($cmbProvincia)
    {
        $db = $this->db();

        // return $db->query("select * from {$this->table} where id_departamento = {$departamento}")->getResult();

        // Prepare the Query
        $pQuery = $db->table($this->table)->where('id_provincia', $cmbProvincia)->get();

        // Run the Query
        $result = $pQuery->getResult();

        return $result;
    }
}