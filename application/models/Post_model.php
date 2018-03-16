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
              'auteur' => 'MOI', // Argument given to the method
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

        //Recover all iddoc of post
        $posts = $query->result_array();

        //Handling date for have difference between now
        foreach($posts as $post)
        {
          $create_date = DateTime::createFromFormat('Y-m-d h:i:s', $post['create_date']);
          $create_date = new DateTime($create_date);
          //var_dump($create_date);
          //echo '**';
          $current_date = DateTime::createFromFormat('Y-m-d h:i:s', date("Y-m-d H:i:s"));
          //var_dump($current_date);

          //$interval = $current_date->diff($create_date);
          //echo $interval->format('%R%a days');
        }

        return $posts;
    }
}
?>
