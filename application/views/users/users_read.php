
<h2 style="margin-top:0px">Ver</h2>

<div class="container">
	<div class="img-perfil">
		<figure><!--la etiqueta figure debe estar siempre, que se use una imagen -->
				<!-- sesion de la imagen -->							
				<img src="<?= base_url('public/img_users').'/'.$image ?>" alt="" ><!--la etiqueta img es la imagen y el src es un atributola qe indica la ruta donde se encuentra la imagen -->
			<figcaption>Imagen de perfil actual</figcaption><!--la etiquet figcaption sirve para insertar el texto que acompaña a la imagen. -->
		</figure>
	</div>				
</div>


<div class="container">
        <table class="table">
	    <tr>
	    	<td>Apodo</td>
	    	<td><?php echo $avatar_name; ?></td>
	    </tr>
	    <tr>
	    	<td>Correo</td>
	    	<td><?php echo $email; ?></td>
	    </tr>
	    <tr>
	    	<td>Contraseña</td>
	    	<td><?php echo $password; ?></td>
	    </tr>
	    <tr>
	    	<td>Nombres</td>
	    	<td><?php echo $name; ?></td>
	    </tr>
	    <tr>
	    	<td>Apellidos</td>
	    	<td><?php echo $last_name; ?></td>
	    </tr>
	    <tr>
	    	<td>Rol</td>
	    	<td><?php echo $rol_id; ?></td>
	    </tr>
	    <tr>
	    	<td>Activado</td>
	    	<td><?php echo $activated; ?></td>
	    </tr>
	    <tr>
	    	<td>Bloqueado</td>
	    	<td><?php echo $banned; ?></td>
	    </tr>
	    <tr>
	    	<td>Razon de bloqueo</td>
	    	<td><?php echo $ban_reason; ?></td>
	    </tr>
	    <tr>
	    	<td>New Password Key</td>
	    	<td><?php echo $new_password_key; ?></td>
	    </tr>
	    <tr>
	    	<td>New Password Requested</td>
	    	<td><?php echo $new_password_requested; ?></td>
	    </tr>
	    <tr>
	    	<td>Correo nuevo</td>
	    	<td><?php echo $new_email; ?></td>
	    </tr>
	    <tr>
	    	<td>New Email Key</td>
	    	<td><?php echo $new_email_key; ?></td>
	    </tr>
	    <tr>
	    	<td>Ultima IP</td>
	    	<td><?php echo $last_ip; ?></td>
	    </tr>
	    <tr>
	    	<td>Ultimo ingreso</td>
	    	<td><?php echo $last_login; ?></td>
	    </tr>
	    <tr>
	    	<td>Creado</td>
	    	<td><?php echo $created; ?></td>
	    </tr>
	    <tr>
	    	<td>Modificado</td>
	    	<td><?php echo $modified; ?></td>
	    </tr>
	    <tr>
	    	<td></td>
	    	<td><a href="<?php echo site_url('users_controller') ?>" class="btn btn-default">Cancelar</a></td>
	    </tr>
	</table>
</div>
        </body>
</html>