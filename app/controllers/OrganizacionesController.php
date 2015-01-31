<?php

namespace Oorden\Controllers; 

use Oorden\Models as Model;


class OrganizacionesController extends \Phalcon\Mvc\Controller
{
    /**
    * Index de Organizaciones, y ejemplo de phql
    * 
    * @param  void
    * @return void
   */

    public function indexAction()
    {
        $phql = "SELECT * FROM Oorden\Models\Organizaciones ";
        $query = $this->modelsManager->createQuery($phql);  
        $oOrganizaciones = $query->execute();

        $this->view->setVar("listaOrganizaciones", $oOrganizaciones);
    }
    
    /**
    * Agregar una nueva organización.
    * 
    * @param  void
    * @return void
   */

    public function addAction()
	{
		if($this->request->isPost() and $this->security->checkToken())
		{
			$organizacion = new Model\Organizaciones();
		
			$organizacion->organizacion_id = $this->request->getPost('organizacion_id','string');
			$organizacion->nombre_corto = $this->request->getPost('nombre_corto','string');
			$organizacion->nombre_legal = $this->request->getPost('nombre_legal','string');
			$organizacion->pais_id = $this->request->getPost('pais_id','string');
			$organizacion->logo = $this->request->getPost('logo','string');
			$organizacion->tipo_id = $this->request->getPost('tipo_id','string');
			$organizacion->id_zona_horaria = $this->request->getPost('id_zona_horaria','string');
			$organizacion->direccion_fiscal = $this->request->getPost('direccion_fiscal','string');
			$organizacion->direccion_fisica = $this->request->getPost('direccion_fisica','string');
			$organizacion->telefono = $this->request->getPost('telefono','string');
			$organizacion->email = $this->request->getPost('email','string');
			$organizacion->moneda_base_id = $this->request->getPost('moneda_base_id','string');
			$organizacion->multimoneda = $this->request->getPost('multimoneda','string');
			$organizacion->fin_ano_fiscal = $this->request->getPost('fin_ano_fiscal','string');
			$organizacion->base_impuesto = $this->request->getPost('base_impuesto','string');
			$organizacion->clave_fiscal = $this->request->getPost('clave_fiscal','string');
			$organizacion->nombre_clave_fiscal_id = $this->request->getPost('nombre_clave_fiscal_id','string');
			$organizacion->formato_cuentas = $this->request->getPost('formato_cuentas','string');
			$organizacion->periodo_fiscal_id = $this->request->getPost('periodo_fiscal_id','string');
			$organizacion->fecha_bloqueo_general = $this->request->getPost('fecha_bloqueo_general','string');
			$organizacion->fecha_bloqueo_restringido = $this->request->getPost('fecha_bloqueo_restringido','string');
			$organizacion->nombre_ccosto_1 = $this->request->getPost('nombre_ccosto_1','string');
			$organizacion->nombre_ccosto_2 = $this->request->getPost('nombre_ccosto_2','string');
	
			if($organizacion->save())
			{// Se guardan los datos y se redirecciona al index del controlador
				return $this->dispatcher->forward(['action'=>'index']);
			}
			else
			{// Se mandan los errores en pantalla
	    		$this->view->setVar("Errores", $organizacion->getMessages());
			}
 		}	
	}

    /**
    * Editar las Organizaciones.
    * 
    * @param  int $id  Identifica la organización a editar
    * @return void
   */

	public function editAction($id)
	{
		if($organizacion = Model\Organizaciones::findFirst($id))
		{
			$this->view->setVar('viewRecord', $organizacion);
            if($this->request->isPost() and $this->security->checkToken())
            {           
                $organizacion_id =$this->request->getPost('organizacion_id','string');
                $organizacion->nombre_corto =$this->request->getPost('nombre_corto','string');
                $organizacion->nombre_legal =$this->request->getPost('nombre_legal','string');
                $organizacion->pais_id =$this->request->getPost('pais_id','string');
                $organizacion->logo =$this->request->getPost('logo','string');
                $organizacion->tipo_id =$this->request->getPost('tipo_id','string');
                $organizacion->id_zona_horaria =$this->request->getPost('id_zona_horaria','string');
                $organizacion->direccion_fiscal =$this->request->getPost('direccion_fiscal','string');
                $organizacion->direccion_fisica =$this->request->getPost('direccion_fisica','string');
                $organizacion->telefono =$this->request->getPost('telefono','string');
                $organizacion->email =$this->request->getPost('email','string');
                $organizacion->moneda_base =$this->request->getPost('moneda_base_id','string');
                $organizacion->multimoneda =$this->request->getPost('multimoneda','string');
                $organizacion->fin_ano =$this->request->getPost('fin_ano_fiscal','string');
                $organizacion->base_impuesto =$this->request->getPost('base_impuesto','string');
                $organizacion->clave_fiscal =$this->request->getPost('clave_fiscal','string');                
                $organizacion->nombre_clave =$this->request->getPost('nombre_clave_fiscal_id','string');
                $organizacion->formato_cuentas =$this->request->getPost('formato_cuentas','string');
                $organizacion->periodo_fiscal =$this->request->getPost('periodo_fiscal_id','string');
                $organizacion->fecha_bloqueo_general =$this->request->getPost('fecha_bloqueo_general','string');
                $organizacion->fecha_bloqueo_restringido =$this->request->getPost('fecha_bloqueo_restringido','string');
                $organizacion->ccosto_1 =$this->request->getPost('nombre_ccosto_1','string');
                $organizacion->ccosto_2 =$this->request->getPost('nombre_ccosto_2','string');

                if($organizacion->save())
                {
                    return $this->dispatcher->forward(['action'=>'index']);
                }
                else
                {
                    $this->view->setVar("Errores", $organizacion->getMessages());
                }
            }

        }
	}

    /**
    * Borrar una organización.
    * 
    * @param  int $id  Identificación de la organización a borrar
    * @return void
   */
    
	public function deleteAction($id)
	{
		if($record = Model\Organizaciones::findFirst($id))
			{
				$this->view->setVar('mensaje', 'Eliminado');
				if($record->delete())
				{
					return $this->dispatcher->forward(['action'=>'index']);
				}
				else {
					print_r($record->getMessages()); die();
				}
			}
	}

    /**
    * Se agrega un usuario a los permisos de organización.
    * 
    * @param  int $id  Id de la organización donde se agregará el usuario.
    * @return void
   */

    public function permisoAction($id)
    {
        if($organizacion = Model\Organizaciones::findFirst($id))
        {
            $this->view->setVar('orgRecord', $organizacion);
            $this->view->setVar("listaPermisos", Model\Usuarios::find());
            if($this->request->isPost())
            {               
                
                $usuarioPermisos = new Model\UsuarioPermisos();
                $usuarioPermisos->usuario_id= $this->request->getPost('usuario_id','string');
                $usuarioPermisos->organizacion_id= $id;
                //guardo la  datos recibidos del formulario
                if($usuarioPermisos->save())
                {
                    return $this->dispatcher->forward(['action'=>'index']);
                }
                else
                {
                    $this->view->setVar("Errores", $organizacion->getMessages());
                }
            }
        }
    }

    /**
    * Muestra la relación muchos a muchos de usuarios y organizaciones, también sirve como ejemplo de routes
    * http://prueba.io/orgusuarios para acceder a la acción.
    * 
    * @return void
   */

    public function orgusuariosAction()
    {
        if($usuarioPermisos = Model\UsuarioPermisos::find())
        {
            $this->view->setVar('listaRecord', $usuarioPermisos);            
        }
    }
}

