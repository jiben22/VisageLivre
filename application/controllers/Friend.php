<?php
class Friend extends CI_Controller {

  public function __construct() {
    parent::__construct();
    //Verify that a session active
    if( !isset($_SESSION['nickname']) )
    {
        redirect('login');
    }

    $this->load->model('friend_model');
  }

    public function index () {
      $this->profile();
    }

    public function profile()
    {
      //Recover nickname of this user
      $nickname = $_GET['nickname'];
      $data['nickname'] = $nickname;

      //Define view to load for content
      $data['content'] = 'friend-profile';

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

    public function request()
    {
      //Recover nickname of this user
      $nickname = $_GET['nickname'];

      $this->friend_model->sendRequest($nickname);

      redirect('home');
    }
}
?>
