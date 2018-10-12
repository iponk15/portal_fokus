<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	private $prefix         = 'tag_';
	private $table         	= 'fokus_tag';
	private $url            = 'tag';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index()
	{
		$data['pagetitle'] = 'Tag';
		$data['subtitle']  = 'Daftar Data Tag';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Tag' => null];
		
		$this->template->display($this->url, $data);
	}

	function get_data(){
		$join    = null;
		$where   = null;
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
						$where_e = '(tag_nama like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$select          = 'tag_id,tag_nama';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no'	   => $i++,
				'tag_nama' => $value->tag_nama,
			    'action'   => ' <a href="'.base_url($this->url.'/delete/'.md56($value->tag_id)).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
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

	public function delete($id){
		$delete = $this->m_global->delete($this->table,[md56('tag_id',1) => $id]);
		if ( $delete ){
			$end['status']  = 1;
			$end['message'] = 'Delete data successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Delete data failed';
		}
		echo json_encode( $end );
	}
}

/* End of file Kategori.php */
/* Location: ./application/modules/Kategori/controllers/Kategori.php */