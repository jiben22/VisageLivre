<?php
class Home extends CI_Controller {

    public function __construct() {
      parent::__construct();
      //Verify that a session active
      if( !isset($_SESSION['nickname']) )
      {
          redirect('login');
      }

      $this->load->model('post_model');
      $this->load->model('friend_model');

      $_SESSION['diff_date_connexion'] = $this->getDiffDate();
    }

    public function index() {
      //Define view to load for content
      $data['content'] = 'home';

      //Recover list of last post
      $data['posts'] = $this->post_model->getLastPosts();

      //Recover list of friend request
      $friendRequests = $this->friend_model->getHisFriendRequests($_SESSION['nickname']);
      $_SESSION['number_friendRequests'] = count($friendRequests);

      //Give name file of view
      $this->load->vars($data);
      $this->load->view('template');
    }

  public function createPost() {
    $this->form_validation->set_rules('post', 'Post', 'required');

    if(!$this->form_validation->run() === FALSE) {
      $post = $this->input->post('post');

      //Call model to save post
      $this->post_model->addPost($post);
    }

    //Redirect
    redirect('home');
  }

  public function createComment()
  {
    $this->form_validation->set_rules('comment', 'Comment', 'required');

    if(!$this->form_validation->run() === FALSE) {
      $iddoc = $this->input->post('iddoc');
      $comment = $this->input->post('comment');

      //Call method of post model to add a comment
      $this->post_model->addComment($comment);
    }
  }

  public function deletePost()
  {
    //Recover id of post in route
    $iddoc = $_GET['iddoc'];

    //Call method to delete post
    $this->post_model->deletePost($iddoc);

    redirect('home');
  }

  public function signOut()
  {
      //Destroy session of user
      session_destroy();

      redirect('login');
  }

  public function getDiffDate()
  {
      $create_date = $_SESSION['date_connexion'];
      $current_date = date("Y-m-d H:i:s");

      $diff = abs(strtotime($current_date) - strtotime($create_date));

      $years = floor($diff / (365*60*60*24));
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
      $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
      $minutes = floor($diff/60.2);
      $hours = floor($minutes / 60);

        if($years != 0)
        {
          switch ($years) {
            case 1:
              $diff_date = $years . " an";
              break;

            default:
              $diff_date = $years . " ans";
              break;
          }
        }
          else if($months != 0)
          {
            $diff_date = $months . " mois";
          }
          else if($days != 0)
          {
            switch ($days) {
              case 1:
                $diff_date = $days . " jour";
                break;

              default:
                $diff_date = $days . " jours";
                break;
            }
          }
            else if($hours != 0)
            {
              switch ($hours) {
                case 1:
                  $diff_date = $hours . " heure";
                  break;

                default:
                  $diff_date = $hours . " heures";
                  break;
              }
            }
            else if($minutes != 0)
            {
              switch ($minutes) {
                case 1:
                  $diff_date = $minutes . " minute";
                  break;

                default:
                  $diff_date = $minutes . " minutes";
                  break;
              }
            }
            else
            {
                $diff_date = "quelques instants";
            }

            return $diff_date;
    }
}
?>
