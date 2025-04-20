<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EburgerModel extends CI_Model{


    public function get_burgers(){
        $query = $this->db->get('eburgers');
        return $query->result();
    }
    public function get_burgers_textos(){
        $query = $this->db->get('eburgers_txt');
        return $query->result();
    }

    public function novo_hamburguer($data){
        return $this->db->insert('eburgers',$data);
    }

    public function new_item($data){
        return $this->db->insert('eburgers_item',$data);
    }
    public function all_itens_menu(){
        $query = $this->db->get('eburgers_item');
        return $query->result();
    }
    public function select_burger_id($id){
    
        $this->db->select('*');
        $this->db->from('eburgers_item');
        $this->db->join('eburgers', 'eburgers.id_burger_item = eburgers_item.id_item');
        $this->db->where('eburgers.id_burger_item', $id);
        $query = $this->db->get();
        return $query->result();  //ou ->result() se quiser vários resultados

    }


}