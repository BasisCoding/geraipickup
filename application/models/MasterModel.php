<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
		function data_gerai()
		{
			return $this->db->get('gerai')->result();
		}

		function add_gerai($data)
		{
			$this->db->insert('gerai', $data);
		}
	
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>