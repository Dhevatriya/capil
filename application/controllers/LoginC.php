<?php if(!defined('BASEPATH'))exit('No direct	script access allowed');	

class LoginC extends CI_Controller		
{	
	 public function __construct()	
	 {	
	 	 parent::__construct();	
	 	 in_access();
	 	 $this->load->model('LoginM');	
	 }

	 public function index(){
	 	$this->load->view('LoginV.php');
	 }

	 public function signin(){
	 	$username=$this->input->post('username');
	 	$password=$this->input->post('password');
		$ceknum=$this->LoginM->ceknum($username,$password)->num_rows();
		$query=$this->LoginM->ceknum($username,$password)->row();
		if($ceknum>0){
              $userData = array(
		        'user' => $query->username,
		        'pass' => $query->password,
		        'peran' => $query->peran,
		        'logged_in' => TRUE
		      );
		      $this->session->set_userdata($userData);
				if ($this->session->userdata('peran') == "PetugasKK"){redirect('PendafKKC');}
				else if ($this->session->userdata('peran') == "PetugasAkte"){redirect('PendafAkteC');}
				else if ($this->session->userdata('peran') == "PetugasPindah"){redirect('PendafPindahC');}

            }else{
                $this->session->set_flashdata('error','Username dan Password salah');
                redirect('LoginC');
            }
		
		} 	
}