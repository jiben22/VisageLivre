<?php
class Register extends CI_Controller
{
    public function index()
    {
        $this->load->view('register');
    }

    public function registerUser()
    {
        $this->load->model('register_model');

        $this->form_validation->set_rules('nickname', 'Nickname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

        if (!$this->form_validation->run() === false) {
            $password = $this->input->post('password');
            $passconf = $this->input->post('passconf');
            if ($password !== $passconf) {
                redirect('register');
            } else {
                $nickname = $this->input->post('nickname');
                $email = $this->input->post('email');

                //Register user
                $this->register_model->registerUser($nickname, $email, $password);
            }

            //At the end, redirect of view login to sign in
            redirect('login');
        }
    }
}
