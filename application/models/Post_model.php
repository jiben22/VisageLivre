<?php
    class Post_model extends CI_Model {

    public function __construct ()
    {
       $this->load->database();
    }

    public function addPost($post)
    {
        $data = array(
              // 'id ' => ??? , // No use because of the serial type and the sequence
              'content' => $post, // Argument given to the method
              'auteur' => $_SESSION['nickname'], // Argument given to the method
          );

        //Insert into document
        $this->db->insert('post', $data);

        return;
    }

    public function getLastPosts()
    {
        //Recover all posts
        $this->db->select('doc.iddoc, auteur, content, create_date');
        $this->db->from('_document AS doc');// I use aliasing make joins easier
        $this->db->join('_post AS _post', 'doc.iddoc = _post.iddoc', 'INNER');
        $this->db->join('_user AS _user', 'doc.auteur = _user.nickname', 'INNER');
        //Limit of query result
        $this->db->limit(6);
        //Order by IDDOC
        $this->db->order_by("iddoc", "desc");

        //Execute query
        $query = $this->db->get();

        //Recover all iddoc of post
        $posts = $query->result_array();

        //Handling date to have diff bewteen create_date and now
        //Handling date for have difference between now
        foreach($posts as $key => $post)
        {
          $posts[$key]['diff_date'] = $this->getDiffDate($post);
        }

        return $posts;
    }

    public function deletePost($iddoc)
    {
      //Delete document and post
      $this->db->delete('_document', array('iddoc' => $iddoc));
      $this->db->delete('_post', array('iddoc' => $iddoc));

      //Delete all comments in this post
      //NOT CORRECT, delete onlyfirst level of comment
      $this->db->delete('_comment', array('ref' => $iddoc));
    }

    public function getDiffDate($post)
    {
        $create_date = $post['create_date'];
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
                  $diff_date = "à l'instant";
              }

              return $diff_date;
      }

      public function getHisPosts($nickname)
      {
        //Recover all posts
        $query = $this->db->query('
        SELECT doc.iddoc, auteur, content, create_date
        FROM visagelivre._document as doc
            LEFT JOIN visagelivre._post as _post ON doc.iddoc=_post.iddoc
            LEFT JOIN visagelivre._user as _user ON doc.auteur=_user.nickname
        WHERE doc.auteur=\''. $nickname .'\';');

        $this->db->from('_document');
        //Limit of query result
        $this->db->limit(6);
        //Order by
        $this->db->order_by("iddoc", "desc");
        $query = $this->db->get();

        //Recover all iddoc of post
        $posts = $query->result_array();

        //Handling date to have diff bewteen create_date and now
        //Handling date for have difference between now
        foreach($posts as $key => $post)
        {
          $posts[$key]['diff_date'] = $this->getDiffDate($post);
        }

        return $posts;
      }

      public function getPostsOf($nickname)
      {
        //Recover all posts OF ...
        $this->db->select('doc.iddoc, auteur, content, create_date');
        $this->db->from('_document AS doc');// I use aliasing make joins easier
        $this->db->join('_post AS _post', 'doc.iddoc = _post.iddoc', 'INNER');
        $this->db->where('auteur', $nickname);
        //Limit of query result
        $this->db->limit(6);
        //Order by IDDOC
        $this->db->order_by("iddoc", "desc");

        //Execute query
        $query = $this->db->get();

        //Recover all iddoc of post
        $posts = $query->result_array();

        //Handling date to have diff bewteen create_date and now
        //Handling date for have difference between now
        foreach($posts as $key => $post)
        {
          $posts[$key]['diff_date'] = $this->getDiffDate($post);
        }

        return $posts;
      }

      public function addComment($comment, $iddoc, $nickname)
      {
        $data = array(
              'content' => $comment, // Argument given to the method
              'auteur' => $nickname, // Argument given to the method
              'ref' => $iddoc, // Argument given to the method
          );

        //Insert into comment
        $this->db->insert('comment', $data);

        return;
    }

    public function getComments($iddoc)
    {
      //Recover all posts
      $query = $this->db->query('
      SELECT * FROM visagelivre.comments('. $iddoc . ')
      as comm INNER JOIN visagelivre._document as _doc ON (comm.iddoc = _doc.iddoc);');

      $comments = $query->result_array();

      //Handling date to have diff bewteen create_date and now
      //Handling date for have difference between now
      foreach($comments as $key => $comment)
      {
        $comments[$key]['diff_date'] = $this->getDiffDate($comment);
      }

      return $comments;
    }

    public function deleteComment($id)
    {
      //Hierarchy of comments
      $comments = $this->getComments($id);
      //For each comment
      foreach ($comments as $key => $comment) {
        $iddoc = $comment['iddoc'];
        //Delete comment and so document !
        $this->db->delete('_document', array('iddoc' => $iddoc));
        $this->db->delete('_comment', array('iddoc' => $iddoc));
      }

      //Delete origin comment and so document !
      $this->db->delete('_document', array('iddoc' => $id));
      $this->db->delete('_comment', array('iddoc' => $id));
    }
}
?>
