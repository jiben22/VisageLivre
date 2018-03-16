<?php
class User extends CI_Controller {

    public function index () {
      $this->load->model('user_model');

      //Define view to load for content
      $data['content'] = 'list-users';

      //Recover list of users
      $data['users'] = $this->user_model->listUsers();

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
}
?>