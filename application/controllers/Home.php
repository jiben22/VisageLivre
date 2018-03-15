<?php
class Home extends CI_Controller {
    
    public function __construct() {
      parent::__construct();
      $this->load->model('post_model');
    }
  
    public function index() {      
      //Define view to load for content
      $data['content'] = 'home';
      
      //Recover list of last post
      $data['posts'] = $this->listPosts();
      
      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
  
  public function createPost() {
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('post', 'input_post', 'required');
    
    if(!$this->form_validation->run() === FALSE) {
      $post = $this->input->post('post');
      var_dump($post);
      //Call model to save post
      $this->post_model->addPost($post);
    }
    
    //Define view to load for content
    $data['content'] = 'home';
    //Give name file of view
    $this->load->vars($data);
    $this->load->view('template');
  }
  
  public function listPosts()
  {
      //Define view to load for content
      $data['content'] = 'home';
      
      $data['posts'] = $this->post_model->getLastPosts();
      
      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
  }
}
?>