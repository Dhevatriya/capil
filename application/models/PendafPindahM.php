<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafPindahM extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    // public function update_detail($id, $status_unggah){
    //     $data = array(
    //         "gambar"=>$this->userfile,
    //         "status_unggah"=>$status_unggah,
    //     );
    //     $this->db->where('id_pendaftaranFK', $id);
    //     $this->db->update('detail_syarat',$data);
    //     return $this->db->affected_rows();       
    // }
    public function get_syaratp($id_pendaftaran){
        $q = $this->db->query("SELECT status_unggah, id_pendaftaran, id_pendaftaranFK, id_syaratFK, id_detail_syarat, judul_syarat, gambar from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.id_syarat=detail_syarat.id_syaratFK and id_pendaftaranFK='$id_pendaftaran' and detail_syarat.Deleted='0' and syarat.Deleted='0' and pendaftaran.Deleted='0' and id_status_pendafFK='3'");
        return $q;
    }
    public function getsyaratp($id_pendaftaranFK){
        $q = $this->db->query("SELECT id_syaratFK from syarat, detail_syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK AND id_pendaftaranFK='$id_pendaftaranFK' and syarat.Deleted='0' GROUP BY id_syaratFK");
        return $q;
    }

    //function hapus syarat
    public function hapusSyarat($datapendaftaran, $id_detail_syarat){
        $this->db->where("id_detail_syarat",$id_detail_syarat);
        $this->db->update("detail_syarat",$datapendaftaran);

        return TRUE;
    }

    //function tambah syarat yang baru
    public function tambahSyaratTambahan($dataSyarat){
        $this->db->trans_start();

        $this->db->insert('detail_syarat',$dataSyarat);
        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();
        return $insert_id;
    }
    // public function getsyaratpindah($id_pendaftaranFK){
    //     $q = $this->db->query("SELECT * FROM syarat WHERE id_syarat not in (SELECT id_syaratFK FROM detail_syarat WHERE id_pendaftaranFK='$id_pendaftaranFK') AND syarat.Deleted='0'");
    //     return $q;
    // }
    // public function get_detp($id){
    //     $q = $this->db->query("SELECT * from detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and id_pendaftaran='$id'")->result();
    //     return $q;
    // }
        public function get_syaratpd($id_pendaftaran){
        $q = $this->db->query("SELECT * from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.id_syarat=detail_syarat.id_syaratFK and syarat.Deleted='0' and detail_syarat.Deleted='0' and pendaftaran.Deleted='0' and pendaftaran.id_pendaftaran='$id_pendaftaran' and id_status_pendafFK='4'");
        return $q;
    }
    // public function get_detpd($id){
    //     $q = $this->db->query("SELECT * from detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and id_pendaftaran='$id' and detail_syarat.Deleted='0' and pendaftaran='0'")->result();
    //     return $q;
    // }
    public function getdok(){
        $q = $this->db->query("SELECT * FROM syarat where syarat.Deleted='0' GROUP BY id_syarat");
        return $q;
    }
    public function getdokp(){
        $q = $this->db->query("SELECT * FROM syarat where syarat.Deleted='0' GROUP BY id_syarat");
        return $q;
    }
    public function getstatus(){
        $q = $this->db->query("SELECT id_status_pendaftaran FROM status_pendaftaran where id_status_pendaftaran='3' and status_pendaftaran.Deleted='0'")->row_array();
        return $q['id_status_pendaftaran'];
    } 
    public function getstatuspd(){
        $q = $this->db->query("SELECT id_status_pendaftaran FROM status_pendaftaran where id_status_pendaftaran='4' and status_pendaftaran.Deleted='0'")->row_array();
        return $q['id_status_pendaftaran'];
    } 
    public function get_pendaftaranpindah($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), jumlah_anggota_pindah, no_registrasi, nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan, nama_petugas, nama_status_pendaftaran, id_pendaftaranFK FROM pendaftaran, desakelurahan, kecamatan, petugas, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND petugas.id_petugas = pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK AND id_pendaftaran='$id' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and petugas.Deleted='0' and detail_syarat.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
        return $q;
    }
    public function get_pendaftaranpindahdatang($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), jumlah_anggota_pindah, no_registrasi, nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan, nama_petugas, nama_status_pendaftaran, id_pendaftaranFK FROM pendaftaran, desakelurahan, kecamatan, petugas, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK AND petugas.id_petugas = pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK AND id_pendaftaran='$id' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and petugas.Deleted='0' and detail_syarat.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
        return $q;
    }
        public function get_syarat($id_pendaftaran){
        $q = $this->db->query("SELECT status_unggah, id_pendaftaran, id_pendaftaranFK, id_syaratFK, id_detail_syarat, judul_syarat, gambar from syarat, detail_syarat, pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and syarat.id_syarat=detail_syarat.id_syaratFK and syarat.Deleted='0' and pendaftaran.Deleted='0' and detail_syarat.Deleted='0' and id_pendaftaranFK='$id_pendaftaran'");
        return $q;
    }
    public function get_pendafpindah(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan, status_unggah FROM pendaftaran, desakelurahan, kecamatan, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and status_pendaftaran.id_status_pendaftaran = pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_status_pendafFK='3' and status_unggah ='Belum Diunggah' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and detail_syarat.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendafpindahdatang(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan, status_unggah FROM pendaftaran, desakelurahan, kecamatan, detail_syarat, status_pendaftaran WHERE pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and status_pendaftaran.id_status_pendaftaran = pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_status_pendafFK='4' and status_unggah ='Belum Diunggah' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and detail_syarat.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendaftpindah(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan FROM pendaftaran, desakelurahan, kecamatan, status_pendaftaran WHERE status_pendaftaran.id_status_pendaftaran = pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_status_pendafFK='3' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendaftpindahdatang(){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, tgl_daftar, tgl_jadi, data_asal, data_tujuan FROM pendaftaran, desakelurahan, kecamatan, status_pendaftaran WHERE status_pendaftaran.id_status_pendaftaran = pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND id_status_pendafFK='4' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and status_pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC")->result();
        return $q;
    }
    public function get_pendaftrp($id){
        $q = $this->db->query("SELECT DISTINCT(id_pendaftaran), gambar, judul_syarat FROM pendaftaran, detail_syarat, syarat WHERE syarat.id_syarat=detail_syarat.id_syaratFK and pendaftaran.id_pendaftaran=detail_syarat.id_pendaftaranFK and pendaftaran.Deleted='0' and detail_syarat.Deleted='0' and syarat.Deleted='0' AND id_pendaftaran='$id' ORDER BY `pendaftaran`.`tgl_daftar` DESC");
        return $q;
    }
    public function insertpindah(){
        $data = array(
            "nik"=>$this->nik,
            "no_registrasi"=>$this->no_registrasi,
            "jumlah_anggota_pindah"=>$this->jumlah_anggota_pindah,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "data_tujuan"=>$this->data_tujuan,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "id_petugasFK"=>$this->id_petugasFK,
            "tgl_daftar"=>date('y-m-d'),
            "tgl_jadi"=>$this->tgl_jadi,
            "id_status_pendafFK"=>$this->id_status_pendafFK,
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows(); 
    }
    public function insertpindahd(){
        $data = array(
            "nik"=>$this->nik,
            "no_registrasi"=>$this->no_registrasi,
            "jumlah_anggota_pindah"=>$this->jumlah_anggota_pindah,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "data_asal"=>$this->data_asal,
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
    public function updatepend($idPen){
        $data = array(
            "nik"=>$this->nik,
            "no_registrasi"=>$this->no_registrasi,
            "jumlah_anggota_pindah"=>$this->jumlah_anggota_pindah,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "id_desakelurahanFK"=>$this->nama_desakelurahan,
            "tgl_jadi"=>$this->tgl_jadi,
            "data_asal"=>$this->data_asal,
            "data_tujuan"=>$this->data_tujuan,
        );
        $this->db->where('id_pendaftaran', $idPen);
        $this->db->update('pendaftaran',$data);
        return $this->db->affected_rows();    
    }
    public function get_data_petugas($u, $p){
        $q = $this->db->query("SELECT * FROM petugas, user_role WHERE user_role.id_user_role=petugas.id_user_roleFK AND username='$u' AND id_user_roleFK='$p' and petugas.Deleted='0' and user_role.Deleted='0'")->row_array();
        return $q;
    }
    public function getDataPendaftaran($idpendf){
        $q=$this->db->query("SELECT * FROM petugas, kecamatan, desakelurahan, pendaftaran where petugas.id_petugas=pendaftaran.id_petugasFK AND kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and petugas.Deleted='0' AND id_pendaftaran='$idpendf'");
        return $q;
    }
    public function getidpendaf($id){
        $q = $this->db->query("SELECT * FROM pendaftaran, kecamatan, desakelurahan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' AND id_pendaftaran='$id'")->row_array();
        return $q['id_pendaftaran'];
    }
    public function getdata_pendaftaran($idpendf){
        $q=$this->db->query("SELECT DISTINCT(id_pendaftaran), no_registrasi, jumlah_anggota_pindah, nik, nama_lengkap,jenis_kelamin, tanggal_lahir, tempat_lahir, data_asal, data_tujuan, alamat, rt, rw, tgl_daftar, tgl_jadi, nama_kecamatan, nama_desakelurahan, nama_status_pendaftaran, id_pendaftaranFK, status_unggah FROM desakelurahan, kecamatan, pendaftaran, status_pendaftaran, detail_syarat where pendaftaran.id_pendaftaran = detail_syarat.id_pendaftaranFK AND status_pendaftaran.id_status_pendaftaran=pendaftaran.id_status_pendafFK and kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK AND desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and status_pendaftaran.Deleted='0' and detail_syarat.Deleted='0' AND id_pendaftaran='$idpendf'")->result();
        return $q;
    }
    public function get_penduduk_det($id){
        $q = $this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan WHERE desakelurahan.id_desakelurahan = pendaftaran.id_desakelurahanFK AND kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and desakelurahan.Deleted='0' and pendaftaran.Deleted='0' and kecamatan.Deleted='0' and id_pendaftaran='$id'");
        return $q;
    }
    public function getkec(){
        $q=$this->db->query("SELECT * FROM kecamatan where kecamatan.Deleted='0'")->result();
        return $q;
    }
    public function get_desa($id) {
        $q = $this->db->query("SELECT * FROM desakelurahan WHERE desakelurahan.Deleted='0' and id_kecamatanFK='$id'")->result();
        return $q;
    }
    public function getdes(){
        $q=$this->db->query("SELECT * FROM desakelurahan where desakelurahan.Deleted='0'")->result();
        return $q;
    }
    public function getpertahunpindah(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulanpindah(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperharipindah(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY tgl_daftar desc")->result();
    } 
    public function getbulanpindah($tahun){
        return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori, COUNT(*) AS jum FROM pendaftaran WHERE YEAR(tgl_daftar)='$tahun' AND  id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getpertahun(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' GROUP BY YEAR(tgl_daftar) and pendaftaran.Deleted='0' desc")->result();
    }
    public function getperbulan(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperhari(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, COUNT(*) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' and pendaftaran.Deleted='0' GROUP BY tgl_daftar desc")->result();
    } 
    public function getbulan($tahun){
        return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori, COUNT(*) AS jum FROM pendaftaran WHERE YEAR(tgl_daftar)='$tahun' AND  id_status_pendafFK='4' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function pendafpindahhari(){
        return $pendafpindahhari =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='3' and SUBSTR(pendaftaran.tgl_daftar, 1,10)=DATE(NOW()) and pendaftaran.Deleted='0' GROUP BY id_pendaftaran");
    }
    public function pendafpindahdbulan(){
        return $pendafpindahdbulan =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='4' and MONTH(pendaftaran.tgl_daftar)=MONTH(NOW()) and pendaftaran.Deleted='0' GROUP BY id_pendaftaran");
    }
    public function pendafpindahdhari(){
        return $pendafpindahdhari =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='4' and SUBSTR(pendaftaran.tgl_daftar, 1,10)=DATE(NOW()) and pendaftaran.Deleted='0' GROUP BY id_pendaftaran");
    }
    public function getpertahunpindaha(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar) desc")->result();
    }
    public function getperbulanpindaha(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperharipindaha(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY tgl_daftar desc")->result();
    } 
    public function getbulanpindaha($tahun){
        return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE YEAR(tgl_daftar)='$tahun' AND  id_status_pendafFK='3' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getpertahuna(){
        return $this->db->query("SELECT YEAR(tgl_daftar) AS kategori_tahun, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' GROUP BY YEAR(tgl_daftar) and pendaftaran.Deleted='0' desc")->result();
    }
    public function getperbulana(){
            return $this->db->query("SELECT MONTH(tgl_daftar) AS kategori_bulan, YEAR(tgl_daftar) AS kategori_tahun, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' and pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar) desc")->result();
    }
    public function getperharia(){
            return $this->db->query("SELECT tgl_daftar AS kategori_hari, sum(jumlah_anggota_pindah) AS jum FROM pendaftaran WHERE id_status_pendafFK='4' and pendaftaran.Deleted='0' GROUP BY tgl_daftar desc")->result();
    } 
    public function getlapspperhari($tanggal){
        return $getlapspperhari =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='3' and tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettgl($tanggal){
        return $gettglsp =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapspperbulan($bulan){
        return $getlapspperbulan =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='3' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' and MONTH(tgl_daftar)='$bulan'ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getbln($bulan){
        return $getblnsp =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' AND pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlapsppertahun($tahun){
        return $getlapsppertahun =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='3' and YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthn($tahun){
        return $getthnsp =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar)");
    }
        public function getlapspdperhari($tanggal){
        return $getlapspperhari =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='4' and tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function gettgld($tanggal){
        return $gettglsp =$this->db->query("SELECT DISTINCT(tgl_daftar) FROM pendaftaran where tgl_daftar='$tanggal' AND pendaftaran.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
     public function getlapspdperbulan($bulan){
        return $getlapspdperbulan =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='4' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' and MONTH(tgl_daftar)='$bulan'ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getblnd($bulan){
        return $getblnsp =$this->db->query("SELECT MONTH(tgl_daftar), YEAR(tgl_daftar) FROM pendaftaran where MONTH(tgl_daftar)='$bulan' AND pendaftaran.Deleted='0' GROUP BY MONTH(tgl_daftar)");
    }
    public function getlapspdpertahun($tahun){
        return $getlapsppertahun =$this->db->query("SELECT * FROM pendaftaran, desakelurahan, kecamatan where pendaftaran.id_desakelurahanFK = desakelurahan.id_desakelurahan and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_status_pendafFK='4' and YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' AND desakelurahan.Deleted='0' AND kecamatan.Deleted='0' ORDER BY `pendaftaran`.`CreateDtm` DESC");
    }
    public function getthnd($tahun){
        return $getthnsp =$this->db->query("SELECT YEAR(tgl_daftar) FROM pendaftaran where YEAR(tgl_daftar)='$tahun' AND pendaftaran.Deleted='0' GROUP BY YEAR(tgl_daftar)");
    }
}