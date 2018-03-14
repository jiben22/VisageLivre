<?php
class Home extends CI_Controller {
    
    public function index () {
      //Define view to load for content
      $data['content'] = 'home';
      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
}
?>