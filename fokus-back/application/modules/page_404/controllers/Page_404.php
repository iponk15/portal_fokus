<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_404 extends MX_Controller {

	/**
 		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031	
 	*/

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['pagetitle'] = 'Page Error';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url('page_404'), 'Error 404' => null];
		$this->template->display('page_404', $data);
	}
}
