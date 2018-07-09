<?php if(!defined('BASEPATH'))exit('No direct	script access allowed');	

class LoginC extends CI_Controller		
{	
	 public function __construct()	
	 {	
	 	 parent::__construct();	
	 	 in_access();
	 	 $this->load->model('LoginM');	
	 }

	//menampilkan view login
	public function index(){
	 	$this->load->view('loginv.php');
	}

	//function untuk melakukan proses login 
	public function signin(){
	 	$username=$this->input->post('username'); //input username
	 	$password=$this->input->post('password'); //input password
		$ceknum=$this->LoginM->ceknum($username,$password)->num_rows(); //mengecek username dan password yang diiputkan sesuai database/tidak
		$query=$this->LoginM->ceknum($username,$password)->row();
		if($ceknum>0){
              $userData = array(
              	'id'=>$query->id_petugas,
		        'user' => $query->username,
		        'pass' => $query->password,
		        'peran' => $query->id_user_roleFK,
		        'logged_in' => TRUE
		      );
		      $this->session->set_userdata($userData);
				if ($this->session->userdata('peran') == "1"){redirect('PendafKKC');} //jika peran = 1 untuk login petugaskk
				else if ($this->session->userdata('peran') == "2"){redirect('PendafAkteC');} //peran 2 untuk login petugas akte
				else if ($this->session->userdata('peran') == "3"){redirect('PendafPindahC');} //peran 3 untuk login petugas pindah
				else if ($this->session->userdata('peran') == "4"){redirect('AdminC');} //peran 4 untuk login admin
            }else{
                $this->session->set_flashdata('error','Nama pengguna dan kata sandi salah');
                redirect('LoginC');
            }
		
		} 	
}