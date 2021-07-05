<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LaporanModel extends CI_Model {
	
		function get_gerai()
		{
			$this->db->select('*');
			$this->db->from('gerai');
			return $this->db->get();
		}

		function get_pickup()
		{
			$this->db->select('pickup.*, kurir.nama_lengkap as nama_kurir, gerai.nama_gerai');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');	
			$this->db->join('kurir', 'kurir.id = pickup.id_kurir', 'left');
			if ($this->input->get('start_date') != NULL) {
				$this->db->group_start();
					$this->db->where('pickup.tgl_pickup >=', $this->input->get('start_date'));
					$this->db->where('pickup.tgl_pickup <=', $this->input->get('end_date'));
				$this->db->group_end();
			}
			$this->db->from('pickup');

			return $this->db->get();
		}

		function get_kurir()
		{
			$this->db->select('*');
			$this->db->from('kurir');
			return $this->db->get();
		}

		function get_pickup_kurir($id_kurir)
		{
			$this->db->select('*');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');
			$this->db->from('pickup');
			$this->db->where('id_kurir', $id_kurir);
			
			return $this->db->get();
		}

		function get_pickup_all()
		{
			$this->db->select('*, kurir.nama_lengkap as nama_kurir');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');	
			$this->db->join('kurir', 'kurir.id = pickup.id_kurir', 'left');
			$this->db->from('pickup');
			$this->db->order_by('status_pickup', 'asc');

			return $this->db->get();
		}
	
	}
	
	/* End of file LaporanModel.php */
	/* Location: ./application/models/LaporanModel.php */
?>