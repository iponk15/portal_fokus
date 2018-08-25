<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031	
 	*/

	private $prefix         = 'admin_';
    private $url            = 'admin';
    private $table_db       = 'user';
    private $pagetitle      = 'User';
    private $rule_valid     = 'xss_clean|encode_php_tags';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['pagetitle'] = 'Admin';
        $data['subtitle']  = '';
        $data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url("admin"), 'Admin' => null];

		$this->template->display($this->url, $data);
	}
	public function select()
	{
    	$where   = null;
        $where_e = null;
        $paging  = $_REQUEST['pagination'];
        $search  = $_REQUEST['query'];

        // setting pagging
        $start  = $paging['page'];
        $limit  = $paging['perpage'];
        $awal   = ($start == 1 ? '0' : $start * $limit);
        
        // setting pencarian data
        if(!empty($search)){
            foreach ($search as $value => $param) {
                if($value == 'generalSearch'){
                    $where_e = '(role_nama like "%'.$param.'%" OR user_nama like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = [ ['role', 'user_role_id = role_id', 'left'] ];
        $where           = ['user_tipe' => '2'];
        $select          = 'user_id, user_nama, role_nama, user_status,user_email';
        $data['total']   = $this->m_global->count($this->table_db, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_db, $join, $where, $select, $where_e, null, $awal, $limit);
        $data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
                'no'     => $i,
                'email'  => $value->user_email,
                'nama'   => $value->user_nama,
                'role'   => $value->role_nama,
                'status' => ($value->user_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
                'action' => '<a href="'.base_url($this->url.'/change_status/'.md56($value->user_id).'/'.$value->user_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
                                <i class="la la-eye"></i>
                            </a>
                            <a href="'.base_url($this->url.'/show_edit/'.md56($value->user_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                            <a href="'.base_url($this->url.'/action_del/'.md56($value->user_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                <i class="la la-trash"></i>
                            </a>',
            ];
        }

        $encode = (object)[
            'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'user_id'], 
            'data' =>  $data['records']
        ];

        echo json_encode($encode);	
	}

	public function show_add()
	{
		$data['pagetitle'] 	= 'Admin Add';
        $data['subtitle']  	= '';
        $data['url']        = $this->url;
		$data['breadcumb'] 	= ['index' => base_url("admin"), 'Admin' => null, 'Form Add' => base_url('admin/show_add')];
		
		$this->template->display($this->prefix.'add', $data);
	}

	public function action_add(){
		$post = $this->input->post();

        $this->form_validation->set_rules('user_nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('user_role_id', 'Role', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
            $data['user_nama'] 	      = $post['user_nama'];
            $data['user_email'] 	  = $post['user_email'];
            $data['user_password']    = genPass($post['user_email'],$post['user_password']);
            $data['user_tipe']        = '2';
            $data['user_role_id'] 	  = $post['user_role_id'];
            $data['user_ip_temp']     = getUserIP();
            $data['user_createdby']   = '1';
            $data['user_createddate'] = date('Y-m-d H:i:s');
            $data['user_updatedby']   = '1';
            $insert                   = $this->m_global->insert($this->table_db, $data);

            if ($insert) {
                $data['status']     = 1;
                $data['message']    = 'Successfully';

                echo json_encode( $data );
            } else {
                $data['status']     = 0;
                $data['message']    = 'Failed';

                echo json_encode( $data );                                       
            }
        }
	}

	public function show_edit($id){
		$data['pagetitle'] 	= 'Admin Edit';
		$data['subtitle']  	= '';
		$data['breadcumb'] 	= ['index' => base_url("admin"), 'Admin' => null, 'Form Edit' => base_url('admin/show_edit/'.$id)];
        $data['id']         = $id;
        $data['url']        = $this->url;

        // set data
        $join            = [['role','user_role_id = role_id','left']];
		$data['records'] = $this->m_global->get($this->table_db, $join, [md56('user_id',1) => $id])[0];

		$this->template->display($this->prefix.'edit', $data);
	}

	public function action_edit($id){
		$post        = $this->input->post();

        $this->form_validation->set_rules('user_nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_role_id', 'Role', 'trim|required');

        if ( $this->form_validation->run( $this ) )
        {
           	$data['user_nama'] 	   = $post['user_nama'];
            $data['user_email']    = $post['user_email'];

            if(!empty($post['user_password'])){
                $data['user_password']= genPass($post['user_email'],$post['user_password']);
            }

            $data['user_role_id'] 	  = $post['user_role_id'];
            $data['user_ip_temp']     = getUserIP();
            $data['user_updatedby']   = '1';
            $udpate                   = $this->m_global->update($this->table_db, $data,[md56('user_id',1) => $id]);

            if ($udpate) {
                $data['status']     = 1;
                $data['message']    = 'Successfully';

                echo json_encode( $data );
            } else {
                $data['status']     = 0;
                $data['message']    = 'Failed';

                echo json_encode( $data );                                       
            } 
        }
	}

    public function action_del($id){
        $delete = $this->m_global->delete($this->table_db, [md56('user_id',1) => $id]);

        if ( $delete ){
            $data['status']  = 1;
            $data['message'] = 'Successfully';

            echo json_encode( $data );
        } else {
            $data['status']  = 0;
            $data['message'] = 'Failed';

            echo json_encode( $data );
        }
    }

    public function change_status($id,$status)
    {
        if ($status == 1) {
            $data['user_status'] = '0';
        } else {
            $data['user_status'] = '1';
        }
        
        $update = $this->m_global->update($this->table_db, $data, [md56('user_id',1) => $id]);
        if ( $update ){
            $end['status']  = 1;
            $end['message'] = 'Successfully';
            echo json_encode( $end );
        } else {
            $end['status']  = 0;
            $end['message'] = 'Failed';

            echo json_encode( $end );
        }
    }

    public function nopeg_check($id,$param=null){
        $cek = $this->m_global->get('user', NULL, ['user_email' => $id], 'user_email');
        if ($param) {
            if (empty($cek)){            
                return TRUE;
            }else{
                if ($param == $cek[0]->user_email) {
                    return TRUE;
                }else{
                    $data['status']     = 0;
                    $data['message']    = 'Nopeg sudah dipakai';

                    echo json_encode( $data );      
                    return FALSE;
                }
            }
        } else {
            if (empty($cek)){            
                return TRUE;
            }else{
                $data['status']     = 0;
                $data['message']    = 'Nopeg sudah dipakai';

                echo json_encode( $data );      
                return FALSE;
            }
        }
    }

}
