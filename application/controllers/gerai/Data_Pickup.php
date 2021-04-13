<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Pickup extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('GeraiModel');
		}
	
		public function index()
		{
			$def['title'] = 'Data Pickup | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('gerai/data_pickup');
			$this->load->view('partials/footer');
			$this->load->view('plugins/gerai/data_pickup');			
		}

		public function get_kode_pickup()
		{
			$kode = $this->GeraiModel->get_kode_pickup();
			echo json_encode($kode);
		}

		public function get_pickup()
		{
			$html = '';
			$status = '';
			$id_gerai = $this->session->userdata('id');

			$get = $this->GeraiModel->get_pickup_from_gerai($id_gerai);
			foreach ($get as $gt) {

				if ($gt->status_pickup == 0) {
					$status = 'Belum Siap';
				}
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->kode_pickup.'</td>
							<td>'.$gt->nama_kurir.'</td>
							<td>'.$gt->tgl_pickup.'</td>
							<td>'.$gt->jenis_paket.'</td>
							<td>'.$gt->jumlah_paket.'</td>
							<td>'.$status.'</td>
						</tr>';
			}
			echo $html;
		}

		public function add_pickup()
		{
			$data['kode_pickup'] = $this->input->post('kode_pickup');
			$data['id_gerai'] = $this->session->userdata('id');
			$data['jenis_paket'] = $this->input->post('jenis_paket');
			$data['jumlah_paket'] = $this->input->post('jumlah_paket');
			$data['status_pickup'] = 0;

			$data['id_kurir'] = $this->GeraiModel->pilih_kurir($data['id_gerai'])->id_kurir;

			$pre = $this->GeraiModel->add_pickup($data);

			if ($pre) {
		    	$response = [
		    	    'status' => 'Success',
		    	    'message' => 'Data Berhasil Simpan',
		    	];
		    }else{
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Data Gagal Simpan',
		    	];
		    }

		    echo json_encode($response);
		}
	
	}
	
	/* End of file Data_Pickup.php */
	/* Location: ./application/controllers/gerai/Data_Pickup.php */
?>