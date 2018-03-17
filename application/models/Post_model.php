<?php
    class Post_model extends CI_Model {

    public function __construct ()
    {
        $this->load->database() ;
    }

    public function addPost($post)
    {
        $data = array(
              // 'id ' => ??? , // No use because of the serial type and the sequence
              'content' => $post, // Argument given to the method
              'auteur' => $_SESSION['nickname'], // Argument given to the method
          );

        //Retrieve next val of sequence
        $query = $this->db->query("SELECT last_value FROM visagelivre._document_iddoc_seq");

        foreach ($query->result() as $result)
        {
            $lastValue = intval($result->last_value) + 1;
            var_dump($lastValue);
        }

        //Insert into document
        $this->db->insert('_document', $data);


        $data = array(
              'iddoc ' => $lastValue,
          );
        //Insert id of document into post
        $this->db->insert('_post', $data);

        return;
    }

    public function getLastPosts()
    {
        //Recover all posts
        $query = $this->db->query('
        SELECT doc.iddoc, auteur, content, create_date
        FROM visagelivre._document as doc
            LEFT JOIN visagelivre._post as _post ON doc.iddoc=_post.iddoc
            LEFT JOIN visagelivre._user as _user ON doc.auteur=_user.nickname;');

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
}
?>
