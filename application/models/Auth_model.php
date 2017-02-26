<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function checkEmail($email){
		$this->db->where("email", $email);
		$result = $this->db->get("user");
		if ($result->num_rows() === 1){
			return $result->row();
		}
	}

	public function accountExists($email, $password){

	}

	public function getAccountType($email){
		$this->db->where("email", $email);
		$result = $this->db->get("user");
		if ($result->num_rows() === 1){
			return $result->row()->role;
		}
	}

	public function insert($data){
		$this->db->insert("user", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}
}