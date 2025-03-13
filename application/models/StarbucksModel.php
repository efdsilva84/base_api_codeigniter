<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StarbucksModel extends CI_Model{

    public function get_star(){
        $query = $this->db->get('starbucks');
        return $query->result();
    }

    public function insertUser($data){
        return $this->db->insert('msgs',$data);
    }

    public function update_start($id, $data) {
        $this->db->where('id_msg', $id);
        return $this->db->update('starbucks', $data);
    }



}


?>