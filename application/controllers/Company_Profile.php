<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Company_Profile extends CI_Controller {
	
		public function index()
		{
			$def['title'] = ucfirst($this->session->userdata('link')).' | Profil Perusahaan';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('company_profile');
			$this->load->view('partials/footer');
			$this->load->view('plugins/admin/company_profile');
		}
	
	}
	
	/* End of file Company_Profile.php */
	/* Location: ./application/controllers/Company_Profile.php */
?>