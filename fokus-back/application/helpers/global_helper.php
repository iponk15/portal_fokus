<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	# untuk print_f
	function pre( $var, $exit = null ){
	    $CI = &get_instance();
	    echo '<pre>';
	    if ( $var == 'lastdb' ){
	        print_r($CI->db->last_query());
	    } else if ( $var == 'post' ){
	        print_r($CI->input->post());
	    } else if ( $var == 'get' ){
	        print_r($CI->input->get());
	    } else {
	        print_r( $var );
	    }
	    echo '</pre>';

	    if ( $exit )
	    {
	        exit();
	    }
	}

	function generate_menu(){
		$CI 	   = &get_instance();
		$select    = 'menu_id,menu_nama,menu_controllers,menu_is_primary,menu_url,menu_sub_menu,menu_status,';
		$data_menu = $CI->m_global->get('cuti_config_menu',null,null,$select);

		return $data_menu;
	}

	function menu_role($param){
		$CI 	   = &get_instance();
		$select    = 'group_id,group_role_id,group_nama,group_deskripsi,group_ip_temp,group_data,group_controller,group_status';
		$data_menu = $CI->m_global->get('fokus_group',null,null,$select, ['group_role_id' => $param]);

		return $data_menu;
	}

	function isJSON($string){
	   return is_string($string) && is_array(json_decode($string, true)) ? true : false;
	}

	function info_ses($user_id){
		$CI   =& get_instance();
		$data = @$CI->m_global->get('user',NULL,['user_id' => $user_id])[0];

		return $data;
	}

	function getUserIP(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP)){
            $ip = $client;
        }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
            $ip = $forward;
        }else{
            $ip = $remote;
        }

        return $ip;
    }

    function state_color($param){
    	$list = ['1'=>'success','2'=>'warning','3'=>'danger','4'=>'info','5'=>'primary','6'=>'secondary'];

    	return $list[$param];
	}

	function some($data){
		$decode  = json_decode($data);
		$menu    = [];
		$submenu = [];

		foreach ($decode as $key) {
			if($key->parent == '#'){
				$menu[] = ['text' => $key->text, 'ID' => $key->ID,'child'=>array()];
			}else{
				$submenu[] = ['text' => $key->text, 'parent' => $key->parent];
			}
		}

		$ret = array($menu,$submenu);
		return $ret;
	}

	function md56($param,$tipe = null,$jml = null){
		if(empty($tipe)){
			return substr(md5($param),0, ( empty($jml) ? 6 : $jml  ) );

			substr(md5($param),0, 6 );
		}else{
			return 'SUBSTRING(md5('.$param.'),true,6)';
		}
	}

	function tab_menu ($primary, $controller, $uri, $paramChild){
		if ($primary == 1 && $controller == $uri) {
			return 'm-menu__item--active m-menu__item--active-tab';
		} elseif($primary == null && $controller != $uri && $paramChild==true) {
			return 'm-menu__item--active-tab';
		}
		
	}

	function valid_email($param) {
		return !!filter_var($param, FILTER_VALIDATE_EMAIL);
	}

	function umur($tanggal){
		// Format bulan-tanggal-tahun
		$birthDate = explode("-", $tanggal);
		$umur      = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
		
		return $umur;
	}

	function implode_dan($list, $conjunction = 'dan') {
		$last = array_pop($list);
		if ($list) {
		  return implode(', ', $list) . ' ' . $conjunction . ' ' . $last;
		}
		return $last;
	}

	function listEmail($list){
		$temp = [];
		foreach ($list as $rows) {
			$temp[] = '<a href="javascript:void(0);" onClick="copas(this)" data-value="'.$rows->admin_email.'">'.$rows->admin_email.'</a>';
		}
		
		return implode_dan($temp);
	}
	
	function genPass($salt,$password){
		$hasil = sha1(md5($password).$salt);
		return $hasil;
	}

	function getSession(){
		$CI   =& get_instance();
		return $CI->session->userdata($CI->config->item('nama_session'));
	}

	function open_ssl($i, $string){
		$bytes   = openssl_random_pseudo_bytes($i, $string);
		$hex     = bin2hex($bytes);
		
		return $hex;
	}
	
	function salt(){
		$CI 		  =& get_instance();
		$raw_salt_len = 16;
		$buffer 	  = '';
		$buffer_valid = FALSE;

		if (function_exists('random_bytes')){
			$buffer = random_bytes($raw_salt_len);
			if ($buffer){
				$buffer_valid = TRUE;
			}
		}

		if (!$buffer_valid && function_exists('mcrypt_create_iv') && !defined('PHALANGER')){
			$buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
			if ($buffer){
				$buffer_valid = TRUE;
			}
		}

		if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')){
			$buffer = openssl_random_pseudo_bytes($raw_salt_len);
			if ($buffer){
				$buffer_valid = TRUE;
			}
		}

		if (!$buffer_valid && @is_readable('/dev/urandom')){
			$f    = fopen('/dev/urandom', 'r');
			$read = strlen($buffer);
			
			while ($read < $raw_salt_len){
				$buffer .= fread($f, $raw_salt_len - $read);
				$read    = strlen($buffer);
			}
			
			fclose($f);
			
			if ($read >= $raw_salt_len){
				$buffer_valid = TRUE;
			}
		}

		if (!$buffer_valid || strlen($buffer) < $raw_salt_len){
			$bl = strlen($buffer);
			for ($i = 0; $i < $raw_salt_len; $i++){
				if ($i < $bl){
					$buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
				}else{
					$buffer .= chr(mt_rand(0, 255));
				}
			}
		}

		$salt = $buffer;

		// encode string with the Base64 variant used by crypt
		$base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
		$bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$base64_string 	 = base64_encode($salt);
		$salt 			 = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);
		$salt 		     = substr($salt, 0, $CI->salt_length);

		return $salt;
	}
	
	function hash_password($password, $salt = FALSE, $use_sha1_override = FALSE){
		$CI =& get_instance();
		
		if (empty($password)){
			return FALSE;
		}

		// bcrypt
		if ($use_sha1_override === FALSE && $CI->hash_method == 'bcrypt'){
			return $CI->bcrypt->hash($password);
		}

		if ($CI->store_salt && $salt){
			return sha1($password . $salt);
		}else{
			$salt = $CI->salt();
			return $salt . substr(sha1($salt . $password), 0, -$CI->salt_length);
		}
	}
	
	function templateEmail($param){
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom('ismairfan8@gmail.com', $param['perusahaan']);
		$email->setSubject($param['subjek']);
		$email->addTo($param['ke'],$param['nama']);
		// $email->addContent("text/plain", 'test email');
		$email->addContent("text/html", $param['deskripsi']);
		
		// Email untuk attachment
		// $path 		  = explode('/',$param['path']);
		// $file_encoded = base64_encode(file_get_contents($param['path']));
		
		// $email->addAttachment(
		    // $file_encoded, //file path
		    // "application/pdf", //Header file
		    // end($path), //Name file yg dikirim di attachment
		    // "attachment"
		// );

		$sendgrid = new \SendGrid("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");

		try {
			$response = $sendgrid->send($email);
			// pre($response->statusCode() );
			// pre($response->headers());
			// pre($response->body());
			// print $response->statusCode() . "\n";
			// print_r($response->headers());
			// print $response->body() . "\n";
			if($response->statusCode() == '202'){
				return $data['status'] = '1';
			}else{
				return $data['status'] = '0';
			}
			
		} catch (Exception $e) {
			echo 'Caught exception: '. $e->getMessage() ."\n";
			return $data['status'] = '0';
		}
	}
	
	function captcha(){
		$CI   =& get_instance();
		$vals = array(
			'img_path'      => FCPATH.'assets/captcha/',
			'img_url'       => base_url('assets/captcha'),
			'img_width'     => '200',
			'img_height'    => 40,
			'expiration'    => 7200,
			'word_length'   => 3,
			'font_size'     => 300,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border'     => array(255, 255, 255),
					'text'       => array(0, 0, 0),
					'grid'       => array(255, 40, 40)
			)
		);
		
		$cap    = create_captcha($vals);
		$result = ['capImage' => $cap['image'], 'capWord' => $cap['word'], 'capTime' => $cap['time']];
		
		return $result;
	}

	function log_activity($menu,$note){
		$CI    =& get_instance();

		$role 				 = [1 => 'Superadmin',2 => 'Kilo-kilo',3 => 'AA',4 => 'DM'];
		$logA['logAct_menu'] = $menu;
		$logA['logAct_emp']  = getSession()->user_nopeg;
		$logA['logAct_note'] = $note;
		$logA['logAct_bo']   = (empty(getSession()->user_bo) ? null : getSession()->user_bo );
		$logA['logAct_role'] = $role[getSession()->user_role];
		$logA['logAct_ip']   = getUserIP();
		$logA['logAct_date'] = date('Y-m-d H:i:s');
		$query 				 = $CI->m_global->insert('has_log_activity', $logA);

		return true;
	}

?>