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
    $this->load->model('friend_model');
  }

    public function index () {
      //Define view to load for content
      $data['content'] = 'list-users';

      $nickname = $_SESSION['nickname'];

      //Recover list of all users
      $users = $this->user_model->listUsers();
      //Recover list of all friend requests
      $friendRequests = $this->friend_model->getFriendRequests();

      //Remove actual user
      foreach ($users as $key => $user) {
        if($user['nickname'] === $nickname)
        {
          unset($users[$key]);
        }
        else {
          $users[$key]['isEligibleForRequest'] = true;
          foreach ($friendRequests as $friendRequest) {
            if(
              ($friendRequest['nickname'] === $nickname && $friendRequest['target'] === $user['nickname']) ||
               ($friendRequest['target'] === $nickname && $friendRequest['nickname'] === $user['nickname']) )
            {
              $users[$key]['isEligibleForRequest'] = false;
            }
          }
        }
      }
      $data['users'] = $users;
      var_dump($users);

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
