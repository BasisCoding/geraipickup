<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
		function data_gerai()
		{
			return $this->db->get('gerai')->result();
		}

		function validasi($username, $email)
		{
			$this->db->select('username, email');
			$this->db->from('gerai');
			$this->db->where('username', $username);
			$this->db->or_where('email', $email);
			return $this->db->get();
		}

		function add_gerai($data)
		{
			$this->db->insert('gerai', $data);
		}

		function update_gerai($username, $data)
		{
			return $this->db->update('gerai', $data, array('username' => $username));
		}

		function delete_gerai($id)
		{
			return $this->db->delete('gerai', array('id' => $id));
		}
	
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>