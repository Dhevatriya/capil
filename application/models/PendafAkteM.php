<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafAkteM extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function getdata_pendaftaran($idpendf){
        $q=$this->db->query("SELECT DISTINCT(id_pendaftaran), nik, jenis_kelamin, tempat_lahir, tanggal_lahir, nama_lengkap, alamat, rt, rw, tgl_buat, tgl_jadi, nama_kecamatan, nama_desakelurahan, nama_status_pendaftaran, id_pendaftaranFK, status_unggah FROM desakelurahan, kecamatan, pendaftaran, status_pendaftaran, detail_syarat where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_pendaftaran='$idpendf'")->result();
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
    public function insertakte(){
        $data = array(
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
            "tgl_buat"=>date('y-m-d'),
            "tgl_jadi"=>$this->tgl_jadi,
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
            "nik"=>$this->nik,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
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
        $q = $this->db->query("SELECT * from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran='$id_pendaftaran'");
        return $q;
    }
    public function get_det($id){
        $q = $this->db->query("SELECT * from detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and id_pendaftaranFK='$id'")->row_array();
        return $q['id_pendaftaranFK'];
    }
    public function get_data_petugas($u, $p){
        $q = $this->db->query("SELECT * FROM petugas, user_role WHERE user_role.id_user_role=petugas.id_user_roleFK AND username='$u' AND id_user_roleFK='$p'")->row_array();
        return $q;
    }
    public function getdatapendaf($id){
        $q = $this->db->query("SELECT id_pendaftaran, nik, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_lengkap, alamat, rt, rw, tgl_buat, tgl_jadi, nama_kecamatan, nama_desakelurahan FROM pendaftaran, desakelurahan, kecamatan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK AND id_pendaftaran='$id'");
        return $q;
    }
    public function getidpendaf($id){
        $q = $this->db->query("SELECT * FROM pendaftaran, kecamatan, desakelurahan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK AND id_pendaftaran='$id'")->row_array();
        return $q['id_pendaftaran'];
    }
    public function getDataPendaftaran($idpendf){
        $q=$this->db->query("SELECT * FROM petugas, kecamatan, desakelurahan, pendaftaran where petugas.id_petugas=pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_pendaftaran='$idpendf'");
        return $q;
    }
    public function get_pendaftaranakte($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_buat, tgl_jadi, nama_petugas, nama_status_pendaftaran FROM pendaftaran, desakelurahan, kecamatan, petugas, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND petugas.id_petugas = pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_buat` DESC");
        return $q;
    }
    public function get_pendafaktee($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), status_unggah, gambar, judul_syarat FROM pendaftaran, detail_syarat, syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_buat` DESC");
        return $q;
    }
    public function get_pendafakte(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_buat, tgl_jadi, status_unggah FROM pendaftaran, desakelurahan, kecamatan,detail_syarat WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_unggah='Belum Diunggah' AND  id_status_pendafFK='2' ")->result();
        return $q;
    }
    public function get_pendaftakte(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_buat, tgl_jadi FROM pendaftaran, desakelurahan, kecamatan WHERE kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_status_pendafFK='2' ORDER BY tgl_buat DESC ");
        return $q;
    }
    public function getpertahun(){
        return $this->db->query("SELECT YEAR(tgl_buat) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='2' GROUP BY YEAR(tgl_buat) desc")->result();
    }
    public function getperbulan(){
            return $this->db->query("SELECT MONTH(tgl_buat) AS kategori_bulan, YEAR(tgl_buat) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='2' GROUP BY MONTH(tgl_buat) desc")->result();
    }
    public function getperhari(){
            return $this->db->query("SELECT tgl_buat AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='2' GROUP BY tgl_buat desc")->result();
    } 
    public function getbulan($tahun){
        return $this->db->query("SELECT MONTH(tgl_buat) AS kategori, COUNT(*) AS jum FROM pendaftaran WHERE and YEAR(tgl_buat)='$tahun' AND id_status_pendafFK='2'' GROUP BY MONTH(tgl_buat) desc")->result();
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
    public function pendafaktetahun(){
        return $pendafaktetahun =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='2' and YEAR(pendaftaran.tgl_buat)=YEAR(NOW()) GROUP BY id_pendaftaran");
    }
    public function pendafaktebulan(){
        return $pendafaktebulan =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='2' and MONTH(pendaftaran.tgl_buat)=MONTH(NOW()) GROUP BY id_pendaftaran");
    }
    public function pendafaktehari(){
        return $pendafaktebulan =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='2' and SUBSTR(pendaftaran.tgl_buat, 1,10)=DATE(NOW()) GROUP BY id_pendaftaran");
    }
}