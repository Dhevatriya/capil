<?php
function in_access()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')=='1'){
        redirect('PendafKKC');
    }else if($ci->session->userData('peran')=='2'){
        redirect('PendafAkteC');
    }else if($ci->session->userData('peran')=='3'){
        redirect('PendafPindahC');
    }else if($ci->session->userData('peran')=='4'){
        redirect('AdminC');
    }
}
function no_access()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='1' && $ci->session->userData('peran')!='4'){
        redirect('LoginC');
    }
}
function no_access_akte()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='2' && $ci->session->userData('peran')!='4'){
        redirect('LoginC');
    }
}
function no_access_pindah()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='3' && $ci->session->userData('peran')!='4'){
        redirect('LoginC');
    }
}
function no_access_adm()
{
    $ci=& get_instance();
    if($ci->session->userData('peran')!='4'){
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
function getsyaratpen($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT judul_syarat FROM syarat WHERE id_syarat='$id'")->row_array();
    return $q['judul_syarat'];
}
function getdesakel($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT nama_desakelurahan FROM desakelurahan WHERE id_desakelurahan='$id'")->row_array();
    return $q['nama_desakelurahan'];
}
function get_petugas($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from petugas WHERE id_petugas='$id'")->row_array();
    return $q;
}
function getid_pendterbaru(){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT max(id_pendaftaran) as id_pendaftaran from pendaftaran")->row_array();
    return $q['id_pendaftaran'];
}
function getidpendaft($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_pendaftaranFK from detail_syarat, pendaftaran WHERE detail_syarat.id_pendaftaranFK=pendaftaran.id_pendaftaran and id_pendaftaran='$id'")->row_array();
    return $q['id_pendaftaranFK'];
}
function getid_penbaru(){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT max(id_pendaftaran) as id_pendaftaran from pendaftaran")->row_array();
    return $q['id_pendaftaran'];
}
function getid_pen(){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_pendaftaran from pendaftaran")->row_array();
    return $q['id_pendaftaran'];
}
function get_dok($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_syarat from syarat, status_pendaftaran where status_pendaftaran.id_status_pendaftaran=syarat.id_status_pendaftaranFK and status_pendaftaran.id_status_pendaftaran ='$id'")->row_array();
    return $q['id_syarat'];
}
function getid_petugas($id){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_petugas from petugas WHERE nama_petugas='$id'")->row_array();
    return $q['nama_petugas'];
}
function getsyarat($id_syarat){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT * from syarat, status_pendaftaran WHERE syarat.id_status_pendaftaranFK=status_pendaftaran.id_status_pendaftaran and syarat.id_syarat='$id_syarat'")->result();
    return $q;
}
function getdesaa($id_desakelurahan){
    $ci=& get_instance();
    $q = $ci->db->query("SELECT id_kecamatanFK from desakelurahan WHERE desakelurahan.id_desakelurahan='$id_desakelurahan'")->row_array();
    return $q['id_kecamatanFK'];
}