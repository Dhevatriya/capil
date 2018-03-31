<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PendafKKC extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('PendafKKM');
    $this->model = $this->PendafKKM;
    no_access();
  }

var $data= array();
    function index(){
       $id=$this->input->post('noKK');
        $data=array(
          "title"=>'Pendaftaran Kartu Keluarga',
          "aktif"=>"kk",
          "getdatakel"=>$this->PendafKKM->getkel($id),
          "peml"=>$this->PendafKKM->getdatanoKK(),
          "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($id)->row_array(),
        );
    $data['body']= $this->load->view('petugas_kkv.php', $data, true);
    $this->load->view('template_kk',$data);
    }
    function daftarkk(){
       $id=$this->input->post('noKK');
        $data=array(
          "title"=>'Pendaftaran Kartu Keluarga',
          "aktif"=>"kk",
          "getdatakel"=>$this->PendafKKM->getkel($id),
          "peml"=>$this->PendafKKM->getdatanoKK(),
          "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($id)->row_array(),
        );
    $data['body']= $this->load->view('daftar_kk_baru_cari.php', $data, true);
    $this->load->view('template_kk',$data);
    }
 
    public function tambahKK(){
    $data=array(
          "title"=>'Pendaftaran Kartu Keluarga',
          "aktif"=>"kk",
          "nama_kepala_keluarga"=>set_value('nama_kepala_keluarga',''),
          "alamat"=>'',
          "rt"=>'',
          "rw"=>'',
          "id_kecamatanFK"=>set_value(''),
          "idkecamatan_FK"=>set_value(''),
          "des"=>$this->PendafKKM->getdes(),
          "kec"=>$this->PendafKKM->getkec(),
          "kabupaten"=>'',
          "kode_pos"=>'',
          "provinsi"=>'',
        );
    $data['body']= $this->load->view('tambah_keluarga.php', $data, true);
    $this->load->view('template_kk',$data);
    }
