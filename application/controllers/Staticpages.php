<?php
class Staticpages extends CI_Controller {
  public function index () {
    $this->display('home');
   }
   public function display ($content = 'User') { // note the default value
     if (! file_exists('application/views/'.$content.'.php')) {
       // Whoops , we don 't have a page for that !
       show_404() ;
      }
      $data ['content'] = $content ;
      $this->load->vars($data); // $ data is ' extracted ' and its compenents has a global access
      $this->load->view('template'); // Load a generic page
    }
}
?>
