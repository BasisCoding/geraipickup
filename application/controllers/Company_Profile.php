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

		public function saveProfile()
		{
			$config['upload_path'] = './assets/img/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = '1024';
	        $config['overwrite'] = true;
	        $config['file_name'] = 'logo-square.png';
	        $this->load->library('upload', $config);

	        if($this->upload->do_upload("logo")){
				$logo = $this->upload->file_name;
			} else {
				$logo = 'logo-square.png';
			}

			$data = array(
	 			'nama_perusahaan' 			=> $this->input->post('nama_perusahaan'),
	 			'jenis_perusahaan' 			=> $this->input->post('jenis_perusahaan'),
	 			'nama_direktur' 			=> $this->input->post('nama_direktur'),
	 			'email' 					=> $this->input->post('email'),
	 			'telepon' 					=> $this->input->post('telepon'),
	 			'alamat' 					=> $this->input->post('alamat'),
	 			'tgl_pendirian' 			=> $this->input->post('tgl_pendirian'),
	 			'jumlah_karyawan' 			=> $this->input->post('jumlah_karyawan'),
	 			'tgl_pendirian' 			=> $this->input->post('tgl_pendirian'),
	 			'status' 					=> $this->input->post('status'),
	 			
	 			'update_at' 				=> date('Y-m-d H:i:s'),
	 			'logo' 						=> $logo
				);

			$data = $this->ProfileModel->update($data);
			$response = array(
				'status' => 'success',
				'title' => 'SUKSES !!!',
				'message' => 'Data Berhasil Di Simpan',
			 );

			echo json_encode($response);
		}
	
	}
	
	/* End of file Company_Profile.php */
	/* Location: ./application/controllers/Company_Profile.php */
?>