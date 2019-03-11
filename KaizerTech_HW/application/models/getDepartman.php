<?php

class getDepartman extends CI_model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function getdept(){

      $this->db->select('*');
      $this->db->from('departman');
      $this->db->join('personel','personel.departman_id = departman.departman_id');

      $query = $this->db->get();

      return $query->result();

    }


}

?>
