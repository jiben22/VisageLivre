<?php
    class Register_model extends CI_Model {

    public function __construct ()
    {
        $this->load->database();
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

    public function isExistNickname($nickname)
    {
      $isExistNickname = true;

      //Verify nickname don't exist
      $query = $this->db->query(
              "
  SELECT nickname
  FROM visagelivre._user as _user
  WHERE _user.nickname='" . $nickname. "';"
          );

      $result = $query->result_array();

      if($result == null)
      {
          $isExistNickname = false;
      }

      return $isExistNickname;
    }

    public function isExistEmail($email)
    {
      $isExistEmail = true;

      //Verify nickname don't exist
      $query = $this->db->query(
              "
  SELECT nickname
  FROM visagelivre._user as _user
  WHERE _user.email='" . $email. "';"
          );

      $result = $query->result_array();

      if($result == null)
      {
          $isExistEmail = false;
      }

      return $isExistEmail;
    }
}
?>
