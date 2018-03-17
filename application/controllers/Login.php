<?php
class Login extends CI_Controller
{

    public function index()
    {
      //If user have a session acitve, redirect to home
      if( isset($_SESSION['nickname']) )
      {
          redirect('home');
      }

        $this->logUser();
    }

    public function logUser()
    {
        $this->load->model('login_model');

        $this->form_validation->set_rules('email', 'input_email', 'required');
        $this->form_validation->set_rules('password', 'input_password', 'required');
        if (!$this->form_validation->run() === false) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //Call model to verify user
            $isExist = $this->login_model->VerifyUser($email, $password);
            if ($isExist === true) {
                //Start a session with much informations
                session_start();
                $_SESSION['nickname'] = $this->login_model->getNickname($email);
                $_SESSION['date_connexion'] = date("Y-m-d H:i:s");

                //Redirect
                redirect('home');
            } else {
                $data['error_message'] = "L'email ou le mot de passe est incorrect !";
                $this->load->vars($data);
                $this->load->view('login');
            }
        }
        //Resend form of login
        else {
            $this->load->view('login');
        }
    }
}
