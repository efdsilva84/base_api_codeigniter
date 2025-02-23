<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{

    public function get_user(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function insertUser($data){
        return $this->db->insert('msgs',$data);
    }

    public function userEdit($id){
        $this->db->where('id_msg', $id);
        $query = $this->db->get('msgs');
        return $query->row();
    }

    public function login_user($cpf, $senha) {
        $this->db->where('user_cpf', $cpf);
        $this->db->where('user_senha', $senha);

        $query = $this->db->get('users');
    
        return ($query->num_rows() > 0) ? $query->row() : null; // Retorna o usuário ou NULL
    }

}


?>