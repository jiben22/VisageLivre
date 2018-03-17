<?php
    class User_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database() ;
        }

        public function listUsers()
        {
            $query = $this->db->get('_user');
            return $query -> result_array();
        }

        public function deleteUser($nickname)
        {
          //Delete user
          $this->db->delete('_user', array('nickname' => $nickname));
        }
    }
