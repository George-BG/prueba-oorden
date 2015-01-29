<h1>Sucursales</h1>
<p align="center">
<?=$this->tag->linkTo(["sucursales/add",'Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', 'class' => 'btn btn-info']); ?>
</p>
<table class="table table-bordered table-striped">
	<tr>
		<th>Sucursal ID</th>
		<th>Nombre</th>
		<th>Organizacion ID</th>
		<th>Clave</th>
		<th colspan="2">Acciones</th>
	</tr>
	<?php
		foreach ($listaSucursales as $sucursales) {
			
			echo "<tr>
					<td>{$sucursales->sucursal_id} </td>
					<td>{$sucursales->nombre} </td>
					<td> {$sucursales->organizacion_id}</td>
					<td> {$sucursales->clave}</td>
					<td>". $this->tag->linkTo(["sucursales/edit/".$sucursales->sucursal_id,'Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', 'class'=>'btn btn-info']) ."</td>
					<td>". $this->tag->linkTo(["sucursales/delete/".$sucursales->sucursal_id, 'Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 'class'=>'btn btn-danger']) ."</td>
				</tr>";
		}
	?>
</table>
	
