<?php

namespace App\Controllers;

class Persona extends BaseController
{
	public function index()
	{
		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		$personas = $personaModel->listarPersonas();
        $data = [
            'titulo'      => 'Lavanda | Personas',
            'h1'          => 'Personas',
            'descripcion' => 'Personas que laboran dentro de algún juzgado',
            'menu'        => 'personas',
            'submenu'     => 'listado',
            'personas'    => $personas
        ];

		return view('personas/html/lista', $data);
	}

    public function nuevo()
    {
        $personaModel = model('App\Models\PersonaModel', false, $this->db);
        $tipoModel = model('App\Models\TipoModel', false, $this->db);
        $persona = null;
        
        $cargos = $tipoModel->listarPorPadre(2);
        $data = [
            'titulo'      => 'Lavanda | Nueva persona',
            'h1'          => 'Nueva persona',
            'descripcion' => '',
            'menu'        => 'personas',
            'submenu'     => 'nuevo',
            'persona'     => $persona,
            'cargos'      => $cargos
        ];

        return view('personas/html/registrar', $data);
    }

    public function insertar()
	{
        if ( $this->request->getPost('txtIdPersona')!=null && $this->request->getPost('txtIdPersona')!=0){
            return redirect()->back();
        }

        $id_cargo          = $this->request->getPost('cmbCargo');
        $nombres_persona   = $this->request->getPost('txtNombres');
        $apellidos_persona = $this->request->getPost('txtApellidos');
        $dni               = $this->request->getPost('txtDni');
        $correo_persona    = $this->request->getPost('txtCorreo');
        $telefono_persona  = $this->request->getPost('txtTelefono');
        $resolucion_juez   = $this->request->getPost('txtResolucion');
        $periodo_juez      = $this->request->getPost('txtPeriodo');
        $horario_atencion  = $this->request->getPost('txtHorario');
        $esta_activo       = 1;

		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		
        $data = [
            'id_cargo'          => $id_cargo,
            'nombres_persona'   => $nombres_persona,
            'apellidos_persona' => $apellidos_persona,
            'dni'               => $dni,
            'correo_persona'    => $correo_persona,
            'telefono_persona'  => $telefono_persona,
            'resolucion_juez'   => $resolucion_juez,
            'periodo_juez'      => $periodo_juez,
            'horario_atencion'  => $horario_atencion,
            'esta_activo'       => $esta_activo
        ];

        $result = $personaModel->insertar($data);

		return redirect()->to('/persona');
	}

    public function ver($id_persona)
	{
		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		$tipoModel = model('App\Models\TipoModel', false, $this->db);
		
        $personas = $personaModel->BusquedaPersonaById($id_persona);
		$html="";

		echo "<div class='modal fade' id='detalle_persona'>
	        <div class='modal-dialog modal-md'>
	          <div class='modal-content'>
	            <div class='modal-header'>
	              <h4 class='modal-title'>DATOS</h4>
	              <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
	                <span aria-hidden='true'>&times;</span>
	              </button>
	            </div>
	            <div class='modal-body'>
	              <div class='form-group'>
	                <p><b>NOMBRE(S): </b>$personas->nombres_persona</p>
	                <p><b>APELLIDOS: </b>$personas->apellidos_persona</p>
	                <p><b>CARGO: </b>$personas->nombre_tipo</p>
                    <p><b>DNI: </b>$personas->dni</p>
                    <p><b>CORREO: </b>$personas->correo_persona</p>
                    <p><b>TELÉFONO: </b>$personas->telefono_persona</p>
                    <p><b>RESOLUCIÓN NOMBRAMIENTO: </b>$personas->resolucion_juez</p>
                    <p><b>PERIODO NOMBRAMIENTO: </b>$personas->periodo_juez</p>
                    <p><b>HORARIO DE ATENCIÓN: </b>$personas->horario_atencion</p>
	              </div>
	            </div>
	          </div>
	        </div>
    	</div>";

		return $html;
	}

    public function editar($id_persona)
	{
		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		$tipoModel = model('App\Models\TipoModel', false, $this->db);

        $persona = $personaModel->BusquedaPersonaById($id_persona);
        $cargos = $tipoModel->listarPorPadre(2);

        $data = [
            'titulo'      => 'Lavanda | Editar persona',
            'h1'          => 'Editar persona',
            'descripcion' => '',
            'menu'        => 'personas',
            'submenu'     => 'editar',
            'persona'     => $persona,
            'cargos'      => $cargos
        ];

        // var_dump($juzgados);

		return view('personas/html/registrar', $data);
	}

    public function guardar()
	{
        if ( $this->request->getPost('txtIdPersona')==null){
            return redirect()->back();
        }

        $id_persona        = $this->request->getPost('txtIdPersona'); 
        $id_cargo          = $this->request->getPost('cmbCargo');
        $nombres_persona   = $this->request->getPost('txtNombres');
        $apellidos_persona = $this->request->getPost('txtApellidos');
        $dni               = $this->request->getPost('txtDni');
        $correo_persona    = $this->request->getPost('txtCorreo');
        $telefono_persona  = $this->request->getPost('txtTelefono');
        $resolucion_juez   = $this->request->getPost('txtResolucion');
        $periodo_juez      = $this->request->getPost('txtPeriodo');
        $horario_atencion  = $this->request->getPost('txtHorario');

		$personaModel = model('App\Models\PersonaModel', false, $this->db);
		
        $data = [
            'id_cargo'          => $id_cargo,
            'nombres_persona'   => $nombres_persona,
            'apellidos_persona' => $apellidos_persona,
            'dni'               => $dni,
            'correo_persona'    => $correo_persona,
            'telefono_persona'  => $telefono_persona,
            'resolucion_juez'   => $resolucion_juez,
            'periodo_juez'      => $periodo_juez,
            'horario_atencion'  => $horario_atencion
        ];

        $result = $personaModel->guardar($id_persona, $data);

		return redirect()->to('/persona');
	}

    public function anular($id_persona)
	{
		if ( $id_persona==null || $id_persona == 0 ){
            return redirect()->back();
        }

        $personaModel = model('App\Models\PersonaModel', false, $this->db);
		
        $data = [
            'esta_activo'  => 0,
        ];

        $result = $personaModel->guardar($id_persona, $data);

		return redirect()->to('/persona');
	}
}