<?php

namespace Oorden\Controllers;

use Oorden\Models as Model;

class SucursalesController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->setVar("listaSucursales", Model\Sucursales::find(["cache"=>["key"=>"my-cache-suc"]]));
    }
    public function addAction()
	{
		if($this->request->isPost() and $this->security->checkToken())
		{   
			$sucursales = new Model\Sucursales();

			$sucursales->sucursal_id = $this->request->getPost('sucursal_id','string');
			$sucursales->organizacion_id= $this->request->getPost('organizacion_id','string');
			$sucursales->clave= $this->request->getPost('clave','string');
			$sucursales->nombre= $this->request->getPost('nombre','string');
			$sucursales->direccion= $this->request->getPost('direccion','string');
			$sucursales->default= $this->request->getPost('default','string');
			$sucursales->sucursalescol= $this->request->getPost('sucursalescol','string');
			if($sucursales->save())
			{
				return $this->dispatcher->forward(['action'=>'index']);
			}
			else
			{
                $this->view->setVar("Errores", $sucursales->getMessages());
			}        	 			
                    
    	}
    }

	public function editAction($id)
	{
		if($sucursales = Model\Sucursales::findFirst($id))
		{
			$this->view->setVar('viewRecord', $sucursales);
								
			if ($this->security->checkToken())
			{	
				$sucursales->sucursal_id =$this->request->getPost('sucursal_id','string');
				$sucursales->organizacion_id =$this->request->getPost('organizacion_id','string');
				$sucursales->clave =$this->request->getPost('clave','string');
				$sucursales->nombre =$this->request->getPost('nombre','string');
				$sucursales->direccion =$this->request->getPost('direccion','string');
				$sucursales->default =$this->request->getPost('default','string');
                $sucursales->sucursalescol =$this->request->getPost('sucursalescol','string');

                if($sucursales->save())
                {
                    return $this->dispatcher->forward(['action'=>'index']);
                }
                else
                {
                    $this->view->setVar("Errores", $sucursales->getMessages());
                }
			}
			 
		}
	}

	public function deleteAction($id)
	{
		if($record = Model\Sucursales::findFirst($id))
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

}

