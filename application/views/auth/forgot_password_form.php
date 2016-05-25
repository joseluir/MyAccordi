<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = '* Correo o Apodo';
} else {
	$login_label = '* Correo';
}
?>

<h2>Recuperar Contraseña</h2>

<?php echo form_open($this->uri->uri_string()); ?>

<p></strong>los campos con * son obligatorios</strong></p>

<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>	
	</tr>
</table>
<?php echo form_submit('reset', 'Recuperar Contraseña'); ?>
<?php echo form_close(); ?>