<?php
    class Register_model extends CI_Model {

    public function __construct ()
    {
        $this->load->database() ;
    }

    public function registerUser($nickname, $email, $password)
    {
        $data = array(
              'nickname' => $nickname,
              'email' => $email,
              'pass' => $password,
          );

        //Insert into database the user !
        $this->db->insert('_user', $data);

        return;
    }
}
?>
