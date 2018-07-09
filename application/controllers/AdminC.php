<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminC extends CI_Controller {
  
  function __construct(){
    parent::__construct();
    $this->load->model('AdminM');
    $this->model = $this->AdminM;
    no_access_adm();
    $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
  }

var $data= array();
  function index(){
    $data=array(
      "title"=>'Beranda',
      "aktif"=>"admin",
      "lapkk"=>$this->AdminM->pendafkktahun()->num_rows(),
      "lapakte"=>$this->AdminM->pendafaktetahun()->num_rows(),
      "lappindah"=>$this->AdminM->pendafpindahtahun()->num_rows(),
      "lappindahdatang"=>$this->AdminM->pendafpindahdatangtahun()->num_rows(),
      "grafikKK"=>$this->AdminM->getPendaftaranKK(),
      "bclass"=>" ",
    );
    $data['body']= $this->load->view('dashboardv.php', $data, true);
    $this->load->view('template_admin',$data);
  }

  //logout sistem
  function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Admin Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }

  //tabel daftar petugas
  function daftarPetugas(){  
    $data=array(
      "title"=>'Daftar Petugas',
      "aktif"=>"petugas",
      "petugas"=>$this->AdminM->get_petugas()->result(),
      "bclass"=>" ",
    );
    $data['body']= $this->load->view('petugas_admin.php', $data, true);
    $this->load->view('template_admin',$data);
  }

  //tambah data petugas
  function tambahPetugas(){
    $data=array(
      "title"=>'Tambah Petugas',
      "aktif"=>"petugas",
      "bclass"=>" ",
      'nama_petugas' => set_value('nama_petugas', ''),
      'alamat_petugas' => '',
      'no_hp_petugas' => '',
      'username' => '',
      'password' => '',
      "id_user_roleFK"=>'',
      "pern"=>$this->AdminM->getperan(),     
      'id2' => '',
    );
    $data['body']= $this->load->view('tambah_petugasV', $data, true);
    $this->load->view('template_admin', $data); 
  }
  
  //proses tambah petugas
  function tambahPetugasProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_petugas', 'Nama petugas', 'required');
    $this->form_validation->set_rules('alamat_petugas', 'Alamat petugas', 'required');
    $this->form_validation->set_rules('no_hp_petugas', 'No HP petugas', 'required|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('peran', 'peran', 'required');
    $u=$_POST['username'];
    $cekper=$this->db->query("select * from petugas where username='$u' and Deleted=0")->num_rows();
    if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('error',"Username sudah digunakan");
      }else{
      $this->session->set_flashdata('error','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Petugas',
            "aktif"=>"petugas",
            "bclass"=>" ",
            "pern"=>$this->AdminM->getperan(), 
            'nama_petugas' => set_value('nama_petugas', ''),
            'alamat_petugas' => set_value('alamat_petugas', ''),
            'no_hp_petugas' => set_value('no_hp_petugas', ''),
            'username' => set_value('username', ''),
            'password' => set_value('password', ''),
            'peran' => set_value('peran', ''),
            "id_user_roleFK"=>set_value('peran', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('tambah_petugasv', $data, true);
      $this->load->view('template_admin', $data);      
    }elseif($cekper>0){
      $this->session->set_flashdata('error',"Username sudah digunakan");
      redirect('AdminC/daftarpetugas');
    }else{
      $data=array(
        "id_petugas"=>getId('petugas','id_petugas'),
        "nama_petugas"=>$_POST['nama_petugas'],
        "alamat_petugas"=>$_POST['alamat_petugas'],
        "no_hp_petugas"=>$_POST['no_hp_petugas'],
        "username"=>$_POST['username'],
        "password"=>md5($_POST['password']),
        "id_user_roleFK"=>$_POST['peran'],
      );
      $this->db->insert('petugas',$data);
      $this->session->set_flashdata('sukses',"Tambah data petugas berhasil dilakukan !");
      redirect('AdminC/daftarPetugas');
    }
  }

  //edit data petugas
  function editPetugas($id){
    $data=array(
      "title"=>'Edit Petugas',
      "aktif"=>"petugas",
      "get_petugas"=>$this->AdminM->get_petugas_det($id)->row_array(),
      "bclass"=>" ",
      "id_pet"=>$id,
    );
    $data['body']= $this->load->view('edit_admin', $data, true);
    $this->load->view('template_admin', $data);  
  }

  //proses edit data petugas
  function editPetugasProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('alamat_petugas', 'alamat_petugas', 'required');
    $this->form_validation->set_rules('no_hp_petugas', 'no_hp_petugas', 'required|min_length[10]|max_length[13]');
    $this->form_validation->set_rules('username', 'username', 'required');
    $id=$_POST['id_petugas'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('error','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Petugas',
        "aktif"=>"petugas",
        "bclass"=>" ",
        "get_petugas"=>$this->AdminM->get_petugas_det($_POST['id_petugas'])->row_array(),
        'alamat_petugas' => set_value('alamat_petugas', ''),
        'no_hp_petugas' => set_value('no_hp_petugas', ''),
        'username' => set_value('username', ''),
        'id2' => 'has-error',
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('edit_admin', $data, true);
      $this->load->view('template_admin', $data);
    }else{
      $id_petugas = $id;
      $this->model->alamat_petugas = $_POST['alamat_petugas'];
      $this->model->no_hp_petugas = $_POST['no_hp_petugas'];
      $this->model->username = $_POST['username'];
      $query = $this->model->updatepetugas($id_petugas);
      $this->session->set_flashdata('sukses', 'Edit data petugas berhasil dilakukan!');
      redirect('AdminC/daftarPetugas');
    }
  }

  //reset password
  function resetPass(){
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('repassword', 'repassword', 'required');
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('error','Kata sandi gagal diupdate, pastikan mengisi semua data');
      redirect('AdminC/editPetugas/'.$_POST['id_petugas']);
    }else{
      $pass1 = $_POST['password'];
      $pass2 = $_POST['repassword'];
      if ($pass1==$pass2) {
        $this->model->id_petugas= $_POST['id_petugas'];
        $this->model->password = md5($_POST['password']);
        $this->model->resetpassword($_POST['id_petugas'],md5($_POST['password']));
        $this->session->set_flashdata('sukses', 'Kata sandi berhasil diubah!');
        redirect('AdminC/editPetugas/'.$_POST['id_petugas']);
      }else{
        $this->session->set_flashdata('error', 'Kata sandi gagal diubah, tidak cocok!');
        $data=array(
          "title"=>'Edit Petugas',
              "aktif"=>"petugas",
              "get_petugas"=>$this->AdminM->get_petugas_det($_POST['id_petugas'])->row_array(),
              "bclass"=>" ",
              "cls"=>"modal fade",
              "display"=>"none",
              "ah"=>"true",
              "id_pet"=>$_POST['id_petugas'],
            );
        $data['body']= $this->load->view('edit_admin', $data, true);
        $this->session->set_flashdata('sukses', 'Ubah kata sandi berhasil dilakukan!');
        $this->load->view('template_admin', $data);
      }
    }
  }

  //hapus petugas
  public function hapusPetugas($id){
    $data=array(
        "Deleted"=>'1',
      );
    $this->db->where('id_petugas', $id);
    $this->db->update('petugas',$data);
    $this->session->set_flashdata('sukses', 'Data petugas berhasil dihapus!');
    redirect('AdminC/daftarpetugas');
  }

  //daftar Syarat Pendaftaran
  function daftarSyarat(){  
    $id=$this->input->post('id_kecamatan');
    $data=array(
      "title"=>'Daftar Syarat Pendaftaran',
      "aktif"=>"syarat",
      "syrt"=>$this->AdminM->get_syarat()->result(),
      "statuspendaf"=>$this->AdminM->get_status()->result(),
      "bclass"=>" ",
    );
    $data['body']= $this->load->view('daftar_syarat.php', $data, true);
    $this->load->view('template_admin',$data);
  }

  //tambah Syarat
  function tambahSyarat(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('judul_syarat', 'judul_syarat', 'required');
    $k=$_POST['judul_syarat'];
    $cekper=$this->db->query("select * from syarat where judul_syarat='$k'")->num_rows();
    if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('error',"Judul Syarat sudah ada");
      }else{
      $this->session->set_flashdata('error','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Syarat',
            "aktif"=>"Syarat",
            "bclass"=>" ",
            'judul_syarat' => set_value('judul_syarat', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('daftar_syarat', $data, true);
      $this->load->view('template_admin', $data);      
    }elseif($cekper>0){
      $this->session->set_flashdata('error',"Judul Syarat sudah ada");
      redirect('AdminC/daftarSyarat/'.$idk);
    }else{
      $data=array(
        "id_syarat"=>getId('syarat','id_syarat'),
        "judul_syarat"=>$_POST['judul_syarat'],
      );
      $this->db->insert('syarat',$data);
      $this->session->set_flashdata('sukses',"Tambah data syarat pendaftaran berhasil dilakukan !");
      redirect('AdminC/daftarSyarat/');
    }
  }

  //proses edit judul syarat
  function editSyaratPendaftaranProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('judul_syarat', 'judul_syarat', 'required');
    $id=$_POST['id_syarat'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('error','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Syarat Proses',
        "aktif"=>"syarat",
        "bclass"=>" ",
        "syrt"=>$this->AdminM->get_syarat()->result(),
        'judul_syarat' => set_value('judul_syarat', ''),
        'id2' => 'has-error',
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('daftar_syarat', $data, true);
      $this->load->view('template_admin', $data);
    }else{
      $id_syarat = $id;
      $this->model->judul_syarat = $_POST['judul_syarat'];
      $query = $this->model->updateSyarat($id_syarat);
      $this->session->set_flashdata('sukses', 'Edit data syarat pendaftaran berhasil dilakukan!');
      redirect('AdminC/daftarSyarat');
    }
  }

  //hapus petugas
  public function hapusSyarat($id){
    $data=array(
        "Deleted"=>'1',
      );
    $this->db->where('id_syarat', $id);
    $this->db->update('syarat',$data);
    $this->session->set_flashdata('sukses', 'Data syarat pendaftaran berhasil dihapus!');
    redirect('AdminC/daftarSyarat');
  }

  //daftar kecamatan
  function daftarKecamatan(){  
    $id=$this->input->post('id_kecamatan');
    $data=array(
      "title"=>'Daftar Kecamatan',
      "aktif"=>"kecamatan",
      "kec"=>$this->AdminM->get_kecamatan()->result(),
      "bclass"=>" ",
    );
    $data['body']= $this->load->view('daftar_kecamatan.php', $data, true);
    $this->load->view('template_admin',$data);
  }

  //tambah kecamatan
  function tambahKecamatan(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $k=$_POST['nama_kecamatan'];
    $cekper=$this->db->query("select * from kecamatan where nama_kecamatan='$k'")->num_rows();
    if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('error',"Nama kecamatan sudah ada");
      }else{
      $this->session->set_flashdata('error','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Kecamatan',
            "aktif"=>"kecamatan",
            "bclass"=>" ",
            'nama_kecamatan' => set_value('nama_kecamatan', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('daftar_kecamatan', $data, true);
      $this->load->view('template_admin', $data);      
    }elseif($cekper>0){
      $this->session->set_flashdata('error',"Nama kecamatan sudah ada");
      redirect('AdminC/daftarKecamatan/'.$idk);
    }else{
      $data=array(
        "id_kecamatan"=>getId('kecamatan','id_kecamatan'),
        "nama_kecamatan"=>$_POST['nama_kecamatan'],
      );
      $this->db->insert('kecamatan',$data);
      $this->session->set_flashdata('sukses',"Tambah data kecamatan berhasil dilakukan !");
      redirect('AdminC/daftarKecamatan/');
    }
  }

  //proses edit data kecamatan
  function editKecamatanProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $id=$_POST['id_kecamatan'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('error','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Kecamatan',
        "aktif"=>"desa",
        "bclass"=>" ",
        "get_keca"=>$this->AdminM->get_kec($_POST['id_kecamatan'])->row_array(),
        'nama_kecamatan' => set_value('nama_kecamatan', ''),
        'id2' => 'has-error',
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('daftar_kecamatan', $data, true);
      $this->load->view('template_admin', $data);
    }else{
      $id_kecamatan = $id;
      $this->model->nama_kecamatan = $_POST['nama_kecamatan'];
      $query = $this->model->updatekec($id_kecamatan);
      $this->session->set_flashdata('sukses', 'Edit data kecamatan berhasil dilakukan!');
      redirect('AdminC/daftarKecamatan/'.$idk);
    }
  }

  //daftar desa/kelurahan
  function daftardesakelurahan($idk){  
    $id=$this->input->post('id_desakelurahan');
    $data=array(
      "title"=>'Daftar Desa/Kelurahan',
      "aktif"=>"kecamatan",
      "desak"=>$this->AdminM->get_desakelurahan($idk)->result(),
      "des"=>$this->AdminM->get_desak($idk)->result(),
      "bclass"=>" ",
    );
    $data['body']= $this->load->view('daftar_desakelurahan.php', $data, true);
    $this->load->view('template_admin',$data);
  }

  //tambah desa kelurahan manual
  function tambahDesaKelurahan(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $d=$_POST['nama_desakelurahan'];
    $k=$_POST['nama_kecamatan'];
    $id=$_POST['id_kecamatanFK'];
    $cekper=$this->db->query("select * from desakelurahan, kecamatan where kecamatan.id_kecamatan = desakelurahan.id_kecamatanFK and nama_desakelurahan='$d' and nama_kecamatan='$k'")->num_rows();
    if($this->form_validation->run()==FALSE){
      if($cekper>0){
      $this->session->set_flashdata('error',"Nama desa/kelurahan sudah ada");
      }else{
      $this->session->set_flashdata('error','Data gagal di inputkan, pastikan mengisi semua data');
      }
      $data=array(
            "title"=>'Tambah Desa/Kelurahan',
            "aktif"=>"kecamatan",
            "bclass"=>" ",
            'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
            'id2' => 'has-error',
          );
      $data['body']= $this->load->view('daftar_desakelurahan', $data, true);
      $this->load->view('template_admin', $data);      
    }elseif($cekper>0){
      $this->session->set_flashdata('error',"Nama desa/kelurahan sudah ada");
      redirect('AdminC/daftardesakelurahan/'.$idk);
    }else{
      $data=array(
        "id_desakelurahan"=>getId('desakelurahan','id_desakelurahan'),
        "id_kecamatanFK"=>$id,
        "nama_desakelurahan"=>$_POST['nama_desakelurahan'],
      );
      $this->db->insert('desakelurahan',$data);
      $this->session->set_flashdata('sukses',"Tambah data desa/kelurahan berhasil dilakukan !");
      redirect('AdminC/daftardesakelurahan/'.$id);
    }
  }

  //proses edit data desa/kelurahan
  function editDesakelurahanProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
       $id=$_POST['id_desakelurahan'];
    $idk=$_POST['id_kecamatanFK'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('error','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Desa/Kelurahan',
        "aktif"=>"desa",
        "bclass"=>" ",
        "get_desak"=>$this->AdminM->get_desakel($_POST['id_desakelurahan'])->row_array(),
        "desak"=>$this->AdminM->get_desakelurahan($idk)->result(),
        'nama_desakelurahan' => set_value('nama_desakelurahan', ''),
        'id2' => 'has-error',
      );
      $this->session->set_userdata('petEdit', 'y');
      $data['body']= $this->load->view('daftar_desakelurahan', $data, true);
      $this->load->view('template_admin', $data);
    }else{
      $id_desakelurahan = $id;
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $query = $this->model->updatedesak($id_desakelurahan);
      $this->session->set_flashdata('sukses', 'Edit data desa/kelurahan berhasil dilakukan!');
      redirect('AdminC/daftardesakelurahan/'.$idk);
    }
  }

  //hapus data desa/kelurahan
  public function hapusDesa($id){
    $data=array(
        "Deleted"=>'1',
      );
    $this->db->where('id_desakelurahan', $id);
    $this->db->update('desakelurahan',$data);
    $this->session->set_flashdata('sukses', 'Data Desa/Kelurahan berhasil dihapus!');
    $idk=getdesaa($id);
    redirect('AdminC/daftardesakelurahan/'.$idk);
  }

  //import excel data desakelurahan
  function uploadDesaKelurahan(){
    $this->load->helper('file');
    $id_kecamatanFK =$_POST['id_kecamatan'];
    $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = './upload/upload_excel'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = './upload/upload_excel/'.$fileName;
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $judul = $sheet->rangeToArray('A' . 1 . ':' . $highestColumn . 1,NULL,TRUE,FALSE);
            $desaDitolak = array();
            $desaDiterima = array();
            $tolak = 0;
            $terima = 0;
            unlink($inputFileName);
            $jum=0;
            if ($judul[0][0]=="Nama Desa/Kelurahan") {
              for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $dataDesaKelurahan = array(
                    "id_kecamatanFK" => $id_kecamatanFK,
                    "nama_desakelurahan"=>$rowData[0][0],
                );
                $des=$rowData[0][0];
                $cekIdM = $this->db->query("SELECT * from desakelurahan where nama_desakelurahan = '$des'")->num_rows();
                if($cekIdM > 0){
                  //jika nama desa sudah ada
                  array_push($desaDitolak, $rowData[0][0], $rowData[0][1]);
                }else{
                  //jika nama desa belum ada
                  array_push($desaDiterima, $rowData[0][0], $rowData[0][1]);
                  //sesuaikan nama dengan nama tabel
                  $insert = $this->db->insert("desakelurahan",$dataDesaKelurahan);
                  $terima++;
                }

                delete_files($media['file_path']);
                $jum++;
                         
                }
                $highestRow--;
                // $this->session->set_flashdata('error','Data gagal di update, pastikan mengisi semua data');
                $pesan = "(".$terima." data berhasil dimasukan dari total ".$highestRow." data!)";
                $this->session->set_flashdata('success', $pesan);
            }else{
                $pesanerror = "('Gagal import excel, Kolom tidak sesuai!')";
                $this->session->set_flashdata('error', $pesanerror);
            }
            redirect('AdminC/daftardesakelurahan/'.$id_kecamatanFK);         
    }

}