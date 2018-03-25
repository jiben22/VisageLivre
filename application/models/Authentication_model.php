<?php
    class Authentication_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database() ;
        }


        public function signIn($email, $password)
        {
            //Verify if user exist
            $this->db->from('_user');
            $this->db->where('email', $email);
            $this->db->where('pass', $password);

            //Create query
            $query = $this->db->get();
            //Execute query
            $user = $query->result_array();

            if ($user == null)
                return false;
            else
                return true;
        }

        public function getNickname($email)
        {
          //Recover nickname of user
          $this->db->select('nickname');
          $this->db->from('_user');
          $this->db->where('email', $email);

          //Execute query
          $query = $this->db->get();
          $user = $query->result_array();

          return $user[0]['nickname'];
        }

        public function signUp($nickname, $email, $password)
        {
            $data = array(
              'nickname' => $nickname,
              'email' => $email,
              'pass' => $password,
          );

            //Insert into database the new user !
            $this->db->insert('_user', $data);
            return;
        }

        public function isExistNickname($nickname)
        {
            $isExistNickname = true;

            //Verify if the nickname don't already exist.
            $this->db->from('_user');
            $this->db->where('nickname', $nickname);

            //Execute query
            $query = $this->db->get();
            $user = $query->result_array();

            if ($user == null) {
                $isExistNickname = false;
            }

            return $isExistNickname;
        }

        public function isExistEmail($email)
        {
            $isExistEmail = true;

            //Verify if the email don't already exist.
            $this->db->from('_user');
            $this->db->where('email', $email);

            //Execute query
            $query = $this->db->get();
            $user = $query->result_array();

            if ($user == null) {
                $isExistEmail = false;
            }

            return $isExistEmail;
        }
    }
