<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("account");
		$this->load->model('admin_model');
		$this->load->model('payment_model');
		$this->load->model('client_model');
		$this->load->model('land_model');

		if (! is_loggedin()){
			$this->promptLogin();
		}
		if (! is_admin()){
			echo "You do not have access to this page";
			exit();
		}

	}

	public function index(){
		$this->dashboard();
	}

	public function dashboard(){
			$noOfClients = $this->client_model->countClients();
			$noOfLands = $this->land_model->countLands();
			$noOfCompletedPayments = $this->payment_model->countCompletedPayments();
			$noOfOngoingPayments = $this->payment_model->countUnCompletedPayments();
			$data['landsCount'] = $noOfLands;
			$data['clientsCount'] = $noOfClients;
			$data['completedPaymentsCount'] = $noOfCompletedPayments;
			$data['ongoingPaymentsCount'] = $noOfOngoingPayments;

			$this->load->view('admin/layout/header', array("title" => "360 Degree- Admin"));
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/layout/footer');
		
	}

	public function newStaff(){
		$this->load->view('admin/layout/header', ["title" => "360 Degree - Add new staff"]);
		$this->load->view('admin/layout/nav');
		$this->load->view('admin/addstaff');
		$this->load->view('admin/layout/footer'); 
	}
	public function addStaff(){
		if (is_admin()){
			$this->form_validation->set_rules("name", "Name", "trim|required");
			$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
			$this->form_validation->set_rules("password", "Password", "trim|required");
			$this->form_validation->set_rules("confpassword", "Confirm Password", "trim|required|matches[password]");
			if ($this->form_validation->run() === FALSE){
				$this->newStaff();
			}
			else{
				$data = array("username" => $this->input->post('username'), 
					"password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					"email" => $this->input->post('email'),
					"name" => $this->input->post('name'),
					"role" => 2);
				$data["uniqueId"] = $this->rand_gen->generate(10, "alpha_numeric");
				if ($this->admin_model->insertNewStaff($data)){
					doBootstrapAlert("Staff created successfully", "success");
					redirect(site_url('admin'));
				}
				else{
					echo "failure";
				}
			}
		}
		else{
			echo "no access";
		}
	}

	public function quickie(){
		if (is_loggedin()){
			echo "yea";
		}
		else{
			echo "nay";
		}
	}
	public function deleteStaff($staffId = ""){
		if (is_admin()){
			if ($staffId != "" AND is_numeric($staffId)){
				$this->admin_model->deleteStaff($staffId);
			}
		}
	}

	public function promptLogin(){
		doBootstrapAlert("Please log in to continue", "danger");
		redirect(site_url("auth/login"));
	}

	// public function isAdminLoggedIn(){
	// 	if ($this->session->has_userdata("user_name") AND $this->session->has_userdata("user_type") AND intval($this->session->userdata("user_type")) === 1){
	// 		return TRUE;
	// 	}
	// }

}