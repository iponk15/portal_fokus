<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
	*/

class Login extends CI_Controller {

    private $url        = 'login';
	private $table_db   = 'fokus_admin';
	private $table_prfx = 'admin_';
	
	public $activation_code;
	
	public function __construct(){
		parent::__construct();
		$this->config->load('ion_auth', TRUE);
		$this->load->model('auth/ion_auth_model');
		$this->load->model('m_login');
		
		$this->store_salt  = $this->config->item('store_salt', 'ion_auth');
		$this->salt_length = $this->config->item('salt_length', 'ion_auth');
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');
		
		if (file_exists(FCPATH . "/assets/captcha/" . $this->session->userdata('hasCaptcha')['capTime'] . '.jpg')){
			unlink(FCPATH . "/assets/captcha/" . $this->session->userdata('hasCaptcha')['capTime'] . '.jpg');
		}
	}

	public function index(){
		$data['cekSU']   = $this->m_global->count('fokus_admin',null,['admin_tipe' => 1] );
		$data['captcha'] = captcha();
		
		$this->session->set_userdata('hasCaptcha', $data['captcha']);
		
		$this->load->view('login/login', $data);
	}

	function masuk_login(){
		$post = $this->input->post();
		$auth = $this->m_login->login($post);
		
		echo json_encode($auth);
	}

	function register(){
		$post 						   = $this->input->post();
		$tables 		 		 	   = $this->config->item('tables', 'ion_auth');
		$identity_column 			   = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;
		$email    					   = strtolower($this->input->post('email'));
		$identity 					   = ($identity_column === 'admin_email') ? $email : $this->input->post('identity');
		$password 					   = $this->input->post('password');
		$aktivasi 					   = $this->config->item('email_activation', 'ion_auth');
		
		$salt     = $this->store_salt ? salt() : FALSE;
		$password = hash_password($password, $salt);
	
		// data post dari inputan
		$data['admin_nama']        = $post['nama'];
		$data['admin_email']       = $post['email'];
		$data['admin_nohp']        = $post['no_hp'];
		$data['admin_salt']        = $salt;
		$data['admin_password']    = $password;
		$data['admin_createddate'] = date('Y-m-d H:i:s');
		$data['admin_ip']		   = getUserIP();
		
		$register = $this->m_global->insert('fokus_admin', $data);
		$last_id  = md56($this->db->insert_id());
		
		if($aktivasi){
			if(!$register){
				$msg['status']  = '2';
				$msg['message'] = 'Mohon maaf ada kesalahan terjadi.';

				echo json_encode($msg);
			}else{
				$activation_code 	  	 	  = sha1(md5(microtime()));
				$this->activation_code 		  = $activation_code;
				$actvd['admin_kode_aktivasi'] = $activation_code;
				$actvd['admin_status']	      = '0';
				$updt 						  = $this->m_global->update('fokus_admin',$actvd,[md56('admin_id',1) => $last_id]);
				$getData 					  = $this->m_global->get('fokus_admin',null,[md56('admin_id',1) => $last_id], 'admin_id,admin_nama,admin_email,admin_kode_aktivasi')[0];
				
				if($updt){
					if(!$this->config->item('use_ci_email', 'ion_auth')){
						$this->ion_auth_model->trigger_events(array('post_account_creation', 'post_account_creation_successful', 'activation_email_successful'));
						$this->set_message('activation_email_successful');
						return $data;
					}else{
						
						$tempEmail['identity']   = $this->config->item('identity', 'ion_auth');
						$tempEmail['id']       	 = $getData->admin_id;
						$tempEmail['activation'] = $getData->admin_kode_aktivasi;
						$message 				 = $this->load->view('email/email_aktivasi', $tempEmail, true);
						
						$send['dari']  		= $this->config->item('admin_email', 'ion_auth');
						$send['perusahaan'] = $this->config->item('site_title', 'ion_auth');
						$send['ke']			= $email;
						$send['nama']       = $getData->admin_nama;
						$send['subjek']     = 'Aktivasi Email';
						$send['deskripsi']	= $message;
						$kirimEmail         = templateEmail($send,1);

						if ($kirimEmail == '1'){
							$msg['status']  = '1';
							$msg['message'] = 'Registrasi berhasil silahkan cek email anda';

							echo json_encode($msg);
						}else{
							echo 'kirim email gagal';
						}
					}
				}else{
					$msg['status']  = '2';
					$msg['message'] = 'Ada beberapa kendala sehingga tidak dapat registrasi, silahkan registrasi ulang.';

					echo json_encode($msg);
				}
				
			}
		}else{
			
		}
	}

