<?php

class Payment_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getAllPayments(){
		$this->db->select("payment.*");
		$this->db->select("user.name AS paidBy");
		$this->db->select("CONCAT(land.quantity, ' ' ,land.location) As paymentFor");
		$this->db->select("user.email AS client_email");
		$this->db->join("land", "land.uniqueId = payment.payment_for");
		$this->db->join("user", "user.uniqueId = payment.paid_by");
		return $this->db->get("payment")->result();

	}

	public function countCompletedPayments(){
		$this->db->where("status", "balanced");
		return $this->db->count_all_results("payment");
		
	}

	public function countUncompletedPayments(){
		$this->db->where("status", "unbalanced");
		return $this->db->count_all_results("payment");
	}
	public function getCompletedPayments(){
		$this->db->select("payment.*");
		$this->db->select("user.name AS paidBy");
		$this->db->select("land.*");
		$this->db->select("CONCAT(land.quantity, ' ' ,land.location) As paymentFor");
		$this->db->select("user.email AS client_email");
		$this->db->join("land", "land.uniqueId = payment.payment_for");
		$this->db->join("user", "user.uniqueId = payment.paid_by");
		$this->db->where('payment.status', "balanced");
		return $this->db->get("payment")->result();		
	}
	public function getUnCompletedPayments(){
		$this->db->select("payment.*");
		$this->db->select("user.name AS paidBy");
		$this->db->select("land.*");
		$this->db->select("CONCAT(land.quantity, ' ' ,land.location) As paymentFor");
		$this->db->select("user.email AS client_email");
		$this->db->join("land", "land.uniqueId = payment.payment_for");
		$this->db->join("user", "user.uniqueId = payment.paid_by");
		$this->db->where('payment.status', "unbalanced");
		return $this->db->get("payment")->result();		
	}

}