<?php defined('BASEPATH') OR exit('No direct script access allowed');

    /** Author : 
        - Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
    */

    class Profile extends CI_Controller {

        private $url = 'profile';

        public function __construct(){
            parent::__construct();
        }        

        public function index(){
            $data['pagetitle'] = 'Profile';
            $data['subtitle']  = null;
            $data['breadcumb'] = ['index' => base_url($this->url), 'Profile' => null];

            // set data employee
            $select            = 'user_nama,user_role_id,user_nama,user_email,user_nohp';
            $data['records']   = $this->m_global->get('user',null,['user_id' => $this->session->userdata('homed_session')->user_id],$select)[0];
            
            $this->template->display($this->url, $data);
        }

        function test($user_id = null){
            $select          = 'user_id,user_nama,user_email,user_jenmin,user_temlahir,user_tgllahir,user_golrah,user_rhesus,user_nohp,user_foto';
            $where           = (empty($user_id) ? ['user_tipe' => '0'] : [md56('user_id',1) => $user_id]);
            $data['records'] = @$this->m_global->get('user',null,$where,$select)[0];
            $data['fTipe']   = (empty($user_id) ? '0' : '1');

            $this->load->view('form',$data);
        }
    }
        
?>