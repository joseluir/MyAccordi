<h2>Imagen de Perfil</h2>

<div class="container">
	<div class="img-perfil">
		<figure><!--la etiqueta figure debe estar siempre, que se use una imagen -->
				<!-- sesion de la imagen -->							
				<img src="<?= base_url('public/img_users').'/'.$image ?>" alt="" ><!--la etiqueta img es la imagen y el src es un atributola qe indica la ruta donde se encuentra la imagen -->
			<figcaption>Esta es tu imagen de perfil actual</figcaption><!--la etiquet figcaption sirve para insertar el texto que acompaña a la imagen. -->
		</figure>
	</div>				
</div>

<?php

$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

/*********************************************************************************************
*  form_open_multipart() inicia el tag form ++++++ util para el manejo de archivos @_@       *
*  y la accion es manejada por el metodo subir ubicado dentro del controlador auth.php       *															   *
**********************************************************************************************/
?>
<div class="container">

<?php echo form_open_multipart('auth/subir/',$atributos); ?>
<table>

	<tr>
		<td>
			<?php
			/*********************************************************************************************
			*  form_upload() para cargar archivos                                              @_@       *
			**********************************************************************************************/
			?>
			<p class="lead">Selecciona una nueva imagen dando click sobre el <strong> boton examinar</strong>. </p>
			<p class="lead">Recuerda:<br>La imagen debe ser <strong> png, jpg o gif.</strong><br>Tamaño no maximo a <strong> 1024 * 768. </strong><br>No pesar mas de <strong> 1024 KB o 1 MB. </strong> </p>
		
		</td>
	</tr>
	<tr>
		<?php $data['name'] = 'filename'; $data['class'] = 'btn btn-lg btn-success btn-block'; ?>
		<td><?php echo form_upload($data); ?></td>
	</tr>
	<tr>
		<td>&nbsp</td>
	</tr>
	<tr>
		<td>
			<?php echo form_submit('submit', 'Subir Imagen Seleccionada',"class='btn btn-lg btn-success btn-block'"); ?>
		</td>
	</tr>
		
</table>

			
<?php echo form_close(); ?>

</div>
 