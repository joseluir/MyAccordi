	
<h2 style="margin-top:0px">Actualizar </h2>
        
<div class="container">
	

	<h5 class="lead">Selecciona el campo a actualizar para el usuario <strong><?php echo $v_username ?></strong></h5>

	     <table class="table">   
	     	<?php if ($use_username) { ?>
	     	<tr>
				<td><a href="<?php echo site_url('users_controller') ?>" class="btn btn-lg btn-primary btn-block"> Apodo</a></td>
			</tr>
			<tr>
				<td>&nbsp</td>
			</tr>	
			<?php } ?>   
			<tr>
				<td><a href="<?php echo site_url().'/users_controller/update_email/',$v_id ?>" class="btn btn-lg btn-primary btn-block"> Correo</a></td>
			</tr>
			<tr>
				<td>&nbsp</td>
			</tr>
			<tr>
				<td><a href="<?php echo site_url().'/users_controller/update_password/',$v_id ?>" class="btn btn-lg btn-primary btn-block"> Contraseña</a></td>
			</tr>
			<tr>
				<td>&nbsp</td>
			</tr>
			<tr>
				<td><a href="<?php echo site_url('users_controller') ?>" class="btn btn-lg btn-primary btn-block"> Imagen</a></td>
			</tr>
			<tr>
				<td>&nbsp</td>
			</tr>	   
			<tr>
		    	<td><a href="<?php echo site_url('users_controller') ?>" class="btn btn-lg btn-default btn-block"> Cancelar </a></td>
		    </tr>
		    
		    
	    </table>

</div>
    </body>
</html>