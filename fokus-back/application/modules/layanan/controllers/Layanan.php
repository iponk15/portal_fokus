<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	private $prefix         = 'layanan_';
	private $table_db       = 'layanan';
	private $url            = 'layanan';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['pagetitle'] = 'Layanan';
		$data['subtitle']  = 'Daftar Data Layanan';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url("layanan"), 'Layanan' => null];
		
		$this->template->display('layanan', $data);
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
                    $where_e = '(layanan_nama like "%'.$param.'%" OR layanan_harga like "%'.$param.'%" OR layanan_keterangan like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = null;
        $where           = null;
        $select          = 'layanan_id, layanan_nama, layanan_harga, layanan_status, layanan_keterangan';
        $data['total']   = $this->m_global->count($this->table_db, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_db, $join, $where, $select, $where_e, null, $awal, $limit);
        $data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
            	'no' 	 	         => $i++,
                'layanan_nama'  	 => $value->layanan_nama,
                'layanan_harga'  	 => "Rp " . number_format($value->layanan_harga,2,',','.'),
                'layanan_keterangan' => (!empty($value->layanan_keterangan) ? $value->layanan_keterangan : ' - ' ),
                'layanan_status' 	 => ($value->layanan_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--danger m-badge--wide">Inactive</span></span>' ),
                'action' 	         => '<a href="'.base_url('layanan/change_status/'.md5($value->layanan_id).'/'.$value->layanan_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
											<i class="la la-eye"></i>
										</a>
										<a href="'.base_url('layanan/show_edit/'.md5($value->layanan_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="'.base_url('layanan/delete/'.md5($value->layanan_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
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
		$data['pagetitle'] = 'Tambah Layanan';
		$data['subtitle']  = "Tambah Data Layanan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$data['url']	   = 'layanan';
		$data['breadcumb'] = ['index' => base_url("layanan"), 'Layanan' => null, 'Form Tambah' => base_url('layanan/show_add')];

		$this->template->display('layanan/layanan_add', $data);
	}

	function show_edit($id){
		$data['id']        	= $id;
		$data['pagetitle'] 	= 'Edit Layanan';
		$data['subtitle']  	= NULL;
		$data['url']	   	= 'layanan';
		$data['breadcumb'] 	= ['index' => base_url("layanan"), 'Layanan' => null, 'Form Edit' => base_url('layanan/show_edit/'.$id)];
		$data['records']	= $this->m_global->get($this->table_db, null, ['md5(layanan_id)' => $id], 'layanan_nama,layanan_harga,layanan_keterangan')[0];

		$this->template->display('layanan/layanan_edit', $data);
	}

	public function action_add(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('layanan_nama', 'Nama Layanan', 'trim|required');
		$this->form_validation->set_rules('layanan_harga', 'Harga Layanan', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$data['layanan_nama']		 = $post['layanan_nama'];
			$data['layanan_harga']		 = $post['layanan_harga'];
			$data['layanan_keterangan']  = $post['layanan_keterangan'];
			$data['layanan_createdby']	 = $this->session->userdata('homed_session')->user_id;
			$data['layanan_createddate'] = date('Y-m-d');
			$insert 				     = $this->m_global->insert($this->table_db, $data);

			if ($insert) {
				$end['status']  = 1;
				$end['message'] = 'Successfully';
			} else {
				$end['status']  = 0;
				$end['message'] = 'failed';
			}

		} else {
			$end['status']  = 0;
			$end['message'] = 'failed';
		}

		echo json_encode( $end );
	}

	public function action_edit($id){
		$post = $this->input->post();

		$this->form_validation->set_rules('layanan_nama', 'Nama Layanan', 'trim|required');
		$this->form_validation->set_rules('layanan_harga', 'Harga Layanan', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$data['layanan_nama']		= $post['layanan_nama'];
			$data['layanan_harga']		= $post['layanan_harga'];
			$data['layanan_keterangan'] = $post['layanan_keterangan'];
			$data['layanan_udpatedby']	= $this->session->userdata('homed_session')->user_id;
			$update 				    = $this->m_global->update($this->table_db, $data, ['md5(layanan_id)' => $id]);

			if ($update) {
				$end['status']  = 1;
				$end['message'] = 'Successfully';
			} else {
				$end['status']  = 0;
				$end['message'] = 'failed';
			}

		} else {
			$end['status']  = 0;
			$end['message'] = 'failed';
		}

		echo json_encode( $end );
	}

	public function change_status($id,$status = null){
		if ($status == 1) {
			$data['layanan_status'] = '0';
		} else {
			$data['layanan_status'] = '1';
		}
		
		$result = $this->m_global->update($this->table_db, $data, ['md5(layanan_id)' => $id]);

		if ( $result ){
            $end['status']  = 1;
            $end['message'] = 'Successfully';
        } else {
            $end['status']  = 0;
            $end['message'] = 'Failed';
		}
		
        echo json_encode( $end );
	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table_db,['md5(layanan_id)' => $id]);
		if ( $delete ){
			$data['status']  = 1;
			$data['message'] = 'Successfully';
		} else {
			$data['status']  = 0;
			$data['message'] = 'Failed';
		}
		echo json_encode( $data );
	}

}

/* End of file Layanan.php */
/* Location: ./application/modules/layanan/controllers/Layanan.php */