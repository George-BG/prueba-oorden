<?php

namespace Oorden\Controllers;

use Oorden\Models as Model;

class UsuariosController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->setVar("listaUsuarios", Model\Usuarios::find(["cache"=>["key"=>"cacheUs"]]));
    }
    public function addAction()
    {
		if($this->request->isPost() and $this->security->checkToken())
		{
			$usuarios = new Model\Usuarios();

			$usuarios->usuario_id = $this->request->getPost('usuario_id','string');
			$usuarios->email = $this->request->getPost('email','string');
			$usuarios->nombre= $this->request->getPost('nombre','string');
			$usuarios->password= $this->request->getPost('password','string');
			$usuarios->activo= $this->request->getPost('activo','string');
			$usuarios->fecha_registro= $this->request->getPost('fecha_registro','string');
			$usuarios->fecha_login= $this->request->getPost('fecha_login','string');
			$usuarios->intento_de_session= $this->request->getPost('intento_de_session','string');
			$usuarios->ultimo_intento_session= $this->request->getPost('ultimo_intento_session','string');
			$usuarios->tiempo_session= $this->request->getPost('tiempo_session','string');
			$usuarios->usuario_activacion_key= $this->request->getPost('usuario_activacion_key','string');
			$usuarios->usuario_activacoin_email= $this->request->getPost('usuario_activacoin_email','string');
			$usuarios->usuario_activacoin_contrasena= $this->request->getPost('usuario_activacoin_contrasena');

    		//guardo la  datos recibidos del formulario
			if($usuarios->save())
			{    				
				return $this->dispatcher->forward(['action'=>'index']);
			}
			else
    		{
    	    	$this->view->setVar("Errores", $usuarios->getMessages());
    		}
    	}
    }

public function editAction($id)
{
	if($usuario = Model\Usuarios::findFirst($id))
	{
		 $this->view->setVar('viewRecord', $usuario);
		 
		if($this->request->isPost())
		{
			$usuario->usuario_id =$this->request->getPost('usuario_id','string');
			$usuario->email =$this->request->getPost('email','string');
			$usuario->nombre =$this->request->getPost('nombre','string');
			$usuario->password =$this->request->getPost('password','string');
			$usuario->activo =$this->request->getPost('activo','string');
			$usuario->fecha_registro =$this->request->getPost('fecha_registro','string');
			$usuario->fecha_login =$this->request->getPost('fecha_login','string');
			$usuario->intento_de_session =$this->request->getPost('intento_de_session','string');
			$usuario->ultimo_intento_session =$this->request->getPost('ultimo_intento_session','string');
			$usuario->tiempo_session =$this->request->getPost('tiempo_session','string');
			$usuario->usuario_activacion_key =$this->request->getPost('usuario_activacion_key','string');
			$usuario->usuario_activacoin_email =$this->request->getPost('usuario_activacoin_email','string');
			$usuario->usuario_activacoin_contrasena =$this->request->getPost('usuario_activacoin_contrasena','string');
			
			if($usuario->save())
			{
				return $this->dispatcher->forward(['action'=>'index']);
			}
			else
			{
				$this->view->setVar("Errores", $usuario->getMessages());
			}
		
		} 
		 
	}

}


	public function deleteAction($id)
	{
		if($record = Model\Usuarios::findFirst($id))
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



       
    public function emailAction($id)
    {

        if($usuario = Model\Usuarios::findFirst($id))
        {
            $this->view->setVar('mostrar', $usuario);
        }

            if($this->request->isPost())
            {               
                //recibo la variable agregando que tipo es
                $email =$this->request->getPost('email','string');
                $username =$this->request->getPost('username','string');
                $mensaje =$this->request->getPost('mensaje','string');
    
             
               if( $this->getDI()->getMail()->send
                    (
                    array($email => $email),
                    'Correo',
                    'confirmation',
                   array( 'confirmUrl' => '/confirm/' . $email.'/'. $email)
                    )
                )
               {
                return $this->dispatcher->forward(['action'=>'index']);
               }
         }
          
        }
}

?>