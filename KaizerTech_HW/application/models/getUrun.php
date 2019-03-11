<?php

class getUrun extends CI_model{

    public function __construct(){
      parent::__construct();
      $this->load->database();
    }

    public function getUruns(){

      $this->db->select('*');
      $this->db->from('urun');
      $this->db->join('urunparca','urun.urun_id = urunparca.urun_id');
      $this->db->join('stok','stok.urun_id = urun.urun_id');
      $this->db->where('urun.urun_durumu=0');

      $this->db->distinct();
      $query = $this->db->get();

      return $query->result();

    }

    public function getbilgisayars(){

      $this->db->select('*');
      $this->db->from('urun');
      $query = $this->db->get();

      return $query->result();

    }

    public function getparcas(){

      $this->db->select('*');
      $this->db->from('urunparca');

      $this->db->distinct();
      $query = $this->db->get();

      return $query->result();

    }

    public function getTedarik(){

      $this->db->select('*');
      $this->db->from('urun');
      $this->db->join('urunparca','urun.urun_id = urunparca.urun_id');
      $this->db->where('urun.urun_durumu=3');


      $query = $this->db->get();

      return $query->result();

    }

    public function getTedar(){

      $this->db->select('*');
      $this->db->from('tedarik');
      $query = $this->db->get();

      return $query->result();

    }

    public function getcalis(){

      $this->db->select('*');
      $this->db->from('personel');
      $query = $this->db->get();

      return $query->result();

    }

    public function addUrun($urunAdd, $urunParcaAdd, $urunMiktarAdd){



          $this->db->insert('urun', $urunAdd);
          $this->db->insert('urun', $urunParcaAdd);
          $this->db->insert('urun', $urunMiktarAdd);



    }

    public function bilgisayarEkle($u){

      $this->db->insert('urun',$u);

    }

    public function urns($u){

      $this->db->insert('urun',$u);

    }

    public function parcaEkle($parca){

      $this->db->insert('urunparca', $parca);

    }
    public function zimmetEkle($zimmet){

      $this->db->insert('zimmetle', $zimmet);

    }


    public function uruntedarikguncelle($data) {

      extract($data);
      $this->db->where('urun_id', $urun_id);
      $this->db->update($urun, array('urun_durumu' => $urun_durumu));
}



}


 ?>
