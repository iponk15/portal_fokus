<?php 
    /** 
        Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
    */
        
    class Salt{
        protected $_ci;

        
        public function __construct(){
            $this->_ci = &get_instance();
        }

        function generate_salt($string,$tipe,$opsi){
            $salt = password_hash($string,$tipe,$opsi);
            return $salt;
        }

        function verify($string,$salt){
            $verify = password_verify($string, $salt);

            if($verify){
                return '1';
            }else{
                return '0';
            }
        }
        

    }
    
?>