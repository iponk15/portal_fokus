<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031 
	*/

	public function __construct(){
		parent::__construct();
		$this->session->unset_userdata('message');
	}

	public function index(){
		$data['pagetitle'] = 'Welcome';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url('welcome'), 'Dashboard' => null];
		
		$this->template->display('welcome_message', $data);
	}
}