public function tambahdatapenduduk($noKK){
    $data=array(
          "title"=>'Tambah Data Penduduk',
          "aktif"=>"kk",
          // "idPenduduk"=>idPenduduk
          "noKK"=>$noKK,
          "det"=>$this->PendafKKM->getnomorkk($noKK),
          "nik"=>'',
          "nama_lengkap"=>set_value('nama_lengkap',''),
          "jenis_kelamin"=>'',
          "tempat_lahir"=>'',
          "tanggal_lahir"=>'',
          "agama"=>'',
          "pendidikan"=>'',
          'id_jenispekerjaanFK'=>'',
          "jenis"=>$this->PendafKKM->getjenis(),
          "jenisp"=>$this->PendafKKM->getjenisp(),
          "status_perkawinan"=>'',
          "status_hub_dalam_keluarga"=>'',
          "kewarganegaraan"=>'',
          "no_paspor"=>'',
          "no_kitas_kitap"=>'',
          "ayah"=>'',
          "ibu"=>'',
        );
    $data['body']= $this->load->view('tambah_penduduk.php', $data, true);
    $this->load->view('template_kk',$data);
    }
    function buatkk(){
      $data=array(
            "title"=>'Pendaftaran KK',
            "aktif"=>"kk",
            "noKK"=>$_POST['noKK'],
            "pem"=>$this->PendafKKM->getdatapen(),
            "nama_kepala_keluarga"=>$_POST['nama_kepala_keluarga'],
            "tgl_jadi"=>set_value(''),
          );
      $data['body']= $this->load->view('buat_kkv.php', $data, true);
      $this->load->view('template_kk',$data);
    }
  
    function buatkkbaru(){
      $data=array(
            "title"=>'Pendaftaran KK Baru',
            "aktif"=>"kk",
            "nik"=>$_POST['nik'],
            // "idkeluarga"
            "pem"=>$this->PendafKKM->getdatapen(),
            "nama_lengkap"=>$_POST['nama_lengkap'],
            "alamat"=>set_value(''),
            "rt"=>set_value(''),
            "rw"=>set_value(''),
            "id_kecamatanFK"=>set_value(''),
            "idkecamatan_FK"=>set_value(''),
            "des"=>$this->PendafKKM->getdes(),
            "kec"=>$this->PendafKKM->getkec(),
            "kabupaten"=>set_value(''),
            "kode_pos"=>set_value(''),
            "provinsi"=>set_value(''),
            "tgl_jadi"=>set_value(''),
          );
      $data['body']= $this->load->view('daftar_kk_baru.php', $data, true);
      $this->load->view('template_kk',$data);
    }
    public function datapendudukeditkk($id){
      // $jenisk=getid_jenisFK($id);
      // echo $jenisk;
    $data=array(
          "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "id"=>$id,
          "idKel"=>getid_keluargaFK($id),
          "jenis"=>$this->PendafKKM->getjenis(),
          "jenisk"=>$this->PendafKKM->getjeniskerja($id),
          "id_jenispekerjaan"=>'',
          "id_jenispekerjaanFK"=>'',
          "get_datapenduduk"=>$this->PendafKKM->get_penduduk_det($id)->row_array(),
          "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det(getid_keluargaFK($id))->row_array(),
          "agama"=>'',
          "bclass"=>" ",
        );

    $data['body']= $this->load->view('edit_akte_kk', $data, true);
    $this->load->view('template_kk', $data);
    
  }
  public function datapendudukeditkkbaru($id){
    $data=array(
          "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "id"=>$id,
          "get_datapenduduk"=>$this->PendafKKM->get_penduduk_detail($id)->row_array(),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('edit_data_penduduk_baru', $data, true);
    $this->load->view('template_kk', $data);
    
  }
  public function datapendudukeditbaruproses($nik){
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
            "aktif"=>"kk",
            "bclass"=>" ",
            "get_datapenduduk"=>$this->PendafKKM->get_penduduk_det($_POST['idPenduduk'])->row_array(),
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
      $data['body']= $this->load->view('edit_data_penduduk_baru', $data, true);
      $this->load->view('template_kk', $data);
    }else{
      $idPenduduk = $this->PendafKKM->getidpenduduk($_POST['nik']);
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->agama = $_POST['agama'];
      $this->model->pendidikan = $_POST['pendidikan'];
      $this->model->status_perkawinan = $_POST['status_perkawinan'];
      $this->model->status_hub_dalam_keluarga = $_POST['status_hub_dalam_keluarga'];
      $this->model->kewarganegaraan = $_POST['kewarganegaraan'];
      $this->model->no_paspor = $_POST['no_paspor'];
      $this->model->no_kitas_kitap = $_POST['no_kitas_kitap'];
      $this->model->ayah = $_POST['ayah'];
      $this->model->ibu = $_POST['ibu'];
      $query = $this->model->updatependuduk($idPenduduk);

      $id_jenispekerjaan = $this->PendafKKM->getidpenduduk($_POST['nik']);
      $this->model->nama_jenispekerjaan = $_POST['nama_jenispekerjaan'];
      $query = $this->model->updatejenispekerjaan($id_jenispekerjaan);

      $this->session->set_flashdata('sukses', 'Edit data petugas berhasil dilakukan!');
      redirect('PendafKKC/caridatanik/'.$nik);
    }
  }

