<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminC extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('AdminM');
    $this->load->model('PendafAkteM');
    $this->load->model('PendafKKM');
    $this->load->model('PendafPindahM');
    // $this->model = $this->PendafAkteM;
    no_access_adm();
  }

var $data= array();
    function index(){
        $data=array(
      "title"=>'Daftar Petugas',
          "aktif"=>"admin",
          "petugas"=>$this->AdminM->get_petugas()->result(),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('petugas_admin.php', $data, true);
    $this->load->view('template_admin',$data);
    }
  function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Admin Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }
    public function adminedit($id){
    $data=array(
      "title"=>'Edit Petugas',
          "aktif"=>"petugas",
          "get_petugas"=>$this->AdminM->get_petugas_det($id)->row_array(),
          "bclass"=>" ",
          "id_pet"=>$id,
        );

    $data['body']= $this->load->view('edit_admin.php', $data, true);
    $this->load->view('template_admin',$data);
    
  }
  public function petugaseditproses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
    $this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required');
    $this->form_validation->set_rules('alamat_petugas', 'alamat_petugas', 'required');
    $this->form_validation->set_rules('no_hp_petugas', 'no_hp_petugas', 'required|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('username', 'username', 'required|min_length[6]');
    $this->form_validation->set_rules('peran', 'peran', 'required');
    // $id_petugas=$_POST['id_petugas'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Petugas',
            "aktif"=>"petugas",
            "bclass"=>" ",
            "get_petugas"=>$this->AdminM->get_petugas_det($_POST['id_petugas'])->row_array(),
            'id_petugas' => set_value('id_petugas', ''),
            'nama_petugas' => set_value('nama_petugas', ''),
            'alamat_petugas' => set_value('alamat_petugas', ''),
            'no_hp_petugas' => set_value('no_hp_petugas', ''),
            'username' => set_value('username', ''),
            'peran' => set_value('peran', ''),
            'id2' => 'has-error',
          );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit', $data, true);
      $this->load->view('template_admin', $data);
    }else{
      $this->model->id_petugas= $_POST['id_petugas'];
      $this->model->alamat_petugas = $_POST['alamat_petugas'];
      $this->model->no_hp_petugas = $_POST['no_hp_petugas'];
      $this->model->username = $_POST['username'];
      $query = $this->model->updatepetugas();

      $this->session->set_flashdata('sukses', 'Edit data petugas berhasil dilakukan!');
      redirect('AdminC/');
    }
  }
  // public function datapetugaseditproses(){
  //   $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
  //   $this->form_validation->set_rules('id_petugas', 'id_petugas','required');
  //   $this->form_validation->set_rules('nama_petugas', 'nama_petugas','required');
  //   $this->form_validation->set_rules('alamat_petugas', 'alamat_petugas','required');
  //   $this->form_validation->set_rules('no_hp_petugas', 'no_hp_petugas','required');
  //   $this->form_validation->set_rules('username', 'username','required');
  //   $this->form_validation->set_rules('peran', 'peran','required');
  //   // $id=  $_POST['id_petugas'];
  //   if($this->form_validation->run()==FALSE){
  //     $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
  //     $data=array(
  //       "title"=>'Edit data petugas',
  //           "aktif"=>"petugas",
  //           "bclass"=>" ",
  //           "get_petugas"=>$this->PendafKKM->get_petugas_det($_POST['id_petugas'])->row_array(),
  //           // "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($noKK)->row_array(),
  //           'id_petugas'=>set_value('id_petugas',''),
  //           'nama_lengkap' => set_value('nama_lengkap', ''),
  //           'nama_lengkap' => set_value('nama_lengkap', ''),
  //           'alamat_petugas' => set_value('alamat_petugas', ''),
  //           'no_hp_petugas' => set_value('no_hp_petugas', ''),
  //           'username' => set_value('username', ''),
  //           'peran' => set_value('peran', ''),
  //           'id2' => 'has-error',
  //           $username=$this->session->userdata('user'),
  //           $peran=$this->session->userdata('peran'),
  //         );
  //     $this->session->set_userdata('petEdit', 'y');
  //     $data['body']= $this->load->view('edit_admin', $data, true);
  //     $this->load->view('template_admin', $data);
  //   }else{
  //     $this->model->id_petugas = $_POST['id_petugas'];
  //     $this->model->nama_petugas= $_POST['nama_petugas'];
  //     $this->model->alamat_petugas = $_POST['alamat_petugas'];
  //     $this->model->no_hp_petugas = $_POST['no_hp_petugas'];
  //     $this->model->username = $_POST['username'];
  //     $this->model->peran = $_POST['peran'];
  //     $query = $this->model->updatepetugas();

  //     // $id_jenispekerjaan = $_POST['idPenduduk'];
  //     // $this->model->nama_jenispekerjaan = $_POST['nama_jenispekerjaan'];
  //     // $query = $this->model->updatejenispekerjaan($id_jenispekerjaan);
  //     // echo $noKK;
  //     $this->session->set_flashdata('sukses', 'Edit data penduduk berhasil dilakukan!');
  //     redirect('PendafKKC/caridatakk/'.$noKK);
  //   }
  // }
  public function tambah_petugas(){
    $data=array(
      "title"=>'Tambah Analis',
          "aktif"=>"petugas",
          "bclass"=>" ",
          //"petugas"=>$this->AdminM->get_peran(),
          'nama_petugas' => set_value('nama_petugas', ''),
          'alamat_petugas' => '',
          'no_hp_petugas' => '',
          'username' => '',
          'password' => '',
          'id2' => '',
        );
    $data['body']= $this->load->view('tambah_petugasV', $data, true);
    $this->load->view('template_admin', $data);
    
  }
  public function inputpetugas(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_petugas', 'Nama petugas', 'required');
    $this->form_validation->set_rules('alamat_petugas', 'Alamat petugas', 'required');
    $this->form_validation->set_rules('no_hp_petugas', 'No HP petugas', 'required|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $u=$_POST['username'];
    $cekper=$this->db->query("select * from petugas where username='$u'")->num_rows();
    if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      }else{
      $this->session->set_flashdata('eror','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Petugas',
            "aktif"=>"petugas",
            "bclass"=>" ",
            'nama_petugas' => set_value('nama_petugas', ''),
            'alamat_petugas' => set_value('alamat_petugas', ''),
            'no_hp_petugas' => set_value('no_hp_petugas', ''),
            'username' => set_value('username', ''),
            'password' => set_value('password', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('tambah_petugasv', $data, true);
      $this->load->view('template_admin', $data);
      
    }elseif($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      redirect('AdminC');
    }else{
      $data=array(
        "id_petugas"=>getId('petugas','id_petugas'),
        "nama_petugas"=>$_POST['nama_petugas'],
        "alamat_petugas"=>$_POST['alamat_petugas'],
        "no_hp_petugas"=>$_POST['no_hp_petugas'],
        "username"=>$_POST['username'],
        "password"=>md5($_POST['password']),
      );
      $this->db->insert('petugas',$data);
      $this->session->set_flashdata('sukses',"Tambah data petugas berhasil dilakukan !");
      redirect('AdminC');
    }
  }


  //  public function laporanpendaftaranakte(){
  //   $data=array(
  //         "title"=>'Laporan Pendaftaran Akte',
  //         "aktif"=>" ",
  //         "pendafaktehari"=>$this->model->pendafaktehari(),
  //         "pendafaktebulan"=>$this->model->pendafaktebulan(),
  //         "pendafaktetahun"=>$this->model->pendafaktetahun(),
  //         $username=$this->session->userdata('user'),
  //         $peran=$this->session->userdata('peran'),
  //       );
  //   $data['body']= $this->load->view('laporan_akte.php', $data, true);
  //    $this->load->view('template_akte', $data);
  // }

  // public function cetaklaporanaktehari(){
  //     ob_start();
  //       $data=array(
  //         "d"=>$this->model->pendafaktehari(),
  //         "tabel"=>"cetak_akte_perhari.php",
  //         "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERHARI",
  //        );
  //       $this->load->view('layout_cetak_fix.php', $data);

  //     $html = ob_get_contents();
  //         ob_end_clean();
          
  //         require_once('./assets/html2pdf/html2pdf.class.php');
  //     $pdf = new HTML2PDF('P','A4','en');
  //     $pdf->WriteHTML($html);
  //     $pdf->Output('Laporan Pendaftaran Akte Perhari.pdf', 'I');
  // }
  //   public function cetaklaporanaktebulan(){
  //     ob_start();
  //       $data=array(
  //         "d"=>$this->model->pendafaktebulan(),
  //         "tabel"=>"cetak_akte_perbulan.php",
  //         "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERBULAN",
  //        );
  //       $this->load->view('layout_cetak_fix.php', $data);

  //     $html = ob_get_contents();
  //         ob_end_clean();
          
  //         require_once('./assets/html2pdf/html2pdf.class.php');
  //     $pdf = new HTML2PDF('P','A4','en');
  //     $pdf->WriteHTML($html);
  //     $pdf->Output('Laporan Pendaftaran Akte Perbulan.pdf', 'I');
  // }
  //   public function cetaklaporanaktetahun(){
  //     ob_start();
  //       $data=array(
  //         "d"=>$this->model->pendafaktetahun(),
  //         "tabel"=>"cetak_akte_pertahun.php",
  //         "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERTAHUN",
  //        );
  //       $this->load->view('layout_cetak_fix.php', $data);

  //     $html = ob_get_contents();
  //         ob_end_clean();
          
  //         require_once('./assets/html2pdf/html2pdf.class.php');
  //     $pdf = new HTML2PDF('P','A4','en');
  //     $pdf->WriteHTML($html);
  //     $pdf->Output('Laporan Pendaftaran Akte Pertahun.pdf', 'I');
  // }
  //  public function cetakpendafakte(){
  //     ob_start();
  //       $data=array(
  //         "nik">$_POST['nik'],
  //         "id"=>$_POST['id_pendaftaran'],
  //         "d"=>$this->model->getdatapedkkc($nik, $id),
  //         "tabel"=>"cetak_tandaterimaakte.php",
  //         "judul_lap"=>"Tanda Terima Berkas Akte",
  //        );
  //       $this->load->view('layout_cetak_fix.php', $data);

  //     $html = ob_get_contents();
  //         ob_end_clean();
          
  //         require_once('./assets/html2pdf/html2pdf.class.php');
  //     $pdf = new HTML2PDF('P','A4','en');
  //     $pdf->WriteHTML($html);
  //     $pdf->Output('Tanda Terima Berkas Akte.pdf', 'I');
  // }
  
}
