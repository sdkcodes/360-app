<?php 

class Staff_model extends CI_Model{

	function __construct()
	{	
		parent::__construct();
		$this->load->database();
	}

	public function insertNewLand($data){
		$this->db->insert("land", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}

	public function insertNewClient($data){
		$this->db->insert("user", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}

	public function insertNewPayment($data){
		$this->db->insert("payment", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}

	public function getAllLands(){
		return $this->db->get("land")->result();
	}

	public function getLandsByClient($clientId=""){
		$this->db->where('bought_by', $clientId);
		return $this->db->get("land")->result();
	}
	public function getAllClients($daysRange=7){
		$this->db->where("role", 3);
		$this->db->having("DATEDIFF(NOW(), created_at) < ", $daysRange);
		return $this->db->get("user")->result();
	}

	public function getLandPrice($landId){
		$this->db->where("land.uniqueId", $landId);
		//$this->db->join("payment", "payment.payment_for = land.uniqueId");
		$this->db->select("land.*");
		//$this->db->select("payment.*");
		return $this->db->get("land")->row();
	}

	public function getPreviousPayment($landId){
		$this->db->where("land.uniqueId", $landId);
		$this->db->join("payment", "payment.payment_for = land.uniqueId");
		$this->db->select("SUM(payment.amount) AS previousPayment");
		$this->db->select("land.*");
		$this->db->select("payment.*");
		//$this->db->limit(1);
		$result = $this->db->get("land");
		//return $result->result();
		return ($result->num_rows() > 0) ? $result->row()->previousPayment : "";
	}

	public function saveDocument($data){
		$this->db->insert("document", $data);
		if ($this->db->affected_rows() > 0){
			return TRUE;
		}
	}
}