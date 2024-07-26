<?php
class Login_model extends CI_Model {
 
  public function validate($email,$password){
    $this->db->where('email', $email);
    $this->db->where('pword', $password);
    $this->db->where('status', 1);
    $result = $this->db->get('users', 1);
    return $result;
  }
}
