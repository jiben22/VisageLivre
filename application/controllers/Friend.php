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
    $this->load->model('user_model');
  }

    public function index () {
      $this->profile();
    }

    public function profile()
    {
      //Recover nickname of this user
      $nickname = $_GET['nickname'];
      $data['nickname'] = $nickname;

      //Number of friend
      $data['number_friends'] = count($this->friend_model->getHisFriends($nickname));

      $nickname = $_SESSION['nickname'];

      //Recover list of all users
      $users = $this->user_model->listUsers();
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
      $data['user'] = $users;

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

    public function listFriendRequests()
    {
      $data['content'] = 'list-friend_requests';

      //Recover list of friend request
      $friendRequests = $this->friend_model->getHisFriendRequests($_SESSION['nickname']);
      $data['friendRequests'] = $friendRequests;
      $data['number_friendRequests'] = count($friendRequests);

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

    public function acceptRequest()
    {
      //Nickname of this user
      $nickname = $_SESSION['nickname'];
      //Recover nickname of target
      $friend = $_GET['nickname'];

      $this->friend_model->acceptRequest($nickname, $friend);

      redirect('home');
    }

    public function deleteFriendship()
    {
      //Nickname of this user
      $nickname = $_SESSION['nickname'];
      //Recover nickname of target
      $friend = $_GET['nickname'];

      $this->friend_model->deleteFriendship($nickname, $friend);

      redirect('home');
    }

    public function deleteRequest()
    {
      //Nickname of this user
      $nickname = $_SESSION['nickname'];
      //Recover nickname of target
      $friend = $_GET['nickname'];

      $this->friend_model->deleteRequest($nickname, $friend);

      redirect('home');
    }

    public function listFriends() {
      //Define view to load for content
      $data['content'] = 'list-friends';

      $nickname = $_SESSION['nickname'];

      //Recover list of his friends
      $friends = $this->friend_model->getHisFriends($nickname);

      $_SESSION['number_friends'] = count($friends);

      $friendsNickname = array();
      //Keep only nickname of his friends
      foreach ($friends as $key => $friend) {
        if($friend['nickname'] !== $nickname)
        {
          $friendsNickname[]['nickname'] = $friend['nickname'];
        }
        else if($friend['friend'] !== $nickname)
        {
          $friendsNickname[]['nickname'] = $friend['friend'];
        }
      }
      $data['friends'] = $friendsNickname;
      //var_dump($data['friends']);

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }
}
?>
