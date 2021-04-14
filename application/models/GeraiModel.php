<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class GeraiModel extends CI_Model {

		function get_by_id($id)
		{
			$this->db->select('*');
			$this->db->where('id', $id);
			return $this->db->get('gerai')->row_array();
		}

		function get_kode_pickup()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(kode_pickup,4)) AS kd_max FROM pickup WHERE DATE(created_at)=CURDATE()");
	        $kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%04s", $tmp);
	            }
	        }else{
	            $kd = "0001";
	        }
	        date_default_timezone_set('Asia/Jakarta');
	        return date('dmy').$kd;
		}

		function get_pickup_from_gerai($id_gerai)
		{
			$this->db->select('pickup.*, kurir.nama_lengkap as nama_kurir');
			$this->db->join('kurir', 'kurir.id = pickup.id_kurir', 'left');	
			$this->db->where('id_gerai', $id_gerai);
			return $this->db->get('pickup')->result();
		}

		function add_pickup($data)
		{
			return $this->db->insert('pickup', $data);
		}

		function pilih_kurir($id_gerai)
		{
			$this->db->select('kurir.id as id_kurir, kurir.nama_lengkap as nama_kurir');
			$this->db->join('kurir', 'kurir.kec = gerai.kec', 'left');
			$this->db->from('gerai');
			$this->db->where('gerai.id', $id_gerai);
			return $this->db->get()->row();
		}

		function get_pickup_from_kurir($id_kurir)
		{
			$this->db->select('pickup.*, gerai.*');
			$this->db->join('gerai', 'gerai.id = pickup.id_gerai', 'left');	
			$this->db->where('id_kurir', $id_kurir);
			return $this->db->get('pickup')->result();
		}

		function ubah_status_pickup($kode, $data)
		{
			return $this->db->update('pickup', $data, array('kode_pickup' => $kode));
		}
	
	}
	
	/* End of file GeraiModel.php */
	/* Location: ./application/models/GeraiModel.php */
?>