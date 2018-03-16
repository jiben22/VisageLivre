<?php
class Login extends CI_Controller
{

    public function index()
    {
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
                //WARNING ! Forward data of user, With session variables or variable in view
                //Redirect
                redirect('home');
            } else {
                $data['isExist'] = $isExist;
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
