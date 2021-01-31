<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Pickup extends CI_Controller {
	
		public function permintaan_pickup()
		{
			$def['title'] = 'Permintaan Pickup | Gerai PickUp Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('admin/permintaan_pickup');
			$this->load->view('partials/footer');
			$this->load->view('plugins/admin/permintaan_pickup');
		}
	
	}
	
	/* End of file Pickup.php */
	/* Location: ./application/controllers/admin/Pickup.php */
?>