<?php
class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load model of login and register
        $this->load->model('authentication_model');
    }

    public function index()
    {
        //If user have a active session => redirect to home
        if (isset($this->session->nickname)) {
            redirect('home');
        } else {
            $this->login();
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'input_email', 'required');
        $this->form_validation->set_rules('password', 'input_password', 'required');
        if (!$this->form_validation->run() === false) {
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');

            //Call model to verify user
            $isExist = $this->authentication_model->signIn($email, $password);
            var_dump($isExist);
            if ($isExist === true) {
                //Init session
                $this->session;
                //Define the nickname of user in a session var
                $this->session->nickname = $this->authentication_model->getNickname($email);
                $this->session->date_connexion = date("Y-m-d H:i:s");

                //Redirect
                redirect('home');
            } else {
                $data['error_message'] = "L'email ou le mot de passe est incorrect !";
            }
        }
        //Resend form of login
        else {
            $data['content'] = 'login';
            $this->load->vars($data);
            $this->load->view('authentication');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        //$this->form_validation->set_rules('nickname', 'Nickname', 'trim|xss_clean|required|max_length[50]');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if (!$this->form_validation->run() === false) {
            $nickname = $this->input->post('nickname');
            $email = strtolower($this->input->post('email'));
            $password = $this->input->post('password');
            $passconf = $this->input->post('passconf');

            $isExistNickname = $this->authentication_model->isExistNickname($nickname);
            $isExistEmail = $this->authentication_model->isExistEmail($email);

            if ($password !== $passconf) {
                $data['error_message'] = "Les mots de passe ne correspondent pas !";
            } elseif ($isExistNickname == true) {
                $data['error_message'] = "Le pseudonyme existe déja !";
            } elseif ($isExistEmail == true) {
                $data['error_message'] = "L'email existe déja !";
            } else {
                //Register user
                $this->authentication_model->signUp($nickname, $email, $password);
                //At the end, redirect of view login to sign in
                redirect('authentication');
            }

            $data['content'] = 'register';
            $this->load->vars($data);
            $this->load->view('authentication');
        } else {
            $data['content'] = 'register';
            $this->load->vars($data);
            $this->load->view('authentication');
        }
    }
}
