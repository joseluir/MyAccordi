<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

		/***************************************************************************
		* Este es el controlador que maneja la accion que tendra el usuario al     *
		* ingresar a la aplicacion, es decir este contralodor es el primero en     *
		* realizar acciones                                    @_@                 *
		****************************************************************************/
class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		/***************************************************************************
		* se verifica si el usuario que esta ingresando a la aplicacion ya tiene   *
		* una sesion iniciada                                        @_@           *
		****************************************************************************/
		if (!$this->tank_auth->is_logged_in()) {
			
			/***************************************************************************
			* De no haber inicado sesion se le despliega la bara de navegacion y el    *
			* contenido destinado para usuaios anonimos                  @_@           *
			****************************************************************************/
		
				
			$header['titulo'] = 'Inicio';
			
			$this->load->view('templates/headerUnregistered',$header);
			$this->load->view('welcome');
			$this->load->view('templates/footer');
		
		} else {
		/***************************************************************************
		*  De ya haber iniciado sesion mediante los metodos get() que estan dentro *
		* la libreria Tank_aut.php se obtiene algunos datos del usuario y luego    *
		* se le despliega la bara de navegacion y el contenido destinado para      *
		* usuaios registrados con sesion iniciada              @_@                 *
		****************************************************************************/
			$type_user = $this->tank_auth->get_rol_id();
			
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
			$data['name']	= $this->tank_auth->get_name();
			$header['username'] = $this->tank_auth->get_username();

			if($type_user == 1){
			
				$header['titulo'] = 'Inicio';
					
				$this->load->view('templates/headerRegistered',$header);
				$this->load->view('welcome', $data);
				$this->load->view('templates/footer');
			
			}else{
				
				$header['titulo'] = 'Inicio';
							
				$this->load->view('templates/headerAdmin',$header);
				$this->load->view('welcome', $data);
				$this->load->view('templates/footer');
			}
			
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
