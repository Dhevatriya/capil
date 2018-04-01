<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PendafAkteC extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('PendafAkteM');
    $this->model = $this->PendafAkteM;
    no_access_akte();
  }

var $data= array();
    function index(){
        $id=$this->input->post('nik');
        // $nik =$_POST['nik'];
        $data=array(
          "title"=>'Pendaftaran Kartu Keluarga',
          "aktif"=>"akte",
          $username=$this->session->userdata('user'),
          $password=$this->session->userdata('pass'),
          "getdatapn"=>$this->PendafAkteM->getpendkk($id),
        );
    $data['body']= $this->load->view('petugas_akte.php', $data, true);
    $this->load->view('template_akte',$data);
    }

  public function datapendudukedit($id){
    $data=array(
          "title"=>'Edit Data Keluarga',
          "aktif"=>"akte",
          "id"=>$id,
          "jenis"=>$this->PendafAkteM->getjenis(),
          "jenisk"=>$this->PendafAkteM->getjeniskerja($id),
          "id_jenispekerjaan"=>'',
          "id_jenispekerjaanFK"=>'',
          "get_datapenduduk"=>$this->PendafAkteM->get_penduduk_det($id)->row_array(),
          "bclass"=>" ",
        );

    $data['body']= $this->load->view('edit_akte', $data, true);
    $this->load->view('template_akte', $data);
  }

  public function searchdata(){
    $nik=$_POST['nik'];
    $data=array(
      "title"=>'Edit Data',
          "aktif"=>"akte",
          "dataPenduduk"=>$this->PendafAkteM->getDataPenduduk($nik),
          "pemlk"=>$this->PendafAkteM->getdatapennik($nik),
          "bclass"=>" ",
          
        );
    $data['body']= $this->load->view('tabel_aktev', $data, true);
    $this->load->view('template_akte', $data);

  }
  public function caridata($nik){
    $data=array(
      "title"=>'Edit Data Keluarga',
          "aktif"=>"akte",
          "dataPenduduk"=>$this->PendafAkteM->getDataPenduduk($nik),
          "pemlk"=>$this->PendafAkteM->getdatapennik($nik),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_aktev', $data, true);
    $this->load->view('template_akte', $data);
  }

  // public function searchdataedit(){
  //   $data=array(
  //     "title"=>'Edit Data',
  //         "aktif"=>"akte",
  //         "dataPenduduk"=>$this->PendafAkteM->getDataPenduduk($nik),
  //         "pemlk"=>$this->PendafAkteM->getdatapennik($nik),
  //         "bclass"=>" ",
  //       );
  //   $data['body']= $this->load->view('b', $data, true);
  //   $this->load->view('template', $data);

  // }

  public function datapendudukeditproses($nik){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nik', 'nik','required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir','required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir','required');
    $this->form_validation->set_rules('agama', 'agama','required');
    $this->form_validation->set_rules('pendidikan', 'pendidikan','required');
    $this->form_validation->set_rules('nama_jenispekerjaan', 'nama_jenispekerjaan','required');
    $this->form_validation->set_rules('status_perkawinan', 'status_perkawinan','required');
    $this->form_validation->set_rules('status_hub_dalam_keluarga', 'status_hub_dalam_keluarga','required');
    $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan','required');
    $this->form_validation->set_rules('no_paspor', 'no_paspor','required');
    $this->form_validation->set_rules('no_kitas_kitap', 'no_kitas_kitap','required');
    $this->form_validation->set_rules('ayah', 'ayah','required');
    $this->form_validation->set_rules('ibu', 'ibu','required');
    $nik=  $_POST['nik'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Penduduk',
            "aktif"=>"akte",
            "bclass"=>" ",
            "get_datapenduduk"=>$this->PendafAkteM->get_penduduk_det($_POST['idPenduduk'])->row_array(),
            'nik' => set_value('nik', ''),
            'nama_lengkap' => set_value('nama_lengkap', ''),
            'jenis_kelamin' => set_value('jenis_kelamin', ''),
            'tempat_lahir' => set_value('tempat_lahir', ''),
            'tanggal_lahir' => set_value('tanggal_lahir', ''),
            'agama' => set_value('agama', ''),
            'pendidikan' => set_value('pendidikan', ''),
            'nama_jenispekerjaan' => set_value('nama_jenispekerjaan', ''),
            'status_perkawinan' => set_value('status_perkawinan', ''),
            'status_hub_dalam_keluarga' => set_value('status_hub_dalam_keluarga', ''),
            'kewarganegaraan' => set_value('kewarganegaraan', ''),
            'no_paspor' => set_value('no_paspor', ''),
            'no_kitas_kitap' => set_value('no_kitas_kitap', ''),
            'ayah' => set_value('ayah', ''),
            'ibu' => set_value('ibu', ''),
            'id2' => 'has-error',
          );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_akte', $data, true);
      $this->load->view('template_akte', $data);
    }else{
      $idPenduduk = $this->PendafAkteM->getidpenduduk($_POST['nik']);
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->agama = $_POST['agama'];
      $this->model->pendidikan = $_POST['pendidikan'];
      $this->model->nama_jenispekerjaan = $_POST['nama_jenispekerjaan'];
      $this->model->status_perkawinan = $_POST['status_perkawinan'];
      $this->model->status_hub_dalam_keluarga = $_POST['status_hub_dalam_keluarga'];
      $this->model->kewarganegaraan = $_POST['kewarganegaraan'];
      $this->model->no_paspor = $_POST['no_paspor'];
      $this->model->no_kitas_kitap = $_POST['no_kitas_kitap'];
      $this->model->ayah = $_POST['ayah'];
      $this->model->ibu = $_POST['ibu'];
      $query = $this->model->updatependuduk($idPenduduk);

      // $this->model->nama_jenispekerjaan = $_POST['nama_jenispekerjaan'];
      // $query = $this->model->updatejenispekerjaan($idPenduduk);

      $this->session->set_flashdata('sukses', 'Edit data penduduk berhasil dilakukan!');
      redirect('PendafAkteC/caridata/'.$nik);
    }
  }
 
    // function get_noNIK(){
    //     $nik=$this->input->post('nik');
    //     $data=$this->PendafAkteM->getnoNIK($nik);
    //     echo json_encode($data);
    // }


    function buatakte(){
      $data=array(
            "title"=>'Pendaftaran Akte',
            "aktif"=>"akte",
            "nik"=>$_POST['nik'],
            "nama_lengkap"=>$_POST['nama_lengkap'],
            "tgl_jadi"=>set_value(''),
             "pem"=>$this->PendafAkteM->getdatapen(),
          );
      $data['body']= $this->load->view('buat_aktev.php', $data, true);
      $this->load->view('template_akte',$data);
    }
    public function inputpendaftaranakte(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $nik=$_POST['nik'];
    $getidpendbaru = getid_pendterbaru();
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"akte",
        "datapendaf"=>$this->PendafAkteM->getdatapedkk($nik, $getidpendbaru),
      );
      $query = $this->PendafAkteM->insertpendaftranakte();
      $getidpendbaru = getid_pendterbaru();
      $this->session->set_flashdata('sukses', 'Pendaftaran Akte baru berhasil dilakuakan!');
      redirect('PendafAkteC/inputpendafakte/'.$getidpendbaru);
    }

  public function inputpendafakte($getidpendbaru){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $idkel = getid_kelterbaru($getidpendbaru);
    $idpend = getid_keluargaFK($idkel);
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"akte",
        "datapendaf"=>$this->PendafAkteM->getdata_penduduk($idkel, $getidpendbaru,$idpend),
      );
      $data['body']= $this->load->view('form_pengambilan_akte', $data, true);
      $this->load->view('template_akte', $data);
    }

  function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas Akte Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }

   public function laporanpendaftaranakte(){
    $data=array(
          "title"=>'Laporan Pendaftaran Akte',
          "aktif"=>" ",
          "pendafaktehari"=>$this->model->pendafaktehari(),
          "pendafaktebulan"=>$this->model->pendafaktebulan(),
          "pendafaktetahun"=>$this->model->pendafaktetahun(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),
        );
    $data['body']= $this->load->view('laporan_akte.php', $data, true);
     $this->load->view('template_akte', $data);
  }

  public function cetaklaporanaktehari(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafaktehari(),
          "tabel"=>"cetak_akte_perhari.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERHARI",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perhari.pdf', 'I');
  }
    public function cetaklaporanaktebulan(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafaktebulan(),
          "tabel"=>"cetak_akte_perbulan.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERBULAN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perbulan.pdf', 'I');
  }
    public function cetaklaporanaktetahun(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafaktetahun(),
          "tabel"=>"cetak_akte_pertahun.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN AKTE PERTAHUN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Pertahun.pdf', 'I');
  }
   public function cetakpendafakte(){
      ob_start();
        $data=array(
          "nik">$_POST['nik'],
          "id"=>$_POST['id_pendaftaran'],
          "d"=>$this->model->getdatapedkkc($nik, $id),
          "tabel"=>"cetak_tandaterimaakte.php",
          "judul_lap"=>"Tanda Terima Berkas Akte",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas Akte.pdf', 'I');
  }
  
}
