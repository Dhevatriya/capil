<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafAkteM extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function getdata_pendaftaran($idpendf){
        $q=$this->db->query("SELECT DISTINCT(id_pendaftaran), jenis_akte, no_registrasi, nik, jenis_kelamin, tempat_lahir, tanggal_lahir, nama_lengkap, alamat, rt, rw, tgl_daftar, tgl_jadi, nama_kecamatan, nama_desakelurahan, nama_status_pendaftaran, id_pendaftaranFK, status_unggah FROM desakelurahan, kecamatan, pendaftaran, status_pendaftaran, detail_syarat where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.Deleted='0' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and status_pendaftaran.Deleted='0' and detail_syarat.Deleted='0' and id_pendaftaran='$idpendf'")->result();
        return $q;
    }
    public function getstatus(){
        $q = $this->db->query("SELECT id_status_pendaftaran FROM status_pendaftaran where status_pendaftaran.Deleted='0' AND id_status_pendaftaran='2'")->row_array();
        return $q['id_status_pendaftaran'];
    }  
    public function getdok(){
        $q = $this->db->query("SELECT * FROM syarat where syarat.Deleted='0' GROUP BY id_syarat");
        return $q;
    }
    public function getsyaratakte($id_pendaftaranFK){
        $q = $this->db->query("SELECT id_syaratFK from syarat, detail_syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK AND id_pendaftaranFK='$id_pendaftaranFK' and syarat.Deleted='0' GROUP BY id_syaratFK");
        return $q;
    }
    public function insertakte(){
        $data = array(
            "no_registrasi"=>$this->no_registrasi,
            "nik"=>$this->nik,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "id_petugasFK"=>$this->id_petugasFK,
            "tgl_daftar"=>date('y-m-d'),
            "tgl_jadi"=>$this->tgl_jadi,
            "jenis_akte"=>$this->jenis_akte,
            "id_status_pendafFK"=>$this->id_status_pendafFK,
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows(); 
    }
    public function insertdetail($iddok,$idpend){
        $data = array(
            "id_syaratFK"=>$iddok,
            "id_pendaftaranFK"=>$idpend,
        );
        $this->db->insert('detail_syarat',$data);
        return $this->db->affected_rows();      
    }
    public function updatepend($idPen){
        $data = array(
            "no_registrasi"=>$this->no_registrasi,
            "nik"=>$this->nik,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "jenis_akte"=>$this->jenis_akte,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "tgl_jadi"=>$this->tgl_jadi,
        );
        $this->db->where('id_pendaftaran', $idPen);
        $this->db->update('pendaftaran',$data);
        return $this->db->affected_rows();    
    }
 public function update_detail($id, $status_unggah){
        $data = array(
            "gambar"=>$this->userfile,
            "status_unggah"=>$status_unggah,
        );
        $this->db->where('id_pendaftaranFK', $id);
        $this->db->update('detail_syarat',$data);
        return $this->db->affected_rows();       
    }
    public function get_syarat($id_pendaftaran){
        $q = $this->db->query("SELECT * from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.Deleted='0' and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran='$id_pendaftaran'");
        return $q;
    }
    public function get_det($id){
        $q = $this->db->query("SELECT * from detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and  id_pendaftaranFK='$id'")->row_array();
        return $q['id_pendaftaranFK'];
    }
    public function get_data_petugas($u, $p){
        $q = $this->db->query("SELECT * FROM petugas, user_role WHERE user_role.id_user_role=petugas.id_user_roleFK AND username='$u' AND id_user_roleFK='$p' and petugas.Deleted='0' and user_role.Deleted='0'")->row_array();
        return $q;
    }
    public function getdatapendaf($id){
        $q = $this->db->query("SELECT id_pendaftaran, jenis_akte, no_registrasi, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_lengkap, alamat, rt, rw, tgl_daftar, tgl_jadi, nama_kecamatan, nama_desakelurahan FROM pendaftaran, desakelurahan, kecamatan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and pendaftaran.Deleted='0' and desakelurahan.Deleted='0' and kecamatan.Deleted ='0' and id_pendaftaran='$id'");
        return $q;
    }
    public function getidpendaf($id){
        $q = $this->db->query("SELECT * FROM pendaftaran, kecamatan, desakelurahan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and desakelurahan.Deleted='0' AND  id_pendaftaran='$id'")->row_array();
        return $q['id_pendaftaran'];
    }
    public function getDataPendaftaran($idpendf){
        $q=$this->db->query("SELECT * FROM petugas, kecamatan, desakelurahan, pendaftaran where petugas.id_petugas=pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and petugas.Deleted='0' and kecamatan.Deleted='0' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' AND id_pendaftaran='$idpendf'");
        return $q;
    }
    public function get_pendaftaranakte($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, nama_petugas, nama_status_pendaftaran, jenis_akte, id_pendaftaranFK FROM pendaftaran, desakelurahan, kecamatan, petugas, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND petugas.id_petugas = pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and kecamatan.Deleted='0' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and petugas.Deleted='0' and detail_syarat.Deleted='0' and status_pendaftaran.Deleted='0' AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_daftar` DESC");
        return $q;
    }
    public function get_pendafaktee($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), status_unggah, gambar, judul_syarat FROM pendaftaran, detail_syarat, syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND detail_syarat.Deleted='0' and pendaftaran.Deleted ='0' AND syarat.Deleted='0' and id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_daftar` DESC");
        return $q;
    }
    public function get_pendafakte(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, status_unggah FROM pendaftaran, desakelurahan, kecamatan, detail_syarat WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_unggah='Belum Diunggah' AND id_status_pendafFK='2' and pendaftaran.Deleted ='0' and desakelurahan.Deleted='0' and kecamatan.Deleted ='0' and detail_syarat.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendaftakte(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, jenis_akte FROM pendaftaran, desakelurahan, kecamatan WHERE kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted='0' and kecamatan.Deleted ='0' AND id_status_pendafFK='2' ORDER BY `pendaftaran`.`CreateDtm` DESC ");
        return $q;
    }
    public function getpertahun(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulan(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2'  GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperhari(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' GROUP BY tgl_daftar desc")->result();
    } 
    public function getpertahunu(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Umum' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulanu(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Umum' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperhariu(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Umum' GROUP BY tgl_daftar desc")->result();
    } 
    public function getpertahuntp(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Terlambat Pendaftaran' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulantp(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Terlambat Pendaftaran' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperharitp(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and id_status_pendafFK='2' and jenis_akte='Terlambat Pendaftaran' GROUP BY tgl_daftar desc")->result();
    } 
    public function getbulan($tahun){
        return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori, COUNT(*) AS jum FROM pendaftaran WHERE Deleted ='0' and YEAR(tgl_daftar)='$tahun' AND id_status_pendafFK='2' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getkec(){
        $q=$this->db->query("SELECT * FROM kecamatan where kecamatan.Deleted='0'")->result();
        return $q;
    }
    public function getdes(){
        $q=$this->db->query("SELECT * FROM desakelurahan where desakelurahan.Deleted='0'")->result();
        return $q;
    }
    public function get_desa($id) {
        $q = $this->db->query("SELECT * FROM desakelurahan WHERE id_kecamatanFK='$id' here desakelurahan.Deleted='0'")->result();
        return $q;
    }
    // public function pendafaktetahun(){
    //     return $pendafaktetahun =$this->db->query("SELECT * FROM pendaftaran where Deleted ='0' and id_status_pendafFK='2' and YEAR(pendaftaran.tgl_daftar)=YEAR(NOW()) GROUP BY id_pendaftaran");
    // }
    // public function pendafaktebulan(){
    //     return $pendafaktebulan =$this->db->query("SELECT * FROM pendaftaran where Deleted ='0' and id_status_pendafFK='2' and MONTH(pendaftaran.tgl_daftar)=MONTH(NOW()) GROUP BY id_pendaftaran");
    // }
    public function pendafaktehari(){
        return $pendafaktebulan =$this->db->query("SELECT * FROM pendaftaran where Deleted ='0' and id_status_pendafFK='2' and SUBSTR(pendaftaran.tgl_daftar, 1,10)=DATE(NOW()) GROUP BY id_pendaftaran");
    }
    public function getlapakteperhari($tanggal){
        return $getlapperhari =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' and id_status_pendafFK='2' and tgl_daftar='$tanggal'ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettgl($tanggal){
        return $gettgl =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' and Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapakteperbulan($bulan){
        return $getlapakteperbulan =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and MONTH(tgl_daftar)='$bulan' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getbln($bulan){
        return $getbln =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' and Deleted ='0' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlapaktepertahun($tahun){
        return $getlapaktepertahun =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and YEAR(tgl_daftar)='$tahun' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthn($tahun){
        return $getthn =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' and Deleted ='0' GROUP BY YEAR(tgl_daftar)");
    }
    public function getlapakteperhariu($tanggal){
        return $getlapakteperhariu =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and jenis_akte='Umum' and tgl_daftar='$tanggal' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettglu($tanggal){
        return $gettglu =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' and Deleted ='0' and jenis_akte='Umum' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapakteperbulanu($bulan){
        return $getlapakteperbulanu =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and jenis_akte='Umum' and MONTH(tgl_daftar)='$bulan' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getblnu($bulan){
        return $getblnu =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' and Deleted ='0' and jenis_akte='Umum' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlapaktepertahunu($tahun){
        return $getlapaktepertahunu =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and jenis_akte='Umum' and YEAR(tgl_daftar)='$tahun' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthnu($tahun){
        return $getthnu =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' and Deleted ='0' and jenis_akte='Umum' GROUP BY YEAR(tgl_daftar)");
    }
        public function getlapakteperharitp($tanggal){
        return $getlapakteperharitp =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2' and jenis_akte='Terlambat Pendaftaran' and tgl_daftar='$tanggal' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettgltp($tanggal){
        return $gettgltp =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' and Deleted ='0' and jenis_akte='Terlambat Pendaftaran' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapakteperbulantp($bulan){
        return $getlapakteperbulantp =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2'  and jenis_akte='Terlambat Pendaftaran' and MONTH(tgl_daftar)='$bulan' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getblntp($bulan){
        return $getblntp =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' and Deleted ='0' and jenis_akte='Terlambat Pendaftaran' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlapaktepertahuntp($tahun){
        return $getlapaktepertahuntp =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='2'  and jenis_akte='Terlambat Pendaftaran' and YEAR(tgl_daftar)='$tahun' and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthntp($tahun){
        return $getthnu =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' and Deleted ='0' and jenis_akte='Terlambat Pendaftaran' GROUP BY YEAR(tgl_daftar)");
    }

}