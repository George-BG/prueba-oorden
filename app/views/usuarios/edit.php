<?php
if(isset($Errores))
{
	echo '<div class="alert alert-danger">';
	foreach ($Errores as $Error) 
	{
		echo $Error . '<br>';
	}
	echo '</div>';
}
?>
<form action='' method='post'>
	<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
                value="<?php echo $this->security->getToken() ?>"/>
	                
	<div class="row">
		<div class="col-md-3">Usuario ID</div>
		<div class="col-md-3"><?=$this->tag->textField(['usuario_id','size'=>30, 'value'=> $viewRecord->usuario_id] );?></div>    
		<div class="col-md-3">email</div>
		<div class="col-md-3"><?=$this->tag->textField(['email','size'=>30, 'value'=> $viewRecord->email] );?> </div>
		<div class="col-md-3">Nombre</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre','size'=>30, 'value'=> $viewRecord->nombre] );?> </div>
		<div class="col-md-3">Password</div>
		<div class="col-md-3"><?=$this->tag->textField(['password','size'=>30, 'value'=> $viewRecord->password] );?> </div>
		<div class="col-md-3">Activo</div>
		<div class="col-md-3"><?=$this->tag->textField(['activo','size'=>30, 'value'=> $viewRecord->activo] );?> </div>
		<div class="col-md-3">Fecha de Registro</div>
		<div class="col-md-3"><?=$this->tag->textField(['fecha_registro','size'=>30, 'value'=> $viewRecord->fecha_registro] );?> </div>
		<div class="col-md-3">Fecha Login</div>
		<div class="col-md-3"><?=$this->tag->textField(['fecha_login','size'=>30, 'value'=> $viewRecord->fecha_login] );?> </div>
		<div class="col-md-3">Intento de Session</div>
		<div class="col-md-3"><?=$this->tag->textField(['intento_de_session','size'=>30, 'value'=> $viewRecord->intento_de_session] );?> </div>
		<div class="col-md-3">Ultimo intento de session</div>
		<div class="col-md-3"><?=$this->tag->textField(['ultimo_intento_de_session','size'=>30, 'value'=> $viewRecord->ultimo_intento_de_session] );?> </div>
		<div class="col-md-3">Tiempo de session</div>
		<div class="col-md-3"><?=$this->tag->textField(['tiempo_session','size'=>30, 'value'=> $viewRecord->tiempo_session] );?> </div>
		<div class="col-md-3">Usuario acivacion key</div>
		<div class="col-md-3"><?=$this->tag->textField(['usuario_activacion_key','size'=>30, 'value'=> $viewRecord->usuario_activacion_key] );?>  </div> 
		<div class="col-md-3">usaurio activacion email</div>
		<div class="col-md-3"><?=$this->tag->textField(['usuario_activacoin_email','size'=>30, 'value'=> $viewRecord->usuario_activacoin_email] );?>  </div>
		<div class="col-md-3">Usuario activacion contraseña</div>
		<div class="col-md-3"><?=$this->tag->textField(['usuario_activacoin_contrasena','size'=>30, 'value'=> $viewRecord->usuario_activacoin_contrasena] );?>   </div>
		<div class="col-md-3"><?=$this->tag->submitButton(['Guardar', 'class'=>'btn btn-info']);?></div>
	</div>
		
</form>
