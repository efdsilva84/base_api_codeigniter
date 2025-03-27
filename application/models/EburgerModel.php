<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EburgerModel extends CI_Model{


    public function get_burgers(){
        $query = $this->db->get('eburgers');
        return $query->result();
    }

    public function novo_hamburguer($data){
        return $this->db->insert('eburgers',$data);
    }


}