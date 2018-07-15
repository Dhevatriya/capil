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

  //untuk menampilkan beranda petugas akte
  public function index(){
    $data=array(
      "bclass"=>'',
      "cls"=>"modal fade",        
      "display"=>"none",
      "ah"=>"true",
      "title"=>'Pendaftaran Akte',
      "aktif"=>"akte",
      "dataperhari"=>$this->model->pendafaktehari()->num_rows(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('berandaakte.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="berandaakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="dtakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan form pendaftaran akte
  public function inputpendaftaran(){
    $data=array(
      "bclass"=>'',
      "title"=>'Pendaftaran Akte',
      "aktif"=>"aktif",
      "bclass"=>'',
      "nik"=>'',
      "nama_lengkap"=>'',
      "jenis_kelamin"=>'',
      "jenis_akte"=>'',
      "tempat_lahir"=>'',
      "tanggal_lahir"=>'',
      "alamat"=>'',
      "rt"=>'',
      "rw"=>'',
      "id_kecamatan"=>'',
      "nama_kecamatan"=>'',
      "nama_desakelurahan"=>'',
      "des"=>$this->PendafAkteM->getdes(), //menampilkan data desa
      "kec"=>$this->PendafAkteM->getkec(), //menampilkan data kecamatan
      "id_desakelurahan"=>'',
      "tgl_jadi"=>'',
      "no_registrasi"=>'',
      $username=$this->session->userdata('user'),
      $password=$this->session->userdata('pass'),
      $peran=$this->session->userdata('peran'),
      "petugasUP"=>$this->PendafAkteM->get_data_petugas($username, $peran), //menampilkan nama petugas yang login pada sistem berdasarkan username dan peran
      "dok"=>$this->PendafAkteM->getdok()->result(),//menampilkan syarat pendaftaran
    );
    $data['body']= $this->load->view('petugas_akte.php', $data, true);
    //untuk mengetahui petugas yang memiliki hak akses pendaftaran akte
    if ($peran=='2') {
      $data['aktif']="akte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="dtakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //proses pendaftaran akte
  public function inputdataakte(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    // $this->form_validation->set_rules('nik', 'nik', 'required'); //validasi saat input nik
    $this->form_validation->set_rules('no_registrasi', 'no_registrasi', 'required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
    $this->form_validation->set_rules('alamat', 'alamat', 'required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');  
    $this->form_validation->set_rules('jenis_akte', 'jenis_akte', 'required');  
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $this->form_validation->set_rules('id_syarat[]', 'id_syarat[]', 'required|greater_than[0]', array('required' => 'Syarat tidak terpenuhi !', 'greater_than[0]' => '' ));//validasi syarat pendaftaran tidak boleh kosong
    $nik=$_POST['nik'];
    $cekper=$this->db->query("Select * from pendaftaran where nik='$nik'")->num_rows();
    if($this->form_validation->run()==FALSE){
      $data=array(
            "title"=>'Pendaftaran Akte',
            "aktif"=>"akte",
            "bclass"=>'',
            $username=$this->session->userdata('user'),
            $peran=$this->session->userdata('peran'),
            "petugasUP"=>$this->PendafAkteM->get_data_petugas($username, $peran),
            "dok"=>$this->PendafAkteM->getdok()->result(),
            "des"=>$this->PendafAkteM->getdes(),
            "kec"=>$this->PendafAkteM->getkec(),
            'jenis_akte' => set_value('jenis_akte', ''),
            'no_registrasi' => set_value('no_registrasi', ''),
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
            'tgl_jadi' => set_value('tgl_jadi', ''),
            'id_syarat[]' => set_value('id_syarat[]', ''),
            'id2' => 'has-error',
            $username=$this->session->userdata('user'),
            $peran=$this->session->userdata('peran'),
          );
      $data['body']= $this->load->view('petugas_akte', $data, true);
    if ($peran=='2') {
      $data['aktif']="akte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="dtakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
    }else{
      $ids=$this->PendafAkteM->getstatus();
      $id=$this->session->userdata('id');
      $this->model->no_registrasi=$_POST['no_registrasi']; 
      $this->model->nik=$_POST['nik'];
      $this->model->nama_lengkap=$_POST['nama_lengkap'];
      $this->model->jenis_kelamin=$_POST['jenis_kelamin'];
      $this->model->tempat_lahir=$_POST['tempat_lahir'];
      $this->model->tanggal_lahir=$_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->id_petugasFK = $id;
      $this->model->jenis_akte = $_POST['jenis_akte'];
      $this->model->tgl_daftar=date('y-m-d');
      $this->model->tgl_jadi=$_POST['tgl_jadi'];
      $this->model->id_status_pendafFK=$ids;
      $query1 = $this->model->insertakte();
      $getidpenbaru=getid_penbaru();

      //untuk mengiputkan syarat pendaftaran berdasarkan syarat yang dicentang
      $str=implode(" ", $_POST['id_syarat']);
      $arr=explode(" ", $str);
      for($i=0; $i<count($arr); $i++){
        $id_syarat = $arr[$i];
        $query = $this->model->insertdetail($id_syarat, $getidpenbaru);
      }
      $this->session->set_flashdata('sukses',"Pendaftaran Akte berhasil dilakukan !");
      redirect('PendafAkteC/inputpendafakte/'.$getidpenbaru);
    }
  }

  //menampilkan data pendaftaran akte (data setelah diinputkan)
  public function inputpendafakte($getidpenbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Pendaftaran Akte ',
      "aktif"=>"akte",
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
      "petugasUP"=>$this->PendafAkteM->get_data_petugas($username, $peran), //menampilkan nama petugas
      "dok"=>$this->PendafAkteM->get_syarat($getidpenbaru)->result(),//menampilkan syarat pendaftaran
      "datapendaf"=>$this->PendafAkteM->getdata_pendaftaran($getidpenbaru),//menampilkan data pendaftaran
      "datapendaftaran"=>$this->PendafAkteM->getdatapendaf($getidpenbaru)->row_array(),
      "keca"=>$this->PendafAkteM->getkec(),
      "desa"=>$this->PendafAkteM->getdes(),
    );
    $data['body']= $this->load->view('form_pengambilan_akte', $data, true);
    if ($peran=='2') {
      $data['aktif']="akte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="dtakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
//proses edit data pendaftaran
 public function datapendafeditproses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('no_registrasi', 'no_registrasi','required');
    // $this->form_validation->set_rules('nik', 'nik','required');
    $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap','required');
    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
    $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir','required');
    $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir','required');
    $this->form_validation->set_rules('alamat', 'alamat','required');
    $this->form_validation->set_rules('rt', 'rt', 'required');
    $this->form_validation->set_rules('rw', 'rw', 'required');
    $this->form_validation->set_rules('jenis_akte', 'jenis_akte', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan','required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi','required');
    $id=$_POST['id_pendaftaran'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Pendaftaran',
        "aktif"=>"akte",
        "bclass"=>" ",
        "des"=>$this->PendafAkteM->getdes(),
        "kec"=>$this->PendafAkteM->getkec(),  
        $username=$this->session->userdata('user'),
        $peran=$this->session->userdata('peran'),
        "petugasUP"=>$this->PendafAkteM->get_data_petugas($username, $peran),
        "dok"=>$this->PendafAkteM->getdok()->result(),
        'no_registrasi' => set_value('no_registrasi', ''),
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
        'jenis_akte' => set_value('jenis_akte', ''),
        'tgl_jadi' => set_value('tgl_jadi', ''),
        'id2' => 'has-error',
        $username=$this->session->userdata('user'),
        $peran=$this->session->userdata('peran'),
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('form_pengambilan_akte', $data, true);
      if ($peran=='2') {
        $data['aktif']="akte";
        $this->load->view('template_akte', $data);
      }else if($peran=='4') {
        $data['aktif']="dtakte";
        $data['bclass']=" ";
        $this->load->view('template_admin', $data);
      }
    }else{
      $id_pendaftaran = $this->PendafAkteM->getidpendaf($_POST['id_pendaftaran']);
      $this->model->no_registrasi= $_POST['no_registrasi'];
      $this->model->nik= $_POST['nik'];
      $this->model->nama_lengkap = $_POST['nama_lengkap'];
      $this->model->jenis_kelamin= $_POST['jenis_kelamin'];
      $this->model->tempat_lahir = $_POST['tempat_lahir'];
      $this->model->tanggal_lahir = $_POST['tanggal_lahir'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->jenis_akte = $_POST['jenis_akte'];
      $this->model->tgl_jadi = $_POST['tgl_jadi'];
      $query = $this->model->updatepend($id_pendaftaran);
      $this->session->set_flashdata('sukses', 'Edit data berhasil dilakukan!');
      redirect('PendafAkteC/datapendaftaran/'.$id_pendaftaran);
    }
  }

  //menampilkan data pendaftaran setelah di edit
  public function datapendaftaran($id_pendaftaran){
    $data=array(
      "title"=>'Edit Data Pendaftaran',
      "aktif"=>"akte",
      "bclass"=>'',
      "datapendaf"=>$this->PendafAkteM->getdata_pendaftaran($id_pendaftaran),
      "dok"=>$this->PendafAkteM->get_syarat($id_pendaftaran)->result(),
      "datapendaftaran"=>$this->PendafAkteM->getdatapendaf($id_pendaftaran)->row_array(),
      "keca"=>$this->PendafAkteM->getkec(),
      "desa"=>$this->PendafAkteM->getdes(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_akte', $data, true);
    if ($peran=='2') {
      $data['aktif']="akte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="dtakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk melakukan logout
  public function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas Akte Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }

  //untuk melakukan upload syarat pendaftaran
  public function uploadSyarat($id){
    //untuk format syarat pendaftaran yang akan diupload
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
          redirect('PendafAkteC/detailriwayatakte/'.$id);
    }
  }

  //untuk menampilkan daftar syarat pendfataran yang belum di upload
  public function syaratpendafakte(){
    $data=array(
          "title"=>'Unggah Syarat Pendaftaran Akte',
          "aktif"=>"syaratakte",
          "bread"=>'Unggah Syarat Pedaftaran Akte',
          "bclass"=>'',
          "pem"=>$this->PendafAkteM->get_pendafakte(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),   
        );
    $this->session->set_userdata('asal', 'syarat');
    $data['body']= $this->load->view('syarat_pendafakte', $data, true);
    if ($peran=='2') {
      $data['aktif']="syaratakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  //untuk melihat detail syarat pendaftaran
  public function detailsyaratakte($id){
    $data=array(
      "title"=>'Detail Unggah Syarat Pendaftaran akte',
      "aktif"=>"syratakte",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafAkteM->get_pendaftaranakte($id)->result(),
      "dok"=>$this->PendafAkteM->get_syarat($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_akte', $data, true);
    if ($peran=='2') {
      $data['aktif']="syaratakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan syarat pendaftaran berdasarkan id pendaftaran
  public function tambahsyaratakte($id){
     $data=array(
      "title"=>'Detail Syarat Pendaftaran Akte',
      "aktif"=>"syaratakte",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafAkteM->get_pendaftaranakte($id)->row_array(),
      "syarat"=>$this->PendafAkteM->getsyaratakte($id)->result_array(),
      "dok"=>$this->PendafAkteM->getdok()->result(),
      "id_syaratFK"=>'',
      "id_syarat"=>'',
      "judul_syarat"=>'',
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('tambah_syaratakte', $data, true);
    if ($peran=='2') {
      $data['aktif']="syaratakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk update syarat pendaftaran berdasarkan id pendaftaran tertentu
  public function updateSyaratAkte($id){
    $id_detail_syarat = $this->input->post('id_syarat');
    
    if (count($id_detail_syarat) != 0) {
      $this->db->delete("detail_syarat",array("id_pendaftaranFK"=>$id));

      foreach ($id_detail_syarat as $v) {
        $data = array(
          'id_pendaftaranFK' => $id,
          'id_syaratFK' => $v,
          'status_unggah' => "Belum Diunggah"
        );

        $this->db->insert("detail_syarat",$data);
      }

      redirect('PendafAkteC/detailsyaratakte/'.$id);
    }else
      redirect('PendafAkteC/tambahsyaratakte/'.$id);
  }
  
  //menampilkan riwayat pendaftaran akte
  public function riwayatpendafakte(){
    $data=array(
          "title"=>'Riwayat Pendaftaran Akte',
          "aktif"=>"riwayatakte",
          "bread"=>'Riwayat Pedaftaran Akte',
          "bclass"=>'',
          "pem"=>$this->PendafAkteM->get_pendaftakte()->result(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),  
        );
    $this->session->set_userdata('asal', 'riwayat');
    $data['body']= $this->load->view('riwayat_pendafakte', $data, true);
    if ($peran=='2') {
      $data['aktif']="riwayatakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="riwakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan detail syarat pendaftara akte
  public function detailriwayatakte($id){
    $data=array(
      "title"=>'Detail Pendaftaran akte',
      "aktif"=>"riwayatakte",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafAkteM->get_pendaftaranakte($id)->result(),
      "datapendafsyarat"=>$this->PendafAkteM->get_pendafaktee($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_riwayatakte', $data, true);
    if ($peran=='2') {
      $data['aktif']="riwayatakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="riwakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  //untuk menampilkan data desa yang ditampilkan di dropdown
  public function getdesa(){
    $id_kec = $this->input->post('nama_kecamatan');
    $dataDesa=$this->PendafAkteM->get_desa($id_kec);
    echo '<select class="form-control m-bot15" name="nama_desakelurahan" id="nama_desakelurahan">';
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

  //form unggah syarat
  public function unggahsyarat($id){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Unggah syarat Syarat Pendaftaran Kartu Keluarga',
      "aktif"=>"riwayatakte",
      "bclass"=>'',
      "gambar"=>'',
      "datapendaftaran"=>$this->PendafAkteM->get_pendaftaranakte($id)->result(),
      "dok"=>$this->PendafAkteM->get_syarat($id)->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('unggah_akte', $data, true);
    if ($peran=='2') {
      $data['aktif']="riwayatakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="riwakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  //unutk menampilkan laporan pendaftaran akte
  public function laporanpendaftaranakte(){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perhari"=>$this->model->getperhari(),
      "perbulan"=>$this->model->getperbulan(),
      "pertahun"=>$this->model->getpertahun(),
      "perhariu"=>$this->model->getperhariu(),
      "perbulanu"=>$this->model->getperbulanu(),
      "pertahunu"=>$this->model->getpertahunu(),
      "perharitp"=>$this->model->getperharitp(),
      "perbulantp"=>$this->model->getperbulantp(),
      "pertahuntp"=>$this->model->getpertahuntp(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('laporan_akte.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
  
  //untuk menampilkan nama bulan
  public function getbulan(){
    $tahun = $this->input->post('pilih_tahun');
    if($tahun=="1"){
      $databul=$this->PendafAkteM->getperbulan();
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
      $databulan=$this->PendafAkteM->getbulan($tahun);
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
  
    //menampilkan detail laporan pendaftaran akte perhari
  public function detaillaporanpendaftaranakte($tanggal){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perharian"=>$this->model->getlapakteperhari($tanggal)->result(),
      "perhari"=>$this->model->gettgl($tanggal)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perhariakte.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail laporan pendaftaran akte perbulan
  public function detaillaporanpendaftaranakteb($bulan){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perbulanan"=>$this->model->getlapakteperbulan($bulan)->result(),
      "perbulan"=>$this->model->getbln($bulan)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perbulanakte.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

    //menampilkan detail laporan pendaftaran kk pertahun
  public function detaillaporanpendaftaranaktet($tahun){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "pertahunan"=>$this->model->getlapaktepertahun($tahun)->result(),
      "pertahun"=>$this->model->getthn($tahun)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_pertahunakte.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

      //menampilkan detail laporan pendaftaran akte umum perhari
  public function detaillaporanpendaftaranakteu($tanggal){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perharianu"=>$this->model->getlapakteperhariu($tanggal)->result(),
      "perhariu"=>$this->model->gettglu($tanggal)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perhariakteu.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail laporan pendaftaran akte umum perbulan
  public function detaillaporanpendaftaranakteub($bulan){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perbulananu"=>$this->model->getlapakteperbulanu($bulan)->result(),
      "perbulanu"=>$this->model->getblnu($bulan)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perbulanakteu.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

    //menampilkan detail laporan pendaftaran akte umum pertahun
  public function detaillaporanpendaftaranakteut($tahun){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "pertahunanu"=>$this->model->getlapaktepertahunu($tahun)->result(),
      "pertahunu"=>$this->model->getthnu($tahun)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_pertahunakteu.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

        //menampilkan detail laporan pendaftaran akte terlambat pendaftaran perhari
  public function detaillaporanpendaftaranaktetp($tanggal){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perhariantp"=>$this->model->getlapakteperharitp($tanggal)->result(),
      "perharitp"=>$this->model->gettgltp($tanggal)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perhariaktetp.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //menampilkan detail laporan pendaftaran akte terlambat pendaftaran perbulan
  public function detaillaporanpendaftaranaktetpb($bulan){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "perbulanantp"=>$this->model->getlapakteperbulantp($bulan)->result(),
      "perbulantp"=>$this->model->getblntp($bulan)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_perbulanaktetp.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

    //menampilkan detail laporan pendaftaran akte terlambat pendaftaran pertahun
  public function detaillaporanpendaftaranaktetpt($tahun){
    $data=array(
      "title"=>'Laporan Pendaftaran Akte',
      "aktif"=>"laporanakte",
      "bclass"=>'',
      "pertahunantp"=>$this->model->getlapaktepertahuntp($tahun)->result(),
      "pertahuntp"=>$this->model->getthntp($tahun)->result_array(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detaillap_pertahunaktetp.php', $data, true);
    if ($peran=='2') {
      $data['aktif']="laporanakte";
      $this->load->view('template_akte', $data);
    }else if($peran=='4') {
      $data['aktif']="lapakte";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk mencetak laporan pendaftaran akte perhari
  public function cetaklaporanaktehari(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperhari(),
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

  //untuk mencetak laporan pendaftaran akte perbulan
  public function cetaklaporanaktebulan(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulan(),
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
  
  //untuk mencetak lapora pendaftaran akte pertahun
  public function cetaklaporanaktetahun(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahun(),
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
  
    //untuk mencetak laporan pendaftaran akte umum perhari
  public function cetaklaporanaktehariu(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperhariu(),
        "tabel"=>"cetak_akte_perhari.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE UMUM PERHARI",
        );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();     
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Umum Perhari.pdf', 'I');
  }

  //untuk mencetak laporan pendaftaran akte umum perbulan
  public function cetaklaporanaktebulanu(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulanu(),
        "tabel"=>"cetak_akte_perbulan.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE UMUM PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Umum Perbulan.pdf', 'I');
  }
  
  //untuk mencetak lapora pendaftaran akte umum pertahun
  public function cetaklaporanaktetahunu(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahunu(),
        "tabel"=>"cetak_akte_pertahun.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE UMUM PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Umum Pertahun.pdf', 'I');
  }

     //untuk mencetak laporan pendaftaran akte umum perhari
  public function cetaklaporanakteharitp(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperharitp(),
        "tabel"=>"cetak_akte_perhari.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERHARI",
        );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();     
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Perhari.pdf', 'I');
  }

  //untuk mencetak laporan pendaftaran akte umum perbulan
  public function cetaklaporanaktebulantp(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulantp(),
        "tabel"=>"cetak_akte_perbulan.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Perbulan.pdf', 'I');
  }
  
  //untuk mencetak lapora pendaftaran akte umum pertahun
  public function cetaklaporanaktetahuntp(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahuntp(),
        "tabel"=>"cetak_akte_pertahun.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Pertahun.pdf', 'I');
  }

    //cetak laporan pendaftaran akte perhari
  public function cetaklapdetailaktehari($tanggal){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperhari($tanggal)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE PERHARI",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perhari.pdf', 'I');
  }

      //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktebulan($bulan){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperbulan($bulan)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perbulan.pdf', 'I');
  }

  //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktetahun($tahun){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapaktepertahun($tahun)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Pertahun.pdf', 'I');
  }

    //cetak laporan pendaftaran akte umum perhari
  public function cetaklapdetailaktehariu($tanggal){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperhariu($tanggal)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE UMUM PERHARI",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perhari Umum.pdf', 'I');
  }

      //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktebulanu($bulan){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperbulanu($bulan)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE UMUM PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Perbulan.pdf', 'I');
  }

  //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktetahunu($tahun){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapaktepertahunu($tahun)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE UMUM PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Umum Pertahun.pdf', 'I');
  }

    //cetak laporan pendaftaran akte umum perhari
  public function cetaklapdetailakteharitp($tanggal){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperharitp($tanggal)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERHARI",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Perhari.pdf', 'I');
  }

      //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktebulantp($bulan){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapakteperbulantp($bulan)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Perbulan.pdf', 'I');
  }

  //cetak laporan pendaftaran perhari
  public function cetaklapdetailaktetahuntp($tahun){
    ob_start();
      $data=array(
        "d"=>$this->model->getlapaktepertahuntp($tahun)->result(),
        "tabel"=>"cetak_detailakte.php",
        "judul_lap"=>"DETAIL LAPORAN PENDAFTARAN AKTE TERLAMBAT PENDAFTARAN PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Akte Terlambat Pendaftaran Pertahun.pdf', 'I');
  }


  //untuk mencetak surat pengambilan berkas
  public function cetakpendaftaranakte($id){
    ob_start();
      $data=array(
        "d"=>$this->model->getDataPendaftaran($id)->row_array(),
        "tabel"=>"cetak_tandaterimaakte.php",
        "judul_lap"=>"Surat Keterangan Pengambilan Berkas Akte",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A5','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas Akte.pdf', 'I');
  }
}