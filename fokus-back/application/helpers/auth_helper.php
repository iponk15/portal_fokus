<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$CI = &get_instance();
	$CI->load->library( 'session' );

	$ex          = array('login');
	$session     = $CI->session->userdata('fksSes');
    $status_link = @$CI->input->post('status_link');

	if ( !empty($session) AND ( ( in_array ( $this->uri->segment(1), $ex) AND $this->uri->segment(2) != "out") OR $this->uri->segment(1) == "" ) ){
		redirect( base_url('welcome') );
	} else if ( empty($session) AND ! in_array( $this->uri->segment(1), $ex ) ) {
		if ( $status_link == 'ajax' ){
			echo 'out';
			redirect(base_url('login'));
		}else{
			redirect(base_url('login'));
		}
	}

?>