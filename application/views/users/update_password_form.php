<script type="text/javascript">

	var pass = "";

	$(document).ready(function(){
	
	$('#new_password').focus();	
	
	$('#new_password').blur(function(){		 
		 var contrasena = $(this).val();
		    
		  if(contrasena==''){
		    	
		    $('#msg_password').html('La Nueva Contraseña es Requerida').css('color','red');
		    	
		    }else{
		    	
		    	if (contrasena.length < 8){
		    	
		    	 	$('#msg_password').html('La Nueva Contraseña Debe Contener Mínimo 8 Carácteres').css('color','red');
		    	}
		    	else{
		    		
		    		pass=contrasena;		
			   		$('#msg_password').empty();
		    
		    	}
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#confirm_new_password').blur(function(){		 
		 var confirmacion = $(this).val();
		    
		  if(confirmacion==''){
		    	
		    $('#msg_confirm_password').html('La Contraseña de Confirmación es Requerida').css('color','red');
		    	
		    }else{
		    	
		    	if (confirmacion.length < 8){
		    	
		    	 	$('#msg_confirm_password').html('La Contraseña Debe Contener Mínimo 8 Carácteres').css('color','red');
		    	}
		    	else{
		    			
		    		if (pass === confirmacion){
		    				    				
			   			$('#msg_confirm_password').empty();
			   		
			   		}
		    		else{
		    			
		    			$('#msg_confirm_password').html('Las Contraseña no Coinciden').css('color','red');
		    			
		    	
		    		}
		    
		    	}
		    }
	
		});	  
	});		
	
</script>



<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Nueva Contraseña',
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Confirmar Nueva Contraseña', 
);
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>

<h2 style="margin-top:0px">Actualizar Contraseña </h2>
        
<div class="container">


<?php echo form_open('users_controller/update_password/'.$id,$atributos); ?>

<h5><strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>

<table>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $new_password['id']); ?></td>
		<td><?php echo form_password($new_password); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_password' style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></td>
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $confirm_new_password['id']); ?></td>
		<td><?php echo form_password($confirm_new_password); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td id='msg_confirm_password' style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td><?php echo form_submit('change', 'Actualizar Contraseña',"class='btn btn-lg btn-success btn-block'"); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td>&nbsp</td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td><a href="<?php echo site_url('users_controller/') ?>" class="btn btn-lg btn-default btn-block">Cancelar</a></td>
	</tr>
</table>

</div>

<?php echo form_close(); ?>