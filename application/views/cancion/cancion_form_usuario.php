<script type="text/javascript">

	$(document).ready(function(){
	
	$('#nombre').focus();	
	$('#nombre').blur(function(){
		 var nombre = $(this).val();
		    
		  if(nombre==''){
		 
		    $('#msg_nombre').html('El nombre es requerido').css('color','red');
		    	
		    
		    	
		    }else{
		    		
		    	
		     		$('#msg_nombre').empty();
		    		
			   
		    }//fin del else
	   				 
		 });             		                              	        	  	 
		    						
		     
	});	  
		
	
	$(document).ready(function(){
	$('#autor').blur(function(){		 
		 var autor = $(this).val();
		    
		  if(autor==''){
		    	
		    $('#msg_autor').html('El autor es requerido').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_autor').empty();
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#creacion').blur(function(){		 
		 var creacion = $(this).val();
		    
		  if(creacion==''){
		    	
		    $('#msg_creacion').html('El año de creacion es requerido').css('color','red');
		    	
		    }else{
		    	
		    		
			   		$('#msg_creacion').empty();
		    
		    	
		    }
	
		});	  
	});	
	
	
	
	
	$(document).ready(function(){
	$('#album').blur(function(){		 
		 var album = $(this).val();
		    
		  if(album==''){
		    	
		    $('#msg_album').html('EL album es requerido').css('color','red');
		    	
		    }else{
		    	
		    				    				
			   	$('#msg_album').empty();
			   		
			 			    
		    	}
		    
	
		});	  
	});	
	
	
	$(document).ready(function(){
	$('#letra').blur(function(){		 
		 var letra = $(this).val();
		    
		  if(letra==''){
		    	
		    $('#msg_letra').html('La letra es requerida').css('color','red');
		    	
		    }else{
		    				
			   $('#msg_letra').empty();
		    }
	
		});	  
	});	
	
	
	
</script>




<script>
    function codificar(url) {

        var res = url.replace("watch?v=", "embed/");
        if(res.indexOf("www.youtube.com")>0){ document.getElementById("accordion").setAttribute('style','visibility:visible');
                                             if (document.getElementById( "objVid" )!=null) {
                                                 objVid = document.getElementById("objVid");
                                                 objVid.data = res;
                                             }
                                             else{
                                                 var span = document.createElement('span');
                                                 span.name="video1";
                                                 span.innerHTML = ['<object id="objVid" name="objVid" type="text/html" data="',res,'" width="350" height="300" ></object>'].join('');
                                                 document.getElementById("video").insertBefore(span, null);
                                                 <?php
                                                 $info = "<meta http-equiv='refresh' content='0;URL=agregar_vista.php'";
                                                 ?>
                                             }
                                            }
        else{
            document.getElementById("accordion").setAttribute('style','visibility:hidden; display: none;');
            <?php
            $info = "<meta http-equiv='refresh' content='0;URL=agregar_vista.php'";
            ?>

        }

    }

    function reproducir(archivos) {
        var files = archivos;
        for (var i = 0, f; f = files[i]; i++) {
            //intento visualizar audio-----------------------------------

            var reader2 = new FileReader();
            // Closure to capture the file information.
            reader2.onload = (function(theFile) {
                return function(e) {
                    // Render thumbnail.
                    if (document.getElementById( "objAud" )!=null) {
                        objVid = document.getElementById("objAud");
                                                 objVid.src = e.target.result;

                    }else{
                        var span = document.createElement('span');
                        span.innerHTML = ['<audio id="objAud" name="objAud" controls src="', e.target.result,
                                          '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById('repro').insertBefore(span, null);
                    }


                };
            })(f);

            // Read in the image file as a data URL.
            reader2.readAsDataURL(f);

            //fin visualizar audio-------------------------

        }

    }

</script>




 <?php
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>
 
 
  <h2 style="margin-top:0px">Actualizar Cancion</h2>
 
 
        
 <div class="container">

 <?php echo form_open_multipart('cancion/update_user_action/',$atributos); ?>
 
 <h5><strong>los campos con <em style="color: red;">*</em> son obligatorios</strong></h5>


<table>
		
	   	<tr>
			<td style="color: red;"><label for="varchar">*</label></td>
            <td><input size="30" type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" /></td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td id='msg_nombre' style="color: red;"><?php echo form_error('nombre') ?></td>
		</tr>
	    	<td style="color: red;"><label for="varchar">*</label></td>
            <td><input size="30" type="text" class="form-control" name="autor" id="autor" placeholder="Autor" value="<?php echo $autor; ?>" /></td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td id='msg_autor' style="color: red;"><?php echo form_error('autor') ?></td>
		</tr>
	    <tr>
			<td style="color: red;"><label for="varchar">*</label></td>
            <td><input size="30" type="text" class="form-control" name="creacion" id="creacion" placeholder="A&ntilde;o de Creaci&oacute;n" value="<?php echo $creacion; ?>" /></td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td id='msg_creacion' style="color: red;"><?php echo form_error('creacion') ?></td>
		</tr>
	    <tr>
			<td style="color: red;"><label for="varchar">*</label></td>
            <td><input size="30" type="text" class="form-control" name="album" id="album" placeholder="Album" value="<?php echo $album; ?>" /></td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td id='msg_album' style="color: red;"><?php echo form_error('album') ?></td>
		</tr>
		<tr>
			<td style="color: red;"><label for="varchar">*</label></td>
            <td>
	        	<select name="genero" class="form-control" >
	                    <option <?php if($genero == 'Metalica'){echo("selected");}?>>Metalica</option>
  						<option <?php if($genero == 'Pop'){echo("selected");}?>>Pop</option>
	                    <option <?php if($genero == 'Rock'){echo("selected");}?>>Rock</option>
	            </select>
	       </td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td style="color: red;"><?php echo form_error('genero') ?></td>
		</tr>
	    <tr>
			<td><label for="varchar"></label></td>
            <td><input size="30" type="text" class="form-control" onblur="if(this.value!=''){codificar(this.value);}" name="ruta_video" id="ruta_video" placeholder="URL Video (solo youtube) " value="<?php echo $ruta_video; ?>" /></td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td style="color: red;"><?php echo form_error('ruta_video') ?></td>
		</tr>
		<tr>
	        <td colspan="2">
	            <section name="accordion" id="accordion" style="visibility:hidden; display: none;">
	                <div>
	                    <input type="checkbox" id="check-1" />
	                    <label for="check-1">V&iacute;deo</label>
	                    <article>
	                        <output id="video"></output>
	                        <!--aparece el reproductor-->
	                    </article>
	                </div>
	            </section>	            
	        </td>
        </tr>
		<tr>
			<td>
				<label for="varchar">
					
				</label>
			</td>
			<?php $data['name'] = 'ruta_audio'; $data['class'] = 'btn btn-lg btn-primary btn-block'; $data['onchange']="this.addEventListener('onchange', reproducir(this.files), false);";?>
			<td>
				<p>Solo si necesitas cambiar el audio podras hacerlo dando click sobre el <strong> boton azul</strong> para seleccionar el nuevo audio de la cancion. </p>
				<p>Recuerda:<br>El audio debe ser <strong> mp3 o wav.</strong><br>No pesar mas de <strong> 12000 KB o 12 MB. </strong> </p>
				<?php echo form_upload($data); ?>
			</td>   
        </tr>
        <tr>
			<td>&nbsp</td>
			<td style="color: red;"><?php echo form_error('ruta_audio') ?></td>
		</tr>
		<tr>
	        <td colspan="2">
	            <output id="repro"></output>
	            <!--aparece el reproductor-->
	        </td>
    	</tr>
    	<tr>
			<td style="color: red;"><label for="varchar">*</label></td>
            <td> 
	    		<textarea type="text" class="form-control" name="letra" id="letra" rows="20" cols="25"/> 
	    			<?php echo $letra; ?>
	    		</textarea> 
	    	</td>
        </tr>
        <tr>
			<td>&nbsp</td>
			<td style="color: red;" rows="5" cols="25"> <?php echo form_error('letra') ?></td>
		</tr>
	    <tr>
			<td ><label for="varchar"></label></td>
            <td  style="display:none;" ><input size="30" type="text" class="form-control" name="id" id="id" placeholder="id" value="<?php echo $id; ?>" readonly /></td>
        </tr>
	    <tr>
	    	<td>&nbsp</td>
	    	<td><?php echo form_submit('update', 'Actualizar Cancion',"class='btn btn-lg btn-success btn-block'"); ?></td>
	    </tr>
	    <tr>
			<td>&nbsp</td>
			<td>&nbsp</td>
		</tr>
	    <tr>
	    	<td>&nbsp</td>
	    	<td><a href="<?php echo site_url('cancion/user') ?>" class="btn btn-lg btn-default btn-block">Cancelar</a></td>
	    </tr>
	    
	</table>

<?php echo form_close(); ?>
   
    </body>
</html>