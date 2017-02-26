<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("account");
		$this->load->model('client_model');
		if (!is_staff() AND !is_admin()){
			echo "Uh oh! No access";
			exit();
		}
		if (!is_loggedin()){
			redirect(site_url("auth/login"));
		}
	}

	

	public function getAllClients_ajax(){
		$daysRange = $this->input->post('days');
		if ($daysRange != ""){
			$clients = $this->staff_model->getAllClients($daysRange);
		}
		else{
			$clients = $this->staff_model->getAllClients();
		}

			$table = "";
			foreach ($clients as $client) {
				$table.= "<tr>";
				$table.= "<td>" . $client->uniqueId . "</td>";
				$table.= "<td>" . $client->created_at . "</td>";
				$table.= "<td>" . $client->name . "</td>";
				$table.= "<td>" . $client->email . "</td>";
				$table.= "</tr>";
			}
			echo $table;
	}
	public function getAllClients(){
		
		$from = $this->session->userdata("user_type");
		
		$clients = $this->client_model->getAllClients();
		$fromArray = array(1 => "admin", 2=> "staff");
		$data['clients'] = $clients;
		$data['title'] = "Clients";
		
		
			$this->load->view($fromArray[$from] . '/layout/header', $data);
			$this->load->view($fromArray[$from] .'/layout/nav');
			$this->load->view('common/clients', $data);
			$this->load->view($fromArray[$from] .'/layout/footer');
		

	}

	public function viewDocs($clientId=""){
		
		$from = $this->session->userdata("user_type");
		$fromArray = array(1 => "admin", 2=> "staff");
		$data['documents'] = $this->client_model->getDocuments($clientId);
		
		$data['title'] = "View Documents";
		$this->load->view($fromArray[$from] . '/layout/header', $data);
		$this->load->view($fromArray[$from] .'/layout/nav');
		$this->load->view('common/viewdocuments', $data);
		$this->load->view($fromArray[$from] .'/layout/footer');
	}
}