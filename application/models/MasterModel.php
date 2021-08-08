<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MasterModel extends CI_Model {
	
	// Data Gerai
		function data_gerai()
		{
			return $this->db->get('gerai')->result();
		}

		function get_status($username, $table)
		{
			return $this->db->get_where($table, array('username' => $username))->row();
		}

		function validasi($username, $email, $table)
		{
			$this->db->select('username, email');
			$this->db->from($table);
			$this->db->where('username', $username);
			$this->db->or_where('email', $email);
			return $this->db->get();
		}

		function add_gerai($data)
		{
			return $this->db->insert('gerai', $data);
		}

		function update_gerai($username, $data)
		{
			return $this->db->update('gerai', $data, array('username' => $username));
		}

		function delete_gerai($id)
		{
			return $this->db->delete('gerai', array('id' => $id));
		}

	// Data Gerai

	// Data Kurir
		function data_kurir()
		{
			return $this->db->get('kurir')->result();
		}

		function add_kurir($data)
		{
			return $this->db->insert('kurir', $data);
		}

		function update_kurir($username, $data)
		{
			return $this->db->update('kurir', $data, array('username' => $username));
		}

		function delete_kurir($id)
		{
			return $this->db->delete('kurir', array('id' => $id));
		}
	// Data Kurir
	}
	
	/* End of file MasterModel.php */
	/* Location: ./application/models/MasterModel.php */
?>