<?php
class Register extends CI_Controller
{
    public function index()
    {
      //If user have a session acitve, redirect to home
      if( isset($_SESSION['nickname']) )
      {
          redirect('home');
      }

        $this->load->view('register');
    }

    public function registerUser()
    {
        $this->load->model('register_model');

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

            $isExistNickname = $this->register_model->isExistNickname($nickname);
            $isExistEmail = $this->register_model->isExistEmail($email);

            if ($password !== $passconf) {
                $data['error_message'] = "Les mots de passe ne correspondent pas !";
                $this->load->vars($data);
                $this->load->view('register');
            }
            else if ($isExistNickname == true)
            {
              $data['error_message'] = "Le pseudonyme existe déja !";
              $this->load->vars($data);
              $this->load->view('register');
            }
            else if ($isExistEmail == true) {
              $data['error_message'] = "L'email existe déja !";
              $this->load->vars($data);
              $this->load->view('register');
            } else {
                //Register user
                $this->register_model->registerUser($nickname, $email, $password);
                //At the end, redirect of view login to sign in
                redirect('login');
            }
        }
        else {
         $this->load->view('register');
        }
    }
}
