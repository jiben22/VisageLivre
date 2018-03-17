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

        public function getHisFriendRequests($nickname)
        {
            return $this->db->get_where('_friendrequest', array('target' => $nickname))->result();
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

        public function acceptRequest($nickname, $friend)
        {
          $data = array(
                'nickname' => $nickname,
                'friend' => $friend,
          );

          //Insert nickname of this user AND target into friendof
          $this->db->insert('_friendof', $data);

          //Delete also friendrequest
          $this->db->delete('_friendrequest', array('nickname' => $friend, 'target' => $nickname));
        }

        public function getFriends($nickname)
        {
          $this->db->where('nickname', $nickname);
          $this->db->or_where('friend', $nickname);
          $query = $this->db->get('_friendof');

          return $query->result();
        }
    }
