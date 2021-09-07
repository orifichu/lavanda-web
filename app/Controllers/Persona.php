<?php

namespace App\Controllers;

class Persona extends BaseController
{
	public function index()
	{
		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		$personas = $personaModel->listarPersonas();
        $data = [
            'titulo' => 'Lavanda | Lista de Personas',
            'h1' => 'Lista Personas',
            'descripcion' => 'Personas de Juzgados de Paz',
            'menu'        => 'personas',
            'submenu'     => 'listado',
            'personas'       => $personas
        ];

		return view('personas/html/lista', $data);
	}

    public function nuevo()
    {
        $personaModel = model('App\Models\PersonaModel', false, $this->db);
        $tipoModel = model('App\Models\TipoModel', false, $this->db);
        $juzgados = null;
        // $provinciaModel = model('App\Models\ProvinciaModel', false, $this->db);
        $provincias = $personaModel->listarProvincias();
        $tipos = $tipoModel->listarTipos(1);
        $data = [
            'titulo' => 'Lavanda | Nuevo juzgado',
            'h1' => 'Nuevo juzgado',
            'descripcion' => '',
            'menu'        => 'juzgados',
            'submenu'     => 'nuevo',
            'juzgados' => $juzgados,
            'provincias' => $provincias,
            'tipos' => $tipos
        ];

        return view('juzgados/html/registrar', $data);
    }
}