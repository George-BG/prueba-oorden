<h1>Organizaciones</h1>
<p align="center">
<?=$this->tag->linkTo(["organizaciones/add",'Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', 'class' => 'btn btn-info']); ?>
</p>
<table class="table table-bordered table-striped">
	<tr>
		<th>ID</th>
		<th>Nombre</th>
		<th>Sucursales</th>
		<th>Usuarios</th>
		<th colspan="3">
			Acciones
		</th>		
	</tr>
	<?php
		foreach ($listaOrganizaciones as $organizacion) 
		{
			echo '<tr>';
				echo "<td>{$organizacion->organizacion_id} </td>
	 			 <td> {$organizacion->nombre_legal}</td><td>";

				foreach ($organizacion->Sucursales as $valor) 
	 			echo $valor->nombre.", ";
					
			echo "</td><td>";
			foreach ($organizacion->UsuarioPermisos as $valor) 
				echo $valor->Usuarios->nombre.", ";
			
			echo "</td>";
				
	 		echo "<td>". $this->tag->linkTo(["organizaciones/edit/".$organizacion->organizacion_id,'Editar <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', 'class'=>'btn btn-info']) 
	 			."</td><td>". $this->tag->linkTo(["organizaciones/delete/".$organizacion->organizacion_id, 'Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', 'class'=>'btn btn-danger']) ."</td>"
	 			."<td>". $this->tag->linkTo(["organizaciones/permiso/".$organizacion->organizacion_id, 'Permisos', 'class'=>'btn btn-info']) 
	 			."</td></tr>";
	 		
	 						 			
		}
	?>
</table>
