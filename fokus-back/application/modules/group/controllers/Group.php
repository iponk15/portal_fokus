<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MX_Controller {

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031	
 	*/
	private $table_db 	= 'user_group';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['pagetitle'] = 'Group';
		$data['subtitle']  = NULL;
		$data['breadcumb'] = ['index' => base_url("group"), 'Group' => null];

		$this->template->display('group', $data);
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
                    $where_e = '(group_nama like "%'.$param.'%" OR `group_role_id` like "%'.$param.'%" OR `role_nama` like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = [ ['role', 'group_role_id = role_id', 'left'] ];
        $where           = null;
        $select          = 'group_id,group_nama,role_nama,group_role_id,role_nama,group_status, group_deskripsi';
        $data['total']   = $this->m_global->count($this->table_db, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_db, $join, $where, $select, $where_e, null, $awal, $limit);
        $data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
            	'no' 	 	      => $i++,
                'group_nama'  	  => $value->group_nama,
                'group_role'  	  => $value->role_nama,
                'group_deskripsi' => $value->group_deskripsi,
                'group_status' 	  => ($value->group_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
                'action' 	      => '<a href="'.base_url('group/change_status/'.md5($value->group_id).'/'.$value->group_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
				                        <i class="la la-eye"></i>
				                    </a>
				                    <a href="'.base_url('group/show_edit/'.md5($value->group_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
				                        <i class="la la-edit"></i>
				                    </a>
				                    <a href="'.base_url('group/delete/'.md5($value->group_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
				                        <i class="la la-trash"></i>
				                    </a>',
            ];
        }

        $encode = (object)[
            'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'group_id'], 
            'data' =>  $data['records']
        ];

        echo json_encode($encode);	
	}

	function show_add(){
		$data['pagetitle'] = 'Tambah Group';
		$data['subtitle']  = NULL;
		$data['breadcumb'] = ['index' => base_url("group"), 'Group' => null, 'Form Tambah' => base_url('group/show_add')];
		$data['menu']      = $this->m_global->get('config_menu');

		$this->template->display('group/group_add', $data);
	}

	public function action_add(){
		$post   = $this->input->post();
		$parent	= json_decode($post['parent']);
		$child	= json_decode($post['child']);
		$this->form_validation->set_rules('role', 'Role', 'callback_group_check');
        if ( $this->form_validation->run( $this ) )
        {

			foreach ($parent as $key => $value) {
				foreach ($child as $key2 => $value2) {
					if ($value2->parent == $value->menu_id) {
						$value->menu_sub_menu[] = $value2;
						$value->menu_controllers[] = $value2->controller;
					}
				};
				$obj_parent[] = $value;
			};

			$ses 					   = $this->session->userdata('homed_session');
			$data['group_nama'] 	   = $post['nama_group'];
			$data['group_role_id']     = $post['role'];
			$data['group_deskripsi']   = $post['deskripsi'];
			$data['group_controller']  = $post['controller'];
			$data['group_data']		   = json_encode($obj_parent);
			$data['group_ip_temp']	   = getUserIP();
			$data['group_status']	   = '1';
			$data['group_createdby']   = $ses->user_id;
			$data['group_createddate'] = date('Y-m-d H:i:s');

			$insert = $this->m_global->insert($this->table_db, $data);

			if ($insert) {
				$end['status']  = 1;
				$end['message'] = 'Successfully';
			} else {
				$end['status']  = 0;
				$end['message'] = 'failed';
			}

			echo json_encode( $end );
		}
	}

	public function cobaf()
	{
		$Varparent = '[{"menu_id":"1","menu_nama":"Welcome","menu_controllers":"welcome","menu_is_primary":1,"menu_url":"welcome","menu_sub_menu":""},{"menu_id":"2","menu_nama":"Planning","menu_controllers":"","menu_is_primary":"","menu_url":"","menu_sub_menu":""},{"menu_id":"3","menu_nama":"Something is wrong","menu_controllers":"","menu_is_primary":"","menu_url":"","menu_sub_menu":""}]';
		$Varchild  = '[{"text":"Periode","icon_menu":"event-calendar-symbol","controller":"periode","parent":2},{"text":"Kuota","icon_menu":"open-box","controller":"kuota","parent":2},{"text":"Blacklist","icon_menu":"circle","controller":"blacklist","parent":2},{"text":"Something is wrong Schedule","icon_menu":"settings","controller":"Something is wrong_schedule","parent":2},{"text":"Admin","icon_menu":"profile-1","controller":"admin","parent":3},{"text":"Menu","icon_menu":"puzzle","controller":"menu","parent":3},{"text":"Group","icon_menu":"users","controller":"group","parent":3},{"text":"Icon","icon_menu":"medical","controller":"icon","parent":3},{"text":"Role","icon_menu":"web","controller":"role","parent":3},{"text":"FAQ","icon_menu":"questions-circular-button","controller":"faq","parent":3},{"text":"Contact","icon_menu":"support","controller":"contact","parent":3}]';
		$p 		= json_decode($Varparent);
		$c 		= json_decode($Varchild);

		pre($p);
		pre($c);
		foreach ($p as $parent) {
			// pre($parent);
			foreach ($c as $child) {
				if ($child->parent==$parent->menu_id) {
					// echo $parent->menu_sub_menu;
					$parent->menu_sub_menu[] = $child;
					$parent->menu_controllers[] = $child->controller;
					// $data['menu_sub_menu'][] = $child;
					// $data['menu_controllers'][] = $child->controller;
				}
				
			}
			$obj_parent[] = $parent;
		}
		// pre($data,1);
		// pre($obj_parent,1);
	}
	public function action_edit($id){
		$post   = $this->input->post();
		// pre($post);
		$parent	= json_decode($post['parent']);
		$child	= json_decode($post['child']);
		$param_role = $post['param_role'];
		// pre($post,1);

		$this->form_validation->set_rules('role', 'Role', 'callback_group_check['.$param_role.']');
        if ( $this->form_validation->run( $this ) )
        {
        	// pre($parent);
        	// pre($child);
        	// $obj_parent = [];
			foreach ($parent as $key => $value) {
				foreach ($child as $key2 => $value2) {
					if ($value2->parent == $value->menu_id) {
						// array_push($value->menu_sub_menu,'1');
						// array_push($value->menu_controllers,'2');
						$value->menu_sub_menu[] = $value2;
						$value->menu_controllers[] = $value2->controller;
						// pre($value2);
					}
				};
				// array_push($obj_parent,$value);
				$obj_parent[] = $value;
			};
			// pre($obj_parent,1);
			$ses 					   = $this->session->userdata('homed_session');
			$data['group_nama'] 	   = $post['nama_group'];
			$data['group_role_id']     = $post['role'];
			$data['group_deskripsi']   = $post['deskripsi'];
			$data['group_controller']  = $post['controller'];
			$data['group_data']		   = json_encode($obj_parent);
			$data['group_ip_temp']	   = getUserIP();
			$data['group_status']	   = '1';
			$data['group_updatedby']   = $ses->user_id;;
			$data['group_lastupdate'] = date('Y-m-d H:i:s');

			$insert = $this->m_global->update($this->table_db, $data, ['md5(group_id)' => $id]);

			if ($insert) {
				$end['status']  = 1;
				$end['message'] = 'Successfully';
			} else {
				$end['status']  = 0;
				$end['message'] = 'failed';
			}

			echo json_encode( $end );
		}
	}

	function show_edit($id){
		$data['id']        = $id;
		$data['pagetitle'] = 'Edit Group';
		$data['subtitle']  = NULL;
		$data['breadcumb'] = ['index' => base_url("group"), 'Group' => null, 'Form Edit' => base_url('group/show_edit/'.$id)];
		
		// get data group
		$join   		 = [['role','group_role_id = role_id','left']];
		$select 		 = 'group_id,group_nama,role_id,role_nama,group_deskripsi,group_data' ;
		$data['records'] = $this->m_global->get($this->table_db, $join, ['md5(group_id)' => $id],$select)[0];
		$data['menu']      = $this->m_global->get('config_menu');
		// pre($data['records'],1);

		$this->template->display('group/group_edit', $data);
	}

	public function change_status($id,$status = null){
		if ($status == 1) {
			$data['group_status'] = '0';
		} else {
			$data['group_status'] = '1';
		}
		
		$result = $this->m_global->update($this->table_db, $data, ['md5(group_id)' => $id]);

		if ( $result ){
            $end['status']  = 1;
            $end['message'] = 'Successfully';
        } else {
            $end['status']  = 0;
            $end['message'] = 'Failed';
		}
		
        echo json_encode( $end );
	}

	function test(){
		$data = $this->m_global->get('config_menu');
		$temp = '';

		foreach ($data as $value) {
			if(empty($value->menu_sub_menu)){
				$temp[] = $value->menu_nama;
			}else{
				$temp[] = ['text' => $value->menu_nama, 'children' => json_decode($value->menu_sub_menu)];
			}
		}

		return json_encode($temp);
	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table_db,['md5(group_id)' => $id]);
		if ( $delete ){
			$data['status']  = 1;
			$data['message'] = 'Successfully';
		} else {
			$data['status']  = 0;
			$data['message'] = 'Failed';
		}
		echo json_encode( $data );
	}

	public function group_check($role_id, $param=null){
	    $cek = $this->m_global->get('user_group', NULL, ['group_role_id' => $role_id], 'group_role_id');
		if ($param) {
			if (empty($cek)){            
	            return TRUE;
			}else{
				if ($param == $cek[0]->group_role_id) {
					return TRUE;
				}else{
					$data['status']     = 0;
		            $data['message']    = 'Role sudah dipakai';

		            echo json_encode( $data );      
		            return FALSE;
				}
			}
		} else {
	        if (empty($cek)){            
	            return TRUE;
	        }else{
	            $data['status']     = 0;
	            $data['message']    = 'Role sudah dipakai';

	            echo json_encode( $data );      
	            return FALSE;
	        }			
		}
		
    }
}