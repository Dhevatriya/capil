<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafPindahM extends CI_Model {
   function getnoNIK($nik){
        $hsl=$this->db->query("SELECT nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu FROM jenis_pekerjaan, data_penduduk WHERE jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and nik='$nik'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nik' => $data->nik,
                    'nama_lengkap' => $data->nama_lengkap,
                    'jenis_kelamin' => $data->jenis_kelamin,
                    'tempat_lahir' => $data->tempat_lahir,
                    'tanggal_lahir' => $data->tanggal_lahir,
                    'agama' => $data->agama,
                    'pendidikan' => $data->pendidikan,
                    'nama_jenispekerjaan' => $data->nama_jenispekerjaan,
                    'status_perkawinan' => $data->status_perkawinan,
                    'status_hub_dalam_keluarga' => $data->status_hub_dalam_keluarga,
                    'kewarganegaraan' => $data->kewarganegaraan,
                    'no_paspor' => $data->no_paspor,
                    'no_kitas_kitap' => $data->no_kitas_kitap,
                    'ayah' => $data->ayah,
                    'ibu' => $data->ibu,
                    );
            }
        }
        return $hasil;
    }
        public function getpendkk($id){
        $q = $this->db->query("SELECT * from data_penduduk where idPenduduk ='$id'")->result();
        return $q;
    }
    public function getDataPenduduk($nik){
        $q = $this->db->query("SELECT nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu FROM data_keluarga, data_penduduk, jenis_pekerjaan WHERE data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK and jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and nik='$nik'")->result();
        return $q;
    }
    public function getidkel($id){
        $q= $this ->db->query("SELECT idKeluarga_FK from data_penduduk where nik = $id")->row_array();
        return $q["idKeluarga_FK"];
    }
    public function getpen(){
        $q = $this->db->query("SELECT * from pendaftaran")->result();
        return $q;
    }
    public function pendafakte(){
        $q = $this->db->query("SELECT nik, nama_lengkap, tgl_buat, tgl_jadi from data_penduduk, data_keluarga, pendaftaran where pendaftaran.idKeluargaFK = data_keluarga.idKeluarga and data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK")->result();
        return $q;
    }
    public function get_data_pen_det($nik){
        $q = $this->db->query("SELECT * from data_penduduk WHERE nik='$nik'")->result();
        return $q;
    }
    function getdataakte(){
        $q=$this->db->query("SELECT * from data_keluarga, data_penduduk, pendaftaran Where data_keluarga.idKeluarga=pendaftaran.idKeluargaFK and data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK")->result();
        return $q;
    }
    public function get_petugas($id){
        $q = $this->db->query("SELECT * from petugas WHERE id_petugas='$id'")->result();
        return $q;
    }
    public function get_data_petugas($u, $p){
        $q = $this->db->query("SELECT * FROM petugas WHERE peran='PetugasAkte' AND username='$u' AND password='$p'")->row_array();
        return $q;
    }
    public function get_detail($id){
        $q = $this->db->query("SELECT * FROM data_keluarga, data_penduduk, pendaftaran, petugas WHERE id_petugas= id_petugasFK AND idKeluarga=idKeluarga_FK AND idKeluarga = idKeluargaFK AND nik=$id")->result();
        return $q;
    }
    public function get_detail_pemeriksaan($nik, $noKK){
        $q = $this->db->query("SELECT * from data_penduduk, data_keluarga, petugas, pendaftaran WHERE petugas.id_petugas=pendaftaran.id_petugasFK AND data_keluarga.idKeluarga = pendaftaran.idKeluargaFK AND data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK AND data_keluarga.idKeluarga_FK=$nik AND pendaftaran.idKeluargaFK=$noKK")->result();
        return $q;
    }
    public function getidpenduduk($nik){
        $q = $this->db->query("SELECT idPenduduk from data_penduduk WHERE nik='$nik'")->row_array();
        return $q['idPenduduk'];
    }
    public function insertpendaftranpindah(){
        $nik=$_POST['nik'];
        $idKeluarga=$this->PendafPindahM->getidkel($nik);
        $data = array(
        "idKeluargaFK"=>$idKeluarga,
        "tgl_buat"=>date('y/m/d'),
        "tgl_jadi"=>$_POST['tgl_jadi'],
        "id_petugasFK"=>3,
        "status"=>'pindah'
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows();
        
    }
        public function insertpendaftranpindahdatang(){
        $nik=$_POST['nik'];
        $idKeluarga=$this->PendafPindahM->getidkel($nik);
        $data = array(
        "idKeluargaFK"=>$idKeluarga,
        "tgl_buat"=>date('y/m/d'),
        "tgl_jadi"=>$_POST['tgl_jadi'],
        "id_petugasFK"=>3,
        "status"=>'pindahdatang'
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows();
        
    }

    public function updatependuduk($idPen){
        $data = array(
            "nik"=>$this->nik,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "agama"=>$this->agama,
            "pendidikan"=>$this->pendidikan,
            "status_perkawinan"=>$this->status_perkawinan,
            "status_hub_dalam_keluarga"=>$this->status_hub_dalam_keluarga,
            "kewarganegaraan"=>$this->kewarganegaraan,
            "no_paspor"=>$this->no_paspor,
            "no_kitas_kitap"=>$this->no_kitas_kitap,
            "ayah"=>$this->ayah,
            "ibu"=>$this->ibu,
        );
        $this->db->where('idPenduduk', $idPen);
        $this->db->update('data_penduduk',$data);
        return $this->db->affected_rows();
        
    }
        public function updatejenispekerjaan($idpeker){
        $data = array(
            "nama_jenispekerjaan"=>$this->nama_jenispekerjaan,
        );
        $this->db->where('id_jenispekerjaan', $idpeker);
        $this->db->update('jenis_pekerjaan',$data);
        return $this->db->affected_rows();
        
    }
    public function get_data_pend(){
        $q = $this->db->query("SELECT  nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu FROM data_penduduk, jenis_pekerjaan where jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK");
        return $q;
    }
    public function getdatapennik($nik){
    $q=$this->db->query("SELECT * FROM data_penduduk where nik='$nik'")->result();
    return $q;
  }
      public function getdata_penduduk($idkel,$idpendf, $idpend){
    $q=$this->db->query("SELECT nik, nama_lengkap, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, kabupaten, kode_pos, kabupaten, tgl_buat,tgl_jadi FROM desakelurahan, kecamatan, data_penduduk, data_keluarga, pendaftaran where idKeluarga='$idkel' and id_pendaftaran='$idpendf'and idPenduduk='$idpend'")->result();
    return $q;
    }
      public function getdatapedkk($nik, $id){
        $q=$this->db->query("SELECT DISTINCT * FROM data_keluarga, data_penduduk, pendaftaran WHERE data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK and data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and nik='$nik' and id_pendaftaran='$id'")->result();
        return $q;
    }

  public function datapindah($id, $nama){
        $q=$this->db->query("SELECT * FROM data_penduduk where nik='$id' and nama_lengkap='$nama'")->result();
    return $q;
  } 
        public function get_penduduk_det($id){
        $q = $this->db->query("SELECT * FROM data_penduduk, jenis_pekerjaan WHERE jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and nik='$id'");
        return $q;
    }
    public function getnama($nik){
        $q = $this->db->query("SELECT nama_lengkap FROM data_penduduk WHERE nik='$nik'")->result();
        return $q;
    }
    public function pendafpindahtahun(){
        return $pendafpindahtahun =$this->db->query("SELECT  YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='pindah') AS total FROM pendaftaran GROUP BY YEAR(pendaftaran.tgl_buat)")->result();
    }

    public function pendafpindahbulan(){
        return $pendafpindahbulan = $this->db->query("SELECT MONTH(pendaftaran.tgl_buat) AS bulan, YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='pindah') AS total FROM pendaftaran GROUP BY MONTH(pendaftaran.tgl_buat)")->result();
    }
    public function pendafpindahhari(){
        return $pendafpindahhari = $this->db->query("SELECT pendaftaran.tgl_buat AS tanggal, SUM(pendaftaran.status='pindah') AS total FROM pendaftaran GROUP BY pendaftaran.tgl_buat")->result();
    }
      public function pendafpindahdatangtahun(){
        return $pendafpindahdatangtahun =$this->db->query("SELECT  YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='pindahdatang') AS total FROM pendaftaran GROUP BY YEAR(pendaftaran.tgl_buat)")->result();
    }

    public function pendafpindahdatangbulan(){
        return $pendafpindahdatangbulan = $this->db->query("SELECT MONTH(pendaftaran.tgl_buat) AS bulan, YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='pindahdatang') AS total FROM pendaftaran GROUP BY MONTH(pendaftaran.tgl_buat)")->result();
    }
    public function pendafpindahdatanghari(){
        return $pendafpindahdatanghari = $this->db->query("SELECT pendaftaran.tgl_buat AS tanggal, SUM(pendaftaran.status='pindahdatang') AS total FROM pendaftaran GROUP BY pendaftaran.tgl_buat")->result();
    }
}
