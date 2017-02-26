<?php 

class Auth extends CI_Controller{

	public function __contruct(){
		parent::__contruct();
		$this->load->library("form_validation");
		$this->load->library("session");
		$this->load->model("auth_model");
	}

	public function login(){

		$this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|trim");
		if ($this->form_validation->run() !== FALSE){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$emailExists = $this->auth_model->checkEmail($email);
			$roles = array(1 => "admin", 2 => "staff", 3 => "client");
			if ($emailExists){
				if (password_verify($password, $emailExists->password)){
					$_SESSION['user_uniqueId'] = $emailExists->uniqueId;
					$_SESSION['user_name'] = $emailExists->username;
					
					$role = $this->auth_model->getAccountType($email);
					$_SESSION['user_type'] = $role;
					$_SESSION['logged_in'] = TRUE;

					if (isset($_SESSION['current_url'])){
						redirect($_SESSION['current_url']);
					}
					else{
						redirect(site_url($roles[$role]));
					return;
					}
					
				}
				else{
					doBootstrapAlert("Incorrect username/password combination", "danger");
					$this->load->view('index');
				}
			}
			else{
				doBootstrapAlert("Incorrect username or password", "danger");
				redirect(site_url('auth/login'));
			}
		}
		else{

			$this->load->view('index');
		}
	}

	public function register(){
		$this->form_validation->set_rules("email", "Email","trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("confpassword", "Confirm Password", "trim|required");
		$this->form_validation->set_rules("name", "Name", "trim|required");

		if ($this->form_validation->run() === FALSE){
			$this->load->view('register');
		}
		else{
			$data["email"] = $this->input->post("email");
			$data["password"] = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
			$data["username"] = $this->input->post("username");
			$data["name"] = $this->input->post("name");
			$data["uniqueId"] = $this->rand_gen->generate(10, "alpha_numeric");

			if ($this->auth_model->checkEmail($data["email"])){
				$this->load->view('register');
				return;
			}
			if ($this->auth_model->insert($data)){
				echo "Success";
			}
			else{
				$this->load->view('register');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();

		redirect(site_url());
	}
}