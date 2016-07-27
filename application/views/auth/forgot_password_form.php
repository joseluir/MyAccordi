<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
	'class' => 'form-control',
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login['placeholder'] = 'Correo o Apodo';
} else {
	$login['placeholder'] = 'Correo';
}
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>

<h2>Recuperar Contraseña</h2>
<div class="container">
	<?php echo form_open($this->uri->uri_string(),$atributos); ?>
	
	<h5><strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>
	
	<table>
		<tr>
			<td style="color: red;"><?php echo form_label('* ',$login['id']); ?></td>
			<td><?php echo form_input($login); ?></td>
		</tr>
		<tr>
			<td>&nbsp</td>
			<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>	
		</tr>
	</table>
	<?php echo form_submit('reset', 'Recuperar Contraseña',"class='btn btn-lg btn-success btn-block'"); ?>
	<?php echo form_close(); ?>
</div>