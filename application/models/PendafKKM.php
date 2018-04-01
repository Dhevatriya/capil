<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PendafKKM extends CI_Model {
  
    public function getData($noKK){
        $q = $this->db->query("SELECT * from data_keluarga, kecamatan, desakelurahan WHERE  kecamatan.id_kecamatan=data_keluarga.idkecamatan_FK and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and noKK='$noKK'");
        return $q;
    }
        public function getDataPenduduk($noKK){
        $q = $this->db->query("SELECT idPenduduk, nik, nama_lengkap, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, pendidikan, nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor,no_kitas_kitap, ayah, ibu FROM jenis_pekerjaan, data_keluarga, data_penduduk WHERE data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK and jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK AND noKK = '$noKK'");
        return $q;
    }
        public function get_dataPenduduk($nik){
        $q = $this->db->query("SELECT nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu FROM jenis_pekerjaan, data_keluarga, data_penduduk WHERE jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK and nik='$nik'")->result();
        return $q;
    }
	 // function getnoKK($noKK){
  //       // $noKK=$_POST['noKK'];
  //       $hsl=$this->db->query("SELECT noKK, nama_kepala_keluarga, alamat, rt, rw, desa, kelurahan, kecamatan, kabupaten, kode_pos, provinsi FROM data_keluarga WHERE noKK='$noKK'");
  //       if($hsl->num_rows()>0){
  //           foreach ($hsl->result() as $data) {
  //               $hasil=array(
  //                   'noKK' => $data->noKK,
  //                   'nama_kepala_keluarga' => $data->nama_kepala_keluarga,
  //                   'alamat' => $data->alamat,
  //                   'rt' => $data->rt,
  //                   'rw'=>$data->rw,
  //                   'desa' => $data->desa,
  //                   'kelurahan'=>$data->kelurahan,
  //                   'kecamatan' => $data->kecamatan,
  //                   'kabupaten' => $data->kabupaten,
  //                   'kode_pos' => $data->kode_pos,
  //                   'provinsi' => $data->provinsi,
  //                   );
  //           }
  //       }
  //       return $hasil;
  //   }
    public function getdatapen(){
    $q=$this->db->query("SELECT id_pendaftaran FROM pendaftaran")->result();
    return $q;
    }
    public function getdatapend(){
    $q=$this->db->query("SELECT idKeluarga_FK FROM data_penduduk");
    return $q;
    }
    public function getdatakel($idkel, $nama){
    $q=$this->db->query("SELECT * FROM data_keluarga where idKeluarga='$idkel' and nama_kepala_keluarga='$nama'")->result();
    return $q;
    }
    // public function getdatapenduk(){
    // $q=$this->db->query("SELECT idKeluarga FROM data_keluarga")->result();
    // return $q;
    // }
    public function getnomorKK($id){
    $q=$this->db->query("SELECT * FROM data_keluarga, data_penduduk, jenis_pekerjaan where data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK and jenis_pekerjaan.id_jenispekerjaan=data_penduduk.id_jenispekerjaanFK AND noKK='$id'")->row_array();
    return $q;
    }
    public function getdatapennik($nik){
    $q=$this->db->query("SELECT * FROM data_penduduk where nik='$nik'")->result();
    return $q;
    }
    public function getdatanoKK(){
    $q=$this->db->query("SELECT noKK FROM data_keluarga")->result();
    return $q;
    }
    // public function getdatakeluarga($noKK, $id){
    //     $q=$this->db->query("SELECT * FROM data_keluarga, pendaftaran WHERE data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and id_pendaftaran='$id'and noKK='$noKK' ")->result();
    //     return $q;
    // }
    //     public function getdatapenda($id){
    //     $q=$this->db->query("SELECT * FROM pendaftaran WHERE id_pendaftaran='$id'")->result();
    //     return $q;
    // }
    //     public function getdata_keluarga($idkel,$idpendf){
    //     $q=$this->db->query("SELECT status, id_pendaftaran, noKK, nama_kepala_keluarga, alamat, rt, rw,nama_desakelurahan, nama_kecamatan, kabupaten, kode_pos, kabupaten, tgl_buat,tgl_jadi FROM desakelurahan, kecamatan, data_keluarga, pendaftaran where idKeluarga='$idkel' and id_pendaftaran='$idpendf'")->result();
    //     return $q;
    // }
      public function getdatakeluarga($noKK, $id){
        $q=$this->db->query("SELECT * FROM data_keluarga, pendaftaran WHERE data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and id_pendaftaran='$id'and noKK='$noKK' ")->result();
        return $q;
    }
  public function getdata_keluarga($idkel,$idpendf){
        $q=$this->db->query("SELECT status, id_pendaftaran, noKK, nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, kabupaten, kode_pos, kabupaten, tgl_buat,tgl_jadi FROM kecamatan, desakelurahan, data_keluarga, pendaftaran where kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK and kecamatan.id_kecamatan = data_keluarga.idkecamatan_FK and idKeluarga='$idkel' and id_pendaftaran='$idpendf'")->result();
        return $q;
    }
            public function getdata_pendaftaran($idpendf, $idk){
        $q=$this->db->query("SELECT nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, kabupaten, kode_pos, provinsi, tgl_buat,tgl_jadi  FROM desakelurahan, kecamatan, data_keluarga, pendaftaran where kecamatan.id_kecamatan= desakelurahan.id_kecamatanFK and kecamatan.id_kecamatan = data_keluarga.idkecamatan_FK and idKeluarga='$idk' and id_pendaftaran='$idpendf'")->result();
        return $q;
    }
        public function getdata_pendaf($idpendf){
        $q=$this->db->query("SELECT * FROM pendaftaran where id_pendaftaran='$idpendf'")->result();
        return $q;
    }
        public function getdatakeluargabaru($noKK, $id){
        $q=$this->db->query("SELECT DISTINCT * FROM data_keluarga, pendaftaran WHERE data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and idKeluarga='$noKK' and id_pendaftaran='$id'")->result();
        return $q;
    }
        public function getdatakeluargakk($noKK, $id){
        $q=$this->db->query("SELECT * FROM data_keluarga, pendaftaran WHERE data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and noKK='$noKK' and id_pendaftaran ='$id'")->result();
        return $q;
    }
    public function get_penduduk_detail($id){
        $q = $this->db->query("SELECT * FROM  data_penduduk, jenis_pekerjaan WHERE jenis_pekerjaan.id_jenispekerjaan=data_penduduk.id_jenispekerjaanFK and nik='$id'");
        return $q;
    }
    public function get_penduduk_det($id){
        $q = $this->db->query("SELECT * FROM data_keluarga, jenis_pekerjaan, data_penduduk WHERE jenis_pekerjaan.id_jenispekerjaan=data_penduduk.id_jenispekerjaanFK and data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK and idPenduduk='$id'");
        return $q;
    }
    public function get_keluarga_det($id){
        $p = $this->db->query("SELECT * FROM data_keluarga, kecamatan, desakelurahan WHERE kecamatan.id_kecamatan=data_keluarga.idkecamatan_FK and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and idKeluarga='$id'");
        return $p;
    }
    public function getidpenduduk($nik){
        $q = $this->db->query("SELECT * from data_penduduk, jenis_pekerjaan WHERE data_penduduk.id_jenispekerjaanFK = jenis_pekerjaan.id_jenispekerjaan and nik='$nik'")->row_array();
        return $q['idPenduduk'];
    }
    public function getidkeluarga($noKK){
        $q = $this->db->query("SELECT * from data_keluarga, kecamatan, desakelurahan WHERE kecamatan.id_kecamatan=data_keluarga.idkecamatan_FK and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK and noKK='$noKK'")->row_array();
        return $q['idKeluarga'];
    }
    public function getkel($id){
        $q = $this->db->query("SELECT * from data_keluarga where idKeluarga ='$id'")->result();
        return $q;
    }
    public function getdatapedkk($nik, $id){
        $q=$this->db->query("SELECT DISTINCT * FROM data_keluarga, data_penduduk, pendaftaran WHERE data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK and data_keluarga.idKeluarga = pendaftaran.idKeluargaFK and nik='$nik' and id_pendaftaran='$id'")->result();
        return $q;
    }
    public function getdesa($nama)
    {
        $this->db->select('nama_desakelurahan');
        $this->db->like('nama_desakelurahan', $nama);
        $query = $this->db->get('desakelurahan');
        return $query->result();
    }
    public function getjenis(){
        $q=$this->db->query("SELECT * FROM jenis_pekerjaan")->result();
        return $q;
    }
        public function getjenisp(){
        $q=$this->db->query("SELECT * FROM jenis_pekerjaan, data_penduduk where id_jenispekerjaan = id_jenispekerjaanFK")->row_array();
        return $q;
    }
            public function getjeniskerja($id){
        $q=$this->db->query("SELECT nama_jenispekerjaan FROM jenis_pekerjaan, data_penduduk where jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and idPenduduk='$id'")->result();
        return $q;
    }
        public function getkec(){
        $q=$this->db->query("SELECT * FROM kecamatan")->result();
        return $q;
    }
            public function getdes(){
        $q=$this->db->query("SELECT * FROM desakelurahan")->result();
        return $q;
    }
        public function get_kec($id) {
        $q = $this->db->query("select * from desakelurahan WHERE id_kecamatanFK='$id'")->result();
        return $q;
    }

       function getnoKK_FK($noKK){
        $hsl=$this->db->query("SELECT nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu FROM data_keluarga, data_penduduk, jenis_pekerjaan WHERE jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK ");
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
public function updatependuduk($idPen){
        $data = array(
            "nik"=>$this->nik,
            "nama_lengkap"=>$this->nama_lengkap,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
            "agama"=>$this->agama,
            "pendidikan"=>$this->pendidikan,
            "id_jenispekerjaanFK"=>$this->nama_jenispekerjaan,
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
    public function updatekeluarga($idPen){
        $data = array(
            "noKK"=>$this->noKK,
            "nama_kepala_keluarga"=>$this->nama_kepala_keluarga,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "kabupaten"=>$this->kabupaten,
            "provinsi"=>$this->provinsi,
        );
        $this->db->where('idKeluarga', $idPen);
        $this->db->update('data_keluarga',$data);
        return $this->db->affected_rows();
        
    }
    public function updatedesakelurahan($iddes){
        $data = array(
            "nama_desakelurahan"=>$this->nama_desakelurahan,
            "kode_pos"=>$this->kode_pos,
        );
        $this->db->where('id_desakelurahan', $iddes);
        $this->db->update('desakelurahan',$data);
        return $this->db->affected_rows();
        
    }
        public function updatekecamatan($idkec){
        $data = array(
            "nama_kecamatan"=>$this->nama_kecamatan,
        );
        $this->db->where('id_kecamatan', $idkec);
        $this->db->update('kecamatan',$data);
        return $this->db->affected_rows();
        
    }
    public function updatejenispekerjaan(){
                $data = array(
            "nama_jenispekerjaan"=>$this->nama_jenispekerjaan,
        );
        $this->db->where('id_jenispekerjaan', $idkec);
        $this->db->update('jenis_pekerjaan',$data);
        return $this->db->affected_rows();
    }
     public function getidkel($id){
        $q= $this ->db->query("SELECT idKeluarga from data_keluarga where noKK = $id")->row_array();
        return $q["idKeluarga"];
    }
        public function insertpendaftrankk(){
        // $idKeluarga=$_POST['noKK'];
        $noKK=$_POST['noKK'];
        $idKeluarga=$this->PendafKKM->getidkel($noKK);
        $data = array(
        "idKeluargaFK"=>$idKeluarga,
        "tgl_buat"=>date('y-m-d'),
        "tgl_jadi"=>$_POST['tgl_jadi'],
        "id_petugasFK"=>1,
        "status"=>'kk'
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows();
        
    }
    public function insertkeluarga(){
        $data = array(
            // "idKeluarga"=>$this->idKeluarga,
            "nama_kepala_keluarga"=>$this->nama_kepala_keluarga,
            "alamat"=>$this->alamat,
            "rt"=>$this->rt,
            "rw"=>$this->rw,
            "idkecamatan_FK"=>$this->idkecamatan_FK,
            "kabupaten"=>$this->kabupaten,
            "provinsi"=>$this->provinsi
        );
        $this->db->insert('data_keluarga',$data);
        return $this->db->affected_rows(); 
    }
    public function insertdes(){
        $data = array(
            // "idKeluarga"=>$this->idKeluarga,
            "nama_desakelurahan"=>$this->nama_desakelurahan,            
            "kode_pos"=>$this->kode_pos,

        );
        $this->db->insert('desakelurahan',$data);
        return $this->db->affected_rows(); 
    }
        public function insertkec(){
        $data = array(
            // "idKeluarga"=>$this->idKeluarga,
            "nama_kecamatan"=>$this->nama_kecamatan,
        );
        $this->db->insert('kecamatan',$data);
        return $this->db->affected_rows(); 
    }
    public function insertpenduduk(){
        $data = array(
            // "nik"=>$this->nik,
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
            "id_jenispekerjaanFK"->$this->id_jenispekerjaanFK,
        );
        // $this->db->where('idPenduduk', $idPen);
        $this->db->insert('data_penduduk',$data);
        return $this->db->affected_rows();
        
    }
        public function insertjenispekerjaan(){
        $data = array(
            // "nik"=>$this->nik,
            "nama_jenispekerjaan"=>$this->nama_jenispekerjaan,
        );
        // $this->db->where('idPenduduk', $idPen);
        $this->db->insert('jenis_pekerjaan',$data);
        return $this->db->affected_rows();
        
    }
    public function insertpendaftaran(){
        $data = array(
            // "id_pendaftaran"=>$this->id_pendaftaran,
            "id_petugasFK"=>$this->id_petugasFK,
            "idKeluargaFK"=>$this->idKeluargaFK,
            "tgl_buat"=>$this->tgl_buat,
            "tgl_jadi"=>$this->tgl_jadi,
            "status"=>$this->status
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows();
        
    }
    public function insertpendftrn(){
        $data = array(
            // "id_pendaftaran"=>$this->id_pendaftaran,
            "id_petugasFK"=>$this->id_petugasFK,
            "idKeluargaFK"=>$this->idKeluargaFK,
            "tgl_buat"=>$this->tgl_buat,
            "tgl_jadi"=>$this->tgl_jadi,
            "status"=>$this->status
        );
        $this->db->insert('pendaftaran',$data);
        return $this->db->affected_rows();
        
    }

    public function getdatacari(){
        $q = $this->db->query("SELECT noKK, nama_kepala_keluarga, alamat, rt, rw, nama_desakelurahan, nama_kecamatan, kabupaten, kode_pos, provinsi, nik, nama_lengkap, jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pendidikan,nama_jenispekerjaan, status_perkawinan, status_hub_dalam_keluarga, kewarganegaraan, no_paspor, no_kitas_kitap, ayah, ibu from desakelurahan, data_keluarga, data_penduduk, jenis_pekerjaan, kecamatan where data_keluarga.idKeluarga=data_penduduk.idKeluarga_FK and kecamatan.id_kecamatan=data_keluarga.idkecamatan_FK and jenis_pekerjaan.id_jenispekerjaan=data_penduduk.id_jenispekerjaanFK and kecamatan.id_kecamatan=desakelurahan.id_kecamatanFK ")->row_array();
        return $q;
    }
     public function pendafkktahun(){
        return $pendafkktahun =$this->db->query("SELECT  YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='kk') AS total FROM pendaftaran GROUP BY YEAR(pendaftaran.tgl_buat)")->result();
    }

    public function pendafkkbulan(){
        return $pendafkkbulan = $this->db->query("SELECT MONTH(pendaftaran.tgl_buat) AS bulan, YEAR(pendaftaran.tgl_buat) AS tahun, SUM(pendaftaran.status='kk') AS total FROM pendaftaran GROUP BY MONTH(pendaftaran.tgl_buat)")->result();
    }
    public function pendafkkhari(){
        return $pendafkkhari = $this->db->query("SELECT pendaftaran.tgl_buat AS tanggal, SUM(pendaftaran.status='kk') AS total FROM pendaftaran GROUP BY pendaftaran.tgl_buat")->result();
    }
}