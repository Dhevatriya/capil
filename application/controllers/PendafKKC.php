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

  //untuk menampilkan beranda pendaftaran kk
  public function index(){
    $data=array(
      "bclass"=>'',
      "cls"=>"modal fade",        
      "display"=>"none",
      "ah"=>"true",
      "title"=>'Pendaftaran Kartu Keluarga',
      "dataperhari"=>$this->model->pendafkkhari()->num_rows(),
      "aktif"=>"kk",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('berandakk.php', $data, true);
    if ($peran=='1') {
      $data['aktif']="berandakk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="dtkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //form input pendaftaran kk
  public function inputPendaftaran(){
    $data=array(
      "bclass"=>'',
      "cls"=>"modal fade",        
      "display"=>"none",
      "ah"=>"true",
      "title"=>'Pendaftaran Kartu Keluarga',
      "aktif"=>"kk",
      "noKK"=>'',
      "nik"=>'',
      "nama_kepala_keluarga"=>'',
      "id_kecamatan"=>'',
      "alamat"=>'',
      "rt"=>'',
      "rw"=>'',
      "nama_desakelurahan"=>'',
      "tgl_jadi"=>'',
      "id_syarat"=>'',
      "nama_status_pendaftaran"=>'',
      "des"=>$this->PendafKKM->getdes(),
      "kec"=>$this->PendafKKM->getkec(),
      "kode_pos"=>set_value(''),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
      "dok"=>$this->PendafKKM->getdok()->result(),
      "petugasUP"=>$this->PendafKKM->get_data_petugas($username, $peran),
    );
    $data['body']= $this->load->view('petugas_kkv.php', $data, true);
    if ($peran=='1') {
      $data['aktif']="kk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="dtkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //proses pendaftaran kk
  public function inputPendaftaranKKProses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kepala_keluarga', 'nama_kepala_keluarga', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan', 'required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi', 'required');
    $this->form_validation->set_rules('id_syarat[]', 'id_syarat[]', 'required|greater_than[0]', 
      array('required' => 'Syarat tidak terpenuhi !', 'greater_than[0]' => '' ));
    if($this->form_validation->run()==FALSE){
      $data=array(
            "title"=>'Tambah Data Keluarga',
            "aktif"=>"kk",
            "bclass"=>'',
            'noKK' => set_value('noKK', ''),
            'nik' => set_value('nik', ''),
            "des"=>$this->PendafKKM->getdes(),
            "kec"=>$this->PendafKKM->getkec(),
            $username=$this->session->userdata('user'),
            $peran=$this->session->userdata('peran'),
            "petugasUP"=>$this->PendafKKM->get_data_petugas($username, $peran),
            "dok"=>$this->PendafKKM->getdok()->result(),
            'nama_kepala_keluarga' => set_value('nama_kepala_keluarga', ''),
            'id_kecamatan'=> set_value('id_kecamatan',''),
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
      $data['body']= $this->load->view('petugas_kkv', $data, true);
    if ($peran=='1') {
      $data['aktif']="kk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="dtkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
    }else{
      $ids=$this->PendafKKM->getstatus();
      $id=$this->session->userdata('id');
      $this->model->noKK=$_POST['noKK'];
      $this->model->nik=$_POST['nik'];
      $this->model->nama_kepala_keluarga=$_POST['nama_kepala_keluarga'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->id_petugasFK = $id;
      $this->model->tgl_buat=date('y-m-d');
      $this->model->tgl_jadi=$_POST['tgl_jadi'];
      $this->model->id_status_pendafFK=$ids;
      $query1 = $this->model->insertkk();

      $getidpenbaru=getid_penbaru();
    
      $str=implode(" ", $_POST['id_syarat']);
      $arr=explode(" ", $str);
      for($i=0; $i<count($arr); $i++){
        $id_syarat = $arr[$i];
        $query = $this->model->insertdetail($id_syarat, $getidpenbaru);
      }
      $this->session->set_flashdata('sukses',"Daftar Kartu keluarga berhasil dilakukan !");
      redirect('PendafKKC/dataPendaftaranKK/'.$getidpenbaru);
    }
  }

  //menampilkan data pendafaran kk
  public function dataPendaftaranKK($getidpenbaru){  
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $data=array(
      "title"=>'Pendaftaran Kartu Keluarga ',
      "aktif"=>"kk",
      "bclass"=>'',
      "dok"=>$this->PendafKKM->get_syarat($getidpenbaru)->result(),
      "datapendaf"=>$this->PendafKKM->getdata_pendaftaran($getidpenbaru),
      "keca"=>$this->PendafKKM->getkec(),
      "desa"=>$this->PendafKKM->getdes(),
      "datapendaftaran"=>$this->PendafKKM->get_pendaf_det($getidpenbaru)->row_array(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('form_pengambilan_kk_baru_manual', $data, true);
    if ($peran=='1') {
      $data['aktif']="kk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="dtkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //form edit pendaftaran kk
  public function editpendaftarankk($id){
    $data=array(
      "title"=>'Edit Data Keluarga',
      "aktif"=>"kk",
      "bclass"=>'',
      "get_datakeluarga"=>$this->PendafKKM->get_pendaf_det($id)->row_array(),
      "keca"=>$this->PendafKKM->getkec(),
      "desa"=>$this->PendafKKM->getdes(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('edit_keluargav', $data, true);
    if ($peran=='1') {
      $data['aktif']="kk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="dtkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //edit pendaftaran kk proses
  public function editpendaftarankkproses(){
    $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom:2px">', '</div>');
    $this->form_validation->set_rules('nama_kepala_keluarga', 'nama_kepala_keluarga','required');
    $this->form_validation->set_rules('nama_desakelurahan', 'nama_desakelurahan', 'required');
    $this->form_validation->set_rules('nama_kecamatan', 'nama_kecamatan','required');
    $this->form_validation->set_rules('tgl_jadi', 'tgl_jadi','required');
    $id=$_POST['id_pendaftaran'];
    if($this->form_validation->run()==FALSE){
      $this->session->set_flashdata('eror','Data gagal di update, pastikan mengisi semua data');
      $data=array(
        "title"=>'Edit Data Keluarga',
        "aktif"=>"kk",
        "bclass"=>" ",
        'noKK' => set_value('noKK', ''),
        'nik' => set_value('nik', ''),
        'nama_kepala_keluarga' => set_value('nama_kepala_keluarga', ''),
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
      $data['body']= $this->load->view('edit_keluargav', $data, true);
      if ($peran=='1') {
        $data['aktif']="kk";
        $this->load->view('template_kk', $data);
      }else if($peran=='4') {
        $data['aktif']="dtkk";
        $data['bclass']=" ";
        $this->load->view('template_admin', $data);
      }
    }else{
      $id_pendaftaran = $this->PendafKKM->getidpendaf($_POST['id_pendaftaran']);
      $this->model->noKK= $_POST['noKK'];
      $this->model->nik= $_POST['nik'];
      $this->model->nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
      $this->model->alamat = $_POST['alamat'];
      $this->model->rt = $_POST['rt'];
      $this->model->rw = $_POST['rw'];
      $this->model->nama_desakelurahan = $_POST['nama_desakelurahan'];
      $this->model->tgl_jadi = $_POST['tgl_jadi'];
      $query = $this->model->updatepend($id_pendaftaran);
      $this->session->set_flashdata('sukses', 'Edit data berhasil dilakukan!');
      redirect('PendafKKC/dataPendaftaranKK/'.$id_pendaftaran);
    }
  }

  //tabel yang belum diunggah pendaftaran kk
  public function syaratpendafkk(){
    $data=array(
          "title"=>'Unggah Syarat Pendaftaran KK',
          "aktif"=>"syaratkk",
          "bread"=>'Unggah Syarat Pendaftaran KK',
          "bclass"=>'',
          "pem"=>$this->PendafKKM->get_pendafkk(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),          
        );
    $this->session->set_userdata('asal', 'syarat');
    $data['body']= $this->load->view('syarat_pendafkk', $data, true);
    if ($peran=='1') {
      $data['aktif']="syaratkk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }
   //detail pendaftaran kk
  public function detailsyaratkk($id){
    $data=array(
      "title"=>'Detail Unggah Syarat Pendaftaran KK',
      "aktif"=>"syaratkk",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafKKM->get_pendaftarankk($id)->result(),
      "dok"=>$this->PendafKKM->get_syarat($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_kk', $data, true);
    if ($peran=='1') {
      $data['aktif']="syaratkk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="adsyaratkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //tabel yang belum diunggah pendaftaran kk
  public function riwayatpendafkk(){
    $data=array(
          "title"=>'Riwayat Pendaftaran KK',
          "aktif"=>"riwayatkk",
          "bread"=>'Riwayat Pendaftaran KK',
          "bclass"=>'',
          "pem"=>$this->PendafKKM->get_pendaftkk(),
          $username=$this->session->userdata('user'),
          $peran=$this->session->userdata('peran'),          
        );
    $this->session->set_userdata('asal', 'riwayat');
    $data['body']= $this->load->view('riwayat_pendafkk', $data, true);
    if ($peran=='1') {
      $data['aktif']="riwayatkk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="riwkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //detail pendaftaran kk
  public function detailriwayatkk($id){
    $data=array(
      "title"=>'Detail Pendaftaran KK',
      "aktif"=>"riwayatkk",
      "bclass"=>'',
      "datapendaftaran"=>$this->PendafKKM->get_pendaftarankk($id)->result(),
      "datapendafsyarat"=>$this->PendafKKM->get_pendaftrkk($id)->result(),
      "bclass"=>" ",
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('detail_riwayatkk', $data, true);
    if ($peran=='1') {
      $data['aktif']="riwayatkk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="riwkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
    $this->session->set_flashdata('sukses', 'Unggah yarat pendaftaran berhasil dilakukan!');
  }

  //untuk menampilkan data desa yang ditampilkan di dropdown
  public function getdesa(){
    $id_kec = $this->input->post('nama_kecamatan');
    $dataDesa=$this->PendafKKM->get_desa($id_kec);
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
      "aktif"=>"riwayatkk",
      "bclass"=>'',
      "gambar"=>'',
      "datapendaftaran"=>$this->PendafKKM->get_pendaftarankk($id)->result(),
      "dok"=>$this->PendafKKM->get_syarat($id)->result(),
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('unggah_kk', $data, true);
    if ($peran=='1') {
      $data['aktif']="riwayatkk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="riwkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk upload syarat pendaftaran
  public function tambahsyarat1($id)
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
          redirect('PendafKKC/detailriwayatkk/'.$id);
    }
  }

  //untuk keluar dari siste
  public function logout(){  
    $this->session->unset_userdata($userData);
    $this->session->unset_userdata('user');
    $this->session->unset_userdata('pass');
    $this->session->unset_userdata('peran');
    $this->session->unset_userdata('logged_in');  
    $this->session->set_flashdata('sukses', 'Terimakasih Telah Menggunakan Aplikasi Sebagai Petugas KK Disdukcapil Karanganyar');
    redirect('LoginC'); 
  }

  //menampilkan laporan pendaftaran kk
  public function laporanpendaftarankk(){
    $data=array(
      "title"=>'Laporan Pendaftaran Kartu Keluarga',
      "aktif"=>"laporankk",
      "bclass"=>'',
      "perhari"=>$this->model->getperhari(),
      "perbulan"=>$this->model->getperbulan(),
      "pertahun"=>$this->model->getpertahun(),
      "bclass"=>'',
      $username=$this->session->userdata('user'),
      $peran=$this->session->userdata('peran'),
    );
    $data['body']= $this->load->view('laporan_kk.php', $data, true);
    if ($peran=='1') {
      $data['aktif']="laporankk";
      $this->load->view('template_kk', $data);
    }else if($peran=='4') {
      $data['aktif']="lapkk";
      $data['bclass']=" ";
      $this->load->view('template_admin', $data);
    }
  }

  //untuk menampilkan nama bulan
  public function getbulan(){
    $tahun = $this->input->post('pilih_tahun');
    if($tahun=="1"){
      $databul=$this->PendafKKM->getperbulan();
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
      $databulan=$this->PendafKKM->getbulan($tahun);
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

  //cetak laporan pendaftaran perhari
  public function cetaklaporankkhari(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperhari(),
        "tabel"=>"cetak_kk_perhari.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN KARTU KELUARGA PERHARI",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Kartu Keluarga Perhari.pdf', 'I');
  }

  //cetak laporan pendaftaran perbulan
  public function cetaklaporankkbulan(){
    ob_start();
      $data=array(
        "d"=>$this->model->getperbulan(),
        "tabel"=>"cetak_kk_perbulan.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN KARTU KELUARGA PERBULAN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Kartu Keluarga Perbulan.pdf', 'I');
  }

  //cetak laporan pendaftaran pertahun
  public function cetaklaporankktahun(){
    ob_start();
      $data=array(
        "d"=>$this->model->getpertahun(),
        "tabel"=>"cetak_kk_pertahun.php",
        "judul_lap"=>"LAPORAN PENDAFTARAN KARTU KELUARGA PERTAHUN",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('P','A4','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Laporan Pendaftaran Kartu Keluarga Pertahun.pdf', 'I');
  }

  //cetak surat pengambilan berkas kk
  public function cetakpendaftarankk($id){
    ob_start();
      $data=array(
        "d"=>$this->model->getDataPendaftaranKK($id)->row_array(),
        "tabel"=>"cetak_tandaterimakk.php",
        "judul_lap"=>"Tanda Terima Berkas KK",
      );
      $this->load->view('layout_cetak_fix.php', $data);
      $html = ob_get_contents();
          ob_end_clean();
          require_once('./assets/html2pdf/html2pdf.class.php');
      $pdf = new HTML2PDF('L','A5','en');
      $pdf->WriteHTML($html);
      $pdf->Output('Tanda Terima Berkas KK.pdf', 'I');
  }
}