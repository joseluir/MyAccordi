<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cancion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cancion_model');
        $this->load->library('form_validation');
		$this->load->library('tank_auth');
		$this->load->model('file');
    }

    public function index()
    {
        $cancion = $this->Cancion_model->get_all();

        $data = array(
            'cancion_data' => $cancion
        );
		
		$header['titulo'] = 'Gestion de Canciones';
		$header['username']	= $this->tank_auth->get_username();	
		$this->load->view('templates/headerAdmin',$header);
        $this->load->view('cancion/cancion_list_administrador', $data);
    }

	public function user()
    {

		$usuario = $this->tank_auth->get_user_id();
        $cancion = $this->Cancion_model->get_by_user_id($usuario);

        $data = array(
            'cancion_data' => $cancion
        );
		
		$header['titulo'] = 'Mis Canciones';
		$header['username']	= $this->tank_auth->get_username();	
		$this->load->view('templates/headerRegistered',$header);
        $this->load->view('cancion/cancion_list_usuario', $data);
    }


	public function search_unregistered()
    {	
		$header['titulo'] = 'Buscar Cancion';
		$this->load->view('templates/headerUnregistered',$header);
        $this->load->view('buscar_cancion/buscar_cancion');
    }
	
	
	public function search_action_unregistered()
    {
    	$genero = $this->input->post('genero',TRUE);
    	$cancion = $this->Cancion_model->get_by_genero($genero);

        $data = array(
            'cancion_data' => $cancion
        );	
		$data['selected'] = $genero;
		$header['titulo'] = 'Buscar Cancion';
		$this->load->view('templates/headerUnregistered',$header);
        $this->load->view('buscar_cancion/lista_buscar_cancion',$data);
    }
	
	public function read_search_unregistered($id,$genero) 
    {
    	
			$cancion = $this->Cancion_model->get_by_genero($genero);
			$list_data = array(
					'cancion_data' => $cancion
			);	
				
			$list_data['selected'] = $genero;
			
			$row = $this->Cancion_model->get_by_id($id);
			if ($row) {
				$data = array(
			'id' => $row->id,
			'nombre' => $row->nombre,
			'autor' => $row->autor,
			'genero' => $row->genero,
			'album' => $row->album,
			'creacion' => $row->creacion,
			'letra' => $row->letra,
			'ruta_video' => $row->ruta_video,
			'ruta_audio' => $row->ruta_audio,
			);
				$header['titulo'] = 'Ver Cancion';
				$this->load->view('templates/headerUnregistered',$header);
				$this->load->view('buscar_cancion/lista_buscar_cancion',$list_data);
				$this->load->view('buscar_cancion/ver_buscar_cancion', $data);
				
				$visita = array(
				'user_id' => 1,
				'cancion_id' => $id,
				);
				
				$this->Cancion_model->set_visita($visita);
			
			} else {
				redirect(site_url('cancion/search_unregistered'));
			}
		
    }




	public function search_registered()
    {	
		$header['titulo'] = 'Buscar Cancion';
		$header['username']	= $this->tank_auth->get_username();	
		$this->load->view('templates/headerRegistered',$header);
        $this->load->view('buscar_cancion/buscar_cancion_registrado');
    }
	
	
	public function search_action_registered()
    {
    	$genero = $this->input->post('genero',TRUE);
    	$cancion = $this->Cancion_model->get_by_genero($genero);

        $data = array(
            'cancion_data' => $cancion
        );	
		$data['selected'] = $genero;
		$header['titulo'] = 'Buscar Cancion';
		$header['username']	= $this->tank_auth->get_username();	
		$this->load->view('templates/headerRegistered',$header);
        $this->load->view('buscar_cancion/lista_buscar_cancion_registrado',$data);
    }
	
	public function read_search_registered($id,$genero) 
    {
    	$rol = $this->tank_auth->get_rol_id();
		
		if($rol == '1'){
			
			$usuario = $this->tank_auth->get_user_id();
			
			$cancion = $this->Cancion_model->get_by_genero($genero);
			$list_data = array(
					'cancion_data' => $cancion
			);	
				
			$list_data['selected'] = $genero;
			
			$row = $this->Cancion_model->get_by_id($id);
			if ($row) {
				$data = array(
			'id' => $row->id,
			'nombre' => $row->nombre,
			'autor' => $row->autor,
			'genero' => $row->genero,
			'album' => $row->album,
			'creacion' => $row->creacion,
			'letra' => $row->letra,
			'ruta_video' => $row->ruta_video,
			'ruta_audio' => $row->ruta_audio,
			);
				$header['titulo'] = 'Ver Cancion';
				$header['username']	= $this->tank_auth->get_username();	
				$this->load->view('templates/headerRegistered',$header);
				$this->load->view('buscar_cancion/lista_buscar_cancion_registrado',$list_data);
				$this->load->view('buscar_cancion/ver_buscar_cancion', $data);
				
				$visita = array(
				'user_id' => $usuario,
				'cancion_id' => $id,
				);
				
				
				$this->Cancion_model->set_visita($visita);
			
			} else {
				redirect(site_url('cancion/search_registered'));
			}
		}else{
			redirect('');
		}
    }






    public function read_admin($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nombre' => $row->nombre,
		'autor' => $row->autor,
		'genero' => $row->genero,
		'album' => $row->album,
		'creacion' => $row->creacion,
		'letra' => $row->letra,
		'ruta_video' => $row->ruta_video,
		'ruta_audio' => $row->ruta_audio,
		'user_id' => $row->user_id,
	    );
			$header['titulo'] = 'Ver Cancion';
			$header['username']	= $this->tank_auth->get_username();	
			$this->load->view('templates/headerAdmin',$header);
            $this->load->view('cancion/cancion_read_administrador', $data);
					
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada');
            redirect(site_url('cancion'));
        }
    }
	
	public function read_user($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nombre' => $row->nombre,
		'autor' => $row->autor,
		'genero' => $row->genero,
		'album' => $row->album,
		'creacion' => $row->creacion,
		'letra' => $row->letra,
		'ruta_video' => $row->ruta_video,
		'ruta_audio' => $row->ruta_audio,
	    );
			$header['titulo'] = 'Ver Cancion';
			$header['username']	= $this->tank_auth->get_username();	
			$this->load->view('templates/headerRegistered',$header);
            $this->load->view('cancion/cancion_read_usuario', $data);
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada');
            redirect(site_url('cancion/user'));
        }
    }

    public function create() 
    {
    			
        $data = array(
           	     
	    'nombre' => set_value('nombre'),
	    'autor' => set_value('autor'),
	    'genero' => set_value('genero'),
	    'album' => set_value('album'),
	    'creacion' => set_value('creacion'),
	    'letra' => set_value('letra'),
	    'ruta_video' => set_value('ruta_video'),
	    'ruta_audio' => set_value('ruta_audio'),
	   
	);
		$header['titulo'] = 'Crear Cancion';
		$header['username']	= $this->tank_auth->get_username();	
		$this->load->view('templates/headerRegistered',$header);
        $this->load->view('cancion/create_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
		
 		
 		
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        	
				
			
			$usuario = $this->tank_auth->get_user_id();
			
			$data = array();
				
			$ruta = $this->file->UploadAudio('./public/music_users/','No es posible subir el audio');
	     	($ruta != NULL) ? $data['ruta_audio']=$ruta : $data['ruta_audio']= "" ;
			
			$data['nombre'] = $this->input->post('nombre',TRUE);
			$data['autor'] = $this->input->post('autor',TRUE);
			$data['genero'] = $this->input->post('genero',TRUE);
			$data['album'] = $this->input->post('album',TRUE);
			$data['creacion'] = $this->input->post('creacion',TRUE);
			$data['letra'] = $this->input->post('letra',TRUE);
			$data['ruta_video'] = $this->input->post('ruta_video',TRUE);
			$data['user_id'] = $usuario;

            $this->Cancion_model->insert($data);
            $this->session->set_flashdata('message', 'Cancion creada correctamente');
            redirect(site_url('cancion/user'));
        }
    }
    
    public function update_admin($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);

        if ($row) {
            $data = array(
            
		'id' => set_value('id', $row->id),
		'nombre' => set_value('nombre', $row->nombre),
		'autor' => set_value('autor', $row->autor),
		'genero' => set_value('genero', $row->genero),
		'album' => set_value('album', $row->album),
		'creacion' => set_value('creacion', $row->creacion),
		'letra' => set_value('letra', $row->letra),
		'ruta_video' => set_value('ruta_video', $row->ruta_video),
		'ruta_audio' => set_value('ruta_audio', $row->ruta_audio),
		);
			$header['titulo'] = 'Actualizar cancion';
			$header['username']	= $this->tank_auth->get_username();	
			$this->load->view('templates/headerAdmin',$header);
	        $this->load->view('cancion/cancion_form_administrador', $data);
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada');
            redirect(site_url('cancion'));
        }
    }
    
    public function update_admin_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update_admin($this->input->post('id', TRUE));
        } else {
            $data = array();
			
			if (!empty($_FILES['ruta_audio']['name'])){
				$ruta = $this->file->UploadAudio('./public/music_users/','No es posible subir el audio');
	     		($ruta != NULL) ? $data['ruta_audio']=$ruta : $data['ruta_audio']= "" ;
			}
			
			$data['nombre'] = $this->input->post('nombre',TRUE);
			$data['autor'] = $this->input->post('autor',TRUE);
			$data['genero'] = $this->input->post('genero',TRUE);
			$data['album'] = $this->input->post('album',TRUE);
			$data['creacion'] = $this->input->post('creacion',TRUE);
			$data['letra'] = $this->input->post('letra',TRUE);
			$data['ruta_video'] = $this->input->post('ruta_video',TRUE);

            $this->Cancion_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message','Cancion actualizada correctamente');
            redirect(site_url('cancion'));
        }
    }
    
	public function top_10(){
		
		
		$data['visitas']=$this->Cancion_model->get_visitas();
		$header['titulo'] = '10 mas visitadas';
		$this->load->view('templates/headerUnregistered',$header);
		$this->load->view('cancion/mas_visitadas', $data);
		
	}
	
	public function update_user($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);

        if ($row) {
            $data = array(
               
		'id' => set_value('id', $row->id),
		'nombre' => set_value('nombre', $row->nombre),
		'autor' => set_value('autor', $row->autor),
		'genero' => set_value('genero', $row->genero),
		'album' => set_value('album', $row->album),
		'creacion' => set_value('creacion', $row->creacion),
		'letra' => set_value('letra', $row->letra),
		'ruta_video' => set_value('ruta_video', $row->ruta_video),
		'ruta_audio' => set_value('ruta_audio', $row->ruta_audio),
		);
			$header['titulo'] = 'Actualizar cancion';
			$header['username']	= $this->tank_auth->get_username();	
			$this->load->view('templates/headerRegistered',$header);
	        $this->load->view('cancion/cancion_form_usuario', $data);
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada'.$id);
			
            redirect(site_url('cancion/user'));
        }
    }
    
    public function update_user_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
        	
            $this->update_user($this->input->post('id', TRUE));
        } else {
            $data = array();

			if (!empty($_FILES['ruta_audio']['name'])){
				$ruta = $this->file->UploadAudio('./public/music_users/','No es posible subir el audio');
	     		($ruta != NULL) ? $data['ruta_audio']=$ruta : $data['ruta_audio']= "" ;
			}
			
			$data['nombre'] = $this->input->post('nombre',TRUE);
			$data['autor'] = $this->input->post('autor',TRUE);
			$data['genero'] = $this->input->post('genero',TRUE);
			$data['album'] = $this->input->post('album',TRUE);
			$data['creacion'] = $this->input->post('creacion',TRUE);
			$data['letra'] = $this->input->post('letra',TRUE);
			$data['ruta_video'] = $this->input->post('ruta_video',TRUE);
			    

            $this->Cancion_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message','Cancion actualizada correctamente'.$ruta);
            redirect(site_url('cancion/user'));
        }
    }
	
	
	
	
    public function delete_admin($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);

        if ($row) {
            $this->Cancion_model->delete($id);
            $this->session->set_flashdata('message', 'Cancion borrada correctamente');
            redirect(site_url('cancion'));
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada');
            redirect(site_url('cancion'));
        }
    }
	
	
	 public function delete_user($id) 
    {
        $row = $this->Cancion_model->get_by_id($id);

        if ($row) {
            $this->Cancion_model->delete($id);
            $this->session->set_flashdata('message', 'Cancion borrada correctamente');
            redirect(site_url('cancion/user'));
        } else {
            $this->session->set_flashdata('message', 'Cancion no encontrada');
            redirect(site_url('cancion/user'));
        }
    }
	

    public function _rules() 
    {
	$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
	$this->form_validation->set_rules('autor', 'autor', 'trim|required');
	$this->form_validation->set_rules('genero', 'genero', 'trim|required');
	$this->form_validation->set_rules('album', 'album', 'trim|required');
	$this->form_validation->set_rules('creacion', 'creacion', 'trim|required');
	$this->form_validation->set_rules('letra', 'letra', 'trim|required');
	$this->form_validation->set_rules('ruta_video', 'ruta video', 'trim');
	//$this->form_validation->set_rules('ruta_audio', 'ruta video', 'trim');
	

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "cancion.xls";
        $judul = "cancion";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nombre");
	xlsWriteLabel($tablehead, $kolomhead++, "Url");
	xlsWriteLabel($tablehead, $kolomhead++, "Tipo");
	xlsWriteLabel($tablehead, $kolomhead++, "Tamanio");
	xlsWriteLabel($tablehead, $kolomhead++, "Autor");
	xlsWriteLabel($tablehead, $kolomhead++, "Genero");
	xlsWriteLabel($tablehead, $kolomhead++, "Album");
	xlsWriteLabel($tablehead, $kolomhead++, "Creacion");
	xlsWriteLabel($tablehead, $kolomhead++, "Letra");
	xlsWriteLabel($tablehead, $kolomhead++, "Ruta Video");
	xlsWriteLabel($tablehead, $kolomhead++, "Ruta Audio");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");

	foreach ($this->Cancion_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nombre);
	    xlsWriteLabel($tablebody, $kolombody++, $data->url);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tamanio);
	    xlsWriteLabel($tablebody, $kolombody++, $data->autor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->genero);
	    xlsWriteLabel($tablebody, $kolombody++, $data->album);
	    xlsWriteLabel($tablebody, $kolombody++, $data->creacion);
	    xlsWriteLabel($tablebody, $kolombody++, $data->letra);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ruta_video);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ruta_audio);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Cancion.php */
/* Location: ./application/controllers/Cancion.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-04 20:21:04 */
/* http://harviacode.com */