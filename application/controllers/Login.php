<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function proses_login()
		{
			$username 	= $this->input->post('username');
			$password 	= hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$level 		= $this->input->post('level'); 

			$result = $this->UserModel->login_admin($username, $password, $level);
			if ($result->num_rows() > 0) {
				foreach ($result->result() as $rs) {
					$data_session = array(
						'nama_lengkap'	=> $rs->nama_lengkap,
						'id'			=> $rs->id,
						'level'			=> $rs->level,
						'nama_akses'	=> $rs->nama_group,
						'link'			=> $rs->link,
						'status' 		=> "login"
					);

					$this->session->set_userdata($data_session);
				};
				$response = array(
					'status' => 'success',
					'message' => 'Anda Berhasil Login',
					'redirect' => base_url($this->session->userdata('link')),
					);
			}else{
				$response = array(
					'status' => 'warning',
					'message' => 'Username Atau Password yang anda masukan salah!',
					'redirect' => base_url('login')
					);
			};
			
			echo json_encode($response);
		}

		public function create_password()
		{
			$password 	= hash('sha512', 'kurir'.config_item('encryption_key'));
			echo $password;
		}
		
	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
?>