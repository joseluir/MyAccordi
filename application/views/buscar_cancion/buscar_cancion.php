<?php
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>
 

<h2 style="margin-top:0px">Buscar Cancion</h2>

 <div class="container">
<?php echo form_open('cancion/search_action_unregistered',$atributos); ?>

<table>
        <tr>
			<td class="text-center"><label for="varchar">Seleciona un genero</label></td>
            
        </tr>
        <tr>
        	<td class="text-center">
	        	<select name="genero" class="form-control" >
	                     <option value="Metalica">Metalica</option>
                    	 <option value="Pop">Pop</option>
                    	 <option value="Rock">Rock</option>
	            </select>
	       </td>
	       <td class="text-right">
	       		<?php echo form_submit('search', 'Buscar',"class='btn btn-lg btn-success btn-block'"); ?>
	       </td>
	    </tr>
	       
</table>

<?php echo form_close(); ?>  
   
</div>