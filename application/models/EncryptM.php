<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Encrypt_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function genRndDgt($length = 8, $spacialCharacters = true){
		$digits = '';
		$chars ="abcdefghijklmnopqrstuvwxyz23456789";
		
		if($spacialCharacters == true)
			$chars .= "!?=/&+,.";
		
		for($i =0; $i < $length; $i++){
			$x = mt_rand(0, strlen($chars) -1);
			$digits .= $chars{$x};
		}
		return $digits;
	}
	function getRndSalt(){
		return $this->genRndDgt(8, true);
	}
	function encryptUserPwd($pwd, $salt){
		return sha1(md5($pwd). $salt);
	}
}