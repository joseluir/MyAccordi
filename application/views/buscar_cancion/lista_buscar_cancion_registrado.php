<?php
$atributos = array(
'class' => 'form-signin',
'id' => 'form-signin',
)

?>
 

<h2 style="margin-top:0px">Buscar Cancion</h2>

 <div class="container">
<?php echo form_open('cancion/search_action_registered',$atributos); ?>

<table>
       <tr>
			<td class="text-center"><label for="varchar">Seleciona un genero</label></td>
            
        </tr>
        <tr>
        	<td class="text-center">
        		
	        	<select name="genero" class="form-control" >
	        			<option <?php if($selected == 'Metalica'){echo("selected");}?>>Metalica</option>
  						<option <?php if($selected == 'Pop'){echo("selected");}?>>Pop</option>
	                    <option <?php if($selected == 'Rock'){echo("selected");}?>>Rock</option>
	            </select>
	       </td>
	       <td class="text-right">
	       		<?php echo form_submit('search', 'Buscar',"class='btn btn-lg btn-success btn-block'"); ?>
	       </td>
	    </tr>
</table>

<?php echo form_close(); ?>  
   
</div>


<div class="container">
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nombre</th>
		    <th>Autor</th>
		    <th>Genero</th>
		    <th>Album</th>
			<th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($cancion_data as $cancion)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $cancion->nombre ?></td>  
		    <td><?php echo $cancion->autor ?></td>
		    <td><?php echo $cancion->genero ?></td>
		    <td><?php echo $cancion->album ?></td>
		    <td style="text-align:center" width="200px">
				<?php 
					echo anchor(site_url('cancion/read_search_registered/'.$cancion->id.'/'.$cancion->genero),'Ver'); 
				?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
</div>
        
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>