<?php

class getZimmet extends CI_model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function getZimmet(){

      $this->db->select('*');
      $this->db->from('zimmetle');
      $this->db->join('urun','urun.urun_id = zimmetle.urun_id');
      $this->db->join('personel','personel.personel_id = zimmetle.personel_id');
      $this->db->join('user','user.user_id = zimmetle.user_id');
      $this->db->join('urunparca','urunparca.urun_id = urun.urun_id');

      $query = $this->db->get();

      return $query->result();

    }


}


 ?>
