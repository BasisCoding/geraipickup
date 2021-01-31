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
	
	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>