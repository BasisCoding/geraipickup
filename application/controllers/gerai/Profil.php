<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Profil extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('GeraiModel');
		}
	
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

		public function get_profil()
		{
			$id = $this->session->userdata('id');
			$get = $this->GeraiModel->get_by_id($id);
			
			$data = array(
				'username' => $get['username'],
				'email' => $get['email'],
				'nama_gerai' => $get['nama_gerai'],
				'nama_lengkap' =>$get['nama_lengkap'],
				'hp' => $get['hp'],
				'telepon' => $get['telepon'],
				'alamat' => $get['alamat'],
				'prov' => $get['prov'],
				'kota' => $get['kota'],
				'kec' => $get['kec'],
				'lat' => $get['lat'],
				'long' => $get['long'],
			);

			echo json_encode($data);
		}
	
	}
	
	/* End of file Profile.php */
	/* Location: ./application/controllers/gerai/Profile.php */
?>