<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("account");
		$this->load->model('staff_model');
		$this->load->model("client_model");
		$this->load->model("land_model");
		$this->load->model("payment_model");
		$this->load->library("user_agent");
		if (! is_loggedin()){
			$this->promptLogin();
		}
		if (!is_staff() AND !is_admin()){
			echo "Uh oh! No access";
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

			$this->load->view('staff/layout/header', array("title" => "360 Degree- staff"));
			$this->load->view('staff/layout/nav');
			$this->load->view('staff/dashboard', $data);
			$this->load->view('staff/layout/footer');
		
	}

	public function newLand($clientId=""){
		$this->load->view('staff/layout/header', ["title" => "360 Degree - Staff | Add Land"]);
		$this->load->view('staff/layout/nav');
		$this->load->view('staff/newland', ["clientId" => $clientId]);
		$this->load->view('staff/layout/footer');
	}
	public function addLand(){
		$this->form_validation->set_rules("location", "Location", "trim|required");
		$this->form_validation->set_rules("price", "Price", "trim|required|numeric");
		$this->form_validation->set_rules("dimension", "Dimension", "trim|required|alpha_numeric_spaces");

		if ($this->form_validation->run() === FALSE){

			$this->newLand($this->input->post("client-id"));
		}
		else{
			$data = array("uniqueId" => $this->rand_gen->generate(10, "alpha_numeric"),
				"location" => $this->input->post("location"),
				"price" => $this->input->post("price"),
				"quantity" => $this->input->post("dimension"),
				"created_by" => $this->session->userdata("user_uniqueId"), 
				"bought_by" => $this->input->post('client-id'));
			if ($this->staff_model->insertNewLand($data)){
				doBootstrapAlert("Land added successfully", "success");
				redirect(site_url($this->agent->referrer()));
			}
		}
	}

	public function newPayment($clientId=""){
		$data['clients'] = $this->staff_model->getAllClients();
		$data['lands'] = $this->staff_model->getLandsByClient($clientId);

		$data['clientId'] = $clientId;
		$this->load->view('staff/layout/header', ['title' => "360 Degree - Staff | Add New Payment"]);
		$this->load->view('staff/layout/nav', $data);
		$this->load->view('staff/newpayment');
		$this->load->view('staff/layout/footer');
	}

	public function addPayment(){
		$this->form_validation->set_rules("amount", "Amount", "trim|numeric");
		$this->form_validation->set_rules("client-id", "Paid By", "trim|required");
		$this->form_validation->set_rules("land", "Payment For", "trim|required");
		$this->form_validation->set_rules("status", "Status", "trim|required");

		if ($this->form_validation->run() === FALSE){
			$this->newPayment($this->input->post('client-id'));
		}
		else{
			$status = $this->input->post("status");
			$status = (intval($status) === 1 ) ? "balanced" : "unbalanced";
			$data = array("amount" => $this->input->post("amount"),
				"paid_by" => $this->input->post("client-id"),
				"uniqueId" => $this->rand_gen->generate(10, "alpha_numeric"),
				"payment_for" => $this->input->post("land"), 
				"status" => $status);
			if ($this->staff_model->insertNewPayment($data)){
				doBootstrapAlert("Payment added successfully", "success");
				redirect(site_url($this->agent->referrer()));
			}
		}
	}

	public function newClient(){
		//$data = $this->staff_model->getAllClients();
		$this->load->view('staff/layout/header', ['title' => "360 Degree - Staff | Add New Client"]);
		$this->load->view('staff/layout/nav');
		$this->load->view('staff/newclient');
		$this->load->view('staff/layout/footer');
	}

	public function addClient(){
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confpassword", "Confirm Password", "trim|required|matches[password]");
		if ($this->form_validation->run() === FALSE){
			$this->newClient();
		}
		else{
			$data = array("username" => $this->input->post('username'), 
				"password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				"email" => $this->input->post('email'),
				"name" => $this->input->post('name'),
				"role" => 3);
			$data["uniqueId"] = $this->rand_gen->generate(10, "alpha_numeric");
			if ($this->staff_model->insertNewClient($data)){
				doBootstrapAlert("Client created successfully", "success");
				redirect(site_url('clients/staff'));
			}
			else{
				doBootstrapAlert("Unable to add client", "danger");
				newClient();
			}
		}
	}


	public function getClients(){
		$daysRange = $this->input->post('days');

		if ($daysRange != ""){
			$clients = $this->staff_model->getAllClients($daysRange);
		}
		else{
			$clients = $this->staff_model->getAllClients();
		}

		// echo json_encode($clients);
		if ($this->input->is_ajax_request()){
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
		else{
			$this->load->view('staff/layout/header', ["title" => "Clients"]);
			$this->load->view('staff/layout/nav');
			$this->load->view('staff/clients', ["clients" => $clients]);
			$this->load->view('staff/layout/footer');
		}

	}
	
	public function getLandPayment_ajax(){
		$landId = $this->input->post_get("land_id");

		$payment_info = $this->staff_model->getLandPrice($landId);
		$amount_paid = $this->staff_model->getPreviousPayment($landId);
		$value['amount_paid'] = ($amount_paid != "") ? $amount_paid : 0;

		$value["price"] = $payment_info->price;
		$value['price_difference'] = $value['price'] - $value['amount_paid'];
		echo json_encode($value);
	}


	public function uploaddoc($clientId, $errors=""){
		$data['clientId'] = $clientId;
		$data['error'] = $errors;
		$this->load->view('staff/layout/header', ['title' => "Upload Document"]);
		$this->load->view('staff/layout/nav');
		$this->load->view('staff/upload_form', $data);
	}

	public function do_upload(){
		if (!file_exists('.uploads/'.$this->input->post('client_id'))){
			mkdir('./uploads/'.$this->input->post('client_id'));
		}

		$config['upload_path'] = './uploads/' . $this->input->post('client_id');
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx|jpeg';
		$config['max_size'] = 0;
		$config['max_width'] = 0;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			$this->uploaddoc($this->input->post('client_id'), $error);
		}
		else{
			$uploadData = $this->upload->data();
			$this->load->library('rand_gen');
			$storageData = array("uniqueId" => $this->rand_gen->generate(10),
				"url" => "uploads/" . $this->input->post('client_id') . "/" . $uploadData['file_name'],
				"ownerId" => $this->input->post("client_id")
				);
			$this->staff_model->saveDocument($storageData);
			doBootstrapAlert("Document Uploaded", "success");
			redirect(site_url('staff/clients'));
			//$this->load->view('staff/upload_form', ['clientId' => $this->input->post('client_id')]);
		}
	}
	public function promptLogin(){
		doBootstrapAlert("Please log in to continue", "danger");
		redirect(site_url("auth/login"));
	}

	// public function isstaffLoggedIn(){
	// 	if ($this->session->has_userdata("user_name") AND $this->session->has_userdata("user_type") AND intval($this->session->userdata("user_type")) === 1){
	// 		return TRUE;
	// 	}
	// }

}