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

  //untuk menampilkan beranda pendaftaran pindah
  public function index(){
     $data=array(
      "bclass"=>'',
      "cls"=>"modal fade",        
      "display"=>"none",
      "ah"=>"true",
      "title"=>'Pendaftaran Pindah',
      "dataperhari"=>$this->model->pendafpindahhari()->num_rows(),
      // "dataperbulan"=>$this->model->pendafpindahbulan()->num_rows(),
      // "datapertahun"=>$this->model->pendafpindahtahun()->num_rows(),
      "dataperharipd"=>$this->model->pendafpindahdhari()->num_rows(),
      // "dataperbulanpd"=>$this->model->pendafpindahdbulan()->num_rows(),
      // "datapertahunpd"=>$this->model->pendafpindahdtahun()->num_rows(),
      "aktif"=>"pindah",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('berandapindah.php', $data, true);
    if ($peran=='3') {
      $data['aktif']="berandapindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan form pendaftaran pindah
  public function inputpendaftaran(){
    $data=array(
      "bclass"=>'',
      "title"=>'Pendaftaran Pindah',
      "aktif"=>"pindah",
      "bclass"=>'',
      "nik"=>'',
      "nama_lengkap"=>'',
      "jenis_kelamin"=>'',
      "tempat_lahir"=>'',
      "tanggal_lahir"=>'',
      "alamat"=>'',
      "rt"=>'',
      "rw"=>'',
      "id_kecamatan"=>'',
      "nama_kecamatan"=>'',
      "des"=>$this->PendafPindahM->getdes(),
      "kec"=>$this->PendafPindahM->getkec(),
      "nama_desakelurahanma"=>'',
      "data_asal"=>'',
      "data_tujuan"=>'',
      "status_pendaftaran"=>'',
      "tgl_jadi"=>'',
      "id_status_pendafFK"=>'',
      "dok"=>$this->PendafPindahM->getdok()->result(),
      "dokp"=>$this->PendafPindahM->getdokp()->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
      "petugasUP"=>$this->PendafPindahM->get_data_petugas($username, $peran),     
    );
    $data['body']= $this->load->view('petugas_pindah.php', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan form pendaftaran pindah datang
  public function inputpendaftaranpd(){
    $data=array(
      "bclass"=>'',
      "title"=>'Pendaftaran Pindah Datang',
      "aktif"=>"pindah",
      "bclass"=>'',
      "nik"=>'',
      "nama_lengkap"=>'',
      "jenis_kelamin"=>'',
      "tempat_lahir"=>'',
      "tanggal_lahir"=>'',
      "alamat"=>'',
      "rt"=>'',
      "rw"=>'',
      "id_kecamatan"=>'',
      "nama_kecamatan"=>'',
      "des"=>$this->PendafPindahM->getdes(),
      "kec"=>$this->PendafPindahM->getkec(),
      "nama_desakelurahanma"=>'',
      "data_asal"=>'',
      "data_tujuan"=>'',
      "status_pendaftaran"=>'',
      "tgl_jadi"=>'',
      "id_status_pendafFK"=>'',
      "dok"=>$this->PendafPindahM->getdok()->result(),
      "dokp"=>$this->PendafPindahM->getdokp()->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
      "petugasUP"=>$this->PendafPindahM->get_data_petugas($username, $peran),     
    );
    $data['body']= $this->load->view('petugas_pindahd.php', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindahd";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindahd";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk proses pendaftaran pindah
  public function inputdatapindah(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    // $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');    
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $this->form_validation->set_rules('data_asal', 'data_asal', 'required');
    $this->form_validation->set_rules('data_tujuan', 'data_tujuan', 'required');
    $this->form_validation->set_rules('id_syarat[]', 'id_syarat[]', 'required|greater_than[0]', array('required' => 'Syarat tidak terpenuhi !', 'greater_than[0]' => '' ));
    $nama_lengkap=$_POST['nama_lengkap'];
    $cekper=$this->db->query("Select * from pendaftaran where nama_lengkap='$nama_lengkap'")->num_rows();
    if($this->form_validation->run()==FALSE){
      $data=array(
            "title"=>'Pendaftaran Pindah',
            "aktif"=>"pindah",
            "bclass"=>'',
            $username=$this->session->userdata('user'),
            $peran=$this->session->userdata('peran'),
            "des"=>$this->PendafPindahM->getdes(),
            "kec"=>$this->PendafPindahM->getkec(),
            "petugasUP"=>$this->PendafPindahM->get_data_petugas($username, $peran),
            "dok"=>$this->PendafPindahM->getdok()->result(),
            'nik' => set_value('nik', ''),
            'nama_lengkap' => set_value('nama_lengkap', ''),
            'jenis_kelamin' => set_value('jenis_kelamin', ''),
            'tempat_lahir' => set_value('tempat_lahir', ''),
            'tanggal_lahir' => set_value('tanggal_lahir', ''),
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'data_asal' => set_value('data_asal', ''),
            'data_tujuan' => set_value('data_tujuan', ''),
            'tgl_jadi' => set_value('tgl_jadi', ''),
            'id_syarat[]' => set_value('id_syarat[]', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('petugas_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
    }else{
      $ids=$this->PendafPindahM->getstatus();
      $id=$this->session->userdata('id');
      $this->model->nik=$_POST['nik'];
      $this->model->nama_lengkap=$_POST['nama_lengkap'];
      $this->model->jenis_kelamin=$_POST['jenis_kelamin'];
      $this->model->tempat_lahir=$_POST['tempat_lahir'];
      $this->model->tanggal_lahir=$_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->data_asal=$_POST['data_asal'];
      $this->model->data_tujuan=$_POST['data_tujuan'];
      $this->model->id_petugasFK = $id;
      $this->model->tgl_buat=date('y-m-d');
      $this->model->tgl_jadi=$_POST['tgl_jadi'];
      $this->model->id_status_pendafFK=$ids;
      $query1 = $this->model->insertpindah();

      $getidpenbaru=getid_penbaru();
      $str=implode(" ", $_POST['id_syarat']);
      $arr=explode(" ", $str);
      for($i=0; $i<count($arr); $i++){
        $id_syarat = $arr[$i];
        $query = $this->model->insertdetail($id_syarat, $getidpenbaru);
      }
      
      $this->session->set_flashdata('sukses',"Pendaftaran pindah berhasil dilakukan !");
      redirect('PendafPindahC/inputpendafpindah/'.$getidpenbaru);
    }
  }

  //untuk menampilkan data pendaftaran pindah
  public function inputpendafpindah($getidpenbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Pendaftaran Pindah ',
      "aktif"=>"pindah",
      "bclass"=>'',
      "dok"=>$this->PendafPindahM->get_syaratp($getidpenbaru)->result(),
      "keca"=>$this->PendafPindahM->getkec(),
      "desa"=>$this->PendafPindahM->getdes(),
      "datapendaf"=>$this->PendafPindahM->getdata_pendaftaran($getidpenbaru),
      "datapendaftaran"=>$this->PendafPindahM->get_penduduk_det($getidpenbaru)->row_array(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }


  // public function datapendafpindahedit($id){
  //   $data=array(
  //     "title"=>'Edit Pendaftaran Pindah',
  //     "aktif"=>"pindah",
  //     "bclass"=>'',
  //     "get_datapenduduk"=>$this->PendafPindahM->get_penduduk_det($id)->row_array(),
  //     "keca"=>$this->PendafPindahM->getkec(),
  //     "desa"=>$this->PendafPindahM->getdes(),
  //     "bclass"=>" ",
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $data['body']= $this->load->view('edit_pindahv', $data, true);
  //   if ($peran=='3') {
  //     $data['aktif']="pindah";
  //     $this->load->view('template_pindah', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="dtpindah";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  // }

  //untuk menampilkan data desa yang ditampilkan di dropdown
  public function getdesa(){
    $id_kec = $this->input->post('nama_kecamatan');
    $dataDesa=$this->PendafPindahM->get_desa($id_kec);
    echo '<select class="form-control m-bot15" name="id_desakelurahan" id="id_desakelurahan">';
    echo '<option value="" disabled selected><i>---Pilih Desa/Kelurahan---</i></option>';
    if(! empty($dataDesa)){
      foreach ($dataDesa as $d) {
        echo '<option value="'.$d->id_desakelurahan.'">'.$d->nama_desakelurahan.'</option>';
      }
    }else{
      echo '<option>- Data Belum Tersedia -</option>';
    }
      echo '</select>';
  }


  // public function datapendafpindaheditpd($id){
  //   $data=array(
  //     "title"=>'Edit Pendaftaran Pindah',
  //     "aktif"=>"pindah",
  //     "bclass"=>'',
  //     "get_datapenduduk"=>$this->PendafPindahM->get_penduduk_det($id)->row_array(),
  //     "keca"=>$this->PendafPindahM->getkec(),
  //     "desa"=>$this->PendafPindahM->getdes(),
  //     "bclass"=>" ",
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $data['body']= $this->load->view('edit_pindahdatangv', $data, true);
  //   if ($peran=='3') {
  //     $data['aktif']="pindah";
  //     $this->load->view('template_pindah', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="dtpindah";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  // }

  //untuk proses edit data pendfataran
  public function datapendafeditproses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    // $this->form_validation->set_rules('nik', 'nik','required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir','required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir','required');
    $this->form_validation->set_rules('alamat', 'alamat','required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan','required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi','required');
    $this->form_validation->set_rules('data_asal', 'data_asal','required');
    $this->form_validation->set_rules('data_tujuan', 'data_tujuan','required');
    $id=$_POST['id_pendaftaran'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Pendaftaran Pindah',
        "aktif"=>"pindah",
        "bclass"=>" ",
        'nik' => set_value('nik', ''),
        'nama_lengkap' => set_value('nama_lengkap', ''),
        'jenis_kelamin' => set_value('jenis_kelamin', ''),
        'tempat_lahir' => set_value('tempat_lahir', ''),
        'tanggal_lahir' => set_value('tanggal_lahir', ''),
        'alamat' => set_value('alamat', ''),
        'rt' => set_value('rt', ''),
        'rw' => set_value('rw', ''),
        'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
        'nama_kecamatan' => set_value('nama_kecamatan', ''),
        'tgl_jadi' => set_value('tgl_jadi', ''),
        'data_asal' => set_value('data_asal', ''),
        'data_tujuan' => set_value('data_tujuan', ''),
        'id2' => 'has-error',
        $username=$this->session->userdata('user'),
        $peran=$this->session->userdata('peran'),
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_pindah', $data, true);
      if ($peran=='3') {
        $data['aktif']="pindah";
        $this->load->view('template_pindah', $data);
      }else if($peran=='4') {
        $data['aktif']="dtpindah";
        $data['bclass']=" ";
        $this->load->view('template_admin', $data);
      }
    }else{
      $id_pendaftaran = $this->PendafPindahM->getidpendaf($_POST['id_pendaftaran']);
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin= $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->tgl_jadi = $_POST['tgl_jadi'];
      $this->model->data_asal = $_POST['data_asal'];
      $this->model->data_tujuan = $_POST['data_tujuan'];
      $query = $this->model->updatepend($id_pendaftaran);
      $this->session->set_flashdata('sukses', 'Edit data berhasil dilakukan!');
      redirect('PendafPindahC/datapendaftaran/'.$id_pendaftaran);
    }
  }

  //untuk proses edit pendaftaran pindah datang
  public function datapendafeditprosespd(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    // $this->form_validation->set_rules('nik', 'nik','required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir','required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir','required');
    $this->form_validation->set_rules('alamat', 'alamat','required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan','required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi','required');
    $this->form_validation->set_rules('data_asal', 'data_asal','required');
    $this->form_validation->set_rules('data_tujuan', 'data_tujuan','required');
    $id=$_POST['id_pendaftaran'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Pendaftaran',
        "aktif"=>"pindah",
        "bclass"=>" ",
        'nik' => set_value('nik', ''),
        'nama_lengkap' => set_value('nama_lengkap', ''),
        'jenis_kelamin' => set_value('jenis_kelamin', ''),
        'tempat_lahir' => set_value('tempat_lahir', ''),
        'tanggal_lahir' => set_value('tanggal_lahir', ''),
        'alamat' => set_value('alamat', ''),
        'rt' => set_value('rt', ''),
        'rw' => set_value('rw', ''),
        'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
        'nama_kecamatan' => set_value('nama_kecamatan', ''),
        'tgl_jadi' => set_value('tgl_jadi', ''),
        'data_asal' => set_value('data_asal', ''),
        'data_tujuan' => set_value('data_tujuan', ''),
        'id2' => 'has-error',
        $username=$this->session->userdata('user'),
        $peran=$this->session->userdata('peran'),
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_pindahdatangv', $data, true);
      if ($peran=='3') {
        $data['aktif']="pindahd";
        $this->load->view('template_pindah', $data);
      }else if($peran=='4') {
        $data['aktif']="dtpindahd";
        $data['bclass']=" ";
        $this->load->view('template_admin', $data);
      }
    }else{
      $id_pendaftaran = $this->PendafPindahM->getidpendaf($_POST['id_pendaftaran']);
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin= $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->tgl_jadi = $_POST['tgl_jadi'];
      $this->model->data_asal = $_POST['data_asal'];
      $this->model->data_tujuan = $_POST['data_tujuan'];
      $query = $this->model->updatepend($id_pendaftaran);
      $this->session->set_flashdata('sukses', 'Edit data berhasil dilakukan!');
      redirect('PendafPindahC/datapendaftaranpd/'.$id_pendaftaran);
    }
  }

  //untuk proses pendaftaran pindah datang
  public function inputdatapindahd(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    // $this->form_validation->set_rules('nik', 'nik', 'required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');    
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $this->form_validation->set_rules('data_asal', 'data_asal', 'required');
    $this->form_validation->set_rules('data_tujuan', 'data_tujuan', 'required');
    $this->form_validation->set_rules('id_syarat[]', 'id_syarat[]', 'required|greater_than[0]', array('required' => 'Syarat tidak terpenuhi !', 'greater_than[0]' => '' ));
    $nama_lengkap=$_POST['nama_lengkap'];
    $cekper=$this->db->query("Select * from pendaftaran where nama_lengkap='$nama_lengkap'")->num_rows();
    if($this->form_validation->run()==FALSE){
      $data=array(
            "title"=>'Pendaftaran pindah',
            "aktif"=>"pindah",
            "bclass"=>'',
            $username=$this->session->userdata('user'),
            $peran=$this->session->userdata('peran'),
            "des"=>$this->PendafPindahM->getdes(),
            "kec"=>$this->PendafPindahM->getkec(),
            "petugasUP"=>$this->PendafPindahM->get_data_petugas($username, $peran),
            "dok"=>$this->PendafPindahM->getdok()->result(),
            'nik' => set_value('nik', ''),
            'nama_lengkap' => set_value('nama_lengkap', ''),
            'jenis_kelamin' => set_value('jenis_kelamin', ''),
            'tempat_lahir' => set_value('tempat_lahir', ''),
            'tanggal_lahir' => set_value('tanggal_lahir', ''),
            'alamat' => set_value('alamat', ''),
            'rt' => set_value('rt', ''),
            'rw' => set_value('rw', ''),
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'data_asal' => set_value('data_asal', ''),
            'data_tujuan' => set_value('data_tujuan', ''),
            'tgl_jadi' => set_value('tgl_jadi', ''),
            'id_syarat[]' => set_value('id_syarat[]', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('petugas_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
    }else{
      $ids=$this->PendafPindahM->getstatuspd();
      $id=$this->session->userdata('id');
      $this->model->nik=$_POST['nik'];
      $this->model->nama_lengkap=$_POST['nama_lengkap'];
      $this->model->jenis_kelamin=$_POST['jenis_kelamin'];
      $this->model->tempat_lahir=$_POST['tempat_lahir'];
      $this->model->tanggal_lahir=$_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->data_asal=$_POST['data_asal'];
      $this->model->data_tujuan=$_POST['data_tujuan'];
      $this->model->id_petugasFK = $id;
      $this->model->tgl_buat=date('y-m-d');
      $this->model->tgl_jadi=$_POST['tgl_jadi'];
      $this->model->id_status_pendafFK=$ids;
      $query1 = $this->model->insertpindah();

      $getidpenbaru=getid_penbaru();
      $str=implode(" ", $_POST['id_syarat']);
      $arr=explode(" ", $str);
      for($i=0; $i<count($arr); $i++){
        $id_syarat = $arr[$i];
        $query = $this->model->insertdetail($id_syarat, $getidpenbaru);
      }
      
      $this->session->set_flashdata('sukses',"Pendaftaran pindah datang berhasil dilakukan !");
      redirect('PendafPindahC/inputpendafpindahd/'.$getidpenbaru);
    }
  }

  //untuk menampilkan data pendaftaran pindah datang
  public function inputpendafpindahd($getidpenbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Pendaftaran Pindah Datang ',
      "aktif"=>"pindahd",
      "bclass"=>'',
      "dok"=>$this->PendafPindahM->get_syaratp($getidpenbaru)->result(),
      "keca"=>$this->PendafPindahM->getkec(),
      "desa"=>$this->PendafPindahM->getdes(),
      "datapendaf"=>$this->PendafPindahM->getdata_pendaftaran($getidpenbaru),
      "datapendaftaran"=>$this->PendafPindahM->get_penduduk_det($getidpenbaru)->row_array(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_pindah_datang', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindahd";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindahd";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  //form unggah syarat
  public function unggahsyaratp($id){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Unggah syarat Syarat Pendaftaran Pindah',
      "aktif"=>"riwayatpindah",
      "bclass"=>'',
      "gambar"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindah($id)->result(),
      "dok"=>$this->PendafPindahM->get_syarat($id)->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('unggah_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //proses unggah syarat
  public function tambahsyarat($id){
    if(isset($_POST["simpan"])){
    $this->load->library('upload');
    $image_data = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++){
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];
 
        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $image_data[] = $_FILES['userfile']['name'];
    }
    $fileName = implode($image_data);
    $id=$this->model->get_det($id);
    $this->model->userfile = $fileName;
    if($fileName == Null){$status_unggah="Belum Diunggah";}
    else{$status_unggah="Sudah Diunggah";}
    $query1=$this->PendafPindahM->update_detail($id, $status_unggah);

    redirect('PendafPindahC/datapendaftaran/'.$id);
    }
  } 

  //untuk tambah syarat pendftaran yang diunggah
  public function editsyarat($id){
    $data=array(
      "title"=>'Edit Syarat Pendaftaran',
      "aktif"=>'pindah',
      "bclass"=>'',
      "syarat"=>$tis->PendafPindahM->syaratp($id),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
  }

  //untuk menampilkan data pendaftaran pindah setelah di edit
  public function datapendaftaran($id_pendaftaran){
    $data=array(
      "title"=>'Data Pendaftaran',
      "aktif"=>"pindah",
      "bclass"=>'',
      "dok"=>$this->PendafPindahM->get_syaratp($id_pendaftaran)->result(),
      "datapendaf"=>$this->PendafPindahM->getdata_pendaftaran($id_pendaftaran),
      "datapendaftaran"=>$this->PendafPindahM->get_penduduk_det($id_pendaftaran)->row_array(),
      "keca"=>$this->PendafPindahM->getkec(),
      "desa"=>$this->PendafPindahM->getdes(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan data pendaftaran indah datang setelah di edit
  public function datapendaftaranpd($id_pendaftaran){
   $data=array(
      "title"=>'Edit Data Pendaftaran',
      "aktif"=>"pindah",
      "bclass"=>'',
      "dok"=>$this->PendafPindahM->get_syaratp($id_pendaftaran)->result(),
      "datapendaf"=>$this->PendafPindahM->getdata_pendaftaran($id_pendaftaran),
      "datapendaftaran"=>$this->PendafPindahM->get_penduduk_det($id_pendaftaran)->row_array(),
      "keca"=>$this->PendafPindahM->getkec(),
      "desa"=>$this->PendafPindahM->getdes(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_pindah_datang', $data, true);
    if ($peran=='3') {
      $data['aktif']="pindahd";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="dtpindahd";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  // public function inputdatapindahdatang(){
  //   $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
  //   $this->form_validation->set_rules('nik', 'nik', 'required');
  //   $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
  //   $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
  //   $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
  //   $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
  //   $this->form_validation->set_rules('alamat', 'alamat', 'required');
  //   $this->form_validation->set_rules('rt', 'rt', 'required');
  //   $this->form_validation->set_rules('rw', 'rw', 'required');    
  //   $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
  //   $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
  //   $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
  //   $this->form_validation->set_rules('data_asal', 'data_asal', 'required');
  //   $this->form_validation->set_rules('data_tujuan', 'data_tujuan', 'required');
  //   $this->form_validation->set_rules('id_syarat[]', 'id_syarat[]', 'required|greater_than[0]', array('required' => 'Syarat tidak terpenuhi !', 'greater_than[0]' => '' ));
  //   $nama_lengkap=$_POST['nama_lengkap'];
  //   $cekper=$this->db->query("Select * from pendaftaran where nama_lengkap='$nama_lengkap'")->num_rows();
  //   if($this->form_validation->run()==FALSE){
  //     $data=array(
  //           "title"=>'Pendaftaran pindah',
  //           "aktif"=>"pindah",
  //           "bclass"=>'',
  //           'nik' => set_value('nik', ''),
  //           'nama_lengkap' => set_value('nama_lengkap', ''),
  //           'jenis_kelamin' => set_value('jenis_kelamin', ''),
  //           'tempat_lahir' => set_value('tempat_lahir', ''),
  //           'tanggal_lahir' => set_value('tanggal_lahir', ''),
  //           'alamat' => set_value('alamat', ''),
  //           'rt' => set_value('rt', ''),
  //           'rw' => set_value('rw', ''),
  //           'nama_kecamatan' => set_value('nama_kecamatan', ''),
  //           'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
  //           'data_asal' => set_value('data_asal', ''),
  //           'data_tujuan' => set_value('data_tujuan', ''),
  //           'tgl_jadi' => set_value('tgl_jadi', ''),
  //           'id_syarat[]' => set_value('id_syarat[]', ''),
  //           'id2' => 'has-error',
  //           $username=$this->session->userdata('user'),
  //           $peran=$this->session->userdata('peran'),
  //         );
  //     $data['body']= $this->load->view('petugas_pindah', $data, true);
  //   if ($peran=='3') {
  //     $data['aktif']="pindah";
  //     $this->load->view('template_pindah', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="dtpindah";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  //   }else{
  //     $ids=$this->PendafPindahM->getstatuspd();
  //     $id=$this->session->userdata('id');
  //     $this->model->nik=$_POST['nik'];
  //     $this->model->nama_lengkap=$_POST['nama_lengkap'];
  //     $this->model->jenis_kelamin=$_POST['jenis_kelamin'];
  //     $this->model->tempat_lahir=$_POST['tempat_lahir'];
  //     $this->model->tanggal_lahir=$_POST['tanggal_lahir'];
  //     $this->model->alamat = $_POST['alamat'];
  //     $this->model->rt = $_POST['rt'];
  //     $this->model->rw = $_POST['rw'];
  //     $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
  //     $this->model->data_asal=$_POST['data_asal'];
  //     $this->model->data_tujuan=$_POST['data_tujuan'];
  //     $this->model->id_petugasFK = $id;
  //     $this->model->tgl_buat=date('y-m-d');
  //     $this->model->tgl_jadi=$_POST['tgl_jadi'];
  //     $this->model->id_status_pendafFK=$ids;
  //     $query1 = $this->model->insertpindah();

  //     $getidpenbaru=getid_penbaru();
  //     $str=implode(" ", $_POST['id_syarat']);
  //     $arr=explode(" ", $str);
  //     for($i=0; $i<count($arr); $i++){
  //       $id_syarat = $arr[$i];
  //       $query = $this->model->insertdetail($id_syarat, $getidpenbaru);
  //     }
      
  //     $this->session->set_flashdata('sukses',"Pendaftaran Pindah berhasil dilakukan !");
  //     redirect('PendafPindahC/inputpendafpindahdatang/'.$getidpenbaru);
  //   }
  // }
  // public function inputpendafpindahdatang($getidpenbaru){  
  //   $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
  //   $data=array(
  //     "title"=>'Pendaftaran pindah ',
  //     "aktif"=>"pindah",
  //     "bclass"=>'',
  //     "datapendaf"=>$this->PendafPindahM->getdata_pendaftaran($getidpenbaru),
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $data['body']= $this->load->view('form_pengambilan_pindah_datang', $data, true);
  //   if ($peran=='3') {
  //     $data['aktif']="pindah";
  //     $this->load->view('template_pindah', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="dtpindah";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  // }

  //memanpilkan syarat pendaftaran pindah dan pindah datang yang belum diunggah
  public function syaratpendafpindah(){
    $data=array(
          "title"=>'Unggah Syarat Pendaftaran Pindah',
          "aktif"=>"syaratpindah",
          "bread"=>'Unggah Syarat Pendaftaran KK',
          "bclass"=>'',
          "pem"=>$this->PendafPindahM->get_pendafpindah(),
          "pen"=>$this->PendafPindahM->get_pendafpindahdatang(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),      
    );
    $this->session->set_userdata('asal', 'syarat');
    $data['body']= $this->load->view('syarat_pendafpindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="syaratpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail syarat pendaftaran
  public function detailsyaratpindah($id){
    $data=array(
      "title"=>'Detail Syarat Pendaftaran Pindah',
      "aktif"=>"syaratpindah",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindah($id)->result(),
      // "syarat"=>$this->PendafPindahM->getsyaratp($id)->result(),
      "dok"=>$this->PendafPindahM->get_syaratp($id)->result(),
      "id_syarat"=>'',
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="syaratpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  public function tambahsyaratpin($id){
     $data=array(
      "title"=>'Detail Syarat Pendaftaran Pindah',
      "aktif"=>"syaratpindah",
      "bclass"=>'',
      "syarat"=>$this->PendafPindahM->getsyaratp($id)->result_array(),
      // "s"=>$this->PendafPindahM->getsyaratpindah($id)->result(),
      "dok"=>$this->PendafPindahM->getdok()->result(),
      "id_syaratFK"=>'',
      "id_syarat"=>'',
      "judul_syarat"=>'',
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('tambah_syarat', $data, true);
    if ($peran=='3') {
      $data['aktif']="syaratpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail syarat pendaftaran pindah datang
  public function detailsyaratpindahd($id){
    $data=array(
      "title"=>'Detail Syarat Pendaftaran Pindah Datang',
      "aktif"=>"syaratpindah",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindahdatang($id)->result(),
      "dok"=>$this->PendafPindahM->get_syarat($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_pindahdatang', $data, true);
    if ($peran=='3') {
      $data['aktif']="syaratpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan riwayat pendaftaran pidnah dan pindah datang
  public function riwayatpendafpindah(){
    $data=array(
          "title"=>'Riwayat Pendaftaran Pindah',
          "aktif"=>"riwayatpindah",
          "bread"=>'Riwayat Pedaftaran Pindah',
          "bclass"=>'',
          "pem"=>$this->PendafPindahM->get_pendaftpindah(),
          "pen"=>$this->PendafPindahM->get_pendaftpindahdatang(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),      
    );
    $this->session->set_userdata('asal', 'riwayat');
    $data['body']= $this->load->view('riwayat_pendafpindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail riwayat pendaftaran pindah
  public function detailriwayatpindah($id){
    $data=array(
      "title"=>'Detail Pendaftaran Pindah',
      "aktif"=>"riwayatpindah",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindah($id)->result(),
      "datapendafsyarat"=>$this->PendafPindahM->get_pendaftrp($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_riwayatpindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  //menampilkan detail riwayat pendaftaran pindah datang
  public function detailriwayatpindahd($id){
    $data=array(
      "title"=>'Detail Pendaftaran Pindah Datang',
      "aktif"=>"riwayatpindah",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindahdatang($id)->result(),
      "datapendafsyarat"=>$this->PendafPindahM->get_pendaftrp($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_riwayatpindahd', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //unggah syarat pendaftaran pindah
  public function unggahsyaratpindah($id){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Unggah syarat Syarat Pendaftaran Pindah',
      "aktif"=>"riwayatpindah",
      "bclass"=>'',
      "gambar"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindah($id)->result(),
      "dok"=>$this->PendafPindahM->get_syaratp($id)->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('unggah_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk mengupload syarat pendaftaran pindah
  public function tambahsyarat1($id){
    if ($_POST) {
      $config['upload_path']            = 'images';
      $config['allowed_types']          = 'jpg|jpeg';
      $config['max_size']               = '7000';
      $config['max_filename_increment'] = '1000';
      
      // $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $files= $_FILES['userfile'];
      $i=0;
      foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $images[] = $image;

            if ($this->upload->do_upload('images[]')) {
                $data = array(
                  'gambar' => $this->upload->data('file_name') ,
                  'status_unggah' => 'Sudah Diunggah');

               $this->db->where("id_detail_syarat",$_POST['id_detail_syarat'][$i]);
               $this->db->update("detail_syarat",$data);

            } else {
                print_r($this->upload->display_errors());
            }
          $i++;
        }
          redirect('PendafPindahC/detailriwayatpindah/'.$id);
    }
  }

  //untuk mengupload pendaftaran pindah datang
  public function tambahsyarat2($id)
  {
    if ($_POST) {
      $config['upload_path']            = 'images';
      $config['allowed_types']          = 'jpg|jpeg';
      $config['max_size']               = '7000';
      $config['max_filename_increment'] = '1000';
      
      // $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $files= $_FILES['userfile'];
      $i=0;
      foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $images[] = $image;

            if ($this->upload->do_upload('images[]')) {
                $data = array(
                  'gambar' => $this->upload->data('file_name') ,
                  'status_unggah' => 'Sudah Diunggah');

               $this->db->where("id_detail_syarat",$_POST['id_detail_syarat'][$i]);
               $this->db->update("detail_syarat",$data);

            } else {
                print_r($this->upload->display_errors());
            }
          $i++;
        }
          redirect('PendafPindahC/detailriwayatpindahd/'.$id);
    }
  }

  //untuk menampilkan daftar syarat pendaftaran pndah dan pindah datang yang belum diupload
  public function unggahsyaratpd($id){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Unggah syarat Syarat Pendaftaran Pindah',
      "aktif"=>"riwayatpindah",
      "bclass"=>'',
      "gambar"=>'',
      "datapendaftaran"=>$this->PendafPindahM->get_pendaftaranpindah($id)->result(),
      "dok"=>$this->PendafPindahM->get_syarat($id)->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('unggah_pindah', $data, true);
    if ($peran=='3') {
      $data['aktif']="riwayatpindahd";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="riwpindahd";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  // public function tambahsyaratpd($id){  
  //   $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
  //   $this->form_validation->set_rules('gambar', 'gambar','required');

  //   $gambar=$this->input->post('gambar');

  //   //upload gambar
  //   $config['max_size']=1024;
  //   $config['allowed_types']="jpg|jpeg";
  //   $config['remove_spaces']=TRUE;
  //   $config['overwrite']=TRUE;
  //   $config['upload_path']=FCPATH.'images';

  //   $this->load->library('upload');
  //   $this->upload->initialize($config);

  //   //ambil gambar
  //   $this->upload->do_upload('gambar');
  //   $data_image=$this->upload->data('file_name');
  //   $location=base_url().'image/';
  //   $gambar=$data_image;
  //   //lokasi

  //   $data=array(
  //     "title"=>'Unggah syarat Persyarat Pendaftaran Pindah Datang',
  //     "aktif"=>"riwayatpindah",
  //     "bclass"=>'',
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $iddet=$this->PendafPindahM->get_detpd($id);
  //   $this->model->gambar=$_POST['gambar'];
  //   $query1 = $this->model->update_detail($iddet);

  //   redirect('PendafPindahC/unggahsyaratpd/'.$id);
  // }

  //untuk keluar sistem 
  public function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas Pindah Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }

  //untuk menampilkan laporan pendaftaran pindah
  public function laporanpendaftaranpindah(){
    $data=array(
      "title"=>'Laporan Pendaftaran Pindah',
      "aktif"=>"laporanpindah",
      "bclass"=>'',
      "perharipindah"=>$this->model->getperharipindah(),
      "perbulanpindah"=>$this->model->getperbulanpindah(),
      "pertahunpindah"=>$this->model->getpertahunpindah(),
      "perhari"=>$this->model->getperhari(),
      "perbulan"=>$this->model->getperbulan(),
      "pertahun"=>$this->model->getpertahun(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('laporan_pindah.php', $data, true);
    if ($peran=='3') {
      $data['aktif']="laporanpindah";
      $this->load->view('template_pindah', $data);
    }else if($peran=='4') {
      $data['aktif']="lappindah";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untk menampilkan nama bulan untuk pindah
  public function getbulanpindah(){
    $tahun = $this->input->post('pilih_tahun');
    if($tahun=="1"){
      $databul=$this->PendafPindahM->getperbulanpindah();
      if(! empty($databul)){
        $no=1;
        foreach ($databul as $d){
          echo '<tr>';
            echo '<td colspan="1"><center>'.$no.'</center></td>';
            echo '<td ><center>'.getnamabulan($d->kategori).'</center></td>';
            echo '<td colspan="1"><center>'.$d->jum.'</center></td>';
            echo '</tr>';
            $no++;
          }
      }
    }else{
      $databulan=$this->PendafPindahM->getbulanpindah($tahun);
      if(! empty($databulan)){
        $no=1;
        foreach ($databulan as $d){
          echo '<tr>';
            echo '<td colspan="1"><center>'.$no.'</center></td>';
            echo '<td ><center>'.getnamabulan($d->kategori).'</center></td>';
            echo '<td colspan="1"><center>'.$d->jum.'</center></td>';
            echo '</tr>';
            $no++;
          }
      }
    }                                  
  }

  //untk menampilkan nama bulan untuk pindah datang
  public function getbulan(){
    $tahun = $this->input->post('pilih_tahun');
    if($tahun=="1"){
      $databul=$this->PendafPindahM->getperbulan();
      if(! empty($databul)){
        $no=1;
        foreach ($databul as $d){
          echo '<tr>';
            echo '<td colspan="1"><center>'.$no.'</center></td>';
            echo '<td ><center>'.getnamabulan($d->kategori).'</center></td>';
            echo '<td colspan="1"><center>'.$d->jum.'</center></td>';
            echo '</tr>';
            $no++;
          }
      }
    }else{
      $databulan=$this->PendafPindahM->getbulan($tahun);
      if(! empty($databulan)){
        $no=1;
        foreach ($databulan as $d){
          echo '<tr>';
            echo '<td colspan="1"><center>'.$no.'</center></td>';
            echo '<td ><center>'.getnamabulan($d->kategori).'</center></td>';
            echo '<td colspan="1"><center>'.$d->jum.'</center></td>';
            echo '</tr>';
            $no++;
          }
      }
    }                                  
  }

  //untuk mencetak laporan penndaftaran pindah perhari
  public function cetaklaporanpindahhari(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperharipindah(),
        "tabel"=>"cetak_pindah_perhari.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN PINDAH PERHARI",
        );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();     
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Pindah Perhari.pdf', 'I');
  }

  //untuk mencetak laporan pendaftaran pindah perbulan
  public function cetaklaporanpindahbulan(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulanpindah(),
        "tabel"=>"cetak_pindah_perbulan.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN PINDAH PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Pindah Perbulan.pdf', 'I');
  }

  //untuk mencetak laporan pendaftaran pindah pertahun
  public function cetaklaporanpindahtahun(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahunpindah(),
        "tabel"=>"cetak_pindah_pertahun.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN PINDAH PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Pindah Pertahun.pdf', 'I');
  }

  //untuk mencetak laporan pendaftaran pindah datang perhari
  public function cetaklaporanpindahdatanghari(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperhari(),
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

  //untuk mencetak laporan pendaftaran pindah datang perbulan
  public function cetaklaporanpindahdatangbulan(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulan(),
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

  //untuk mencetak laporan pendaftaran pindah datang pertahun
  public function cetaklaporanpindahdatangtahun(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahun(),
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

  //mencetak surat pengambilan berkas pindah
  public function cetakpendafpindah($id){
    ob_start();
      $data=array(
        "d"=>$this->model->getDataPendaftaran($id)->row_array(),
        "tabel"=>"cetak_tandaterimapindah.php",
        "judul_lap"=>"Tanda Terima Berkas Pindah",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A5','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas Pindah.pdf', 'I');
  }
  
  //mencetak surat pengambilan berkas pindah datang 
  public function cetakpendafpindahdatang($id){
    ob_start();
      $data=array(
        "d"=>$this->model->getDataPendaftaran($id)->row_array(),
        "tabel"=>"cetak_tandaterimapindahdatang.php",
        "judul_lap"=>"Tanda Terima Berkas Pindah Datang",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();  
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A5','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas Pindah Datang.pdf', 'I');
  }
}