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
			$this->load->view('pimpinan/data_gerai');
			$this->load->view('partials/footer');
			$this->load->view('plugins/pimpinan/data_gerai');
		}

		public function get_gerai()
		{
			$html = '';
			$status = '';
			$get = $this->MasterModel->data_gerai();
			foreach ($get as $gt) {

				if ($gt->status > 0) {
					$status = 'Aktif';
					$button = '<button class="btn btn-danger non-approve-data btn-sm" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-namagerai="'.$gt->nama_gerai.'"
                                ><span class="fa fa-times"></span></button>';
				}else{
					$status = 'Tidak Aktif';
					$button = '<button class="btn btn-success approve-data btn-sm" 
                                	data-id="'.$gt->id.'"
                                	data-username="'.$gt->username.'"  
                                	data-namagerai="'.$gt->nama_gerai.'"
                                ><span class="fa fa-check"></span></button>';
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
							<td class="text-center">'.$button.'</td>
						</tr>';
			}
			echo $html;
		}

		public function update_gerai()
		{
		    $username= $this->input->get('username');
		    $check = $this->MasterModel->get_status($username)->status;
		    if ($check == 1) {
		    	$status = 0;
		    }else{
		    	$status = 1;
		    }

		    $data = array(
		    	'status' => $status
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

	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>