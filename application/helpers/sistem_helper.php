<?php
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')=='PetugasKK'){
        redirect('PendafKKC');
    }else if($ci->session->userData('peran')=='PetugasAkte'){
        redirect('PendafAkteC');
    }else if($ci->session->userData('peran')=='PetugasPindah'){
        redirect('PendafPindahC');
    }else if($ci->session->userData('peran')=='Admin'){
        redirect('AdminC');
    }
}

function no_access()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='PetugasKK' && $ci->session->userData('peran')!='Admin'){
        redirect('LoginC');
    }
}

function no_access_akte()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='PetugasAkte' && $ci->session->userData('peran')!='Admin'){
        redirect('LoginC');
    }
}

function no_access_pindah()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='PetugasPindah' && $ci->session->userData('peran')!='Admin'){
        redirect('LoginC');
    }
}
function no_access_adm()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='Admin'){
        redirect('LoginC');
    }
}

function menuaktif($aktif,$menu){   
    if($aktif==$menu){
        return "active";
    }else{
        return "";
    }
}

function getidkec($namakec){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_kec FROM kecamatan WHERE nama_kec='namakec'");
    return $q;
}
function getId($tabel,$id)
{
    $ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $kd = ((int)$k->kd_max)+1;
            // $kd = sprintf("%09s", $tmp);
        }
    }
    else
    {
        $kd = "1";
    }
    return $kd;
}


function getnamabulan($bulan){
    if($bulan==1){
        return "Januari";
    }elseif($bulan==2){
        return "Februari";
    }elseif($bulan==3){
        return "Maret";
    }elseif($bulan==4){
        return "April";
    }elseif($bulan==5){
        return "Mei";
    }elseif($bulan==6){
        return "Juni";
    }elseif($bulan==7){
        return "Juli";
    }elseif($bulan==8){
        return "Agustus";
    }elseif($bulan==9){
        return "September";
    }elseif($bulan==10){
        return "Oktober";
    }elseif($bulan==11){
        return "November";
    }else{
        return "Desember";
    }
}

function getnamapetugas($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nama_petugas FROM petugas WHERE id_petugas='$id'")->row_array();
    return $q['nama_petugas'];
}

// function login_analis()
// {
//     $ci=& get_instance();
//     if($ci->session->userdata('user')){
//         return user;
//     }
// }


function getnoKK($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT noKK from data_keluarga, data_penduduk where data_keluarga.idKeluarga = data_penduduk.idKeluarga_FK and idPenduduk = $id")->row_array();
    return $q['noKK'];
}
function get_petugas($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from petugas WHERE id_petugas='$id'")->row_array();
    return $q;
}
function getid_keluarga($noKK){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT idKeluarga from data_keluarga WHERE noKK='$noKK'")->row_array();
    return $q['idKeluarga'];
}
function getid_keluargaFK($idPend){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT idKeluarga_FK from data_penduduk WHERE idPenduduk='$idPend'")->row_array();
    return $q['idKeluarga_FK'];
}
function getid_pendterbaru(){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT max(id_pendaftaran) as id_pendaftaran from pendaftaran")->row_array();
    return $q['id_pendaftaran'];
}
function getid_kelterbaru($idpendaf){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT idKeluargaFK from pendaftaran WHERE id_pendaftaran='$idpendaf'")->row_array();
    return $q['idKeluargaFK'];
}
function getid_kelbaru(){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT max(idKeluarga) as idKeluarga from data_keluarga")->row_array();
    return $q['idKeluarga'];
}
function getnama_kelbaru($nama){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nama_kepala_keluarga from data_keluarga where idKeluarga ='$nama'")->row_array();
    return $q['nama_kepala_keluarga'];
}
function getnok($nok){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT noKK from data_keluarga where idKeluarga ='$nok'")->row_array();
    return $q['idKeluarga'];
}
function getidnok($no){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT noKK from data_keluarga where noKK ='$no'")->row_array();
    return $q['noKK'];
}
function getnik($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nik from data_penduduk where idPenduduk ='$id'")->row_array();
    return $q['idPenduduk'];
}
function getnamanik($nama){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nama_lengkap from data_penduduk where nik ='$nama'")->row_array();
    return $q['nama_lengkap'];
}
function getjenispekerjaan($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nama_jenispekerjaan FROM jenis_pekerjaan, data_penduduk where jenis_pekerjaan.id_jenispekerjaan = data_penduduk.id_jenispekerjaanFK and idPenduduk='$id'")->row_array();
    return $q['nama_jenispekerjaan'];
}
function getid_jenisFK($idker){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_jenispekerjaanFK from data_penduduk WHERE idPenduduk='$idker'")->row_array();
    return $q['id_jenispekerjaanFK'];
}
function getid_petugas($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_petugas from petugas WHERE nama_petugas='$id'")->row_array();
    return $q['nama_petugas'];
}