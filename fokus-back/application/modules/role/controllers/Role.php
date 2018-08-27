<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MX_Controller {
	private $prefix         = 'role_';
    private $url            = 'role';
    private $table_db       = 'fokus_role';
    private $pagetitle      = 'Role';
    private $rule_valid     = 'xss_clean|encode_php_tags';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['pagetitle'] = 'Role';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url("role"), 'Role' => null];

		$this->template->display('role', $data);
	}

	public function select($value='')
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
                    $where_e = '(role_id like "%'.$param.'%" OR role_nama like "%'.$param.'%" OR `role_deskripsi` like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = null;
        $where           = null;
        $select          = 'role_id, role_nama, role_deskripsi, role_status';
        $data['total']   = $this->m_global->count($this->table_db, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_db, $join, $where, $select, $where_e, null, $awal, $limit);
        $data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
                'no'     =>  $i++,
                'nama'   =>  $value->role_nama,
                'desc'   =>  $value->role_deskripsi,
                'status' =>  ($value->role_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
                'action' =>  '<a href="'.base_url($this->url.'/show_edit/'.md5($value->role_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                            <a href="'.base_url($this->url.'/action_del/'.md5($value->role_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                <i class="la la-trash"></i>
                            </a>',
            ];
        }

        $encode = (object)[
            'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id_content'], 
            'data' =>  $data['records']
        ];

        echo json_encode($encode);
	}
	public function show_add()
	{
		$data['pagetitle'] = 'Role Add';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url("role"), 'Role Add' => null, 'Form Add' => base_url('role/show_add')];

		$this->template->display('role_add', $data);
	}
	public function action_add()
	{
		$post = $this->input->post();

        $data['role_nama'] 	  		= $post['role_nama'];
        $data['role_deskripsi'] 	= $post['desc'];
        $data['role_status']    	= $post['status'];
        $data['role_ip_temp']  		= $this->getUserIP();
        $data['role_createdby']     = '1';
        $data['role_createddate']   = date('Y-m-d H:i:s');
        $data['role_updatedby']     = '1';


        $insert = $this->m_global->insert($this->table_db, $data);

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
	public function show_edit($id)
	{
        $data['id']         = $id;
		$data['pagetitle'] 	= 'Role Edit';
		$data['subtitle']  	= '';
		$data['breadcumb'] 	= ['index' => base_url("role"),'Role Edit' => null, 'Form Edit' => base_url('role/show_edit/'.$id)];
		$data['records']	= $this->m_global->get($this->table_db, null, ['md5(role_id)' => $id])[0];

		$this->template->display('role_edit', $data);

	}
	public function action_edit()
	{

		$post = $this->input->post();

        $id 	  					= $post['role_id'];
        $data['role_nama'] 	  		= $post['role_nama'];
        $data['role_deskripsi'] 	= $post['desc'];
        $data['role_status']    	= $post['status'];
        $data['role_ip_temp']  		= $this->getUserIP();
        $data['role_createdby']     = '1';
        $data['role_createddate']   = date('Y-m-d H:i:s');
        $data['role_updatedby']     = '1';

        $insert = $this->m_global->update($this->table_db, $data,['md5(role_id)' => $id]);

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
    public function action_del($id)
    {
        $delete = $this->m_global->delete($this->table_db, ['md5(role_id)' => $id]);

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
	function getUserIP()
	{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

}

/* End of file Role.php */
/* Location: ./application/modules/role/controllers/Role.php */