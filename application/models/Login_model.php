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
    }
