<?php

namespace App\Controllers;

class Link extends BaseController
{
	public function index()
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
        $links = $linkModel->listarTodo();

        $data = [
            'titulo'      => 'Lavanda | Enlaces de interés',
            'h1'          => 'Enlaces de interés',
            'descripcion' => 'Los enlaces útiles a los que podrán acceder los usuarios',
            'menu'        => 'links',
            'submenu'     => 'listado',
            'links'       => $links
        ];

		return view('links/html/list', $data);
	}

    public function nuevo()
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$link = null;
        $data = [
            'titulo' => 'Lavanda | Nuevo enlace',
            'h1' => 'Nuevo enlace',
            'descripcion' => '',
            'menu'        => 'links',
            'submenu'     => 'nuevo',
            'link' => $link
        ];

		return view('links/html/edit', $data);
	}

    public function ver($id_link)
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$link = $linkModel->find($id_link);
        $data = [
            'titulo' => 'Lavanda | Ver enlace',
            'h1' => 'Ver enlace',
            'descripcion' => '',
            'menu'        => 'links',
            'submenu'     => 'ver',
            'link' => $link
        ];

		return view('links/html/show', $data);
	}

    public function editar($id_link)
	{
		$linkModel = model('App\Models\LinkModel', false, $this->db);
		$link = $linkModel->find($id_link);
        $data = [
            'titulo' => 'Lavanda | Editar enlace',
            'h1' => 'Editar enlace',
            'descripcion' => '',
            'menu'        => 'links',
            'submenu'     => 'editar',
            'link' => $link
        ];

		return view('links/html/edit', $data);
	}

    public function insertar()
	{
        if ( $this->request->getPost('id_link')!=null && $this->request->getPost('id_link')!=0){
            return redirect()->back();
        }

        $id_link = $this->request->getPost('id_link'); 
        $titulo  = $this->request->getPost('titulo'); 
        $url     = urlencode($this->request->getPost('url')); 

		$linkModel = model('App\Models\LinkModel', false, $this->db);
		
        $data = [
            'titulo'      => $titulo,
            'url'         => $url,
            'esta_activo' => 1
        ];

        $result = $linkModel->insertar($data);

		return redirect()->to('/link');
	}

    public function guardar()
	{
        if ( $this->request->getPost('id_link')==null){
            return redirect()->back();
        }

        $id_link = $this->request->getPost('id_link'); 
        $titulo  = $this->request->getPost('titulo'); 
        $url     = urlencode($this->request->getPost('url')); 

		$linkModel = model('App\Models\LinkModel', false, $this->db);
		
        $data = [
            'titulo'  => $titulo,
            'url'     => $url
        ];

        $result = $linkModel->guardar($id_link, $data);

		return redirect()->to('/link');
	}

    public function anular($id_link)
	{
		if ( $id_link==null || $id_link == 0 ){
            return redirect()->back();
        }

        $linkModel = model('App\Models\LinkModel', false, $this->db);
		
        $data = [
            'esta_activo'  => 0,
        ];

        $result = $linkModel->guardar($id_link, $data);

		return redirect()->to('/link');
	}
}
