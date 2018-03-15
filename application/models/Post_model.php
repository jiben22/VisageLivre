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
        $query = $this->db->get('_document');
        return $query->result_array();
    }
}
?>