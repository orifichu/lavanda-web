<?php

namespace App\Models;

use CodeIgniter\Model;

class InstanciaModel extends Model
{
    protected $table      = 'instancia_sij';
    // protected $primaryKey = 'id_link';

    // protected $useAutoIncrement = true;

    protected $returnType     = 'object';

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

    protected function doQuery()
    {
        $db = $this->db();

        return $db->query("select * from {$this->table}")
            ->getResult();
    }
}