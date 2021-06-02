<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('DashboardModel');
		}
	
		public function index()
		{
			$def['title'] = 'Dashboard | Aplikasi Akuntansi Berbasis Web';
			
			$this->load->view('partials/head', $def);
			$this->load->view('partials/sidebar');
			$this->load->view('partials/navigation');
			$this->load->view('partials/breadcumb');
			$this->load->view('dashboard');
			$this->load->view('partials/footer');
			$this->load->view('plugins/dashboard');
		}

		public function get_dashboard()
		{
			$data['total_gerai'] 		= $this->DashboardModel->total_gerai();
			$data['total_kurir'] 		= $this->DashboardModel->total_kurir();
			$data['total_pickup'] 		= $this->DashboardModel->total_pickup();
			$data['belum_pickup'] 		= $this->DashboardModel->belum_pickup();
			$data['proses_pickup'] 		= $this->DashboardModel->proses_pickup();
			$data['validasi_gerai'] 	= $this->DashboardModel->validasi_gerai();
			$data['selesai_pickup'] 			= $this->DashboardModel->selesai();

			echo json_encode($data);
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/staff/Dashboard.php */
?>