<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortifolioModel extends CI_Model{


    public function get_burgers(){
        $query = $this->db->get('eburgers');
        return $query->result();
    }

    public function new_msg($data){
        return $this->db->insert('msg_portifolio',$data);
    }


}