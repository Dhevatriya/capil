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
      "tempat_lahir"=>'',
      "tanggal_lahir"=>'',
      "ayah"=>'',
      "ibu"=>'',
      "alamat"=>'',
      "rt"=>'',
      "rw"=>'',
      "id_kecamatan"=>'',
      "des"=>$this->PendafAkteM->getdes(), //menampilkan data desa
      "kec"=>$this->PendafAkteM->getkec(), //menampilkan data kecamatan
      "id_desakelurahan"=>'',
      "tgl_jadi"=>'',
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
      $this->model->tgl_buat=date('y-m-d');
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
  
  // function datapendafakteedit($id){
  //   $data=array(
  //     "title"=>'Edit Pendaftaran Akte',
  //     "aktif"=>"akte",
  //     "bclass"=>'',
  //     "datapendaftaran"=>$this->PendafAkteM->getdatapendaf($id)->row_array(),
  //     "dok"=>$this->PendafAkteM->get_syarat($getidpenbaru)->result(),
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //     "petugasUP"=>$this->PendafAkteM->get_data_petugas($username, $peran),
  //     "dok"=>$this->PendafAkteM->getdok()->result(),
  //     "keca"=>$this->PendafAkteM->getkec(),
  //     "desa"=>$this->PendafAkteM->getdes(),
  //     "bclass"=>" ",
  //   );
  //   $data['body']= $this->load->view('edit_akte', $data, true);
  //   if ($peran=='2') {
  //     $data['aktif']="akte";
  //     $this->load->view('template_akte', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="dtakte";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  // }

  //proses edit data pendaftaran akte
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
        'id2' => 'has-error',
        $username=$this->session->userdata('user'),
        $peran=$this->session->userdata('peran'),
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_akte', $data, true);
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
  
  //untuk menampilkan 
  // function unggahsyaratakte($id){  
  //   $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
  //   $data=array(
  //     "title"=>'Unggah syarat Syarat Pendaftaran Akte',
  //     "aktif"=>"riwayatakte",
  //     "bclass"=>'',
  //     "gambar"=>'',
  //     "datapendaftaran"=>$this->PendafAkteM->get_pendaftaranakte($id)->result(),
  //     "dok"=>$this->PendafAkteM->get_syarat($id)->result(),
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $data['body']= $this->load->view('unggah_akte', $data, true);
  //   if ($peran=='2') {
  //     $data['aktif']="riwayatakte";
  //     $this->load->view('template_akte', $data);
  //   }else if($peran=='4') {
  //     $data['aktif']="riwakte";
  //     $data['bclass']=" ";
  //     $this->load->view('template_admin', $data);
  //   }
  // }
  // public function tambahsyarat($id){  
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
  //     "title"=>'Unggah syarat Persyarat Pendaftaran Akte',
  //     "aktif"=>"riwayatakte",
  //     "bclass"=>'',
  //     $username=$this->session->userdata('user'),
  //     $peran=$this->session->userdata('peran'),
  //   );
  //   $iddet=$this->PendafAkteM->get_det($id);
  //   $this->model->gambar=$_POST['gambar'];
  //   $query1 = $this->model->update_detail($iddet);

  //   redirect('PendafAkteC/unggahsyaratakte/'.$id);
  // }

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
  public function tambahsyarat1($id){
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
  
  //untuk menampilka data desa yang ditampilkan di dropdown
  public function getdesa(){
    $id_kec = $this->input->post('nama_kecamatan');
    $dataDesa=$this->PendafAkteM->get_desa($id_kec);
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
    $query1=$this->PendafAkteM->update_detail($id, $status_unggah);
    redirect('PendafAkteC/dataPendaftaran/'.$id);
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
  
  //untuk mencetak surat pengambilan berkas
  public function cetakpendaftaranakte($id){
    ob_start();
      $data=array(
        "d"=>$this->model->getDataPendaftaran($id)->row_array(),
        "tabel"=>"cetak_tandaterimaakte.php",
        "judul_lap"=>"Tanda Terima Berkas Akte",
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