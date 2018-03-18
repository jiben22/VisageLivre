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

      //Number of friend
      $data['number_friends'] = count($this->friend_model->getFriends($nickname));

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