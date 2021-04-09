<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class GeraiModel extends CI_Model {
	
		function get_by_id($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			return $this->db->get('gerai')->row_array();
		}
	
	}
	
	/* End of file GeraiModel.php */
	/* Location: ./application/models/GeraiModel.php */
?>