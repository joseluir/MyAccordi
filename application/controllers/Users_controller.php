<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

   /******************************************************************************************** 
    *  esta clase extiende de ACL que es una clase definida dentro del archivo MY_controller   *
    *  ubicado dentro de la carpeta core se trabaja de esta forma para que pueda heredar las   * 
    *  funciones de esa clase que tambien es un controlador             @_@                    *
	********************************************************************************************/

	/******************************************************************************************************************
	*  Este es el controlador que maneja las acciones que tendra el usuario administrador al momento de gestionar los *
	*  que esten registrados dentro de la aplicacion CRUD              @_@                                            *
	*******************************************************************************************************************/
class Users_controller extends ACL
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
		$this->load->config('tank_auth', TRUE);


    }
	
	/******************************************************************************************************************
	*  Funcion que trae de la base de datos todos los usuarios registrados en la aplicacion y los muestra en una tabla*
	*  con paginacion                                                  @_@                                            *
	*******************************************************************************************************************/
    public function index()
    {
    	if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
		
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
		        $users = $this->Users_model->get_all();
		
		        $data = array(
		            'users_data' => $users
		        );
				$header['titulo'] = 'Gestion de Usuarios';
				$header['username']	= $this->tank_auth->get_username();	
				$this->load->view('templates/headerAdmin',$header);
		        $this->load->view('users/users_list', $data);
			}
	    }
    }

	/******************************************************************************************************************
	*  Funcion que trae de la base de datos toda la informacion asociado a un usuario determinado  @_@    		      *
	*******************************************************************************************************************/
    public function read($id) 
    {
    	if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
			        $row = $this->Users_model->get_by_id($id);
			        if ($row) {
			            $data = array(
					'id' => $row->id,
					'avatar_name' => $row->avatar_name,
					'email' => $row->email,
					'password' => $row->password,
					'name' => $row->name,
					'last_name' => $row->last_name,
					'image' => $row->image,
					'rol_id' => $row->rol_id,
					'activated' => $row->activated,
					'banned' => $row->banned,
					'ban_reason' => $row->ban_reason,
					'new_password_key' => $row->new_password_key,
					'new_password_requested' => $row->new_password_requested,
					'new_email' => $row->new_email,
					'new_email_key' => $row->new_email_key,
					'last_ip' => $row->last_ip,
					'last_login' => $row->last_login,
					'created' => $row->created,
					'modified' => $row->modified,
				    );
						$header['titulo'] = 'Ver Usuario';
						$header['username']	= $this->tank_auth->get_username();	
						$this->load->view('templates/headerAdmin',$header);
			            $this->load->view('users/users_read', $data);
			        } else {
			            $this->session->set_flashdata('message', 'Usuario no encontrado');
			            redirect(site_url('users_controller'));
			        }
			 }
	    }
    }


	/******************************************************************************************************************
	*  Funcion que permite al administrador el registro de un nuevo usuario a la app           @_@                    *
	*******************************************************************************************************************/
	function register()
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
				$use_username = $this->config->item('use_username', 'tank_auth');
				if ($use_username) {
					$this->form_validation->set_rules('username', 'apodo', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
				}
				$this->form_validation->set_rules('email', 'correo', 'trim|required|xss_clean|valid_email');
				$this->form_validation->set_rules('password', 'contraseña', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
				$this->form_validation->set_rules('confirm_password', 'confirmar contraseña', 'trim|required|xss_clean|matches[password]');
	
				$this->form_validation->set_rules('name', 'nombres', 'trim|required|xss_clean|alpha_dash');
				$this->form_validation->set_rules('last_name', 'apellidos', 'trim|required|xss_clean|alpha_dash');
				
				$captcha_registration	= $this->config->item('captcha_registration', 'tank_auth');
				$use_recaptcha			= $this->config->item('use_recaptcha', 'tank_auth');
				if ($captcha_registration) {
					if ($use_recaptcha) {
						$this->form_validation->set_rules('recaptcha_response_field', 'código confirmación', 'trim|xss_clean|required|callback__check_recaptcha');
					} else {
						$this->form_validation->set_rules('captcha', 'código confirmación', 'trim|xss_clean|required|callback__check_captcha');
					}
				}
				$data['errors'] = array();
	
				$email_activation = $this->config->item('email_activation', 'tank_auth');
	
					
	
				if ($this->form_validation->run()) {	// validation ok
					
						if (!is_null($data = $this->tank_auth->create_user(
							$use_username ? $this->form_validation->set_value('username') : '',
							$this->form_validation->set_value('email'),
							$this->form_validation->set_value('password'),
							$this->form_validation->set_value('name'), 
							$this->form_validation->set_value('last_name'),
							$email_activation))) {									// success
	
						$data['site_name'] = $this->config->item('website_name', 'tank_auth');
	
						if ($email_activation) {									// send "activate" email
							$data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;
	
							$this->_send_email('activate', $data['email'], $data);
	
							unset($data['password']); // Clear password (just for any case)
	
							$this->_show_message($this->lang->line('auth_message_registration_completed_1'));
	
						} else {
							if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
	
								$this->_send_email('welcome', $data['email'], $data);
							}
							unset($data['password']); // Clear password (just for any case)
	
							$this->session->set_flashdata('message', 'Usuario creado correctamente');
	            			redirect(site_url('users_controller'));						
						}
	
					} else {
						$errors = $this->tank_auth->get_error_message();
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
				if ($captcha_registration) {
					if ($use_recaptcha) {
						$data['recaptcha_html'] = $this->_create_recaptcha();
					} else {
						$data['captcha_html'] = $this->_create_captcha();
					}
				}
	
				$header['titulo'] = 'Crear Usuario';
				$header['username']	= $this->tank_auth->get_username();	
				$data['captcha_registration'] = $captcha_registration;
				$data['use_recaptcha'] = $use_recaptcha;
				$data['use_username'] = $use_username;
				$this->load->view('templates/headerAdmin',$header);
				$this->load->view('users/create_form', $data);
			}
		}
	}
	
	
	/******************************************************************************************************************
	*  Funcion que despliega la vista para que el usario administrador pueda escoger el campo a actualizar para       *
	*  determinado usuario                                             @_@                                            *
	*******************************************************************************************************************/
    public function update($id) 
    {
    	if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
		        $row = $this->Users_model->get_by_id($id);
		
		        if ($row) {
		        $data = array(
		        'use_username' => $this->config->item('use_username', 'tank_auth'),
				'v_id' => set_value('id', $row->id),
				'v_username' => set_value('avatar_name', $row->avatar_name),
			    );
					$header['titulo'] = 'Actualizar Usuario';
					$header['username']	= $this->tank_auth->get_username();	
					$this->load->view('templates/headerAdmin',$header);
		            $this->load->view('users/users_form', $data);
		        } else {
		            $this->session->set_flashdata('message', 'Usuario no encontrado');
		            redirect(site_url('users_controller'));
		        }
		    }
		}
    }
    

	
	
	/******************************************************************************************************************
	*  Funcion que permite al usuario administrador cambiar la contraseña de un determinado usuario    @_@            *
	*******************************************************************************************************************/
	function update_password($id)
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
				$data['id'] = $id;
			
				$this->form_validation->set_rules('new_password', 'nueva contraseña', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
				$this->form_validation->set_rules('confirm_new_password', 'confirmar nueva contraseña', 'trim|required|xss_clean|matches[new_password]');
	
				$data['errors'] = array();
	
				if ($this->form_validation->run()) { // validation ok
					//encriptar contraseña
					$hasher = new PasswordHash(
						$this->config->item('phpass_hash_strength', 'tank_auth'),
						$this->config->item('phpass_hash_portable', 'tank_auth'));
					$hashed_password = $hasher->HashPassword($this->form_validation->set_value('new_password'));
					
					$update = array(
						'password' => $hashed_password,
					);
	
	            									
					if ($this->Users_model->update($id, $update)){	// success
						$this->session->set_flashdata('message', 'Contraseña actualizada correctamente');
	            		redirect(site_url('users_controller'));	
	
					} else {														// fail
						$errors = $this->tank_auth->get_error_message();
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
				$header['titulo'] = 'Actualizar Contraseña';
				$header['username']	= $this->tank_auth->get_username();	
				$this->load->view('templates/headerAdmin',$header);
				$this->load->view('users/update_password_form', $data);
			}
		}
	}


	/******************************************************************************************************************
	*  Funcion que permite al usuario administrador cambiar el correo electronico de un determinado usuario  @_@      *
	*******************************************************************************************************************/
	function update_email($id)
	{
		if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
				$data['id'] = $id;
			
				$this->form_validation->set_rules('email', 'nuevo correo', 'trim|required|xss_clean|valid_email');
	
				$data['errors'] = array();
				
				if ($this->form_validation->run()) {								// validation ok
				
					// valida que el nuevo correo no se encuentre ya en la base de datos
					if ($this->tank_auth->is_email_available($this->form_validation->set_value('email'))){			// success
	
						$update = array(
						'email' => $this->form_validation->set_value('email'),
						);
	
	    				if ($this->Users_model->update($id, $update)){	// success
						$this->session->set_flashdata('message', 'Correo actualizado correctamente');
	            		redirect(site_url('users_controller'));	
	            		}else{
	            			$errors = $this->tank_auth->get_error_message();
							foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
	            		}
						
					} else {
						$data['errors']['email'] = 'Correo actualmente en uso';
						}
				}
				$header['titulo'] = 'Actualizar Correo';
				$header['username']	= $this->tank_auth->get_username();	
				$this->load->view('templates/headerAdmin',$header);
				$this->load->view('users/update_email_form', $data);
			}
		}
	}
	
	
	
	/******************************************************************************************************************
	*  Funcion que permite al usuario administrador borrar a un determinado usuario de la app       @_@               *
	*******************************************************************************************************************/
    public function delete($id) 
    {
    	if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
		        $row = $this->Users_model->get_by_id($id);
		
		        if ($row) {
		            $this->Users_model->delete($id);
		            $this->session->set_flashdata('message', 'Usuario borrado correctamente');
		            redirect(site_url('users_controller'));
		        } else {
		            $this->session->set_flashdata('message', 'Usuario no encontrado');
		            redirect(site_url('users_controller'));
		        }
			}
		}
    }
	
	
	/******************************************************************************************************************
	*  Funcion que permite al usuario administrador exportar todos los datos de los usuarios de la app en un excel @_@*
	*******************************************************************************************************************/
    public function excel()
    {
		  if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');

		} else {
			$rol = $this->tank_auth->get_rol_id();
			  
			if($rol != '0'){
				redirect('/auth/login/');
			}else{
			    $this->load->helper('exportexcel');
		        $namaFile = "usuarios.xls";
		        $judul = "users";
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
				xlsWriteLabel($tablehead, $kolomhead++, "Apodo");
				xlsWriteLabel($tablehead, $kolomhead++, "Correo");
				xlsWriteLabel($tablehead, $kolomhead++, "Contraseña");
				xlsWriteLabel($tablehead, $kolomhead++, "Nombres");
				xlsWriteLabel($tablehead, $kolomhead++, "Apellidos");
				xlsWriteLabel($tablehead, $kolomhead++, "Imagen");
				xlsWriteLabel($tablehead, $kolomhead++, "Activado");
				xlsWriteLabel($tablehead, $kolomhead++, "Bloqueado");
				xlsWriteLabel($tablehead, $kolomhead++, "Razon de bloqueo");
				xlsWriteLabel($tablehead, $kolomhead++, "Nueva Llave de la Contraseña");
				xlsWriteLabel($tablehead, $kolomhead++, "Nueva Peticion de Contraseña");
				xlsWriteLabel($tablehead, $kolomhead++, "Nuevo Correo");
				xlsWriteLabel($tablehead, $kolomhead++, "Nueva Llave Del Correo");
				xlsWriteLabel($tablehead, $kolomhead++, "Ultima IP");
				xlsWriteLabel($tablehead, $kolomhead++, "Ultimo Ingreso");
				xlsWriteLabel($tablehead, $kolomhead++, "Creado");
				xlsWriteLabel($tablehead, $kolomhead++, "Modificado");
		
				foreach ($this->Users_model->get_all() as $data) {
				     
				     if($data->rol_id == '0'){
				     	
				     }else{
							
				        $kolombody = 0;
				
				        //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
				        xlsWriteNumber($tablebody, $kolombody++, $nourut);
					    xlsWriteLabel($tablebody, $kolombody++, $data->avatar_name);
					    xlsWriteLabel($tablebody, $kolombody++, $data->email);
					    xlsWriteLabel($tablebody, $kolombody++, $data->password);
					    xlsWriteLabel($tablebody, $kolombody++, $data->name);
					    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
					    xlsWriteLabel($tablebody, $kolombody++, $data->image);
					    xlsWriteLabel($tablebody, $kolombody++, $data->activated);
					    xlsWriteLabel($tablebody, $kolombody++, $data->banned);
					    xlsWriteLabel($tablebody, $kolombody++, $data->ban_reason);
					    xlsWriteLabel($tablebody, $kolombody++, $data->new_password_key);
					    xlsWriteLabel($tablebody, $kolombody++, $data->new_password_requested);
					    xlsWriteLabel($tablebody, $kolombody++, $data->new_email);
					    xlsWriteLabel($tablebody, $kolombody++, $data->new_email_key);
					    xlsWriteLabel($tablebody, $kolombody++, $data->last_ip);
					    xlsWriteLabel($tablebody, $kolombody++, $data->last_login);
					    xlsWriteLabel($tablebody, $kolombody++, $data->created);
					    xlsWriteLabel($tablebody, $kolombody++, $data->modified);
				
					    $tablebody++;
			            $nourut++;
						
						}
			        }
		
		        xlsEOF();
		        exit();
		    }
		}
	}
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-06-04 20:39:46 */
/* http://harviacode.com */