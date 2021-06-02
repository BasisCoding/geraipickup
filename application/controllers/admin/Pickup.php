<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pickup extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('PickupModel');
		}
	
		public function data_pickup_admin()
		{
			$def['title'] = 'Daftar Pickup | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('admin/pickup');
			$this->load->view('partials/footer');
			$this->load->view('plugins/admin/data_pickup');
		}

		public function get_pickup()
		{
			$html = '';
			$status = '';

			if ($this->input->post('filter') != '') {
				$sStatus = $this->input->post('filter');
			}else{
				$sStatus = '';
			}

			$get = $this->PickupModel->get_pickup($sStatus);
			foreach ($get->result() as $gt) {

				if ($gt->status_pickup == 0) {
					$status = '<span class="badge badge-sm badge-primary">Belum Pickup</span>';
				}if ($gt->status_pickup == 1) {
					$status = '<span class="badge badge-sm badge-warning">Proses Pickup</span>';
				}if ($gt->status_pickup == 2) {
					$status = '<span class="badge badge-sm badge-danger">Proses Validasi</span>';
				}if ($gt->status_pickup == 3) {
					$status = '<span class="badge badge-sm badge-success">Selesai</span>';
				}
				
				$html .= '<tr role="row" class="odd">
							<td>'.$gt->kode_pickup.'</td>
							<td>'.$gt->nama_gerai.'</td>
							<td>'.$gt->nama_kurir.'</td>
							<td>'.$gt->tgl_pickup.'</td>
							<td>'.$gt->jenis_paket.'</td>
							<td>'.$gt->jumlah_paket.'</td>
							<td>'.$gt->alamat.'</td>
							<td>'.$status.'</td>
						</tr>';
			}
			echo $html;
		}
	
	}
	
	/* End of file Pickup.php */
	/* Location: ./application/controllers/admin/Pickup.php */
?>