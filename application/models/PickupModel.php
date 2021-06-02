<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class PickupModel extends CI_Model {
	
		function get_pickup($status)
		{
			$this->db->select('*, kurir.nama_lengkap as nama_kurir');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');	
			$this->db->join('kurir', 'kurir.id = pickup.id_kurir', 'left');
			$this->db->from('pickup');
			if ($status != '') {
				$this->db->where('status_pickup', $status);
			}
			return $this->db->get();
		}	
		
	}
	
	/* End of file PickupModel.php */
	/* Location: ./application/models/PickupModel.php */
?>