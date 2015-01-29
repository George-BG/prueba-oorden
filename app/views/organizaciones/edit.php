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
		<div class="col-md-3">Organizacion ID </div>
		<div class="col-md-3"><?=$this->tag->textField(['organizacion_id','size'=>30, 'value'=> $viewRecord->organizacion_id] );?></div>
		<div class="col-md-3">Nombre Corto</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre_corto','size'=>30, 'value'=> $viewRecord->nombre_corto] );?></div>
		<div class="col-md-3">Nombre Legal</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre_legal','size'=>30, 'value'=> $viewRecord->nombre_legal] );?></div>
		<div class="col-md-3">Pais ID</div>
		<div class="col-md-3"><?=$this->tag->textField(['pais_id','size'=>30, 'value'=> $viewRecord->pais_id] );?></div>
		<div class="col-md-3">Logo</div>
		<div class="col-md-3"><?=$this->tag->textField(['logo','size'=>30, 'value'=> $viewRecord->logo] );?></div>
		<div class="col-md-3">Tipo ID</div>
		<div class="col-md-3"><?=$this->tag->textField(['tipo_id','size'=>30, 'value'=> $viewRecord->tipo_id] );?></div>
		<div class="col-md-3">ID de Zona Horaria</div>
		<div class="col-md-3"><?=$this->tag->textField(['id_zona_horaria','size'=>30, 'value'=> $viewRecord->id_zona_horaria] );?></div>
		<div class="col-md-3">Direccion Fiscal</div>
		<div class="col-md-3"><?=$this->tag->textField(['direccion_fiscal','size'=>30, 'value'=> $viewRecord->direccion_fiscal] );?></div>
		<div class="col-md-3">Direccion Fisica</div>
		<div class="col-md-3"><?=$this->tag->textField(['direccion_fisica','size'=>30, 'value'=> $viewRecord->direccion_fisica] );?></div>
		<div class="col-md-3">Telefono</div>
		<div class="col-md-3"><?=$this->tag->textField(['telefono','size'=>30, 'value'=> $viewRecord->telefono] );?></div>
		<div class="col-md-3">Email</div>
		<div class="col-md-3"><?=$this->tag->textField(['email','size'=>30, 'value'=> $viewRecord->email] );?></div>
		<div class="col-md-3">Moneda Base ID</div>
		<div class="col-md-3"><?=$this->tag->textField(['moneda_base_id','size'=>30, 'value'=> $viewRecord->moneda_base_id] );?></div>
		<div class="col-md-3">Multimoneda</div>
		<div class="col-md-3"><?=$this->tag->textField(['multimoneda','size'=>30, 'value'=> $viewRecord->multimoneda] );?></div>
		<div class="col-md-3">Fin Año Fiscal</div>
		<div class="col-md-3"><?=$this->tag->textField(['fin_ano_fiscal','size'=>30, 'value'=> $viewRecord->fin_ano_fiscal] );?></div>
		<div class="col-md-3">Base Impuesto</div>
		<div class="col-md-3"><?=$this->tag->textField(['base_impuesto','size'=>30, 'value'=> $viewRecord->base_impuesto] );?></div>
		<div class="col-md-3">Clave Fiscal</div>
		<div class="col-md-3"><?=$this->tag->textField(['clave_fiscal','size'=>30, 'value'=> $viewRecord->clave_fiscal] );?></div>
		<div class="col-md-3">Nombre Clave</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre_clave_fiscal_id','size'=>30, 'value'=> $viewRecord->nombre_clave_fiscal_id] );?></div>
		<div class="col-md-3">Formato Cuentas</div>
		<div class="col-md-3"><?=$this->tag->textField(['formato_cuentas','size'=>30, 'value'=> $viewRecord->formato_cuentas] );?></div>
		<div class="col-md-3">Periodo Fiscal</div>
		<div class="col-md-3"><?=$this->tag->textField(['periodo_fiscal_id','size'=>30, 'value'=> $viewRecord->periodo_fiscal_id] );?></div>
		<div class="col-md-3">Fecha de Bloqueo</div>
		<div class="col-md-3"><?=$this->tag->textField(['fecha_bloqueo_general','size'=>30, 'value'=> $viewRecord->fecha_bloqueo_general]);?></div>
		<div class="col-md-3">Fecha de Bloqueo restringido</div>
		<div class="col-md-3"><?=$this->tag->textField(['fecha_bloqueo_restringido','size'=>30, 'value'=> $viewRecord->fecha_bloqueo_restringido] );?></div>
		<div class="col-md-3">Nombre Costo</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre_ccosto_1','size'=>30, 'value'=> $viewRecord->nombre_ccosto_1] );?></div>
		<div class="col-md-3">Nombre costo 2</div>
		<div class="col-md-3"><?=$this->tag->textField(['nombre_ccosto_2','size'=>30, 'value'=> $viewRecord->nombre_ccosto_2] );?></div>
		<div class="col-md-3"><?=$this->tag->submitButton(['Guardar', 'class'=>'btn btn-info']);?></div>
	</div>
</form>