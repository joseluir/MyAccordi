<?php

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Contraseña',
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
	'placeholder' => 'Nuevo Correo',
);
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>


<h2 style="margin-top:0px">Actualizar Correo</h2>
        
<div class="container">

<?php echo form_open('users_controller/update_email/'.$id,$atributos); ?>

<h5><strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>

<table>
	<tr>
		<td style="color: red;"><?php echo form_label('*', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>		
	</tr>
	<tr>
		<td>&nbsp</td>
		<td><?php echo form_submit('change', 'Actualizar Correo',"class='btn btn-lg btn-success btn-block'"); ?></td>
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