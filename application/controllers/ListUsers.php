<?php
class ListUsers extends CI_Controller {

    public function index () {
      //Define view to load for content
      $data['content'] = 'list-users';

      //Recover list of last post
      //$data['posts'] = $this->listPost();

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
}
?>
