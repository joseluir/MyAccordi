
<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Mis Canciones</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <h2><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h2>
                </div>
            </div>
            <div class="container text-right">
            <?php echo anchor(site_url('cancion/create'), 'Crear Cancion', 'class="btn btn-primary"'); ?>
			<?php echo anchor(site_url('cancion/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    	</div>
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
			echo anchor(site_url('cancion/read_user/'.$cancion->id),'Ver'); 
			echo ' | '; 
			echo anchor(site_url('cancion/update_user/'.$cancion->id),'Actualizar'); 
			echo ' | '; 
			echo anchor(site_url('cancion/delete_user/'.$cancion->id),'Borrar','onclick="javasciprt: return confirm(\'¿ Estas Seguro de Eliminar Este Resgistro ?\')"'); 
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