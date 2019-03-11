<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');
        $this->load->model('getDepartman');
        $this->load->model('getUrun');
        $this->load->model('getZimmet');

}

public function index()
{
$this->load->view("login.php");
}

public function register(){

  $this->load->view("register.php");
}

public function register_user(){

          $user=array(
          'user_name'=>$this->input->post('user_name'),
          'user_email'=>$this->input->post('user_email'),
          'user_password'=>md5($this->input->post('user_password')),
          'user_age'=>$this->input->post('user_age'),
          'user_mobile'=>$this->input->post('user_mobile'),
          'role'=>$this->input->post('auth')
            );
            print_r($user);

    $email_check=$this->user_model->email_check($user['user_email']);

    if($email_check){
      $this->user_model->register_user($user);
      $this->session->set_flashdata('success_msg', 'Kayıt başarılı bir şekilde gerçekleştirildi.');
      redirect('user/register');

    }
    else{

      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
      redirect('user/register');


    }

}

public function UrunEkle(){

  $urunEkle=array(
  'urun_adi'=>$this->input->post('urun_adi'),
  'urun_fiyati'=>$this->input->post('urun_fiyati'),
  'urun_durumu'=>$this->input->post('urun_durumu')
  );

  $urunParcaEkle = array(
    'urun_id' => $this->input->post('urun_id'),
    'urun_parca_adi' => $this->input->post('urun_parca_adi'),
    'pbirim_fiyati' => $this->input->post('pbirim_fiyati')

  );

  $urunMiktarEkle = array(
    'urun_miktar' => $this->input->post('urun_miktar'),
    'urun_id' => $this->input->post('urun_id')
  );


  $this->getUrun->addUrun($urunEkle, $urunParcaEkle, $urunMiktarEkle);


}

public function login_view(){
 $this->load->view("login.php");
}

function login_user(){

  $user_login=array(

  'user_email'=>$this->input->post('user_email'),
  'user_password'=>md5($this->input->post('user_password'))

    );

    $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
      if($data)
      {

        $this->session->set_userdata('user_id',$data['user_id']);
        $this->session->set_userdata('user_mail',$data['user_mail']);
        $this->session->set_userdata('user_role',$data['user_role']);



        $zimmetData['zimmetle'] = $this->getZimmet->getZimmet();

        switch ($data['user_role']) {
          case 0:
            $this->load->view("user_profile.php", $zimmetData);
            break;
          case 1:
            $this->load->view("user_profile1.php");
            break;
          case 2:
            $this->load->view("user_profile2.php");
            break;



        }

      }
      else{
        $this->session->set_flashdata('error_msg', 'Hatalı giriş.');
        $this->load->view("login.php");

      }


}

public function bilgisayarAdd(){

  $bilgisayarEkle=array(
  'urun_adi'=>$this->input->post('urun_adi'),
  'birim_fiyati'=>$this->input->post('birim_fiyati')
  );

  $this->getUrun->bilgisayarEkle($bilgisayarEkle);
  redirect('user/bilgisayar');
}

public function parcaAdd(){

  $parcaEkle = array(
    'urun_id' => $this->input->post('urun_id'),
    'urun_parca_adi' => $this->input->post('urun_parca_adi'),
    'pbirim_fiyati' => $this->input->post('pbirim_fiyati')
  );

  $this->getUrun->parcaEkle($parcaEkle);
  redirect('user/parca');

}

public function urn(){

  $urunEkle=array(
  'urun_adi'=>$this->input->post('urun_adi'),
  'birim_fiyati'=>$this->input->post('birim_fiyati')
  );

  $this->getUrun->urns($urunEkle);
  redirect('user/urun');
}


# Admin sayfası
function user_profile(){
  $zimmetData['zimmetle'] = $this->getZimmet->getZimmet();
  $this->load->view('user_profile.php', $zimmetData);
}

# Satın Alma sayfası
function user_profile1(){
  $this->load->view("user_profile1.php");
}

# Personel Şefi sayfası
function user_profile2(){
  $this->load->view("user_profile2.php");
}

# Bolum sayfası
function bolum(){
  //$this->load->view("bolum.php");
  $deptData['derpartman'] = $this->getDepartman->getdept();
  $this->load->view("bolum.php",$deptData);
}

# Urun sayfası
function urun(){
  $urunData['urun'] = $this->getUrun->getUruns();
  $this->load->view("urun.php",$urunData);


}

# Bilgisayar sayfası
function bilgisayar(){
  $bilgisayarData['bilgisayar'] = $this->getUrun->getbilgisayars();
  $this->load->view("bilgisayar.php",$bilgisayarData);


}

# Parca sayfası
function parca(){
  $parcaData['parca'] = $this->getUrun->getparcas();
   $bilgisayarData['bilgisayar'] = $this->getUrun->getbilgisayars();
  $parcaData+=$bilgisayarData;
  $this->load->view("parca.php",$parcaData);

}

#zimmet sayfası

function zimmetleme(){
  $bilgisayarData['bilgisayar'] = $this->getUrun->getbilgisayars();
  $personelData['personel'] = $this->getUrun->getcalis();
  $bilgisayarData+=$personelData;
  $this->load->view("zimmetleme.php",$bilgisayarData);

}

function getU(){

  $bilgisayarData['bilgisayar'] = $this->getUrun->getbilgisayars();
  $this->load->view("parca.php",$bilgisayarData);


}

public function getTedarikUpdate(){
  $data = array(
      'urun' => 'urun',
      'urun_id' => $this->input->post('urun_id'),
      'urun_durumu' => '0'
  );

  $this->getUrun->uruntedarikguncelle($data);
    redirect('user/satinAl');



}

public function getzimmetAdd(){
  $zimmetEkle = array(
    'urun_id' => $this->input->post('urun_id'),
    'personel_id' => $this->input->post('personel_id'),
    'zimmet_tarih' => date("Y-m-d"),
    'user_id'=> '0'
  );

  $this->getUrun->zimmetEkle($zimmetEkle);
  redirect('user/zimmetleme');


}


function satinAls(){
  $bilgisayarData['bilgisayar'] = $this->getUrun->getbilgisayars();
  $this->load->view("parca.php",$bilgisayarData);

}


# Satın al sayfası
function satinAl(){

  $tedarikData['tedarik'] = $this->getUrun->getTedarik();
  $tedarData['tedar']=$this->getUrun->getTedar();
  $tedarikData+=$tedarData;
  $this->load->view("satinAl.php",$tedarikData);

}

public function user_logout(){

  //$this->session->sess_destroy();
  $this->session->unset_userdata('user_id' );
  $this->session->unset_userdata('user_mail' );
  $this->session->unset_userdata('user_password');
  $this->session->unset_userdata('user_role' );
  redirect('user/login_view', 'refresh');
}

}

?>
