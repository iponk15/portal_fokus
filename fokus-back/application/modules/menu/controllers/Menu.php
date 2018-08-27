<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	private $prefix     = 'menu';
	private $url        = 'menu';
	private $table_db   = 'fokus_menu';
	private $rule_valid = 'xss_clean|encode_php_tags';

	public function index(){
		$data['pagetitle'] = 'Menu';
		$data['subtitle']  = 'Isi semua daftar menu';
		$data['url']  	   = $this->url;
		$data['ktnTipe']   = 'Daftar Data';
		$data['breadcumb'] = ['index' => base_url("menu"), 'Menu' => null];
		
		$this->template->display('menu', $data);
	}

	function get_data(){
		$where   = null;
		$where_e = null;
		$join  	 = null;
		$paging  = $_REQUEST['pagination'];
		$search  = $_REQUEST['query'];

		// setting pagging
		$start  = $paging['page'];
		$limit  = $paging['perpage'];
		$awal   = ($start == 1 ? '0' : ($start * $limit) - $limit );

		// setting pencarian data
		if(!empty($search)){
			foreach ($search as $value => $param) {
				if($value == 'generalSearch'){
					$where_e = '(menu_nama like "%'.$param.'%" OR menu_controllers like "%'.$param.'%" OR menu_url like "%'.$param.'%" OR menu_sub_menu like "%'.$param.'%")';
				}else{
					$where = [$value => $param];
				}
			}

			$awal = null;
		}

		// set record data
		$select          = 'menu_id,menu_nama,menu_controllers,menu_is_primary,menu_status';
		$data['total']	 = $this->m_global->count($this->table_db, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table_db, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no' 		       => 	$i++,
				'menu_nama'  	   =>  $value->menu_nama,
				'menu_controllers' =>  $value->menu_controllers,
				'menu_is_primary'  =>  ($value->menu_is_primary  == '1' ? 'TRUE' : 'FALSE' ),
				'menu_status'      =>  ($value->menu_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
				'action'           =>  '<a href="'.base_url($this->url.'/change_status/'.md56($value->menu_id).'/'.$value->menu_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
				<i class="la la-eye"></i>
				</a>
				<a href="'.base_url($this->url.'/show_edit/'.md56($value->menu_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
				<i class="la la-edit"></i>
				</a>
				<a href="'.base_url($this->url.'/delete/'.md56($value->menu_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
				<i class="la la-trash"></i>
				</a>',
			];
		}
		
		$encode = (object)[
			'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id'], 
			'data' =>  $data['records']
		];


		echo json_encode($encode);
	}

	function show_add(){
		$data['pagetitle']  = 'Form Tambah Menu';
		$data['breadcumb']  = ['index' => base_url("menu"), 'Menu' => null, 'Form Add' => base_url('menu/show_add')];
		$data['is_primary'] = $this->m_global->count($this->table_db,null,['menu_is_primary' => '1']);
		
		$this->template->display('menu_tambah', $data);	
	}

	function show_edit($id){
		$data['pagetitle']  = 'Form Edit Menu';
		$data['breadcumb']  = ['index' => base_url("menu"), 'Menu' => null, 'Form edit' => base_url('menu/show_edit/'.$id)];
		$data['records']    = $this->m_global->get($this->table_db, null, [md56('menu_id',1) => $id])[0];
		$data['url']        = $this->url;
		$data['menu_id']	= $id;
		$data['is_primary'] = $this->m_global->count($this->table_db,null,['menu_is_primary' => '1']);
		
		$this->template->display('menu_edit', $data);	
	}

	public function menu_check($str){
        if($str == NULL){
            $this->form_validation->set_message('Ada yang kosong', 'Tolong isi semua form');
            return FALSE;
        }else{
            return TRUE;
        }
    }

	public function action_add()
	{
		$post 		= $this->input->post();
		$ses 		= $this->session->userdata('homed_session');
		$object 	= [];
		$object2 	= [];

		$c_menu 	= array();

		$count_order = array_count_values($post['order']);
		// pre($count_order, 1);

		$status = 'unique';
		foreach ($count_order as $key => $value) {
			if ($value > 1) {
				$status = 'duplicate';
			}
		}

		if ($status == 'duplicate') {
			echo '<script>alert("Order tidak boleh ada yang sama")</script>';
			$this->form_validation->set_message('Duplicate Input','Order tidak boleh ada yang sama');
			$text['pesan'] = 'Order tidak boleh ada yang sama'; 
			json_encode($text['pesan']);
		} else {
			if (!empty($post['title'])) {

				for ($i=0; $i < count($post['title']) ; $i++) {
					$order 				= ($post['order'][$i] == '' ? array_push($c_menu, '1') : '');
					$title 				= ($post['title'][$i] == '' ? array_push($c_menu, '1') : '');
					$icon_menu 			= ($post['icon_menu'][$i] == '' ? array_push($c_menu, '1') : '');
					$icon_menu_fa 		= ($post['icon_menu_fa'][$i] == '' ? array_push($c_menu, '1') : '');
					$ctrl_submenu 		= ($post['ctrl_submenu'][$i] == '' ? array_push($c_menu, '1') : '');
				}
				$tot_array      = count($post['title']);

				for ($i=0; $i < $tot_array; $i++) { 
					$sub_menu = array('order' => $post['order'][$i], 'text' => $post['title'][$i], 'icon_menu' => $post['icon_menu'][$i], 'icon' => $post['icon_menu_fa'][$i], 'controller' => $post['ctrl_submenu'][$i]);
					array_push($object, $sub_menu);
				}
			}

			if (!empty($c_menu)) {
				$end['status']     = 0;
				$end['message']    = 'Tolong isi semua kolom';
			} else {
				$data['menu_nama']			= $post['menu_nama'];
				$data['menu_is_primary']	= (isset($post['menu_is_primary']) ? $post['menu_is_primary'] : '0');
				$data['menu_sub_menu'] 		= ($post['menu_sub_menu'] == 1 ? json_encode($object) : NULL);
				$data['menu_url'] 			= ($post['menu_sub_menu'] == 1 ? NULL : $post['menu_ctrl']);
				$data['menu_controllers'] 	= ($post['menu_ctrl'] == '' ? json_encode($post['ctrl_submenu']) : $post['menu_ctrl']);
				$data['menu_status'] 		= '1';
				$data['menu_ip_temp'] 		= getUserIP();
				$data['menu_createddate'] 	= date('Y-m-d H:i:s');
				$data['menu_createdby'] 	= getSession()->admin_id;
				$insert 					= $this->m_global->insert($this->table_db, $data);
				
				if (!empty($post['title'])) {

					$lastid = $this->db->insert_id();
					for ($i=0; $i < $tot_array; $i++) { 
						$sub_menu = array('parent' => "".$lastid."", 'order' => $post['order'][$i], 'text' => $post['title'][$i], 'icon_menu' => $post['icon_menu'][$i], 'icon' => $post['icon_menu_fa'][$i], 'controller' => $post['ctrl_submenu'][$i]);
						array_push($object2, $sub_menu);
					}

					$upd['menu_sub_menu'] 		=  json_encode($object2);
				
					$update = $this->m_global->update($this->table_db, $upd, ['menu_id' => $lastid]);
				}
				if ($insert) {
					$end['status']     = 1;
					$end['message']    = 'Successfully';
				} else {
					$end['status']     = 0;
					$end['message']    = 'failed';
				}
			}		

			echo json_encode( $end );
		}
	}

	public function action_edit($id)
	{
		$post 	= $this->input->post();		
		$ses 	= $this->session->userdata('homed_session');
		$object 		= [];
		$c_menu 	= array();

		$count_order = array_count_values($post['order']);
		// pre($count_order, 1);

		$status = 'unique';
		foreach ($count_order as $key => $value) {
			if ($value > 1) {
				$status = 'duplicate';
			}
		}

		if ($status == 'duplicate') {
			echo '<script>alert("Order tidak boleh ada yang sama")</script>';
			$this->form_validation->set_message('Duplicate Input','Order tidak boleh ada yang sama');
			$text['pesan'] = 'Order tidak boleh ada yang sama'; 
			json_encode($text['pesan']);
		} else {
			if (!empty($post['title'])) {

				for ($i=0; $i < count($post['title']) ; $i++) {
					$order 				= ($post['order'][$i] == '' ? array_push($c_menu, '1') : '');
					$title 				= ($post['title'][$i] == '' ? array_push($c_menu, '1') : '');
					$icon_menu 			= ($post['icon_menu'][$i] == '' ? array_push($c_menu, '1') : '');
					$icon_menu_fa 		= ($post['icon_menu_fa'][$i] == '' ? array_push($c_menu, '1') : '');
					$ctrl_submenu 		= ($post['ctrl_submenu'][$i] == '' ? array_push($c_menu, '1') : '');
				}

				$tot_array      = count($post['title']);

				for ($i=0; $i < $tot_array; $i++) { 
					$sub_menu = array('parent' => "".$id."", 'order' => $post['order'][$i], 'text' => $post['title'][$i], 'icon_menu' => $post['icon_menu'][$i], 'icon' => $post['icon_menu_fa'][$i], 'controller' => $post['ctrl_submenu'][$i]);
					array_push($object, $sub_menu);
				}
			} 

			if (!empty($c_menu)) {
				$end['status']     = 0;
				$end['message']    = 'Tolong isi semua kolom';
			} else {
				$data['menu_nama']	      = $post['menu_nama'];
				$data['menu_is_primary']  = (isset($post['menu_is_primary']) ? $post['menu_is_primary'] : NULL);
				$data['menu_sub_menu'] 	  = ($post['menu_sub_menu'] == 1 ? json_encode($object) : NULL);
				$data['menu_url'] 		  = ($post['menu_sub_menu'] == 1 ? NULL : $post['menu_ctrl']);
				$data['menu_controllers'] = ($post['menu_ctrl'] == '' ? json_encode($post['ctrl_submenu']) : $post['menu_ctrl']);
				$data['menu_lastupdate']  = date('Y-m-d H:i:s');
				$data['menu_ip_temp']     = getUserIP();
				$data['menu_udpatedby']   = $ses->user_id;
				$update 				  = $this->m_global->update($this->table_db, $data, ['menu_id' => $id]);
				if ($update) {
					$end['status']     = 1;
					$end['message']    = 'Successfully';
				} else {
					$end['status']     = 0;
					$end['message']    = 'failed';
				}

			}		
		}
		


		echo json_encode( $end );

	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table_db,[md56('menu_id',1) => $id]);
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
			$data['menu_status'] = '0';
		} else {
			$data['menu_status'] = '1';
		}
		
		$update = $this->m_global->update($this->table_db, $data, [md56('menu_id',1) => $id]);
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

}

/* End of file menu.php */
/* Location: ./application/modules/menu/controllers/menu.php */