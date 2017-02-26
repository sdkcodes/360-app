<?php 

class Payments extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('payment_model');
	}

	public function ongoing(){
		
		$from = $this->session->userdata("user_type");
		
		$payments = $this->payment_model->getUnCompletedPayments();
		$fromArray = array(1 => "admin", 2 => "staff");
		$data['payments'] = $payments;
		$data['title'] = "View Payments";
		$data['page_alias'] = "Ongoing Payments";
		$this->load->view($fromArray[$from] . "/layout/header", $data);
		$this->load->view($fromArray[$from] ."/layout/nav");
		$this->load->view("common/payments", $data);
		$this->load->view($fromArray[$from] ."/layout/footer");
	}

	public function completed(){
		
		$from = $this->session->userdata("user_type");
		
		$payments = $this->payment_model->getCompletedPayments();
		$fromArray = array(1 => "admin", 2 => "staff");
		$data['payments'] = $payments;
		$data['title'] = "View Payments";
		$data['page_alias'] = "Completed Payments";
		$this->load->view($fromArray[$from] . "/layout/header", $data);
		$this->load->view($fromArray[$from] ."/layout/nav");
		$this->load->view("common/payments", $data);
		$this->load->view($fromArray[$from] ."/layout/footer");	
	}
}