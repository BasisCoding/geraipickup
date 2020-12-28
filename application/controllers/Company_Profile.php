<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Company_Profile extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('ProfileModel');
		}
	
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

		public function get_data()
		{
			$data = array();
			$get = $this->ProfileModel->get_data();

			foreach ($get as $gd) {
				$data = array(
					'nama_perusahaan' 	=> $gd->nama_perusahaan,
					'jenis_perusahaan' 	=> $gd->jenis_perusahaan,
					'nama_direktur' 	=> $gd->nama_direktur,
					'email' 			=> $gd->email,
					'telepon' 			=> $gd->telepon,
					'logo' 				=> base_url('assets/img/'.$gd->logo),
					'alamat' 			=> $gd->alamat,
					'tgl_pendirian' 	=> $gd->tgl_pendirian,
					'jumlah_karyawan' 	=> $gd->jumlah_karyawan,
					'status' 			=> $gd->status,
					'created_at' 		=> $gd->created_at,
					'update_at' 		=> $gd->update_at,
				);
			}

			echo json_encode($data);
		}
	
	}
	
	/* End of file Company_Profile.php */
	/* Location: ./application/controllers/Company_Profile.php */
?>