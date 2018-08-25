<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
	*/

class Login extends CI_Controller {

	public function index(){
		$options = [
			'cost' => 11,
			'keys' => '735wnc8tcny8tgc4ry'
		];
		echo $hash = password_hash('irfanIsma', PASSWORD_BCRYPT, $options);
		echo '<br>';

		if (password_verify('irfanIsma', $hash)) {
			echo 'Password is valid!';
		} else {
			echo 'Invalid password.';
		}

		$this->load->view('login/login');
	}

	function masuk_login(){
		$post      	= $this->input->post();
		$pass      	= genPass($post['user_email'], $post['password']);
		// echo 'Argon2 hash: ' . password_hash('rasmuslerdorf', PASSWORD_ARGON2I);
		
		pre($post,1);
		
		$join      	= [['user_group ug', 'u.user_role_id = ug.group_role_id','left']];
		$select    	= 'u.user_id,u.user_email,u.user_role_id,ug.group_controller';
		$where 		= ['u.user_email' => $post['user_email'], 'u.user_password' => $pass, 'u.user_status' => '1','u.user_tipe' => '2'];
		$where_e 	= 'ug.group_role_id = u.user_role_id';
		$dataAdmin 	= $this->m_global->get('user u',$join,$where,$select,$where_e);
		$cek 	   	= count($dataAdmin);
		
		if($cek == 1){
			$this->session->set_userdata('homed_session', $dataAdmin[0]);

			$data['status']  = '1';
			$data['message'] = 'Berhasil Login';
			
		}else{
			$data['status']  = '0';
			$data['message'] = 'Maaf akun yang anda masukan keliru pak';

		}

		echo json_encode($data);
	}

	function out(){
        $this->session->sess_destroy(); 

        redirect(base_url().'login');
	}
	
	function captcha(){
		echo $this->recaptcha->render();
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */