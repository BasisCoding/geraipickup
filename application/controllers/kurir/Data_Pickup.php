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
			$this->load->view('kurir/data_pickup');
			$this->load->view('partials/footer');
			$this->load->view('plugins/kurir/data_pickup');			
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
			$id_kurir = $this->session->userdata('id');

			$get = $this->GeraiModel->get_pickup_from_kurir($id_kurir);
			foreach ($get as $gt) {

				if ($gt->status_pickup == 0) {
					$status = '<button class="btn btn-sm btn-warning siap_pickup" data-kode="'.$gt->kode_pickup.'" data-nama="'.$gt->nama_gerai.'">Siap Pickup</button>';
				}if ($gt->status_pickup == 1) {
					$status = '<button class="btn btn-sm btn-primary selesai_pickup" data-kode="'.$gt->kode_pickup.'" data-nama="'.$gt->nama_gerai.'">Selesai Pickup</button>';
				}if ($gt->status_pickup == 2) {
					$status = '<span class="badge badge-sm badge-danger">Menunggu Gerai Validasi</span>';
				}if ($gt->status_pickup == 3) {
					$status = '<span class="badge badge-sm badge-primary">Selesai</span>';
				}
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->kode_pickup.'</td>
							<td>'.$gt->nama_gerai.'</td>
							<td>'.$gt->hp.'</td>
							<td>'.$gt->jenis_paket.'</td>
							<td>'.$gt->jumlah_paket.'</td>
							<td>'.$gt->alamat.'</td>
							<td>'.$status.'</td>
						</tr>';
			}
			echo $html;
		}

		public function siap_pickup()
		{
			$kode = $this->input->get('kode_pickup');
			$nama_gerai = $this->input->get('nama_gerai');
			$data['tgl_pickup'] = $this->input->get('tgl_pickup');
			$data['status_pickup'] = 1;

			$pre = $this->GeraiModel->ubah_status_pickup($kode, $data);
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

		public function selesai_pickup()
		{
			$kode = $this->input->get('kode_pickup');
			$data['status_pickup'] = 2;

			$pre = $this->GeraiModel->ubah_status_pickup($kode, $data);
			if ($pre) {
		    	$response = [
		    	    'status' => 'Success',
		    	    'message' => 'Pickup Berhasil, Silahkan Tunggu Gerai Konfirmasi',
		    	];
		    }else{
		    	$response = [
		    	    'status' => 'Error',
		    	    'message' => 'Pickup Gagal',
		    	];
		    }

		    echo json_encode($response);
		}

	}
	
	/* End of file Data_Pickup.php */
	/* Location: ./application/controllers/gerai/Data_Pickup.php */
?>