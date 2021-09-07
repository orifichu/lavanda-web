<?php

namespace App\Controllers;

class Juzgado extends BaseController
{
	// public function index()
	// {
	// 	$juzgadoModel = model('App\Models\InstanciaModel', false, $this->db);
	// 	$juzgados = $juzgadoModel->findAll();
 //        $data = [
 //            'titulo' => 'Lavanda | Lista de Juzgados',
 //            'h1' => 'Lista Juzgados',
 //            'descripcion' => 'Jueces de Juzgados de Paz',
 //            'menu'        => 'links',
 //            'submenu'     => 'listado',
 //            'juzgados'       => $juzgados
 //        ];

	// 	return view('juzgados/html/lista', $data);
	// }

	public function index()
	{
		$juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		$juzgados = $juzgadoModel->listarJuzgados();
        $data = [
            'titulo' => 'Lavanda | Lista de Juzgados',
            'h1' => 'Lista Juzgados',
            'descripcion' => 'Lista de Juzgados de Paz',
            'menu'        => 'links',
            'submenu'     => 'listado',
            'juzgados'       => $juzgados
        ];

		return view('juzgados/html/lista', $data);
	}

	public function nuevo()
	{
		$provinciaModel = model('App\Models\ProvinciaModel', false, $this->db);
		$tipoModel = model('App\Models\TipoModel', false, $this->db);
		$juzgados = null;
		// $provinciaModel = model('App\Models\ProvinciaModel', false, $this->db);
		$provincias = $provinciaModel->listarProvincias();
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


    public function listarDistrito($cmbProvincia)
	{
		$distritoModel = model('App\Models\DistritoModel', false, $this->db);
		$distritos = $distritoModel->busquedaDistritoById($cmbProvincia);

		$html="";

		echo "<option selected>Seleccione un distrito</option>";
		foreach ($distritos as $distrito):
		echo "<option value='".$distrito->id_distrito."'>".$distrito->descripcion_distrito."</option>";
		endforeach;

		return $html;
	}

	public function insertar()
	{
		// var_dump($this->request->getPost('nombreJuzgado'));
        if ( $this->request->getPost('txtIdJuzgado')!=null && $this->request->getPost('txtIdJuzgado')!=0){
            return redirect()->back();
        }

        // $id_link = $this->request->getPost('txtIdJuzgado'); 
        $cmbTipo  = $this->request->getPost('cmbTipo');
        $cmbDistrito  = $this->request->getPost('cmbDistrito'); 
        $nombreJuzgado  = $this->request->getPost('nombreJuzgado'); 
        $centroPoblado  = $this->request->getPost('centroPoblado'); 
        $competenciaTerritorial  = $this->request->getPost('competenciaTerritorial'); 

		$juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		
        $data = [
            'id_tipo'      => $cmbTipo,
            'id_distrito'      => $cmbDistrito,
            'nombre_juzgado'      => $nombreJuzgado,
            'centro_poblado'      => $centroPoblado,
            'competencia_territorial'      => $competenciaTerritorial,
            'esta_activo' => '1'
        ];

        $result = $juzgadoModel->insertar($data);

		return redirect()->to('/juzgado');
	}

	public function editar($id_juzgado)
	{
		$juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		$provinciaModel = model('App\Models\ProvinciaModel', false, $this->db);
		$tipoModel = model('App\Models\TipoModel', false, $this->db);
		$distritoModel = model('App\Models\DistritoModel', false, $this->db);
		$juzgados = $juzgadoModel->BusquedaJuzgadoById($id_juzgado);
		$distritos = $distritoModel->busquedaDistritoById($juzgados->id_provincia);
		$tipos = $tipoModel->listarTipos();
		$provincias = $provinciaModel->listarProvincias();
        $data = [
            'titulo' => 'Lavanda | Editar juzgado',
            'h1' => 'Editar juzgado',
            'descripcion' => '',
            'menu'        => 'juzgados',
            'submenu'     => 'editar',
            'juzgados' => $juzgados,
            'provincias' => $provincias,
            'tipos' => $tipos,
            'distritos' => $distritos
        ];

        // var_dump($juzgados);

		return view('juzgados/html/registrar', $data);
	}

 	public function guardar()
	{
        if ( $this->request->getPost('txtIdJuzgado')==null){
            return redirect()->back();
        }

        $txtIdJuzgado = $this->request->getPost('txtIdJuzgado'); 
        $cmbTipo  = $this->request->getPost('cmbTipo');
        $cmbDistrito  = $this->request->getPost('cmbDistrito'); 
        $nombreJuzgado  = $this->request->getPost('nombreJuzgado'); 
        $centroPoblado  = $this->request->getPost('centroPoblado'); 
        $competenciaTerritorial  = $this->request->getPost('competenciaTerritorial'); 

		$juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		
        $data = [
            'id_tipo'      => $cmbTipo,
            'id_distrito'      => $cmbDistrito,
            'nombre_juzgado'      => $nombreJuzgado,
            'centro_poblado'      => $centroPoblado,
            'competencia_territorial'      => $competenciaTerritorial
        ];

        $result = $juzgadoModel->EditarJuzgado($txtIdJuzgado, $data);

		return redirect()->to('/juzgado');
	}

	public function ver($id_juzgado)
	{
		$juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		$provinciaModel = model('App\Models\ProvinciaModel', false, $this->db);
		$tipoModel = model('App\Models\TipoModel', false, $this->db);
		$distritoModel = model('App\Models\DistritoModel', false, $this->db);
		$juzgados = $juzgadoModel->BusquedaJuzgadoById($id_juzgado);
		$distritos = $distritoModel->busquedaDistritoById($juzgados->id_provincia);
		$tipos = $tipoModel->listarTipos();
		$provincias = $provinciaModel->listarProvincias();
		$html="";

		echo "<div class='modal fade' id='detalle_juzgado'>
	        <div class='modal-dialog modal-md'>
	          <div class='modal-content'>
	            <div class='modal-header'>
	              <h4 class='modal-title'>DATOS USUARIO QUE REGISTRO SOLICITUD</h4>
	              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	                <span aria-hidden='true'>&times;</span>
	              </button>
	            </div>
	            <div class='modal-body'>
	              <div class='form-group'>
	                <p><b>NOMBRE JUZGADO: </b>$juzgados->nombre_juzgado</p>
	                <p><b>CENTRO POBLADO: </b>$juzgados->centro_poblado</p>
	                <p><b>TIPO: </b>$juzgados->nombre_tipo</p>
	                <p><b>REGION: </b>LAMBAYEQUE</p>
	                <p><b>PROVINCIA: </b>$juzgados->descripcion_provincia</p>
	                <p><b>DISTRITO: </b>$juzgados->descripcion_distrito</p>
	                <p><b>COMPETENCIA TERRITORIAL: </b>$juzgados->competencia_territorial</p>
	              </div>
	            </div>
	          </div>
	        </div>
    	</div>";

		return $html;
	}

	public function anular($id_juzgado)
	{
		if ( $id_juzgado==null || $id_juzgado == 0 ){
            return redirect()->back();
        }

        $juzgadoModel = model('App\Models\JuzgadoModel', false, $this->db);
		
        $data = [ 'esta_activo'  => 0 ];

        $result = $juzgadoModel->EditarJuzgado($id_juzgado, $data);

		return redirect()->to('/juzgado');
	}
}
