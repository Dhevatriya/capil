<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminM extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function get_petugas(){
        $q = $this->db->query("SELECT * from petugas, user_role where user_role.id_user_role=petugas.id_user_roleFK and petugas.Deleted='0' and peran != 'admin'");
        return $q;
    }
    public function get_desakelurahan($id){
        $q = $this->db->query("SELECT * from desakelurahan, kecamatan where kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_kecamatanFK='$id' and desakelurahan.Deleted='0' and kecamatan.Deleted='0'");
        return $q;
    }
    public function get_kec($id){
        $q = $this->db->query("SELECT * from kecamatan where id_kecamatanFK='$id' and kecamatan.Deleted='0'");
        return $q;
    }
    public function get_desak($id){
        $q = $this->db->query("SELECT DISTINCT(id_kecamatanFK), nama_kecamatan from desakelurahan, kecamatan where kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and id_kecamatanFK='$id' and desakelurahan.Deleted='0' and kecamatan.Deleted='0'");
        return $q;
    }
    public function get_kecamatan(){
        $q = $this->db->query("SELECT * from kecamatan where kecamatan.Deleted='0' GROUP BY id_kecamatan");
        return $q;
    }
    public function get_syarat(){
        $q = $this->db->query("SELECT * from syarat where syarat.Deleted='0' ORDER BY id_syarat asc");
        return $q;
    }
    public function get_status(){
        $q = $this->db->query("SELECT * from status_pendaftaran where status_pendaftaran.Deleted='0'");
        return $q;
    }
    public function get_petugas_det($id){
        $q = $this->db->query("SELECT * from petugas, user_role where user_role.id_user_role=petugas.id_user_roleFK and petugas.Deleted='0' and user_role.Deleted='0' and id_petugas='$id'");
        return $q;
    }
    public function get_desakel($id){
        $q = $this->db->query("SELECT * from desakelurahan, kecamatan where kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and kecamatan.Deleted='0' and desakelurahan.Deleted='0' and id_desakelurahan='$id'");
        return $q;
    }
    public function updatepetugas($id){
        $data = array(
            "alamat_petugas"=>$this->alamat_petugas,
            "no_hp_petugas"=>$this->no_hp_petugas,
            "username"=>$this->username,
        );
        $this->db->where('id_petugas',$id);
        $this->db->update('petugas',$data);
        return $this->db->affected_rows();    
    }
    public function resetpassword($id, $pass){
        $data = array(
            "password"=>$pass,
        );
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas',$data);
        return $this->db->affected_rows();    
    }
    public function updatedesak($id){
        $data = array(
            "nama_desakelurahan"=>$this->nama_desakelurahan,
        );
        $this->db->where('id_desakelurahan',$id);
        $this->db->update('desakelurahan',$data);
        return $this->db->affected_rows();    
    }
    public function updatekec($id){
        $data = array(
            "nama_kecamatan"=>$this->nama_kecamatan,
        );
        $this->db->where('id_kecamatan',$id);
        $this->db->update('kecamatan',$data);
        return $this->db->affected_rows();    
    }
    public function updateSyarat($id){
        $data = array(
            "judul_syarat"=>$this->judul_syarat,
        );
        $this->db->where('id_syarat',$id);
        $this->db->update('syarat',$data);
        return $this->db->affected_rows();    
    }
    public function getperan(){
        $q=$this->db->query("SELECT * FROM user_role where hapus='y'")->result();
        return $q;
    }
    public function pendafkktahun(){
        return $pendafkktahun =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='1' and Deleted='0' GROUP BY id_pendaftaran");
    }
    public function pendafaktetahun(){
        return $pendafaktetahun =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='2' and Deleted='0' GROUP BY id_pendaftaran");
    }
    public function pendafpindahtahun(){
        return $pendafpindahtahun =$this->db->query("SELECT * FROM pendaftaran where id_status_pendafFK='3' and Deleted='0' GROUP BY id_pendaftaran");
    }
    public function pendafpindahdatangtahun(){
        return $pendafpindahdatangtahun =$this->db->query("SELECT * FROM pendaftaran where  id_status_pendafFK='4' and Deleted='0' GROUP BY id_pendaftaran");
    }

    // public function insertdesa($desa){
    //   $this->db->trans_start();
        
    //   $this->db->insert('desakelurahan',$desa);
    //   $insert_id = $this->db->insert_id();
    
    //   $this->db->trans_complete();
    //   return $insert_id;
    // }

    //grafik pendaftaran
    // function getPendaftaranKK(){
    //     $query = $this->db->query("SELECT MONTH(tgl_daftar) AS bulan, COUNT(*) AS jum FROM pendaftaran where id_status_pendafFK='1' GROUP BY YEAR(tgl_daftar)");
    //     if($query->num_rows()>0){
    //         foreach ($query -> result() as $data) {
    //             $hasil[]=$data;
    //         }
    //         return $hasil;
    //     }

    // }
}