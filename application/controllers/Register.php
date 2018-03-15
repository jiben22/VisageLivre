<?php
class Register extends CI_Controller {
    
    public function index () {      
      $this->load->view('register');
    } 
    public function createUser() {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('post', 'required');

    if($this->form_validation->run() === FALSE) {
      echo 'PAS OK';
    }
    else
    {
      echo 'OK';
      $post = $this->input->post('post');
      var_dump("OK");
      //Call model to save post
      $this->post_model->addPost($post);
    }
    //Define view to load for content
    $data['content'] = 'home';
    //Give name file of view
    $this->load->vars($data);
    $this->load->view('template');
  }
}
?>
