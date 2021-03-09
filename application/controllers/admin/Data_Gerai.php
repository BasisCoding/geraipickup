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
			$get = $this->MasterModel->data_gerai();
			foreach ($get as $gt) {
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->username.'</td>
							<td>'.$gt->nama_gerai.'</td>
							<td>'.$gt->nama_pemilik.'</td>
							<td>'.$gt->email.'</td>
							<td>'.$gt->hp.'</td>
							<td>'.$gt->alamat.'</td>
							<td>'.$gt->lat.', '.$gt->long.'</td>
							<td>'.date('d-m-Y H:m:s', strtotime($gt->created_at)).'</td>
							<td class="text-center">
                                <button class="btn btn-default btn-sm edit-data"><span class="fa fa-pencil"></span></button>
                                <button class="btn btn-danger delete-data btn-sm"><span class="fa fa-times"></span></button>
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
		    $nama_pemilik	= $this->input->post('nama_pemilik');
		    $nama_gerai		= $this->input->post('nama_gerai');
		    $hp				= $this->input->post('hp');
		    $telepon		= $this->input->post('telepon');
		    $alamat			= $this->input->post('alamat');
		    $lat			= $this->input->post('lat');
		    $long			= $this->input->post('long');
		    $password		= $this->password(5);
		    $subjek = 'Pendaftaran Gerai';
		    $pesan = 'Terima Kasih Sudah Mendaftar';
		    $data = array(
		    	'pesan' => $pesan,
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_pemilik' => $nama_pemilik,
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
		    	'nama_pemilik' => $nama_pemilik,
		    	'nama_gerai' => $nama_gerai,
		    	'hp' => $hp,
		    	'telepon' => $telepon,
		    	'alamat' => $alamat,
		    	'lat' => $lat,
		    	'long' => $long,
		    	'password'	=> $password
		    );

		    $content = $this->load->view('message', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
		    $sendmail = array(
		      'email_penerima'=>$email_penerima,
		      'subjek'=>$subjek,
		      'content'=>$content,
		    );
		    $insert = $this->MasterModel->add_gerai($data_insert);
		    $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		    // if(empty($attachment['name'])){ // Jika tanpa attachment
		    // }else{ // Jika dengan attachment
		    //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		    // }
		    if ($send) {
		    	$response = [
		    	    'status' => 'success',
		    	    'messsage' => 'Terima Kasih Sudah Mendaftar',
		    	];
		    }

		    echo json_encode($response);
		}
	
	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>