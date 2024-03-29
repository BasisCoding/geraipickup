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
				}if ($gt->status_pickup == 1) {
					$status = '<span class="badge badge-sm badge-warning">Siap Pickup</span>';
				}if ($gt->status_pickup == 2) {
					$status = '<button class="btn btn-sm btn-primary konfirmasi_selesai" data-kode="'.$gt->kode_pickup.'">Konfirmasi Pickup</button>';
				}if ($gt->status_pickup == 3) {
					$status = '<span class="badge badge-sm badge-primary">Selesai</span>';
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

		public function konfirmasi_selesai()
		{
			$kode = $this->input->get('kode_pickup');
			$data['status_pickup'] = 3;

			$pre = $this->GeraiModel->ubah_status_pickup($kode, $data);
			if ($pre) {
		    	$response = [
		    	    'status' => 'Success',
		    	    'message' => 'Konfirmasi Selesai, Terima Kasih Sudah Menggunakan Jasa Pickup Kami.',
		    	];
		    }else{
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Konfirmasi Belum Selesai',
		    	];
		    }

		    echo json_encode($response);
		}
	
	}
	
	/* End of file Data_Pickup.php */
	/* Location: ./application/controllers/gerai/Data_Pickup.php */
?>