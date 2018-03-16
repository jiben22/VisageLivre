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
    }
