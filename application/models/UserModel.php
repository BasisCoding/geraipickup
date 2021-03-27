<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function insert($data)
		{
			$this->db->insert('users', $data);
		}

		function login_admin($username, $password, $level)
		{
			$this->db->select('*');
			$this->db->from($level);
			$this->db->join('users_group', 'users_group.level = '.$level.'.level', 'left');
			$this->db->where($level.'.username', $username);
			$this->db->where($level.'.password', $password);
			$this->db->where($level.'.status', 1);
			$this->db->limit(1);
			return $this->db->get();
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>