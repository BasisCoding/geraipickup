<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Gerai extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('MasterModel');
		}
	
		public function index()
		{
			$def['title'] = 'Data Gerai | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('admin/data_gerai');
			$this->load->view('partials/footer');
			$this->load->view('plugins/admin/data_gerai');
		}

		public function get_gerai()
		{
			$html = '';
			$status = '';
			$get = $this->MasterModel->data_gerai();
			foreach ($get as $gt) {

				if ($gt->status > 0) {
					$status = 'Aktif';
				}else{
					$status = 'Tidak Aktif';
				}
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->username.'</td>
							<td>'.$gt->nama_gerai.'</td>
							<td>'.$gt->nama_lengkap.'</td>
							<td>'.$gt->email.'</td>
							<td>'.$gt->hp.'</td>
							<td>'.substr($gt->alamat, 0, 20).'... </td>
							<td>'.$gt->lat.', '.$gt->long.'</td>
							<td>'.$status.'</td>
							<td class="text-center">
                                <button class="btn btn-default btn-sm update-data" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-namagerai="'.$gt->nama_gerai.'"  
                                	data-namapemilik="'.$gt->nama_lengkap.'"  
                                	data-email="'.$gt->email.'"  
                                	data-hp="'.$gt->hp.'"  
                                	data-prov="'.$gt->prov.'"  
                                	data-kota="'.$gt->kota.'"  
                                	data-kec="'.$gt->kec.'"  
                                	data-telepon="'.$gt->telepon.'"  
                                	data-alamat="'.$gt->alamat.'"  
                                	data-lat="'.$gt->lat.'"  
                                	data-long="'.$gt->long.'"  
                                	data-status="'.$gt->status.'"
                                ><span class="fa fa-pencil"></span></button>
                                
                                <button class="btn btn-danger delete-data btn-sm" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-namagerai="'.$gt->nama_gerai.'"
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

		public function add_gerai()
		{
			$this->load->library('Mailer');
		    $email_penerima = $this->input->post('email');
		    $username		= $this->input->post('username');
		    $nama_lengkap	= $this->input->post('nama_lengkap');
		    $nama_gerai		= $this->input->post('nama_gerai');
		    $hp				= $this->input->post('hp');
		    $prov			= $this->input->post('prov');
		    $kota			= $this->input->post('kota');
		    $kec			= $this->input->post('kec');
		    $telepon		= $this->input->post('telepon');
		    $alamat			= $this->input->post('alamat');
		    $lat			= $this->input->post('lat');
		    $long			= $this->input->post('long');
		    $created_at		= date('Y-m-d');
		    $created_by		= $this->session->userdata('id');
		    $password		= $this->password(5);
		    $subjek = 'Pendaftaran Gerai';
		    $pesan = 'Terima Kasih Sudah Mendaftar';
		    $data = array(
		    	'pesan' => $pesan,
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'nama_gerai' => $nama_gerai,
		    	'hp' => $hp,
		    	'telepon' => $telepon,
		    	'alamat' => $alamat,
		    	'lat' => $lat,
		    	'long' => $long,
		    	'password'	=> $password
		    );

		    $data_insert = array(
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'nama_gerai' => $nama_gerai,
		    	'hp' => $hp,
		    	'telepon' => $telepon,
		    	'alamat' => $alamat,
		    	'lat' => $lat,
		    	'prov' => $prov,
		    	'kota' => $kota,
		    	'kec' => $kec,
		    	'long' => $long,
		    	'password'	=> hash('sha512', $password.config_item('encryption_key')),
		    	'level'	=> 3,
		    	'status'	=> 1,
		    	'created_at'	=> $created_at,
		    	'created_by'	=> $created_by
		    );

		    $content = $this->load->view('message', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
		    $sendmail = array(
		      'email_penerima'=>$email_penerima,
		      'subjek'=>$subjek,
		      'content'=>$content,
		    );
		    $table = 'gerai';
		    $validasi = $this->MasterModel->validasi($username, $email_penerima, $table);
		    if ($validasi->num_rows() > 0) {
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Email Atau Username Sudah Tersedia',
		    	];
		    }else{
			    $insert = $this->MasterModel->add_gerai($data_insert);
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
		
		public function update_gerai()
		{
		    $username		= $this->input->post('username_update');
		    $nama_lengkap	= $this->input->post('nama_lengkap_update');
		    $nama_gerai		= $this->input->post('nama_gerai_update');
		    $hp				= $this->input->post('hp_update'); 
		    $password		= hash('sha512', $this->input->post('password_update').config_item('encryption_key'));
		    $telepon		= $this->input->post('telepon_update');
		    $alamat			= $this->input->post('alamat_update');
		    $prov			= $this->input->post('prov_update');
		    $kota			= $this->input->post('kota_update');
		    $kec			= $this->input->post('kec_update');
		    $lat			= $this->input->post('lat_update');
		    $long			= $this->input->post('long_update');
		    $created_at		= date('Y-m-d H:i:s');
		    $created_by		= $this->session->userdata('id');

		    $data = array(
		    	'nama_lengkap' => $nama_lengkap,
		    	'nama_gerai' => $nama_gerai,
		    	'hp' => $hp,
		    	'password' => $password,
		    	'telepon' => $telepon,
		    	'alamat' => $alamat,
		    	'lat' => $lat,
		    	'prov' => $prov,
		    	'kota' => $kota,
		    	'kec' => $kec,
		    	'long' => $long,
		    	'created_at'	=> $created_at,
		    	'created_by'	=> $created_by
		    );

		    $update = $this->MasterModel->update_gerai($username, $data);
		    if ($update) {
		    	$response = [
		    	    'status' => 'Success',
		    	    'message' => 'Data Berhasil Diubah',
		    	];
		    }else{
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Data Gagal Diubah',
		    	];
		    }

		    echo json_encode($response);
		}

		public function delete_gerai()
		{
			$id = $this->input->get('id');

			$proses = $this->MasterModel->delete_gerai($id);

			if ($proses) {
		    	$response = [
		    	    'status' => 'Success',
		    	    'message' => 'Data Berhasil Dihapus',
		    	];
		    }else{
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Data Gagal Dihapus',
		    	];
		    }

		    echo json_encode($response);
		}
	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>