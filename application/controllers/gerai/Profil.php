<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {
	
		public function index()
		{
			$def['title'] = 'Profil | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('gerai/profil');
			$this->load->view('partials/footer');
			$this->load->view('plugins/gerai/profil');
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/gerai/Profile.php */
?>