<?php

class Client_model extends CI_Model{
	function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function getAllClients($daysRange=7){
		$this->db->where("role", 3);
		//$this->db->having("DATEDIFF(NOW(), created_at) < ", $daysRange);
		return $this->db->get("user")->result();
	}

	public function countClients(){
		$this->db->where("role", 3);
		return $this->db->count_all_results("user");
	}

	public function getDocuments($clientId){
		$this->db->where("ownerId", $clientId);
		return $this->db->get("document")->result();
	}
}