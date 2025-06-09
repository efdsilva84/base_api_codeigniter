<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThegazetteModel extends CI_Model{


    public function politices_notice(){
      //   $today = date('Y-m-d'); Formato compatível com DATE no MySQL
       $this->db->where('data_notice', date('Y-m-d'));
       $this->db->where('status_notice', '1');

        $query = $this->db->get('thegazette');
        return $query->result();
    }

    public function breaking_new_get(){
        $query = $this->db->get('thegazette_break_new_1');
        return $query->result();
    }

    public function new_msg($data){
        return $this->db->insert('msg_portifolio',$data);
    }
    public function log($email, $senha){

                // Filtra os dados (boa prática de segurança)
                $this->db->where('email', $email);
                $this->db->where('senha', $senha); 
                // Idealmente, senha deve estar criptografada
                $query = $this->db->get('thegazette_users');
        
                if ($query->num_rows() === 1) {
                    return $query->row(); // aqui converte para stdClass só se houver 1 resultado
                } else {
                    return null;
                }
    }

    public function nova_notice_policites($data) {
        return $this->db->insert('thegazette', $data);
    }

 
    

    

}