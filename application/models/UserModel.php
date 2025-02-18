<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{

    public function get_user(){
        $query = $this->db->get('users');
        return $query->result();
    }

}


?>