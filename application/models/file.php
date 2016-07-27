<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Model {

	 function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


	public function UploadImage($path = '', $message = '')
	{
		
			
		$config['upload_path'] = $path;
	    $config['allowed_types'] = 'png|jpg|gif';
	    $config['max_size'] = '1024';
	    $config['max_width'] = '1024'; /* max width of the image file */
	    $config['max_height'] = '768'; /* max height of the image file */
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('filename')){
			$error = $this->upload->display_errors();
			if($message == ''){ //cierre de php ?> 
				<script type="text/javascript" charset="utf-8">
					alert("Error al subir la imagen");
				</script> <?php
			}else{ 		  ?>
				<script type="text/javascript" charset="utf-8">
					alert("<?= $message ?>");
				</script> <?php
			}
			return null;
		}
		else{
			$file_data = $this->upload->data();?>
			<script type="text/javascript" charset="utf-8">
					alert("Imagen cargada correctamente");
			</script> <?php
			return $file_data['file_name'];
		}
	}
	

	public function UploadAudio($path = '', $message = '')
	{
		$config['upload_path'] = $path;
	    $config['allowed_types'] = 'mp3|wav';
	    $config['max_size'] = '12000';
	    $this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('ruta_audio')){
			$error = $this->upload->display_errors();
			if($message == ''){ //cierre de php ?> 
				<script type="text/javascript" charset="utf-8">
					alert("Error al subir el audio");
				</script> <?php
			}else{ 		  ?>
				<script type="text/javascript" charset="utf-8">
					alert("<?= $message ?>");
				</script> <?php
			}
			return null;
		}
		else{
			$file_data = $this->upload->data();?>
			<script type="text/javascript" charset="utf-8">
					alert("Imagen cargada correctamente");
			</script> <?php
			return $file_data['file_name'];
		}
	}


}

/* End of file file.php */
/* Location: ./application/models/file.php */