<?php
    class Login_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function VerifyUser($email, $password)
        {
            //Verify if there is a row corresponding at email and pass
            $query = $this->db->query(
                    "
				SELECT *
				FROM visagelivre._user as _user
				WHERE _user.email='" . $email . "' AND _user.pass='" . $password . "';"
                );

            $result = $query->result_array();
            if ($result == null) {
                $isExist = false;
            } else {
                $isExist = true;
            }

            return $isExist;
        }

        public function getNickname($email)
        {
          //Recver nickname of user
          $query = $this->db->query(
                  "
      SELECT nickname
      FROM visagelivre._user as _user
      WHERE _user.email='" . $email. "';"
              );

          $result = $query->result_array();

          return $result[0]['nickname'];
        }
    }
