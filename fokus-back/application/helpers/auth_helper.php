<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$CI = &get_instance();
	$CI->load->library( 'session' );

	$ex          = array('login','rest_api');
	$session     = $CI->session->userdata('homed_session');
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

   	//$uri 	= ($this->uri->segment(1) == '' ? 'welcome' : $this->uri->segment(1));
   	//$page 	= ['page_404','login','fetch','profile'];	//Controller tambahan
	//if (!empty($session)) {
		//$group_controller = json_decode($session->group_controller);
	   	//$arr_mrg= array_merge($group_controller, $page);
	   	//$search = array_search($uri, $arr_mrg);
	   	//if (empty($search)) {
		   //if ($search===0) {
		   		// return true;
		   //}else{
		   		//redirect('page_404','refresh');	   		
		   //}
	   	//}else{
	   		//return true;
	   	//}	
	//}

?>