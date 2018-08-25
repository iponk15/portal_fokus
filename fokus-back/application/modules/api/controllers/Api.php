<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	private $prefix         = 'api_';
	private $table         	= 'api';
	private $url            = 'api';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index()
	{
		$data['pagetitle'] = 'API';
		$data['subtitle']  = 'Daftar Data API';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'API' => null];
		
		$this->template->display($this->url, $data);
	}

	function get_data(){
		$join    = null;
		$where_e = null;
		$paging  = $_REQUEST['pagination'];
		$search  = @$_REQUEST['query'];

		// setting pagging
		$start  = $paging['page'];
		$limit  = $paging['perpage'];
		$awal   = ($start == 1 ? '0' : ($start * $limit) - $limit );

		// setting pencarian data
		if(!empty($search)){
			foreach ($search as $value => $param) {
				if(empty($param)){
					$where   = null;
					$where_e = null;
				}else{
					if($value == 'generalSearch'){
						$where_e = '(api_nama like "%'.$param.'%" OR api_detkes_usia like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$where           = ['api_status' => '1'];
		$select          = 'api_id,api_nama,api_tipe,api_link,api_keterangan,api_status';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();
		$tipe            = ['1' => 'GET','2' => 'POST','3' => 'DELETE'];

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no'		 => $i++,
				'api_nama'   => $value->api_nama,
				'api_tipe'   => $tipe[$value->api_tipe],
				'api_link'   => $value->api_link,
				'api_status' => ($value->api_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
				'action'     => '<a href="'.base_url($this->url.'/show_edit/'.md56($value->api_id)).'" data-table="disres" data-toggle="modal" class="btn-sm ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--base m-btn--base-only m-btn--pill edit_data" title="Edit details">
									<i class="la la-edit"></i>
								</a>
								<a href="'.base_url($this->url.'/delete/'.md56($value->api_id)).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
									<i class="la la-trash"></i>
								</a>
								<button type="button" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--base m-btn--base-only m-btn--pill add_layanan" data-id="'.md56($value->api_id).'" onClick="showModal(this)" title="Preview Keterangan">
									<i class="la la-eye"></i>
								</button>',

			];
		}
		
		$encode = (object)[
			'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id'], 
			'data' =>  $data['records']
		];

		echo json_encode($encode);
	}

	function show_add(){
		$data['pagetitle'] = 'Form Tambah';
		$data['subtitle']  = 'Tambah Data API';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'API' => null, 'Form Add' => base_url($this->url.'/show_add')];

		$this->template->display($this->url.'_add', $data);	
	}

	function show_edit($id){
		$data['pagetitle']  = 'Form Ubah';
		$data['subtitle']   = 'Ubah Data API';
		$data['api_id']     = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'API' => null, 'Form Edit' => base_url($this->url.'/show_edit/'.$id)];
		$select          	= 'api_id,api_nama,api_link,api_keterangan,api_status,api_tipe';
		$data['records'] 	= $this->m_global->get($this->table, null, [md56('api_id',1) => $id],$select)[0];

		$this->template->display($this->url.'_edit', $data);	
	}

	public function action_add(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('api_type', 'Type', 'trim|required');
		$this->form_validation->set_rules('api_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('api_link', 'Link', 'trim|required');
		$this->form_validation->set_rules('api_keterangan', 'Keterangan', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$data['api_tipe'] 		= $post['api_type'];
			$data['api_nama']		= $post['api_nama'];
			$data['api_link'] 		= $post['api_link'];
			$data['api_keterangan'] = $post['api_keterangan'];
			$data['api_status']		= '1';
			$data['api_createdby']  = $this->session->userdata('homed_session')->user_id;
			$data['api_createddate']= date('Y-m-d H:i:s');
			$data['api_ip']    		= getUserIP();
			$insert 				= $this->m_global->insert($this->table,$data);

			if($insert){
				$data['status']  = 1;
				$data['message'] = 'Insert data successfully';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Insert data failed';	
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Insert data failed';	
		}

		echo json_encode( $data ); 
	}

	public function action_edit($id){
		$post = $this->input->post();

		$this->form_validation->set_rules('api_type', 'Type', 'trim|required');
		$this->form_validation->set_rules('api_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('api_link', 'Link', 'trim|required');
		$this->form_validation->set_rules('api_keterangan', 'Keterangan', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		
			$data['api_tipe']		= $post['api_type'];
			$data['api_nama']		= $post['api_nama'];
			$data['api_link'] 		= $post['api_link'];
			$data['api_keterangan'] = $post['api_keterangan'];
			$data['api_updateby']  = $this->session->userdata('homed_session')->user_id;
			$data['api_ip']    		= getUserIP();
			$insert 				= $this->m_global->insert($this->table,$data);
			$update 			    = $this->m_global->update($this->table,$data,[md56('api_id',1) => $id]);

			if($update){
				$data['status']  = 1;
				$data['message'] = 'Update data successfully';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Update data failed';	
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Insert data failed';
		}

		echo json_encode( $data );
	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table,[md56('api_id',1) => $id]);
		if ( $delete ){
			$end['status']  = 1;
			$end['message'] = 'Delete data successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Delete data failed';
		}
		echo json_encode( $end );
	}

	public function preview(){
		$post			  	= $this->input->post();
		$data['api_id'] 	= $post['api_id'];
		$data['title'] 		= 'Preview Keterangan';
		$data['url']	  	= 'api';
		$data['records']  	= $this->m_global->get($this->table,null,[md56('api_id',1) => $data['api_id']],'api_keterangan')[0];

		$this->load->view('api_preview', $data);
	}

	function konfig_api($id=''){
		$data['pagetitle']  = 'Form Auth API';
		$data['subtitle']   = 'Data Auth API';
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'API' => null, 'Form Auth API' => base_url($this->url.'/konfig_api')];
		
		$where   = (!empty($id) ? [md56('homed_id') => $id] : null );
		$select  = 'homed_id,homed_key,homed_value';
		$records = $this->m_global->get('keys',null,$where,$select);

		if(empty($records)){
			$data['records'] = null;
		}else{
			$data['records'] = $records[0];
		}

		$this->template->display($this->url.'_konfigApi', $data);	
	}

	function aksi_auth($id=''){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('homed_key', 'Nama Key', 'trim|required');
		$this->form_validation->set_rules('homed_value', 'Keys', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		
			$data['homed_key']   = $post['homed_key'];
			$data['homed_value'] = $post['homed_value'];
			$aksi 			     = (empty($id) ? $this->m_global->insert('keys',$data) : $this->m_global->update('keys',$data,[md56('homed_id',1) => $id]) );

			if($aksi){
				$data['status']  = 1;
				$data['message'] = 'Update data successfully';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Update data failed';	
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Insert data failed';
		}

		echo json_encode( $data );
	}

}

/* End of file Api.php */
/* Location: ./application/modules/api/controllers/Api.php */