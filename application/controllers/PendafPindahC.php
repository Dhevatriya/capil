<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PendafPindahC extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('PendafPindahM');
    $this->model = $this->PendafPindahM;
    no_access_pindah();
  }

var $data= array();
    function index(){
        $id=$this->input->post('nik');
        $data=array(
          "title"=>'Pendaftaran Surat Pindah',
          "aktif"=>"pindah",
        );
    $data['body']= $this->load->view('petugas_pindah.php', $data, true);
    $this->load->view('template_pindah',$data);
    }
    function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas Surat Pindah Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }
    public function searchdatapindah(){
    $nik=$_POST['nik'];
    $data=array(
      "title"=>'Edit Data',
          "aktif"=>"pindah",
          "dataPenduduk"=>$this->PendafPindahM->getDataPenduduk($nik),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_pindahv', $data, true);
    $this->load->view('template_pindah', $data);
  }


  public function datapendudukeditpindah($id){
    $data=array(
          "title"=>'Edit Data Penduduk',
          "aktif"=>"pindah",
          "id"=>$id,
          "jenis"=>$this->PendafPindahM->getjenis(),
          "jenisk"=>$this->PendafPindahM->getjeniskerja($id),
          "id_jenispekerjaan"=>'',
          "id_jenispekerjaanFK"=>'',
          "get_datapenduduk"=>$this->PendafPindahM->get_penduduk_det($id)->row_array(),
          "bclass"=>" ",
        );

    $data['body']= $this->load->view('edit_pindahv', $data, true);
    $this->load->view('template_pindah', $data);
  }
 //*363'369# 

  public function datapendudukeditpindahproses($nik){
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
            "get_datapenduduk"=>$this->PendafPindahM->get_penduduk_det($_POST['idPenduduk'])->row_array(),
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
      $data['body']= $this->load->view('edit_pindahv', $data, true);
      $this->load->view('template_pindah', $data);
    }else{
      $idPenduduk = $this->PendafPindahM->getidpenduduk($_POST['nik']);
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
      redirect('PendafPindahC/caridatapindah/'.$nik);
    }
  }
    public function caridatapindah($nik){
    $data=array(
      "title"=>'Edit Data Keluarga',
          "aktif"=>"pindah",
          "dataPenduduk"=>$this->PendafPindahM->getDataPenduduk($nik),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_pindahv', $data, true);
    $this->load->view('template_pindah', $data);
  }
   function buatpindah($nik){
      $data=array(
            "title"=>'Pendaftaran Surat Pindah',
            "aktif"=>"pindah",
            "nik"=>$nik,
            "nama_lengkap"=>getnamanik($nik),
            "tgl_jadi"=>set_value(''),
      );
      $data['body']= $this->load->view('buat_pindahv.php', $data, true);
      $this->load->view('template_pindah',$data);
    }
       function buatpindahdatang($nik){
      $data=array(
            "title"=>'Pendaftaran Surat Pindah Datang',
            "aktif"=>"pindah",
            "nik"=>$nik,
            "nama_lengkap"=>getnamanik($nik),
            "tgl_jadi"=>set_value(''),
          );
      $data['body']= $this->load->view('buat_pindahdatang.php', $data, true);
      $this->load->view('template_pindah',$data);
    }
        public function inputpendaftaranpindah(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $nik=$_POST['nik'];
    $getidpendbaru = getid_pendterbaru();
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"pindah",
        "datapendaf"=>$this->PendafPindahM->getdatapedkk($nik, $getidpendbaru),
      );
      $query = $this->PendafPindahM->insertpendaftranpindah();
          $getidpendbaru = getid_pendterbaru();
      $this->session->set_flashdata('sukses', 'Pendaftaran Surat Pindah baru berhasil dilakukan!');
      redirect('PendafPindahC/inputpendafpindah/'.$getidpendbaru);
    }

  public function inputpendafpindah($getidpendbaru){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $idkel = getid_kelterbaru($getidpendbaru);
    $idpend = getid_keluargaFK($idkel);
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"pindah",
        "datapendaf"=>$this->PendafPindahM->getdata_penduduk($idkel, $getidpendbaru,$idpend),
      );
      $data['body']= $this->load->view('form_pengambilan_pindah', $data, true);
      $this->load->view('template_pindah', $data);
    }
        public function inputpendaftaranpindahdatang(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $nik=$_POST['nik'];
    $getidpendbaru = getid_pendterbaru();
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"pindah",
        "datapendaf"=>$this->PendafPindahM->getdatapedkk($nik, $getidpendbaru),
      );
      $query = $this->PendafPindahM->insertpendaftranpindahdatang();
          $getidpendbaru = getid_pendterbaru();
      $this->session->set_flashdata('sukses', 'Pendaftaran surat pindah datang baru berhasil dilakukan!');
      redirect('PendafPindahC/inputpendafpindahdatang/'.$getidpendbaru);
    }

  public function inputpendafpindahdatang($getidpendbaru){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluargaFK', 'idKeluargaFK', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $idkel = getid_kelterbaru($getidpendbaru);
    $idpend = getid_keluargaFK($idkel);
    $data=array(
        "title"=>'Daftar ',
        "aktif"=>"pindah",
        "datapendaf"=>$this->PendafPindahM->getdata_penduduk($idkel, $getidpendbaru,$idpend),
      );
      $data['body']= $this->load->view('form_pengambilan_pindah_datang', $data, true);
      $this->load->view('template_pindah', $data);
    }


  public function laporanpendaftaranpindah(){
    $data=array(
          "title"=>'Laporan Pendaftaran Surat Pindah dan Surat Pindah Datang',
          "aktif"=>" ",
          "pendafpindahhari"=>$this->model->pendafpindahhari(),
          "pendafpindahbulan"=>$this->model->pendafpindahbulan(),
          "pendafpindahtahun"=>$this->model->pendafpindahtahun(),
          "pendafpindahdatanghari"=>$this->model->pendafpindahdatanghari(),
          "pendafpindahdatangbulan"=>$this->model->pendafpindahdatangbulan(),
          "pendafpindahdatangtahun"=>$this->model->pendafpindahdatangtahun(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),
        );
    $data['body']= $this->load->view('laporan_pindah.php', $data, true);
     $this->load->view('template_pindah', $data);
  }

  public function cetaklaporanpindahhari(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahhari(),
          "tabel"=>"cetak_pindah_perhari.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH PERHARI",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Perhari.pdf', 'I');
  }
  public function cetaklaporanpindahbulan(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahbulan(),
          "tabel"=>"cetak_pindah_perbulan.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH PERBULAN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Perbulan.pdf', 'I');
  }
    public function cetaklaporanpindahtahun(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahtahun(),
          "tabel"=>"cetak_pindah_pertahun.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH PERTAHUN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Pertahun.pdf', 'I');
  }
    public function cetaklaporanpindahdatanghari(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahdatanghari(),
          "tabel"=>"cetak_pindah_datang_perhari.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH DATANG PERHARI",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Datang Perhari.pdf', 'I');
  }
    public function cetaklaporanpindahdatangbulan(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahdatangbulan(),
          "tabel"=>"cetak_pindah_datang_perbulan.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH DATANG PERBULAN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Datang Perbulan.pdf', 'I');
  }
    public function cetaklaporanpindahdatangtahun(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafpindahdatangtahun(),
          "tabel"=>"cetak_pindah_datang_pertahun.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN SURAT PINDAH DATANG PERTAHUN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Surat Pindah Datang Pertahun.pdf', 'I');
  }
}