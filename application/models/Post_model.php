<?php
    class Post_model extends CI_Model {

    public function __construct ()
    {
        $this->load->database() ;
    }
        
    public function addPost($post)
    {
        var_dump("OKKK");
        $data = array(
            // 'id ' => ??? , // No use because of the serial type and the sequence
            'content' => $post // Argument given to the method
        );
        return $this->db->insert('_document', $data);
    }
      
    public function getLastPosts()
    {
        $query = $this->db->get('_document');
        return $query->result_array();
    }
}
?>