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
		<div class="col-md-3">Sucursal ID</div>
		<div class="col-md-3"><?=$this->tag->textField(['sucursal_id','size'=>30, 'value'=> $viewRecord->sucursal_id] );?></div>
		<div class="col-md-3">organizacion</div>
		<div class="col-md-3"><?=$this->tag->textField(['organizacion_id','size'=>30, 'value'=> $viewRecord->organizacion_id] );?></div>
		<div class="col-md-3">clave</div>
		<div class="col-md-3"><?=$this->tag->textField(['clave','size'=>30, 'value'=> $viewRecord->clave] );?></div>
		<div class="col-md-3">nombre</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre','size'=>30, 'value'=> $viewRecord->nombre] );?></div>
		<div class="col-md-3">direccion</div>
		<div class="col-md-3"><?=$this->tag->textField(['direccion','size'=>30, 'value'=> $viewRecord->direccion] );?></div>
		<div class="col-md-3">default</div>
		<div class="col-md-3"><?=$this->tag->textField(['default','size'=>30, 'value'=> $viewRecord->default] );?></div>		    
		<div class="col-md-3">sucursalescol</div>
		<div class="col-md-3"><?=$this->tag->textField(['sucursalescol','size'=>30, 'value'=> $viewRecord->sucursalescol] );?></div>
		    
		<div class="col-md-3"><?=$this->tag->submitButton(['Guardar', 'class'=>'btn btn-info']);?></div>
	</div>
</form>
