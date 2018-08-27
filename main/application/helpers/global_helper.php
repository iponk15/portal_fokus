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
		$data_menu = $CI->m_global->get('user_group',null,null,$select, ['group_role_id' => $param]);

		return $data_menu;
	}

	function isJSON($string){
	   return is_string($string) && is_array(json_decode($string, true)) ? true : false;
	}

	function genPass($string,$password){
		$CI 	= &get_instance();
		$key    = $CI->config->item('secret_key');
		$salt   = sha1(md5($string).$key);
		$hasil  = md5($salt.$password);

		return $hasil;
	}

	function is_ccanalyst($nopeg){
		$CI    = &get_instance();
		$hasil = $CI->m_global->count('cuti_admin',null,['admin_nopeg' => $nopeg]);

		return $hasil;
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
	
	function olah($data){
		$decode  = json_decode($data);
		$menu    = [];
		$submenu = [];

		foreach ($decode as $key) {
			if($key->parent == '#'){
				$menu[] = ['text' => $key->text, 'ID' => $key->ID];
			}else{
				$submenu[] = ['text' => $key->text, 'parent' => $key->parent];
			}
		}

		pre($menu);
		pre($submenu);

		// return $hasil;
		
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

		// return $hasil;
		
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

	function random($length='',$tipe='') { 

		if(!empty($tipe)){
			if($tipe == '1'){
				$digits_needed = 6;
                $random_number = '';
                $count	 	   = 0;

                while ( $count < $digits_needed ) {
                    $random_digit  = mt_rand(0, 9);
                    $random_number .= $random_digit;
                    $count++;
                }

                return $random_number;
			}
		}else{
			$chars = "abcdefghijkmnopqrstuvwxyzABCDEFGHIZKLMNOPQRSTUVWXYZ0123456789"; 
		}
		
		srand((double)microtime()*1000000); 
		$i      = 0; 
		$pass   = '' ;
		$length = (!empty($length) ? $length : 32);
	
		while ($i <= $length) { 
			$num = rand() % 33; 
			$tmp = substr($chars, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		} 
	
		return $pass; 
	
	}

	function templateEmail($param){
		// pre($param,1);
		$email = new \SendGrid\Mail\Mail(); 
		$email->setFrom("inmed.firebase@gmail.com", "Indonesia Medika");
		$email->setSubject($param['subject']);
		$email->addTo($param['email'], $param['nama']);
		$email->addContent("text/plain", $param['mesage']);
		// $email->addContent("text/html", "<strong>and easy to do anywhere, even with PHP</strong>");

		$sendgrid = new \SendGrid("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");

		try {
			$response = $sendgrid->send($email);
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
?>