<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoginM extends CI_Model{
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

	public function ceknum($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		// $this->db->where('peran', 'analis');
		return $this->db->get('petugas');
	}

	// function make_captcha(){
	// 	// $this->load->plugin('captcha');
	// 	$vals = array(
	// 		'img_path' => './/image/captcha/',
 //            'img_url' => base_url().'/image/captcha/',
 //            'img_width' => '250',
 //            'img_height' => '50',
 //            'font_path' => '../system/fonts/texb.ttf',
 //            'expiration' => 3600
	// 		);

	// 	$cap = create_captcha($vals);

	// 	if($cap){
	// 		$data = array(
	// 			'captcha_id' => '',
	// 			'captcha_time' => $cap['time'],
	// 			'ip_address' => $this -> input -> ip_address(),
	// 			'word' => $cap['word']
	// 			);
	// 		$query = $this -> db -> insert_string('captcha', $data);
	// 		$this -> db -> query($query);
	// 	}else{
	// 		return "captcha not work";
	// 	}
	// 	return $cap['image'];
	// }

	// function check_captcha(){
	// 	$expiration = time()-3600;
	// 	$sql = "DELETE FROM captcha WHERE captcha_time < ?";
	// 	$binds = array($expiration);
	// 	$query = $this->db->query($sql, $binds);

	// 	$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
	// 	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
	// 	$query = $this->db->query($sql, $binds);
	// 	$row = $query->row();

	// 	if($row -> count > 0){
	// 		return true;
	// 	}
	// 	return false;
	// }

	// public function ceknumL($username, $password){
	// 	$this->db->where('username', $username);
	// 	$this->db->where('password', $password);
	// 	$this->db->where('peran', 'logistik');
	// 	return $this->db->get('petugas');
	// }

	// public function ceknumA($username, $password){
	// 	$this->db->where('username', $username);
	// 	$this->db->where('password', $password);
	// 	$this->db->where('peran', 'admin');
	// 	return $this->db->get('petugas');
	// }


}