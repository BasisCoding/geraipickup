<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Data_Kurir extends CI_Controller {
	
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
	
	}
	
	/* End of file Data_Gerai.php */
	/* Location: ./application/controllers/admin/Data_Gerai.php */
?>