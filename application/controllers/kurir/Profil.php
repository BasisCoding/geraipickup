<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('KurirModel');
		}
	
		public function index()
		{
			$def['title'] = 'Profil | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('kurir/profil');
			$this->load->view('partials/footer');
			$this->load->view('plugins/kurir/profil');
		}

		public function get_profil()
		{
			$id = $this->session->userdata('id');
			$get = $this->KurirModel->get_by_id($id);

			$data = array(
				'username' => $get['username'],
				'email' => $get['email'],
				'nama_lengkap' =>$get['nama_lengkap'],
				'hp' => $get['hp'],
				'prov' => $get['prov'],
				'kota' => $get['kota'],
				'kec' => $get['kec'],
			);

			echo json_encode($data);
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/gerai/Profile.php */
?>