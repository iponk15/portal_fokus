<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
	*/

class Login extends CI_Controller {

    private $url        = 'login';
	private $table_db   = 'fokus_admin';
	private $table_prfx = 'admin_';

	public function index(){
		$this->load->view('login/login');
	}

	function masuk_login(){
		$post     = $this->input->post();
		$where_e  = "SUBSTRING_INDEX(admin_email,'@',1) = '".$post['user_email']."' OR admin_email = '".$post['user_email']."'";
		$select   = 'admin_email,admin_salt';
		$cekEMail = $this->m_global->get($this->table_db,null,null,$select,$where_e);

		if(!empty($cekEMail)){
			if(count($cekEMail) > '1'){
				$list = listEmail($cekEMail);
				$data['status']  = '2';
				$data['message'] = 'Mohon maaf username anda ada lebih dari 1 '.$list.'. Silahkan pilih salah satu';
				
				echo json_encode($data);
			}else{
				if(valid_email($post['user_email'])){
					$ver  = $this->salt->verify($cekEMail[0]->admin_email, $cekEMail[0]->admin_salt);

					if($ver == '1'){
						$salt = $cekEMail[0]->admin_salt;
					}else{
						$data['status']  = '2';
						$data['message'] = 'Mohon maaf verifikasi email anda tidak valid';

						echo json_encode($data);exit;
					}
				}else{
					$salt = $cekEMail[0]->admin_salt;	
				}
			}
		}else{
			$data['status']  = '2';
			$data['message'] = 'Mohon maaf username / email belum terdaftar, silhkan registrasi';

			echo json_encode($data);exit;
		}

		$where = ['admin_email' => $cekEMail[0]->admin_email, 'admin_password' => genPass($salt,$post['password'])];
		$sclt  = 'admin_id,admin_nama,admin_email,admin_tipe,admin_role_id';
		$login = $this->m_global->get($this->table_db,null,$where,$sclt);
		
		if(count($login) == '1'){
			$this->session->set_userdata($this->config->item('nama_session'), $login[0]);

			$data['status']  = true;
			$data['message'] = 'Berhasil login';
		}else{
			$data['status']  = false;
			$data['message'] = 'Gagal login';
		}

		echo json_encode($data);
	}

	function out(){
        $this->session->sess_destroy(); 

        redirect(base_url().'login');
	}
}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */