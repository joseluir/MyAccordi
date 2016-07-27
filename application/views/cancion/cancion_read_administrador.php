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

     function reproducir(audio) {
     	if(audio==""){
     		document.getElementById("accordion_repro").setAttribute('style','visibility:hidden; display: none;');
     	}else{
     		document.getElementById("accordion_repro").setAttribute('style','visibility:visible');
     	}
     	
     }

</script>
 
<h2 style="margin-top:0px">Ver Cancion</h2>

 <div class="container">
   <table class="table">
	    <tr>
	    	<td>
	    		Nombre
	    	</td>
	    	<td>
	    		<?php echo $nombre; ?>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		Autor
	    	</td>
	    	<td>
	    		<?php echo $autor; ?>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		Año de Creacion
	    	</td>
	    	<td>
	    		<?php echo $creacion; ?>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		Album
	    	</td>
	    	<td>
	    		<?php echo $album; ?>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		Genero
	    	</td>
	    	<td>
	    		<?php echo $genero; ?>
	    	</td>
	    </tr>
	    <tr><td>Video</td>
	    	<td >
	    		<input size="30" type="text" class="btn btn-lg btn-primary btn-block" onclick="if(this.value!=''){codificar(this.value);}" name="ruta_video" id="ruta_video" placeholder="No hay video para mostrar" value="<?php echo $ruta_video; ?>" readonly/>       
	    		<section name="accordion" id="accordion" style="visibility:hidden; display: none;">
	                <div>               
	                    <article>
	                        <output id="video"></output>
	                        <!--aparece el reproductor-->
	                    </article>
	                </div>
	            </section>	
	    	</td>
	    </tr>
	    <tr><td>Audio</td>
	    	<td>
	    		<input size="30" type="text" class="btn btn-lg btn-primary btn-block" onclick="if(this.value!=''){reproducir(this.value);}" name="ruta_audio" id="ruta_audio" placeholder="No hay audio para mostrar" value="<?php echo $ruta_audio; ?>" readonly/>       
	    			<section name="accordion_repro" id="accordion_repro" style="visibility:hidden; display: none;">
	                <div>	
	               		<audio controls autoload>
	               			<source src="base_url('public/music_users').'/'.$ruta_audio">  
                        </audio>
	            	</div>
	            </div>	
	    	</td>

	    </tr>
	    <tr>
	    	<td>
	    		Letra
	    	</td>
	    	<td> 
	    		<textarea type="text" class="form-control" name="letra" id="letra" rows="20" cols="25" readonly> 
	    			<?php echo $letra; ?>
	    		</textarea> 
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		ID Usuario
	    	</td>
	    	<td>
	    		<?php echo $user_id; ?>
	    	</td>
	    </tr>
	    <tr>
	    	<td>
	    		
	    	</td>
	    	<td>
	    		<a href="<?php echo site_url('cancion/') ?>" class="btn btn-default">Cancelar</a>
	    	</td>
	    </tr>
	</table>
 <div>
</body>
</html>