<?php

namespace App\Controllers;

class Link extends BaseController
{
	public function index()
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$links = $linkModel->findAll();
        $data = [
            'titulo' => 'Lavanda | Enlaces de interés',
            'h1' => 'Enlaces de interés',
            'descripcion' => 'Los enlaces útiles a los que podrán acceder los usuarios',
            'links' => $links
        ];

		return view('links/html/list', $data);
	}

    public function ver($id_link)
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$link = $linkModel->find($id_link);
        $data = [
            'titulo' => 'Lavanda | Ver enlace',
            'h1' => 'Ver enlace',
            'descripcion' => 'Los atributos del enlace son:',
            'link' => $link
        ];

		return view('links/html/ver', $data);
	}

    public function editar()
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$links = $linkModel->findAll();
        $data = [
            'titulo' => 'Lavanda | Enlaces de interés',
            'h1' => 'Enlaces de interés',
            'descripcion' => 'Los enlaces útiles a los que podrán acceder los usuarios',
            'links' => $links
        ];

		return view('links/html/editar', $data);
	}

    public function anular()
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$links = $linkModel->findAll();
        $data = [
            'titulo' => 'Lavanda | Enlaces de interés',
            'h1' => 'Enlaces de interés',
            'descripcion' => 'Los enlaces útiles a los que podrán acceder los usuarios',
            'links' => $links
        ];

		return view('links/html/anular', $data);
	}
}
