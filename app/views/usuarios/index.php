<h1>Usuarios</h1>
<p align="center">
<?=$this->tag->linkTo(["usuarios/add",'Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', 'class' => 'btn btn-info']); ?>
</p>

<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre del Usuario</th>
		<th colspan="2">Accion</th>
	</tr>

	<?php
		foreach ($listaUsuarios as $usuarios) {
			$link = $this->tag->linkTo("usuarios/edit/".$usuarios->usuario_id,"Editar");
			$link2 = $this->tag->linkTo("usuarios/delete/".$usuarios->usuario_id, 'Eliminar');
			$link3 = $this->tag->linkTo("usuarios/email/".$usuarios->usuario_id, 'email');
			echo "<tr>
					<td>{$usuarios->usuario_id} </td>
 				<td> {$usuarios->nombre}</td>";

 		echo "<td>". $this->tag->linkTo(["usuarios/edit/".$usuarios->usuario_id,'Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', 'class'=>'btn btn-info']) 
				."</td><td>". $this->tag->linkTo(["usuarios/delete/".$usuarios->usuario_id, 'Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 'class'=>'btn btn-danger']) 
				."</td></tr>";
		}
	?>
		
</table>
