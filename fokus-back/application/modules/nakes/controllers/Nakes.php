<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nakes extends CI_Controller {

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031	
 	*/

	private $prefix         = 'user_';
	private $table         	= 'user';
	private $url            = 'nakes';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index(){
		$data['pagetitle'] = 'Nakes';
		$data['subtitle']  = 'Daftar Data Nakes';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Nakes' => null];
		
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
						$where_e = '(user_nama like "%'.$param.'%" OR user_detkes_usia like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$where           = ['user_tipe' => '1'];
		$select          = 'user_id,user_nama,user_detkes_tipe,user_detkes_usia,user_detkes_waktu,user_status';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();
		$tipeNakes       = ['1'=>'Dokter','2'=>'Perawat','3'=>'Bidan','4'=>'Psikolog','5'=>'Fisioterapi','6'=>'Ahli Dalam'];
		
		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'id_content' 		=> md56($value->user_id),
				'no' 		        => $i++,
				'user_nama'         => $value->user_nama,
				'user_detkes_tipe'  => $tipeNakes[$value->user_detkes_tipe],
				'user_detkes_usia'  => $value->user_detkes_usia.' Tahun',
				'user_detkes_waktu' => $value->user_detkes_waktu,
				'user_status'       => ($value->user_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
				'action'      	    => '<a href="'.base_url($this->url.'/change_status/'.md56($value->user_id).'/'.$value->user_status).'" onClick="return f_status(1, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill change_status" title="Change Status">
											<i class="la la-eye"></i>
										</a>
										<a href="'.base_url($this->url.'/show_edit/'.md56($value->user_id)).'" data-table="disres" data-toggle="modal" class="btn-sm ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--base m-btn--base-only m-btn--pill edit_data" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="'.base_url($this->url.'/delete/'.md56($value->user_id)).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
											<i class="la la-trash"></i>
										</a>
										<button type="button" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--base m-btn--base-only m-btn--pill add_layanan" data-id="'.md56($value->user_id).'" onClick="showM(this)" title="Tambah Layanan">
											<i class="la la-plus"></i>
										</button>',
			];
		}
		
		$encode = (object)[
			'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id'], 
			'data' =>  $data['records']
		];


		echo json_encode($encode);
	}

	public function select_layanan($id)
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
        $user_detkes_layanan= $this->m_global->get($this->table,null,[md56('user_id',1) => $id],'user_detkes_layanan');
		$where_e 			= (empty($user_detkes_layanan) ? null : 'layanan_id IN ('.$user_detkes_layanan[0]->user_detkes_layanan.')');
        $join            = null;
        $where           = null;
        $select          = 'layanan_id, layanan_nama, layanan_harga, layanan_status, layanan_keterangan';
        $data['total']   = $this->m_global->count('layanan', $join, $where, $where_e);
        $result          = $this->m_global->get('layanan', $join, $where, $select, $where_e, null, $awal, $limit);
        $data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
            	'no' 	 	         => $i++,
                'layanan_nama'  	 => $value->layanan_nama,
                'layanan_harga'  	 => "Rp " . number_format($value->layanan_harga,2,',','.'),
                'layanan_keterangan' => (!empty($value->layanan_keterangan) ? $value->layanan_keterangan : ' - ' ),
                'action' 	         => '
										<a href="'.base_url($this->url.'/delete_layanan/'.$id.'/'.$value->layanan_id).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
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

	function delete_layanan($id_user, $id_layanan){
		// pre($id_layanan,1);
		$getData 	= $this->m_global->get($this->table, null, [md56('user_id',1) => $id_user], 'user_detkes_layanan');
		$exp 		= explode(',', $getData[0]->user_detkes_layanan);
		$arrKey 	= array_search($id_layanan,$exp);
		unset($exp[$arrKey]);
		$dataupd['user_detkes_layanan']	= implode(',', $exp);
		$update = $this->m_global->update($this->table,$dataupd,[md56('user_id',1) => $id_user]);
		if ( $update ){
			$data['status']  = 1;
			$data['message'] = 'Successfully';
		} else {
			$data['status']  = 0;
			$data['message'] = 'Failed';
		}
		echo json_encode( $data );
	}

	function show_add(){
		$data['pagetitle'] = 'Form Tambah';
		$data['subtitle']  = 'Tambah Data Nakes';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Nakes' => null, 'Form Add' => base_url($this->url.'/show_add')];

		$this->template->display($this->url.'_add', $data);	
	}

	function show_edit($id){
		$data['pagetitle']  = 'Form Ubah';
		$data['subtitle']   = 'Ubah Data Nakes';
		$data['user_id']    = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Nakes' => null, 'Form Edit' => base_url($this->url.'/show_edit/'.$id)];
		
		$select 		 = 'user_nama,user_detkes_tipe,user_detkes_usia,user_detkes_waktu,user_detkes_pendidikan,user_detkes_keahlian,user_detkes_lokasi,user_detkes_pengalaman';
		$data['records'] = $this->m_global->get($this->table, null, [md56('user_id',1) => $id],$select)[0];

		$this->template->display($this->url.'_edit', $data);	
	}

	public function action_add(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('user_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('user_detkes_pendidikan', 'Pendidikan', 'trim|required');
		$this->form_validation->set_rules('user_detkes_keahlian', 'Keahlian Khusus', 'trim|required');
		$this->form_validation->set_rules('user_detkes_usia', 'Usia', 'trim|required');
		$this->form_validation->set_rules('user_detkes_tipe', 'Tipe Nakes', 'trim|required');
		$this->form_validation->set_rules('user_detkes_lokasi', 'Lokasi Praktek', 'trim|required');
		$this->form_validation->set_rules('user_detkes_pengalaman', 'Pengalaman', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$data['user_nama']              = $post['user_nama'];
			$data['user_detkes_pendidikan'] = $post['user_detkes_pendidikan'];
			$data['user_detkes_keahlian']    = $post['user_detkes_keahlian'];
			$data['user_detkes_usia']       = $post['user_detkes_usia'];
			$data['user_detkes_waktu']      = $post['awal'].' - '.$post['akhir'];
			$data['user_detkes_tipe']       = $post['user_detkes_tipe'];
			$data['user_detkes_lokasi']     = $post['user_detkes_lokasi'];
			$data['user_detkes_pengalaman'] = $post['user_detkes_pengalaman'];
			$data['user_tipe']				= '1';
			$data['user_createdby']         = $this->session->userdata('homed_session')->user_id;
			$data['user_createddate']       = date('Y-m-d H:i:s');
			$data['user_ip_temp']           = getUserIP();
			$insert 					    = $this->m_global->insert($this->table,$data);

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

		$this->form_validation->set_rules('user_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('user_detkes_pendidikan', 'Pendidikan', 'trim|required');
		$this->form_validation->set_rules('user_detkes_keahlian', 'Keahlian Khusus', 'trim|required');
		$this->form_validation->set_rules('user_detkes_usia', 'Usia', 'trim|required');
		$this->form_validation->set_rules('user_detkes_tipe', 'Tipe Nakes', 'trim|required');
		$this->form_validation->set_rules('user_detkes_lokasi', 'Lokasi Praktek', 'trim|required');
		$this->form_validation->set_rules('user_detkes_pengalaman', 'Pengalaman', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		
			$data['user_nama']              = $post['user_nama'];
			$data['user_detkes_pendidikan'] = $post['user_detkes_pendidikan'];
			$data['user_detkes_keahlian']   = $post['user_detkes_keahlian'];
			$data['user_detkes_usia']       = $post['user_detkes_usia'];
			$data['user_detkes_waktu']      = $post['awal'].' - '.$post['akhir'];
			$data['user_detkes_tipe']       = $post['user_detkes_tipe'];
			$data['user_detkes_lokasi']     = $post['user_detkes_lokasi'];
			$data['user_detkes_pengalaman'] = $post['user_detkes_pengalaman'];
			$data['user_tipe']				= '1';
			$data['user_updatedby']         = $this->session->userdata('homed_session')->user_id;
			$data['user_ip_temp']           = getUserIP();
			$update 			            = $this->m_global->update($this->table,$data,[md56('user_id',1) => $id]);

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
		$delete = $this->m_global->delete($this->table,[md56('user_id',1) => $id]);
		if ( $delete ){
			$end['status']  = 1;
			$end['message'] = 'Delete data successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Delete data failed';
		}
		echo json_encode( $end );
	}

	public function change_status($id,$status)
	{
		if ($status == 1) {
			$data['user_status'] = '0';
		} else {
			$data['user_status'] = '1';
		}
		
		$update = $this->m_global->update($this->table, $data, [md56('user_id',1) => $id]);
		
		if ( $update ){
			$end['status']  = 1;
			$end['message'] = 'Successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Failed';
		}
		echo json_encode( $end );
	}

	public function getLayanan(){
		$post			  	= $this->input->post();
		$data['nakes_id'] 	= $post['nakes_id'];
		$data['title'] 		= 'Daftar Layanan';
		$data['url']	  	= 'nakes';
		$user_detkes_layanan= $this->m_global->get($this->table,null,[md56('user_id',1) => $post['nakes_id']],'user_detkes_layanan')[0]->user_detkes_layanan;
		$where_e 			= (empty($user_detkes_layanan) ? null : 'layanan_id NOT IN ('.$user_detkes_layanan.')');
		$data['records']  	= $this->m_global->get('layanan',null,['layanan_status' => '1'],'layanan_nama,layanan_harga,layanan_keterangan,layanan_id', $where_e);
		$this->load->view('nakes_layanan', $data);
	}

	public function add_layanan($id)
	{
		$post		= $this->input->post();
		$idt 		= json_decode($post['idt']);
		if (!empty($idt)) {			
			$user_detkes_layanan= $this->m_global->get($this->table,null,[md56('user_id',1) => $id],'user_detkes_layanan')[0]->user_detkes_layanan;
			$usrLayanan 	= (empty($user_detkes_layanan) ? '' : $user_detkes_layanan.',');
			$idt 	= implode(',', $idt);

			$datains['user_detkes_layanan']		= $usrLayanan.$idt;
			$update 	= $this->m_global->update($this->table,$datains,[md56('user_id',1) => $id]);

			if($update){
				$data['status']  = 1;
				$data['message'] = 'Update data successfully';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Update data failed';	
			}
		}else{
			$data['status']  = 1;
			$data['message'] = 'Update data successfully';
		}

		echo json_encode($data);
	}
}

/* End of file base.php */
/* Location: ./application/modules/base/controllers/base.php */