	function out(){
		$this->session->sess_destroy(); 
		
		$this->ion_auth_model->trigger_events('logout');

		// delete the remember me cookies if they exist
		if (get_cookie($this->config->item('identity_cookie_name', 'ion_auth'))){
			delete_cookie($this->config->item('identity_cookie_name', 'ion_auth'));
		}
		
		if (get_cookie($this->config->item('remember_cookie_name', 'ion_auth'))){
			delete_cookie($this->config->item('remember_cookie_name', 'ion_auth'));
		}

        redirect(base_url().'login');
	}
	
	function aktivasi($id,$kode = null){
		if ($kode !== FALSE){
			$activation = $this->m_login->activate($id, $kode);
		}else if ($this->ion_auth->is_admin()){
			$activation = $this->m_login->activate($id);
		}

		if ($activation == true){
			// redirect them to the auth page
			$this->session->set_userdata('message', 'Selamat akun anda berhasil di aktivasi, silahkan login');
			redirect("login", 'refresh');
		}else{
			// redirect them to the forgot password page
			$this->session->set_userdata('message', 'Mohon maaf akun anda belum berhasil di aktivasi');
			redirect("login/forgot_password", 'refresh');
		}
	}
	
	function lupa_password(){
		$post  = $this->input->post('email');
		$lupas = $this->m_login->lupa_password($post);
		
		echo json_encode($lupas);
	}
	
	function reset_password($code){
		$where   = ['admin_kode_lupapas' => $code];
		$select  = 'admin_id,admin_kode_lupapas,admin_salt';
		$getData = $this->m_global->get('fokus_admin',null,$where,$select);
		
		if(!empty($getData)){
			$getData = $getData[0];
			
			if($this->config->item('forgot_password_expiration', 'ion_auth') > 0){
				$expiration = $this->config->item('forgot_password_expiration', 'ion_auth');
				$count 		= time() - $getData->admin_waktu_lupapas;
				
				if($count > $expiration){
					$updt['admin_kode_lupapas']  = null;
					$updt['admin_waktu_lupapas'] = null;
					
					$this->m_global->update('fokus_admin',$updt,['admin_kode_lupapas' => $code]);
				}else{
					show_404();		
				}
			}else{
				$data['records'] = $getData;
				$this->load->view('login_gantipass',$data);
			}
		}else{
			show_404();
		}
	}
	
	function knfm_lupas($admin_id,$salt){
		$post = $this->input->post('password');
		
		$this->m_login->trigger_events('extra_where');
		
		$pasBaru 			    	 = hash_password($post,$salt);
		$data['admin_password'] 	 = $pasBaru;
		$data['admin_kode_ingat']    = null;
		$data['admin_kode_lupapas']  = null;
		$data['admin_waktu_lupapas'] = null;
		
		$update = $this->m_global->update('fokus_admin',$data,[md56('admin_id',1) => $admin_id]);
		
		if($update){
			$this->session->set_userdata('message', 'Password berhasil dirubah');
			$msg['status'] = '1';
		}else{
			$this->session->set_userdata('message', 'Password gagal dirubah');
			$msg['status'] = '0';
		}
		
		echo json_encode($msg);
	}
	
	function refresh(){
		$data['captcha'] = captcha();
		
		if (file_exists(FCPATH . "/assets/captcha/" . $this->session->userdata('hasCaptcha')['capTime'] . '.jpg')){
			unlink(FCPATH . "/assets/captcha/" . $this->session->userdata('hasCaptcha')['capTime'] . '.jpg');
		}

		$this->session->unset_userdata('hasCaptcha');
		$this->session->set_userdata('hasCaptcha', $data['captcha']);
		
		echo $data['captcha']['capImage'];
	}
}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */