<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafKKM extends CI_Model {
    function __construct()
    {
        parent :: __construct();
    }
    public function get_desa($id) {
        $q = $this->db->query("SELECT * FROM desakelurahan WHERE desakelurahan.Deleted='0' and id_kecamatanFK='$id'")->result();
        return $q;
    }
    public function getDataPendaftaranKK($idpendf){
        $q=$this->db->query("SELECT no_registrasi, nik, nama_petugas, id_pendaftaran, noKK, nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi FROM petugas, kecamatan, desakelurahan, pendaftaran where petugas.id_petugas=pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' and petugas.Deleted='0' AND id_pendaftaran='$idpendf'");
        return $q;
    }
    public function getsyaratkk($id_pendaftaranFK){
        $q = $this->db->query("SELECT id_syaratFK from syarat, detail_syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK AND id_pendaftaranFK='$id_pendaftaranFK' and syarat.Deleted='0' and detail_syarat.Deleted='0' GROUP BY id_syaratFK");
        return $q;
    }
    public function getdata_pendaftaran($idpendf){
        $q=$this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik,  nokk, nama_kepala_keluarga, alamat, rt, rw, tgl_daftar, tgl_jadi, nama_kecamatan, nama_desakelurahan, nama_status_pendaftaran, id_pendaftaranFK, status_unggah FROM desakelurahan, kecamatan, pendaftaran, status_pendaftaran, detail_syarat where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' and status_pendaftaran.Deleted ='0' and detail_syarat.Deleted ='0' AND id_pendaftaran='$idpendf'")->result();
        return $q;
    }
    public function get_pendaf_det($id){
        $p = $this->db->query("SELECT id_pendaftaran, no_registrasi, nik, noKK, nama_kepala_keluarga, alamat, rt, rw, tgl_daftar, tgl_jadi, nama_kecamatan, nama_desakelurahan FROM pendaftaran, desakelurahan, kecamatan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' AND id_pendaftaran='$id'");
        return $p;
    }
    public function getidpendaf($id){
        $q = $this->db->query("SELECT * FROM pendaftaran, kecamatan, desakelurahan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and pendaftaran.Deleted ='0' and desakelurahan.Deleted ='0' and kecamatan.Deleted ='0' AND id_pendaftaran='$id'")->row_array();
        return $q['id_pendaftaran'];
    }
    public function getkec(){
        $q=$this->db->query("SELECT * FROM kecamatan where kecamatan.Deleted='0'")->result();
        return $q;
    }
    public function getdes(){
        $q=$this->db->query("SELECT * FROM desakelurahan where desakelurahan.Deleted='0'")->result();
        return $q;
    }
    public function getstatus(){
        $q = $this->db->query("SELECT id_status_pendaftaran FROM status_pendaftaran where Deleted='0' and id_status_pendaftaran='1'")->row_array();
        return $q['id_status_pendaftaran'];
    }   
    public function updatepend($idPen){
        $data = array(
            "no_registrasi"=>$this->no_registrasi,
            "noKK"=>$this->noKK,
            "nik"=>$this->nik,
            "nama_kepala_keluarga"=>$this->nama_kepala_keluarga,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "tgl_jadi"=>$this->tgl_jadi,
        );
        $this->db->where('id_pendaftaran', $idPen);
        $this->db->update('pendaftaran',$data);
        return $this->db->affected_rows();     
    }
    public function insertkk(){
        $data = array(
            "no_registrasi"=>$this->no_registrasi,
            "noKK"=>$this->noKK,
            "nik"=>$this->nik,
            "nama_kepala_keluarga"=>$this->nama_kepala_keluarga,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "id_petugasFK"=>$this->id_petugasFK,
            "tgl_daftar"=>date('y-m-d'),
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
    public function updatesyarat($iddok, $idpend){
        $data = array(
            "id_syaratFK"=>$iddok,
            "id_pendaftaranFK"=>$idpend,
        );
        $this->db->where('id_pendaftaranFK', $idpend);
        $this->db->update('detail_syarat',$data);
        return $this->db->affected_rows();   
    }
    // public function insertdok(){
    //     $data = array(
    //         "gambar"=>$this->userfile,
    //     );
    //     $this->db->insert('detail_syarat',$data);
    //     return $this->db->affected_rows();      
    // }
    // public function update_detail($id, $status_unggah){
    //     $data = array(
    //         "gambar"=>$this->userfile,
    //         "status_unggah"=>$status_unggah,
    //     );
    //     $this->db->where('id_pendaftaranFK', $id);
    //     $this->db->update('detail_syarat',$data);
    //     return $this->db->affected_rows();       
    // }
    public function get_syarat($id_pendaftaran){
        $q = $this->db->query("SELECT status_unggah, id_pendaftaran, id_pendaftaranFK, id_syaratFK, id_detail_syarat, judul_syarat, gambar from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.id_syarat=detail_syarat.id_syaratFK and syarat.Deleted='0' and detail_syarat.Deleted ='0' and pendaftaran.Deleted='0' and id_pendaftaranFK='$id_pendaftaran'");
        return $q;
    }
    // public function get_det($id){
    //     $q = $this->db->query("SELECT * from detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and id_pendaftaranFK='$id'")->row_array();
    //     return $q['id_pendaftaranFK'];
    // }
    public function getdok(){
        $q = $this->db->query("SELECT * FROM syarat where syarat.Deleted='0' GROUP BY id_syarat");
        return $q;
    }
    public function get_pendaftarankk($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, noKK, nik, nama_kepala_keluarga, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, nama_petugas, nama_status_pendaftaran, id_pendaftaranFK, status_unggah  FROM pendaftaran, desakelurahan, kecamatan, petugas, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND petugas.id_petugas = pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and desakelurahan.Deleted='0' and kecamatan.Deleted='0' and petugas.Deleted='0' and status_pendaftaran.Deleted='0' AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`CreateDtm` DESC");
        return $q;
    }
    public function get_pendaftrkk($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), gambar, judul_syarat FROM pendaftaran, detail_syarat, syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and syarat.Deleted='0' AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_daftar` DESC");
        return $q;
    }
    public function get_data_petugas($u, $p){
        $q = $this->db->query("SELECT * FROM petugas, user_role WHERE user_role.id_user_role=petugas.id_user_roleFK and user_role.Deleted='0' and petugas.Deleted='0' AND username='$u' AND id_user_roleFK='$p'")->row_array();
        return $q;
    }
    public function get_pendafkk(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nokk, nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, status_unggah FROM pendaftaran, desakelurahan, kecamatan, detail_syarat WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and desakelurahan.Deleted='0' and kecamatan.Deleted='0' and id_status_pendafFK='1' and status_unggah='Belum Diunggah' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendaftkk(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nokk,  nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi FROM pendaftaran, desakelurahan, kecamatan WHERE kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and pendaftaran.Deleted='0' and desakelurahan.Deleted='0' and kecamatan.Deleted='0' and id_status_pendafFK='1' ORDER BY `pendaftaran`.`CreateDtm` DESC ")->result();
        return $q;
    }    
    public function getpertahun(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran where id_status_pendafFK='1' AND pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulan(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran where id_status_pendafFK='1' AND pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperhari(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran where id_status_pendafFK='1' AND pendaftaran.Deleted='0' GROUP BY tgl_daftar desc")->result();
    } 
    public function getbulan($tahun){
        return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori, COUNT(*) AS jum FROM pendaftaran where  YEAR(tgl_daftar)='$tahun' and id_status_pendafFK='1' AND pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function pendafkkhari(){
        return $pendafkkhari =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='1' and SUBSTR(pendaftaran.tgl_daftar, 1,10)=DATE(NOW()) AND pendaftaran.Deleted='0' GROUP BY id_pendaftaran");
    }
    public function getlapperhari($tanggal){
        return $getlapperhari =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='1' and tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettgl($tanggal){
        return $gettgl =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapperbulan($bulan){
        return $getlapperbulan =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='1' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' and MONTH(tgl_daftar)='$bulan'ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getbln($bulan){
        return $getbln =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' AND pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlappertahun($tahun){
        return $getlappertahun =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='1' and YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthn($tahun){
        return $getthn =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar)");
    }
}