 
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Gestion de Usuarios</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <h2><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></h2>
                </div>
            </div>
            <div class="container text-right">
                <?php echo anchor(site_url('users_controller/register'), 'Crear Usuario', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('users_controller/excel'), 'Excel', 'class="btn btn-success"'); ?>
	    </div>
        </div>
        
<div class="container">
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="80px">No</th>
		    <th>Apodo</th>
		    <th>Correo</th>
		   
		    <th>Nombres</th>
		    <th>Apellidos</th>
		   
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($users_data as $users)
            {
            	if($users->rol_id == 1){
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $users->avatar_name ?></td>
		    <td><?php echo $users->email ?></td>
		   
		    <td><?php echo $users->name ?></td>
		    <td><?php echo $users->last_name ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('users_controller/read/'.$users->id),'Ver'); 
			echo ' | '; 
			echo anchor(site_url('users_controller/update/'.$users->id),'Actualizar'); 
			echo ' | '; 
			echo anchor(site_url('users_controller/delete/'.$users->id),'Borrar','onclick="javasciprt: return confirm(\'¿ Estas Seguro de Eliminar Este Resgistro ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
				}
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