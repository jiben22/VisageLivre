<?php
class Home extends CI_Controller {
    
    public function index () {      
      //Define view to load for content
      $data['content'] = 'home';
      
      //Recover list of last post
      $data['posts'] = $this->listPost();
      
      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
  
  public function createPost() {
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
  
  public function listPost()
  {
    return array('OK');
  }
}
?>