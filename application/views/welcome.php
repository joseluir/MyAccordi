<h2>Inicio</h2>

<table>
 	<tr>
 		<td>hola,<strong> <?php echo $name; ?> </strong>alias <strong><?php echo $username; ?></strong> ! ya eres parte de esta app.</td>
	</tr>
	<tr>
		<td>Puedes cambiar tu foto de perfil ingresando <?php echo anchor('/auth/cargar_vista/', 'aqui'); ?> </td>
	</tr>
 	
 	<tr>
 		<td><?php echo anchor('/auth/logout/', 'cerrar sesion'); ?></td>
 	</tr>			
</table>


