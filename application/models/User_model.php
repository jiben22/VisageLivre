<?php
    class User_model extends CI_Model
    {
        public function __construct()
        {
					$this->load->database();
				}

        public function listUsers()
        {
            $query = $this->db->get('_user');
            return $query -> result_array();
        }

        public function deleteUser($nickname)
        {
          //TRY if user exist into this tables
          //_friendof
          $this->db->delete('_friendof', array('nickname' => $nickname));
          $this->db->delete('_friendof', array('friend' => $nickname));
          //_friendrequest
          $this->db->delete('_friendrequest', array('nickname' => $nickname));
          $this->db->delete('_friendrequest', array('target' => $nickname));

          //Delete user
          $this->db->delete('_user', array('nickname' => $nickname));
        }
    }
