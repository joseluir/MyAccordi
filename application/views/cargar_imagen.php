<h2>Subir imagen</h2>

<div>
	<figure><!--la etiqueta figure debe estar siempre, que se use una imagen -->
			<!-- sesion de la imagen -->							
			<img src="<?= base_url('public/img_users').'/'.$image ?>" alt="" ><!--la etiqueta img es la imagen y el src es un atributola qe indica la ruta donde se encuentra la imagen -->
		<figcaption>Esta es tu imagen de perfil actual</figcaption><!--la etiquet figcaption sirve para insertar el texto que acompaña a la imagen. -->
	</figure>				
</div>

<?php
/*********************************************************************************************
*  form_open_multipart() inicia el tag form ++++++ util para el manejo de archivos @_@       *
*  y la accion es manejada por el metodo subir ubicado dentro del controlador auth.php       *															   *
**********************************************************************************************/
?>
<?php echo form_open_multipart('auth/subir/'); ?>
<table>

	<tr>
		<td>
			<?php
			/*********************************************************************************************
			*  form_upload() para cargar archivos                                              @_@       *
			**********************************************************************************************/
			?>
			<p>Selecciona una imagen con una de las siguientes extenciones <strong> png, jpg, gif</strong> </p>
			<?php echo form_upload('filename'); ?>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<?php echo form_submit('submit', 'Subir imagen'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<p> Recuerda que la imagen debe ser de un tamaño no maximo a <strong> 1024 * 768 </strong>y esta no debe pesar mas de <strong> 1024 KB o 1 Mb </strong> </p>
		</td>
	</tr>
	
</table>

			
<?php echo form_close(); ?>


 