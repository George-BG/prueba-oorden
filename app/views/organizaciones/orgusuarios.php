<h1>Organizaciones y usuarios.  <div class="label label-info">Probando routes</div></h1>
	<table class="table table-striped table-bordered">
		<tr><th>Usuario</th><th>Empresa</th></tr>
	<?php

		foreach ($listaRecord as $valor) 
		{
			echo "<tr>
					<td>{$valor->Usuarios->nombre} </td>
	 			 	<td>{$valor->Organizaciones->nombre_legal}</td></tr>";					 			
		}
	?>
	</table>
