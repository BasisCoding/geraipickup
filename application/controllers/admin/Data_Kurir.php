<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Kurir extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function index()
		{
			$def['title'] = 'Data Kurir | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('admin/data_kurir');
			$this->load->view('partials/footer');
			$this->load->view('plugins/admin/data_kurir');
		}

		public function get_kurir()
		{
			$html = '';
			$status = '';
			$get = $this->MasterModel->data_kurir();
			foreach ($get as $gt) {

				if ($gt->status > 0) {
					$status = 'Aktif';
				}else{
					$status = 'Tidak Aktif';
				}
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->username.'</td>
							<td>'.$gt->email.'</td>
							<td>'.$gt->nama_lengkap.'</td>
							<td>'.$gt->hp.'</td>
							<td>'.$gt->wilayah.'</td>
							<td>'.$status.'</td>
							<td class="text-center">
                                <button class="btn btn-default btn-sm update-data" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-nama_lengkap="'.$gt->nama_lengkap.'"  
                                	data-email="'.$gt->email.'"  
                                	data-hp="'.$gt->hp.'"  
                                	data-wilayah="'.$gt->wilayah.'" 
                                	data-status="'.$gt->status.'"
                                ><span class="fa fa-pencil"></span></button>
                                
                                <button class="btn btn-danger delete-data btn-sm" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-nama_lengkap="'.$gt->nama_lengkap.'"
                                ><span class="fa fa-times"></span></button>
                            </td>
						</tr>';
			}
			echo $html;
		}
		
		public function password($length)
		{
			$str = '';
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}

			return $str;
		}

		public function add_kurir()
		{
			$this->load->library('Mailer');
		    $email_penerima = $this->input->post('email');
		    $username		= $this->input->post('username');
		    $nama_lengkap	= $this->input->post('nama_lengkap');
		    $hp				= $this->input->post('hp');
		    $prov			= $this->input->post('prov');
		    $kota			= $this->input->post('kota');
		    $kec			= $this->input->post('kec');
		    $created_at		= date('Y-m-d');
		    $created_by		= $this->session->userdata('id');
		    $password		= $this->password(5);
		    $subjek = 'Pendaftaran Kurir Pickup';
		    $pesan = 'Selamat Bergabung Dengan Agen Pickup Kami';
		    $data = array(
		    	'pesan' => $pesan,
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'hp' => $hp,
		    	'password'	=> $password
		    );

		    $data_insert = array(
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'hp' => $hp,
		    	'prov' => $prov,
		    	'kota' => $kota,
		    	'kec' => $kec,
		    	'password'	=> $password,
		    	'status'	=> 1,
		    	'created_at'	=> $created_at,
		    	'created_by'	=> $created_by
		    );

		    $content = $this->load->view('message_kurir', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
		    $sendmail = array(
		      'email_penerima'=>$email_penerima,
		      'subjek'=>$subjek,
		      'content'=>$content,
		    );

		    $table = 'kurir';
		    $validasi = $this->MasterModel->validasi($username, $email_penerima, $table);
		    if ($validasi->num_rows() > 0) {
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Email Atau Username Sudah Tersedia',
		    	];
		    }else{
			    $insert = $this->MasterModel->add_kurir($data_insert);
			    $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
			    
			    if ($send) {
			    	$response = [
			    	    'status' => 'Success',
			    	    'message' => 'Data Berhasil Di Simpan',
			    	];
			    }
		    }		    

		    echo json_encode($response);
		}
	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>