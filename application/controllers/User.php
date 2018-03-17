<?php
class User extends CI_Controller {

  public function __construct() {
    parent::__construct();
    //Verify that a session active
    if( !isset($_SESSION['nickname']) )
    {
        redirect('login');
    }

    $this->load->model('user_model');
  }

    public function index () {
      //Define view to load for content
      $data['content'] = 'list-users';

      //Recover list of users
      $data['users'] = $this->user_model->listUsers();

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

    public function profile()
    {
      //Define view to load for content
      $data['content'] = 'user-profile';

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

    public function deleteUser()
    {
        //Recover nickname of user in route
        $nickname = $_GET['nickname'];

        $this->user_model->deleteUser($nickname);

        session_destroy();
        redirect('login');
    }
}
?>
