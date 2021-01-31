<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function insert($data)
		{
			$this->db->insert('users', $data);
		}

		function login_admin($username, $password)
		{
			$this->db->select('*');
			$this->db->from('admin');
			$this->db->join('users_group', 'users_group.level = admin.level', 'left');
			$this->db->where('admin.username', $username);
			$this->db->where('admin.password', $password);
			$this->db->where('admin.status', 1);
			$this->db->limit(1);
			return $this->db->get();
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>