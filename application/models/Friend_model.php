<?php
    class Friend_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function getFriendRequests()
        {
          $query = $this->db->get('_friendrequest');
          return $query -> result_array();
        }

        public function sendRequest($target)
        {
          //Recover nickname of this user actual
          $nickname = $_SESSION['nickname'];

          $data = array(
                'nickname' => $nickname,
                'target' => $target,
          );

          //Insert nickname of target into friendrequest
          $this->db->insert('_friendrequest', $data);
        }
    }
