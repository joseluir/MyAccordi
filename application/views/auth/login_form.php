<script type="text/javascript">

$(document).ready(function(){
	
$('#login').focus();	
$('#login').blur(function(){
	 var user = $(this).val();
	    
	  if(user==''){
	    	
	    $('#msg_login').html('El Correo o Apodo es Requerido').css('color','red');
	    	
	    }else{
	    				
		   $('#msg_password').empty();
	    }
   				 
				 });             		                              	        	  	 
	    						
	    } //fin del else

	  });	  
});	

$(document).ready(function(){
$('#password).blur(function(){		 
	 var user = $(this).val();
	    
	  if(user==''){
	    	
	    $('#msg_password').html('La Contraseña es Requerida').css('color','red');
	    	
	    }else{
	    				
		   $('#msg_password').empty();
	    }

	});	  
});	
</script>

<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
);
if ($login_by_username AND $login_by_email) {
	$login['placeholder'] = 'Correo o Apodo';

} else if ($login_by_username) {
	$login['placeholder'] = 'Apodo';
	
} else {
	$login['placeholder'] = 'Correo';

}
$password = array(
	'name'	=> 'password',
	'id' => 'password',
	'size'	=> 30,
	'placeholder' => 'Contraseña', 
	'class' => 'form-control',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'placeholder' => 'Código confirmación',
	'class' => 'form-control',
);

$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>

<h2>Iniciar Sesión</h2>
 
<div class="container">
 	
	<?php echo form_open($this->uri->uri_string(),$atributos); ?>
	
	<h5></strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>
	
	<table>
		<tr>
			<td style="color: red;"> <?php echo form_label('*', $login['id']); ?></td>
			<td ><?php echo form_input($login); ?></td>
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td id='msg_login' style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?> </td>
			
		</tr>
		<tr>
			<td style="color: red;"> <?php echo form_label('*', $password['id']); ?></td>
			<td><?php echo form_password($password); ?></td>
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td id='msg_password' style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>	
			
		</tr>
	
		<?php if ($show_captcha) {
			if ($use_recaptcha) { ?>
		<tr>
			<td colspan="2">
				<div id="recaptcha_image"></div>
			</td>
			<td>
				<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
				<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
				<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
			</td>
			
		</tr>
		<tr>
			<td>
				<div class="recaptcha_only_if_image">Enter the words above</div>
				<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
			</td>
			<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
			<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
			<?php echo $recaptcha_html; ?>
		</tr>
		<?php } else { ?>
		<tr>
			<td>&nbsp</td>
			<td colspan="3">
				<h5>Ingrese las letras tal y como aparecen: </h5>
				<?php echo $captcha_html; ?>
			</td>
			
		</tr>
		<tr>
			<td style="color: red;"><?php echo form_label('*', $captcha['id']); ?></td>
			<td><?php echo form_input($captcha); ?></td>
			
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
			
		</tr>
		<?php }
		} ?>
	
		<tr>
			<td>&nbsp</td>
			<td colspan="3" class="checkbox">
				<?php echo form_checkbox($remember); ?>
				<?php echo form_label('No volver a pedir estos datos', $remember['id']); ?>
			</td>
			
		</tr>
		
		<tr>
			<td>&nbsp</td>
			<td>
				<?php echo form_submit('submit', 'Iniciar',"class='btn btn-lg btn-success btn-block'"); ?>
			</td>
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
			
		</tr>
		<tr>
			<td>&nbsp</td>
			<td colspan="3">
				&nbsp&nbsp&nbsp
				<?php echo anchor('/auth/forgot_password/', 'Olvide mi contraseña'); ?>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Registrarse'); ?>
				
	    	</td>
			
		</tr>
		
	</table>
	
	<?php echo form_close(); ?>
 </div> <!-- /container -->
</body>