<h1><?=$orgRecord->nombre_legal ?></h1>
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
	<div class="row">
		<div class="col-md-3">
			<?=$this->tag->select(['usuario_id', $listaPermisos, 'using'=>['usuario_id', 'nombre'] ]);?>
		</div>
		<div class="col-md-3">
			<?=$this->tag->submitButton(['Agregar usuario', 'class'=>'btn btn-info']);?>
		</div>
		<div class="col-md-6">
			<table class="table">
			<tr><th>Usuarios agregados</th></tr>
			<?php
				foreach ($orgRecord->UsuarioPermisos as $valor) 
					echo '<tr><td>' . $valor->Usuarios->nombre."</td></tr> ";
			?>
			</table>
		</div>
	</div>
</form>