public function datapendudukeditproses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nik', 'nik','required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir','required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir','required');
    $this->form_validation->set_rules('agama', 'agama','required');
    $this->form_validation->set_rules('pendidikan', 'pendidikan','required');
    $this->form_validation->set_rules('id_jenispekerjaanFK', 'id_jenispekerjaanFK','required');
    $this->form_validation->set_rules('status_perkawinan', 'status_perkawinan','required');
    $this->form_validation->set_rules('status_hub_dalam_keluarga', 'status_hub_dalam_keluarga','required');
    $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan','required');
    $this->form_validation->set_rules('no_paspor', 'no_paspor','required');
    $this->form_validation->set_rules('no_kitas_kitap', 'no_kitas_kitap','required');
    $this->form_validation->set_rules('ayah', 'ayah','required');
    $this->form_validation->set_rules('ibu', 'ibu','required');
    $noKK=  $_POST['noKK'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Penduduk',
            "aktif"=>"kk",
            "bclass"=>" ",
            "get_datapenduduk"=>$this->PendafKKM->get_penduduk_det($_POST['idPenduduk'])->row_array(),
            // "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($noKK)->row_array(),
            'noKk'=>set_value('noKK',''),
            'nik' => set_value('nik', ''),
            'nama_lengkap' => set_value('nama_lengkap', ''),
            'jenis_kelamin' => set_value('jenis_kelamin', ''),
            'tempat_lahir' => set_value('tempat_lahir', ''),
            'tanggal_lahir' => set_value('tanggal_lahir', ''),
            'agama' => set_value('agama', ''),
            'pendidikan' => set_value('pendidikan', ''),
            'id_jenispekerjaanFK' => set_value('id_jenispekerjaanFK', ''),
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
      $data['body']= $this->load->view('edit_akte_kk', $data, true);
      $this->load->view('template_kk', $data);
    }else{
      $idPenduduk = $_POST['idPenduduk'];
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin = $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->agama = $_POST['agama'];
      $this->model->pendidikan = $_POST['pendidikan'];
      $this->model->id_jenispekerjaanFK = $_POST['id_jenispekerjaanFK'];
      $this->model->status_perkawinan = $_POST['status_perkawinan'];
      $this->model->status_hub_dalam_keluarga = $_POST['status_hub_dalam_keluarga'];
      $this->model->kewarganegaraan = $_POST['kewarganegaraan'];
      $this->model->no_paspor = $_POST['no_paspor'];
      $this->model->no_kitas_kitap = $_POST['no_kitas_kitap'];
      $this->model->ayah = $_POST['ayah'];
      $this->model->ibu = $_POST['ibu'];
      $query = $this->model->updatependuduk($idPenduduk);

      // $id_jenispekerjaan = $_POST['idPenduduk'];
      // $this->model->nama_jenispekerjaan = $_POST['nama_jenispekerjaan'];
      // $query = $this->model->updatejenispekerjaan($id_jenispekerjaan);
      // echo $noKK;
      $this->session->set_flashdata('sukses', 'Edit data petugas berhasil dilakukan!');
      redirect('PendafKKC/caridatakk/'.$noKK);
    }
  }

    public function datakeluargaedit($id){
    $data=array(
        "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($id)->row_array(),
          "bclass"=>" ",
          "det"=>$this->PendafKKM->getnomorkk($id),
          "id"=>$id,
        );
    $data['body']= $this->load->view('edit_keluargav', $data, true);
    $this->load->view('template_kk', $data); 
  }
  public function datakeluargaeditproses($noKK){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('noKK', 'noKK','required');
    $this->form_validation->set_rules('nama_kepala_keluarga', 'nama_kepala_keluarga','required');
    $this->form_validation->set_rules('alamat', 'alamat','required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan','required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten','required');
    $this->form_validation->set_rules('kode_pos', 'kode_pos','required');
    $this->form_validation->set_rules('provinsi', 'provinsi','required');
    $noKK=$_POST['noKK'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Keluarga',
            "aktif"=>"kk",
            "bclass"=>" ",
            "get_datakeluarga"=>$this->PendafKKM->get_keluarga_det($_POST['idKeluarga'])->row_array(),
            "get_datakec"=>$this->PendafKKM->get_kec_det($_POST['id_kecamatan'])->row_array(),
            "get_datades"=>$this->PendafKKM->get_des_det($_POST['id_desakelurahan'])->row_array(),
            'noKK' => set_value('noKK', ''),
            'nama_kepala_keluarga' => set_value('nama_kepala_keluarga', ''),
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'kabupaten' => set_value('kabupaten', ''),
            'kode_pos' => set_value('kode_pos', ''),
            'provinsi' => set_value('provinsi', ''),
            'id2' => 'has-error',
          );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_keluargav', $data, true);
      $this->load->view('template_kk', $data);
    }else{
      $idKeluarga = $this->PendafKKM->getidkeluarga($_POST['noKK']);
      $this->model->noKK= $_POST['noKK'];
      $this->model->nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->kabupaten = $_POST['kabupaten'];
      $this->model->kode_pos = $_POST['kode_pos'];
      $this->model->provinsi = $_POST['provinsi'];
      $query = $this->model->updatekeluarga($idKeluarga);

      $id_desakelurahan = $this->PendafKKM->getidkeluarga($_POST['noKK']);
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $query1 = $this->model->updatedesakelurahan($id_desakelurahan);

      $id_kecamatan =$this->PendafKKM->getidkeluarga($_POST['noKK']);
      $this->model->nama_kecamatan = $_POST['nama_kecamatan'];
      $query2 = $this->model->updatekecamatan($id_kecamatan);
      $this->session->set_flashdata('sukses', 'Edit Data Keluarga berhasil dilakukan!');
      redirect('PendafKKC/caridatakk/'.$noKK);
    }
  }

  public function inputpendaftaran(){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluarga', 'idKeluarga', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $noKK = $_POST['noKK'];
    $getidpendbaru=getid_pendterbaru();
    $data=array(
         "title"=>'Daftar ',
          "aktif"=>"kk",
          "datapendafkk"=>$this->PendafKKM->getdatakeluarga($noKK, $getidpendbaru),
    );
    $query = $this->PendafKKM->insertpendaftrankk();
    $getidpendbaru = getid_pendterbaru();
    $this->session->set_flashdata('sukses', 'Pendaftaran KK baru berhasil dilakuakan!');
    redirect('PendafKKC/inputpendaftarankk/'.$getidpendbaru);

    }
    public function inputpendaftarankk($getidpendbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluarga', 'idKeluarga', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $idkel = getid_kelterbaru($getidpendbaru);
    $data=array(
         "title"=>'Daftar ',
            "aktif"=>"kk",
            "datapendafkk"=>$this->PendafKKM->getdata_keluarga($idkel, $getidpendbaru),
    );
    $data['body']= $this->load->view('form_pengambilan_kk', $data, true);
    $this->load->view('template_kk', $data);

    }
  public function inputpendaftarankkbaru(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('idkecamatan_FK', 'idkecamatan_FK', 'required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
    $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required');
    $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $getkeluarga=getId('data_keluarga','idKeluarga');
    $getPendaf=getId('pendaftaran','id_pendaftaran');
    if($this->form_validation->run()==FALSE){
      $data=array(
           "title"=>'Pendaftaran KK Baru',
            "aktif"=>"kk",
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'idkecamatan_FK' => set_value('idkecamatan_FK', ''),
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'kabupaten' => set_value('kabupaten', ''),
            'kode_pos' => set_value('kode_pos', ''),
            'provinsi' => set_value('provinsi', ''),
            'tgl_jadi' => set_value('tgl_jadi', ''),
            'id2' => 'has-error',
      );
      $data['body']= $this->load->view('daftar_kk_baru', $data, true);
      $this->load->view('template_kk', $data);

    }else{
      $this->model->nama_kepala_keluarga=$_POST['nama_lengkap'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->idkecamatan_FK=$_POST['idkecamatan_FK'];
      $this->model->kabupaten = $_POST['kabupaten'];
      $this->model->kode_pos = $_POST['kode_pos'];
      $this->model->provinsi = $_POST['provinsi'];
      $query1 = $this->model->insertkeluarga();

      $this->model->tgl_buat = date('Y/m/d');
      $this->model->tgl_jadi = $_POST['tgl_jadi'];
      $this->model->idKeluargaFK=$getkeluarga;
      $this->model->id_petugasFK = '1';
      $this->model->status = 'kk';
      $query = $this->model->insertpendaftaran();
     
      $getidpendbaru = getid_pendterbaru();
      $this->session->set_flashdata('sukses', 'Pendaftaran KK baru berhasil dilakuakan!');
      redirect('PendafKKC/inputpendaftarandatakkbaru/'.$getidpendbaru);
    }
  }
    public function inputpendaftarandatakkbaru($getidpendbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluarga', 'idKeluarga', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $idkel = getid_kelterbaru($getidpendbaru);
    $data=array(
         "title"=>'Daftar ',
            "aktif"=>"kk",
            "datapendafkkbaru"=>$this->PendafKKM->getdata_keluarga($idkel, $getidpendbaru),
    );
    $data['body']= $this->load->view('form_pengambilan_kk_baru', $data, true);
    $this->load->view('template_kk', $data);

    }
     function inputpendftrnmanual(){
      $id=getid_kelbaru();
      $this->model->tgl_buat=date('y/m/d');
      $this->model->tgl_jadi=$_POST['tgl_jadi'];
      $this->model->idKeluargaFK=getid_kelbaru();
      $this->model->id_petugasFK='1';
      $this->model->status='kk';
      $query =$this->model->insertpendaftaran();

      $getidpendbaru=getid_pendterbaru();
      $this->session->set_flashdata('sukses', 'Pendaftaran KK baru berhasil dilakuakan!');
      redirect('PendafKKC/buatkkmanual/'.$getidpendbaru);

    }
      function buatkkmanual($getidpendbaru){
      $id=getid_kelbaru();
      $getidpendbaru=getid_pendterbaru();
      $data=array(
            "title"=>'Pendaftaran KK',
            "aktif"=>"kk",
            "datakeluargabarumanual"=>$this->PendafKKM->getdata_pendaftaran($getidpendbaru,$id),
          );
      $data['body']= $this->load->view('form_pengambilan_kk_baru_manual.php', $data, true);
      $this->load->view('template_kk',$data);
    }

  public function searchdatakk(){
    $noKK= $_POST['noKK'];
    $data=array(
      "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "datakeluarga"=>$this->PendafKKM->getData($noKK)->result(),
          "dataPenduduk"=>$this->PendafKKM->getDataPenduduk($noKK)->result(),
          "datapdkk"=>$this->PendafKKM->getdatacari(),
          "det"=>$this->PendafKKM->getnomorkk($noKK),
          "peml"=>$this->PendafKKM->getdatanoKK(),
          "pemll"=>$this->PendafKKM->getdatapend(),
          "pem"=>$this->PendafKKM->getdatapen(),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_kkv', $data, true);
    $this->load->view('template_kk', $data);
  }

  public function caridatakk($noKK){
    $data=array(
          "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "noKK"=>$noKK,
          "datakeluarga"=>$this->PendafKKM->getData($noKK)->result(),
          "dataPenduduk"=>$this->PendafKKM->getDataPenduduk($noKK)->result(),
          "datapdkk"=>$this->PendafKKM->getdatacari(),
          "det"=>$this->PendafKKM->getnomorkk($noKK),
          "peml"=>$this->PendafKKM->getdatanoKK(),
          "pemll"=>$this->PendafKKM->getdatapend(),
          "pem"=>$this->PendafKKM->getdatapen(),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_kkv', $data, true);
    $this->load->view('template_kk', $data);
  }
public function caridatanik($nik){
    $data=array(
      "title"=>'Edit Data Keluarga',
          "aktif"=>"kk",
          "dataPenduduk"=>$this->PendafKKM->get_dataPenduduk($nik),
          "pemlk"=>$this->PendafKKM->getdatapennik($nik),
          "pem"=>$this->PendafKKM->getdatapen(),
          "bclass"=>" ",
        );
    $data['body']= $this->load->view('tabel_daftar_kk', $data, true);
    $this->load->view('template_kk', $data);
  }
  public function searchdatanik(){
    $nik=$_POST['nik'];
    $data=array(
      "title"=>'Edit Data',
          "aktif"=>"kk",
          "dataPenduduk"=>$this->PendafKKM->get_dataPenduduk($nik),
          "pemlk"=>$this->PendafKKM->getdatapennik($nik),
          "bclass"=>" ",
          
        );
    $data['body']= $this->load->view('tabel_daftar_kk', $data, true);
    $this->load->view('template_kk', $data);

  }

  public function inputKK(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kepala_keluarga', 'nama_kepala_keluarga', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
    $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required');
    $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
    $nama_kepala_keluarga=$_POST['nama_kepala_keluarga'];
    $cekper=$this->db->query("select * from data_keluarga where nama_kepala_keluarga='$nama_kepala_keluarga'")->num_rows();
      if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      }else{
      $this->session->set_flashdata('eror','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Daftar KK Baru',
            "aktif"=>"kk",
            'nama_kepala_keluarga' => set_value('nama_kepala_keluarga', ''),
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'kabupaten' => set_value('kabupaten', ''),
            'kode_pos' => set_value('kode_pos', ''),
            'provinsi' => set_value('provinsi', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('daftar_kk_baru', $data, true);
      $this->load->view('template_kk', $data);
      
    }elseif($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      redirect('PendafKKC');
    }else{
      $data=array(
        // "idKeluarga"=>getId('data_keluarga','idKeluarga'),
        "nama_kepala_keluarga"=>$_POST['nama_kepala_keluarga'],
        "alamat"=>$_POST['alamat'],
        "rt"=>$_POST['rt'],
        "rw"=>$_POST['rw'],
        "nama_desakelurahan"=>$_POST['nama_desakelurahan'],
        "nama_kecamatan"=>$_POST['nama_kecamatan'],
        "kabupaten"=>$_POST['kabupaten'],
        "kode_pos"=>$_POST['kode_pos'],
        "provinsi"=>$_POST['provinsi'],
      );
      $this->db->insert('data_keluarga',$data);
      $this->session->set_flashdata('sukses',"Tambah data Data Keluarga berhasil dilakukan !");
      redirect('PendafKKC/');
    }

}
  public function inputdatapenduduk($noKK){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
    $this->form_validation->set_rules('agama', 'agama', 'required');
    $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');
    $this->form_validation->set_rules('id_jenispekerjaanFK', 'id_jenispekerjaanFK_', 'required');
    $this->form_validation->set_rules('status_perkawinan', 'status_perkawinan', 'required');
    $this->form_validation->set_rules('status_hub_dalam_keluarga', 'status_hub_dalam_keluarga', 'required');
    $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required');
    $this->form_validation->set_rules('no_paspor', 'no_paspor', 'required');
    $this->form_validation->set_rules('no_kitas_kitap', 'no_kitas_kitap', 'required');
    $this->form_validation->set_rules('ayah', 'ayah', 'required');
    $this->form_validation->set_rules('ibu', 'ibu', 'required');
    $nama_lengkap=$_POST['nama_lengkap'];
    $noKK=$_POST['noKK'];
    $cekper=$this->db->query("select * from data_penduduk where nama_lengkap='$nama_lengkap'")->num_rows();
      if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      }else{
      $this->session->set_flashdata('eror','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Data Penduduk',
            "aktif"=>"kk",
            'nama_lengkap' => set_value('nama_lengkap', ''),
            'jenis_kelamin' => set_value('jenis_kelamin', ''),
            'tempat_lahir' => set_value('tempat_lahir', ''),
            'tanggal_lahir' => set_value('tanggal_lahir', ''),
            'agama' => set_value('agama', ''),
            'pendidikan' => set_value('pendidikan', ''),
            'id_jenispekerjaanFK' => set_value('id_jenispekerjaanFK', ''),
            'status_perkawinan' => set_value('status_perkawinan', ''),
            'status_hub_dalam_keluarga' => set_value('status_hub_dalam_keluarga', ''),
            'kewarganegaraan' => set_value('kewarganegaraan', ''),
            'no_paspor' => set_value('no_paspor', ''),
            'no_kitas_kitap' => set_value('no_kitas_kitap', ''),
            'ayah' => set_value('ayah', ''),
            'ibu' => set_value('ibu', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('tambah_penduduk', $data, true);
      $this->load->view('template_kk', $data);
    }elseif($cekper>0){
      $this->session->set_flashdata('eror',"Username sudah digunakan");
      redirect('PendafKKC');
    }else{
      $data=array(
        "idKeluarga_FK"=>getid_keluarga($_POST['noKK']),
        "nama_lengkap"=>$_POST['nama_lengkap'],
        "jenis_kelamin"=>$_POST['jenis_kelamin'],
        "tempat_lahir"=>$_POST['tempat_lahir'],
        "tanggal_lahir"=>$_POST['tanggal_lahir'],
        "agama"=>$_POST['agama'],
        "pendidikan"=>$_POST['pendidikan'],
        "id_jenispekerjaanFK"=>$_POST['id_jenispekerjaanFK'],
        "status_perkawinan"=>$_POST['status_perkawinan'],
        "status_hub_dalam_keluarga"=>$_POST['status_hub_dalam_keluarga'],
        "kewarganegaraan"=>$_POST['kewarganegaraan'],
        "no_paspor"=>$_POST['no_paspor'],
        "no_kitas_kitap"=>$_POST['no_kitas_kitap'],
        "ayah"=>$_POST['ayah'],
        "ibu"=>$_POST['ibu'],
      );
      $this->db->insert('data_penduduk',$data);
      $this->session->set_flashdata('sukses',"Tambah data Data Penduduk berhasil dilakukan !");
      redirect('PendafKKC/caridatakk/'.$noKK);
    }

}
  
  public function inputdatakeluarga(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kepala_keluarga', 'nama_kepala_keluarga', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('idkecamatan_FK', 'idkecamatan_FK', 'required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
    $this->form_validation->set_rules('kode_pos', 'kode_pos', 'required');
    $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
    $nama_kepala_keluarga=$_POST['nama_kepala_keluarga'];
    // $noKk=$_POST['noKK'];
    $cekper=$this->db->query("select * from data_keluarga where nama_kepala_keluarga='$nama_kepala_keluarga'")->num_rows();
      if($this->form_validation->run()==FALSE){
      $data=array(
            "title"=>'Tambah Data Keluarga',
            "aktif"=>"kk",
            'nama_kepala_keluarga' => set_value('nama_kepala_keluarga', ''),
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'idkecamatan_FK' => set_value('idkecamatan_FK', ''),
            // 'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            // 'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'kabupaten' => set_value('kabupaten', ''),
            'kode_pos' => set_value('kode_pos', ''),
            'provinsi' => set_value('provinsi', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('tambah_keluarga', $data, true);
      $this->load->view('template_kk', $data);
    }else{
      $this->model->nama_kepala_keluarga=$_POST['nama_kepala_keluarga'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->idkecamatan_FK = $_POST['idkecamatan_FK'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->nama_kecamatan = $_POST['nama_kecamatan'];
      $this->model->kabupaten = $_POST['kabupaten'];
      $this->model->kode_pos = $_POST['kode_pos'];
      $this->model->provinsi = $_POST['provinsi'];
      $query1 = $this->model->insertkeluarga();

      $getidkelbaru=getid_kelbaru();
      $this->session->set_flashdata('sukses',"Tambah data keluarga berhasil dilakukan !");
      redirect('PendafKKC/inputdatakeluargabaru/'.$getidkelbaru);
    }

}
    public function inputdatakeluargabaru($getidkelbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('idKeluarga', 'idKeluarga', 'required');
    $this->form_validation->set_rules('id_petugasFK', 'id_petugasFK', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    // $idkel = getid_kelterbaru($getidpendbaru);
    $namakel=getnama_kelbaru($getidkelbaru);
    $data=array(
         "title"=>'Daftar ',
            "aktif"=>"kk",
            "datakeluargabaru"=>$this->PendafKKM->getdatakel($getidkelbaru,$namakel),
            "tgl_jadi"=>set_value(''),
    );
    $data['body']= $this->load->view('buat_kkv_manual', $data, true);
    $this->load->view('template_kk', $data);

    }
function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas KK Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }
  public function laporanpendaftarankk(){
      $data=array(
          "title"=>'Laporan Pendaftaran Kartu Keluarga',
          "aktif"=>" ",
          "pendafkkhari"=>$this->model->pendafkkhari(),
          "pendafkkbulan"=>$this->model->pendafkkbulan(),
          "pendafkktahun"=>$this->model->pendafkktahun(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),
        );
    $data['body']= $this->load->view('laporan_kk.php', $data, true);
     $this->load->view('template_kk', $data);
  }
  public function cetaklaporankkhari(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafkkhari(),
          "tabel"=>"cetak_kk_perhari.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN KK PERHARI",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran KK Perhari.pdf', 'I');
  }
  public function cetaklaporankkbulan(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafkkbulan(),
          "tabel"=>"cetak_kk_perbulan.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN KK PERBULAN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran KK Perbulan.pdf', 'I');
  }
    public function cetaklaporankktahun(){
      ob_start();
        $data=array(
          "d"=>$this->model->pendafkktahun(),
          "tabel"=>"cetak_kk_pertahun.php",
          "judul_lap"=>"LAPORAN PENDAFTARAN KK PERTAHUN",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran KK Pertahun.pdf', 'I');
  }
   public function cetakpendaftarankk($id){
    $getidpendbaru=getid_pendterbaru();
      ob_start();
        $data=array(
          "d"=>$this->model->getdatakeluarga($id, $getidpendbaru),
          "det"=>$this->model->getdatapenda($id),
          "tabel"=>"cetak_tandaterimakk.php",
          "judul_lap"=>"Tanda Terima Berkas KK",
         );
        $this->load->view('layout_cetak_fix.php', $data);

      $html = ob_get_contents();
          ob_end_clean();
          
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas KK.pdf', 'I');
  }
}
