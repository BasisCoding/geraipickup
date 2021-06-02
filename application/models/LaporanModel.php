<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LaporanModel extends CI_Model {
	
		function get_gerai()
		{
			$this->db->select('*');
			$this->db->from('gerai');
			return $this->db->get();
		}

		function get_pickup($id_gerai)
		{
			$this->db->select('*, kurir.nama_lengkap as nama_kurir');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');	
			$this->db->join('kurir', 'kurir.id = pickup.id_kurir', 'left');
			$this->db->from('pickup');
			$this->db->where('id_gerai', $id_gerai);
			
			return $this->db->get();
		}
	
	}
	
	/* End of file LaporanModel.php */
	/* Location: ./application/models/LaporanModel.php */
?>