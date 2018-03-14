<?php
class Home extends CI_Controller {
    
    public function index () {      
      //Define view to load for content
      $data['content'] = 'home';
      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
  
  public function createPost() {
    //$data['post'] = NULL;
    $this->form_validation->set_rules('post', 'required');
    if(!$this->form_validation->run() === FALSE) {
      $post = $this->input->post('post');
      //$data['post'] = $post;
    }
    
    //Define view to load for content
    $data['content'] = 'home';
    //Give name file of view
    $this->load->vars($data);
    $this->load->view('template');
  }
}
?>