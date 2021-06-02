<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class DashboardModel extends CI_Model {
	
		function total_gerai()
		{
			$this->db->from('gerai');
			return $this->db->count_all_results();
		}

		function total_kurir()
		{
			$this->db->from('kurir');
			return $this->db->count_all_results();
		}

		function total_pickup()
		{
			$this->db->from('pickup');
			return $this->db->count_all_results();
		}

		function belum_pickup()
		{
			$this->db->from('pickup');
			$this->db->where('status_pickup', 0);
			return $this->db->count_all_results();
		}

		function proses_pickup()
		{
			$this->db->from('pickup');
			$this->db->where('status_pickup', 1);
			return $this->db->count_all_results();
		}

		function validasi_gerai()
		{
			$this->db->from('pickup');
			$this->db->where('status_pickup', 2);
			return $this->db->count_all_results();
		}

		function selesai()
		{
			$this->db->from('pickup');
			$this->db->where('status_pickup', 3);
			return $this->db->count_all_results();
		}
	
	}
	
	/* End of file DashboardModel.php */
	/* Location: ./application/models/DashboardModel.php */
?>