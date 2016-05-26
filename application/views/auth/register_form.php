
<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
		'class' => 'form-control',
		'placeholder' => 'Apodo', 
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Correo', 
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Contraseña', 
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Confirmar Contraseña', 
);

$name = array(
	'name'	=> 'name',
	'id'	=> 'name',
	'value'	=> set_value('name'),
	'maxlength'	=> 50,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Nombres', 
);

$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value'	=> set_value('last_name'),
	'maxlength'	=> 50,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Apellidos', 
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
	'class' => 'form-control',
	'placeholder' => 'Código confirmación',
);

$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>

<h2>Registrar</h2>

<div class="container">
<?php
/********************************************************************
 * form_open_multipar(); inicia un tag form y la accion que ocurra  *
 * dentro de este sera manejada por uri->uri_string()       @_@     *
 ********************************************************************/

 echo form_open($this->uri->uri_string(),$atributos); ?>

<h5></strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>


<table>
	<?php if ($use_username) { ?>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
		
	</tr>
	<?php } ?>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
				
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($password['name']); ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $name['id']); ?></td>
		<td><?php echo form_input($name); ?></td>
		
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($name['name']); ?><?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?></td>
		
	</tr>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $last_name['id']); ?></td>
		<td><?php echo form_input($last_name); ?></td>
		
		</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?></td>
		
	</tr>
	
	<?php if ($captcha_registration) {
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
		<td colspan="3">
			<h5>Ingrese las letras tal y como aparecen: </h5>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td style="color: red;" ><?php echo form_label('*', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
			
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
		
	</tr>
	<?php }
	} ?>
</table>
<?php echo form_submit('register', 'Registrar',"class='btn btn-lg btn-success btn-block'"); ?>
<?php echo form_close(); ?>