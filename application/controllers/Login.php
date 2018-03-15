<?php
class Login extends CI_Controller {
    
    public function index () {    
			$this->logUser();  
			$this->load->model('login_model');
    }
    
    public function logUser() {
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email', 'input_email', 'required');
			$this->form_validation->set_rules('password', 'input_password', 'required');
			if(!$this->form_validation->run() === FALSE) {
				echo 'OK';
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				//Call model to verify user
				$this->login_model->VerifyUser($email, $password);
				
				//Redirect
				$this->redirectHome();
			}
			//Resend form of login
			else
			{
				$this->load->view('login');
			}
  }
  
  public function redirectHome()
  {
		//Define view to load for content
    $data['content'] = 'home';
    //Give name file of view
    $this->load->vars($data);
    $this->load->view('template');
	}
}
?>
