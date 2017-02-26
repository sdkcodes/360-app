<?php 

class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insertNewStaff($data){
		$this->db->insert("user", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}

	public function deleteStaff($staffId){
		$this->db->where('id', $staffId);
		$this->db->delete("user");
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}
}