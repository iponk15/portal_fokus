<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Icon extends CI_Controller {
	private $prefix         = 'icon_';
	private $table         	= 'fokus_icon';
	private $url            = 'icon';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index(){
		$data['pagetitle'] = 'Icon';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url("icon"), 'Icon' => null];
		
		$this->template->display('icon', $data);
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
					$where_e = '(icon_icon like "%'.$param.'%")';
				}else{
					$where[$value] = $param;
				}
			}

			// $awal = null;
		}

		// set record data
		$select          = '*';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();
		// pre('lastdb');

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no' 		       	=> 	$i++,
				'icon_icon'  	   	=>  $value->icon_icon,
				'icon_tipe'  		=>  ($value->icon_tipe  == '1' ? 'Flaticon' : 'Fa' ),
				'icon_preview'  	=>  ($value->icon_tipe  == '1' ? '<span class="fa flaticon-'.$value->icon_icon.'"></span>' : '<span style="width: 110px;"><span class="m-badge m-badge--'.state_color($value->icon_color).' m-badge--dot"></span>&nbsp;<span class="fa fa-'.$value->icon_icon.'"></span></span>' ),
				'icon_status'      	=>  ($value->icon_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
				'action'           	=>  '<a href="'.base_url($this->url.'/change_status/'.md5($value->icon_id).'/'.$value->icon_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
				<i class="la la-eye"></i>
				</a>
				<a href="'.base_url($this->url.'/show_edit/'.md5($value->icon_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
				<i class="la la-edit"></i>
				</a>
				<a href="'.base_url($this->url.'/delete/'.md5($value->icon_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
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
		$data['pagetitle'] = 'Form Tambah Icon';
		$data['subtitle']  = '';
		$data['breadcumb'] = ['index' => base_url("icon"), 'Icon' => null, 'Form Add' => base_url('icon/show_add')];

		$this->template->display($this->prefix.'tambah', $data);	
	}

	function show_edit($id){
		$data['pagetitle'] = 'Form Edit Icon';

		$data['breadcumb'] = ['index' => base_url("icon"), 'Icon' => null, 'Form Edit' => base_url('icon/show_edit/'.$id)];
		$data['records'] = $this->m_global->get($this->table, null, ["md5(icon_id)" => $id])[0];
		$this->template->display($this->prefix.'edit', $data);	
	}

	public function action_add(){
		$post 	      = $this->input->post();
		$icon_tipe 	  = $post['icon_tipe'];
		$icon_icon[]  = $post['icon_icon'];
		$icon_color[] = ($icon_tipe == '1' ? NULL : $post['icon_color']);
		$jml_submit   = count($icon_icon[0]);
		$object       = [];
		$c_icon 	  = array();
		$array2		  = array();

		

		for ($i=0; $i < count($post['icon_icon']) ; $i++) {
			$icon_icon 	= ($post['icon_icon'][$i] == '' ? array_push($c_icon, '1') : '');
		}


		if (!empty($c_icon)) {
			$end['status']  = 0;
			$end['message'] = 'Tolong isi semua kolom';
		} else {
			for ($i=0; $i < count($post['icon_icon']); $i++) { 
				$array1		  = array();
				array_push($array1, $post['icon_icon'][$i]);
				array_push($array1, @$post['icon_color'][$i]);
				array_push($array2, $array1);
			}

		// VALIDASI INPUT ICON
			for ($i=0; $i < count($post['icon_icon']) ; $i++) {
				if ($icon_tipe == '1') {
					$s_icon = array_search($post['icon_icon'][$i] ,$icon_icon[0]);
					if ($i == $s_icon) {
						$cek_icon 	= $this->m_global->get($this->table, NULL, ['icon_icon' => $post['icon_icon'][$i], 'icon_tipe' => $post['icon_tipe'] ], 'icon_id');
						if (!empty($cek_icon)) {
							$end['status']  = 0;
							$end['message'] = $post['icon_icon'][$i].' Sudah ada di database';
							echo json_encode($end);
							exit();
						}
					} else {
						$end['status']  = 0;
						$end['message'] = $post['icon_icon'][$i].' sama dengan inputan lain';
						echo json_encode($end);
						exit();
					}

				} else {
					$array3 = array();

					foreach ($array2 as $key => $value) {
						$array3[$value['0']][] = $value['1'];
					}


					foreach ($array3 as $key => $value) {

						$count_a = array_count_values($value);

						foreach ($count_a as $key2 => $value2) {

							if ($value2 > 1) {
								$end['status']  = 0;
								$end['message'] = 'Inputan '.$key.' ada warna yang sama';
								echo json_encode($end);
								exit();
							}
						}
					}


					$cek_icon 	= $this->m_global->get($this->table, NULL, ['icon_icon' => $post['icon_icon'][$i], 'icon_color' => $post['icon_color'][$i] ], 'icon_id');

					if (!empty($cek_icon)) {
						$end['status']  = 0;
						$end['message'] = $post['icon_icon'][$i].' dengan warna '.state_color($post['icon_color'][$i]).' sudah ada di database';
						echo json_encode($end);
						exit();
					}	

				}
			}

		//END VALIDASI			
			for ($i = 0; $i < $jml_submit ; $i++) { 
				$object[] = [
					'icon_tipe'   => $post['icon_tipe'],
					'icon_icon'   => $post['icon_icon'][$i],
					'icon_color'  => (empty($icon_color) ? NULL : $icon_color[0][$i]) ,
					'icon_status' => '1',
				];
			}

			$insert = $this->db->insert_batch($this->table, $object);

			if ($insert) {
				$end['status']  = 1;
				$end['message'] = 'Successfully';
			} else {
				$end['status']  = 0;
				$end['message'] = 'failed';
			}
		}		
		echo json_encode( $end );
	}

	public function action_edit($id){
		$post 		        = $this->input->post();
		$data['icon_tipe'] 	= $post['icon_tipe'];
		$data['icon_icon'] 	= $post['icon_icon'];
		$data['icon_color'] = ($post['icon_tipe'] == '1' ? NULL : $post['icon_color']);

		if ($post['icon_tipe'] == 1) {
			$cek 	= $this->m_global->get($this->table, null, ['icon_icon' => $post['icon_icon']], 'icon_id');
			
			if (!empty($cek)) {
				$cek2 = $this->m_global->get($this->table, null, ['md5(icon_id)' => $id], 'icon_id')[0];
				
				if ($cek[0]->icon_id != $cek2->icon_id) {
					$end['status']  = 0;
					$end['message'] = 'Data '.$post['icon_icon'].' sudah ada di database';
					echo json_encode( $end );
					exit();
				}
				
			}
		} else {
			$cek 	= $this->m_global->get($this->table, null, ['icon_icon' => $post['icon_icon'], 'icon_color' => $post['icon_color'] ], 'icon_id');
			
			if (!empty($cek)) {
				$cek2 = $this->m_global->get($this->table, null, ['md5(icon_id)' => $id], 'icon_id')[0];
				if ($cek[0]->icon_id != $cek2->icon_id) {
					$end['status']  = 0;
					$end['message'] = 'Data '.$post['icon_icon'].' dengan warna '.state_color($post['icon_color']).' sudah ada di database';
					echo json_encode( $end );
					exit();
				}
			}
		}
		
		$update 			= $this->m_global->update($this->table, $data, ['md5(icon_id)' => $id]);

		if ($update) {
			$end['status']  = 1;
			$end['message'] = 'Successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'failed';
		}
		
		echo json_encode( $end );
	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table,['md5(icon_id)' => $id]);
		if ( $delete ){
			$end['status']  = 1;
			$end['message'] = 'Successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Failed';
		}
		echo json_encode( $end );
	}

	public function change_status($id,$status)
	{
		if ($status == 1) {
			$data['icon_status'] = '0';
		} else {
			$data['icon_status'] = '1';
		}
		
		$update = $this->m_global->update($this->table, $data, ['md5(icon_id)' => $id]);
		if ( $update ){
			$end['status']  = 1;
			$end['message'] = 'Successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Failed';
		}
		echo json_encode( $end );
	}

}

/* End of file Icon.php */
/* Location: ./application/modules/icon/controllers/Icon.php */