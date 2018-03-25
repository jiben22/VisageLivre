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
    $this->load->model('post_model');
  }

    public function index () {
      //Define view to load for content
      $data['content'] = 'list-users';

      $nickname = $_SESSION['nickname'];

      //Recover list of all users
      $users = $this->user_model->listUsers();
      $data['number_users'] = count($users) - 1;

      //Recover list of all friend requests
      $friendRequests = $this->friend_model->getFriendRequests();
      //List of his friends
      $friends = $this->friend_model->getHisFriends($nickname);

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
          foreach ($friends as $friend) {
            if(
              ($friend['nickname'] === $nickname && $friend['friend'] === $user['nickname']) ||
               ($friend['friend'] === $nickname && $friend['friend'] === $user['nickname']) )
            {
              $users[$key]['isEligibleForRequest'] = false;
              $users[$key]['isEligibleForDeleteFriendship'] = true;
            }
          }

        }
      }
      $data['users'] = $users;

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

    public function profile()
    {
      //Define view to load for content
      $data['content'] = 'user-profile';

      $nickname = $_SESSION['nickname'];
      //Number of friend
      $data['number_friends'] = count($this->friend_model->getHisFriends($nickname));

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

    public function wall()
    {
      //Define view to load for content
      $data['content'] = 'wall';

      $nickname = $_GET['nickname'];
      $data['user'] = $nickname;

      //Recover list of last post
      $posts = $this->post_model->getPostsOf($nickname);

      $comments = array();
      $numberComments = 0;
      //Recover all comments of each post
      foreach ($posts as $key => $post) {
        $posts[$key]['comments'] = $this->post_model->getComments($post['iddoc']);
        $posts[$key]['number_comments'] = count($posts[$key]['comments']);
      }

      $data['posts'] = $posts;

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
}
?>
