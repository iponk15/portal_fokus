<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	/**
		Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031	
 	*/

	private $prefix         = 'user_';
	private $table         	= 'user';
	private $url            = 'pasien';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index(){
		$data['pagetitle'] = 'Pasien';
		$data['subtitle']  = 'Daftar Data Pasien';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Pasien' => null];
		
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
						$where_e = '(user_nama like "%'.$param.'%" OR user_email like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$where           = ['user_tipe' => '0'];
		$select          = 'user_id,user_nama,user_email,user_nohp,user_temlahir,user_tgllahir,user_detkes_usia,user_jenmin,user_status';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();
		$gender          = ['0'=>'Pria','1'=>'Wanita'];
		
		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'id_content'       => md56($value->user_id),
				'no' 		       => $i++,
				'user_nama'        => $value->user_nama,
				'user_email'       => $value->user_email,
				'user_nohp'  	   => $value->user_nohp,
				'user_tmptglhr'    => $value->user_temlahir.',&nbsp;'.date('d F Y',strtotime($value->user_tgllahir)),
				'user_jenmin'  	   => $gender[$value->user_jenmin],
				'user_detkes_usia' => $value->user_detkes_usia.' Tahun',
				'user_status'      => ($value->user_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
				'action'      	   => '<a href="'.base_url($this->url.'/change_status/'.md56($value->user_id).'/'.$value->user_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill change_status btn-sm" title="Change Status">
											<i class="la la-eye"></i>
										</a>
										<a href="'.base_url($this->url.'/show_edit/'.md56($value->user_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--base m-btn--base-only m-btn--pill edit_data btn-sm" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="'.base_url($this->url.'/delete/'.md56($value->user_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill btn-sm" title="Delete">
											<i class="la la-trash"></i>
										</a>
										<a href="'.base_url($this->url.'/tambah_alamat/'.md56($value->user_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-success m-btn--base m-btn--base-only m-btn--pill edit_data btn-sm" title="Tambah Alamat">
											<i class="la la-plus"></i>
										</a>',
			];
		}
		
		$encode = (object)[
			'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id'], 
			'data' =>  $data['records']
		];


		echo json_encode($encode);
	}

	public function get_relasi($id){
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
                    // $where_e = '(kategori like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = null;
        $where           = [md56('detsen_userid',1) => $id];
        $select          = 'detsen_id,detsen_judul,detsen_alamat,detsen_kotaprov,detsen_kodepos,detsen_koordinat_long,detsen_koordinat_lat,detsen_status';
        $data['total']   = $this->m_global->count('detail_pasien', $join, $where, $where_e);
        $result          = $this->m_global->get('detail_pasien', $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
                'no'               		=>  $i++,
                'detsen_judul'    		=>  $value->detsen_judul,
                'detsen_alamat'    		=>  $value->detsen_alamat,
                'detsen_kotaprov'    	=>  $value->detsen_kotaprov,
                'detsen_kodepos'    	=>  $value->detsen_kodepos,
                'detsen_koordinat_long' =>  $value->detsen_koordinat_long,
				'detsen_koordinat_lat'  =>  $value->detsen_koordinat_lat,
				'detsen_status'    		=> ($value->detsen_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
                'action'           		=>  '<a href="'.base_url($this->url.'/ubah_status/'.md56($value->detsen_id).'/'.$value->detsen_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill change_status btn-sm" title="Change Status">
												<i class="la la-eye"></i>
											</a>
											<a href="'.base_url($this->url.'/ubah_alamat/'.md56($value->detsen_id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Ubah Pertanyaan">
												<i class="la la-edit"></i>
											</a>
											<a href="'.base_url($this->url.'/hapus_alamat/'.md56($value->detsen_id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Data">
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

	function show_add(){
		$data['pagetitle'] = 'Form Tambah';
		$data['subtitle']  = 'Tambah Data Pasien';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Pasien' => null, 'Form Input' => base_url($this->url.'/show_add')];

		$this->template->display($this->url.'_add', $data);	
	}

	function show_edit($id){
		$data['pagetitle']  = 'Form Ubah';
		$data['subtitle']   = 'Ubah Data Pasien';
		$data['user_id']    = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Pasien' => null, 'Form Input' => base_url($this->url.'/show_edit/'.$id)];
		
		$select 		 = 'user_nama,user_email,user_nohp,user_temlahir,user_tgllahir,user_detkes_usia,user_jenmin,';
		$data['records'] = $this->m_global->get($this->table, null, [md56('user_id',1) => $id],$select)[0];

		$this->template->display($this->url.'_edit', $data);	
	}

	function tambah_alamat($id){
		$data['pagetitle']  = 'Form Tambah Alamat';
		$data['subtitle']   = 'Tambah Data Alamat';
		$data['user_id']    = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Alamat Pasien' => null, 'Form Input' => base_url($this->url.'/tambah_alamat/'.$id)];
		$data['records']    = $this->m_global->get('user',null,[md56('user_id',1) => $id],'user_id')[0]->user_id;

		$this->template->display($this->url.'_add_alamat', $data);	
	}

	function ubah_alamat($id){
		$data['pagetitle']  = 'Form Ubah Alamat';
		$data['subtitle']   = 'Ubah Data Alamat';
		$data['detsen_id']  = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Alamat Pasien' => null, 'Form Input' => base_url($this->url.'/ubah_alamat/'.$id)];
		
		$select 		 = 'detsen_judul,detsen_alamat,detsen_kotaprov,detsen_kodepos,detsen_koordinat_long,detsen_koordinat_lat,detsen_status';
		$data['records'] = $this->m_global->get('detail_pasien', null, [md56('detsen_id',1) => $id],$select)[0];

		$this->template->display($this->url.'_ubah_alamat', $data);	
	}

	public function action_add(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('user_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_jenmin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('user_temlahir', 'Tempat & Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('user_tgllahir', 'Tempat & Tanggal Lahir', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$data['user_nama']            = $post['user_nama'];
			$data['user_email'] 	      = $post['user_email'];
			$data['user_jenmin']          = $post['user_jenmin'];
			$data['user_temlahir']        = $post['user_temlahir'];
			$data['user_tgllahir']        = date('Y-m-d',strtotime($post['user_tgllahir']));
			$data['user_detkes_usia']     = $post['user_detkes_usia'];
			$data['user_nohp']            = $post['user_nohp'];
			$data['user_tipe']			  = '0';
			$data['user_createdby']       = $this->session->userdata('homed_session')->user_id;
			$data['user_createddate']     = date('Y-m-d H:i:s');
			$data['user_ip_temp']         = getUserIP();
			$insert 					  = $this->m_global->insert($this->table,$data);

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
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('user_jenmin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('user_temlahir', 'Tempat & Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('user_tgllahir', 'Tempat & Tanggal Lahir', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		
			$data['user_nama']            = $post['user_nama'];
			$data['user_email'] 	      = $post['user_email'];
			$data['user_jenmin']          = $post['user_jenmin'];
			$data['user_temlahir']        = $post['user_temlahir'];
			$data['user_tgllahir']        = date('Y-m-d',strtotime($post['user_tgllahir']));
			$data['user_detkes_usia']     = $post['user_detkes_usia'];
			$data['user_nohp']            = $post['user_nohp'];
			$data['user_tipe']			  = '0';
			$data['user_updatedby']       = $this->session->userdata('homed_session')->user_id;
			$data['user_ip_temp']         = getUserIP();
			$update 			          = $this->m_global->update($this->table,$data,[md56('user_id',1) => $id]);

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

	public function action_alamat(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('detsen_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('detsen_koordinat_long', 'Koordinat Long', 'trim|required');
		$this->form_validation->set_rules('detsen_kotaprov', 'Kota & Provinsi', 'trim|required');
		$this->form_validation->set_rules('detsen_koordinat_lat', 'Koordinat Lat', 'trim|required');
		$this->form_validation->set_rules('detsen_kodepos', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('detsen_alamat', 'Alamat', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$data['detsen_userid']    	   = $post['user_id'];
			$data['detsen_judul']          = $post['detsen_judul'];
			$data['detsen_koordinat_long'] = $post['detsen_koordinat_long'];
			$data['detsen_kotaprov']       = $post['detsen_kotaprov'];
			$data['detsen_koordinat_lat']  = $post['detsen_koordinat_lat'];
			$data['detsen_kodepos']        = $post['detsen_kodepos'];
			$data['detsen_alamat'] 	       = $post['detsen_alamat'];
			$insert 		               = $this->m_global->insert('detail_pasien',$data);

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

	public function aksi_ubah_alamat($id){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('detsen_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('detsen_koordinat_long', 'Koordinat Long', 'trim|required');
		$this->form_validation->set_rules('detsen_kotaprov', 'Kota & Provinsi', 'trim|required');
		$this->form_validation->set_rules('detsen_koordinat_lat', 'Koordinat Lat', 'trim|required');
		$this->form_validation->set_rules('detsen_kodepos', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('detsen_alamat', 'Alamat', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$data['detsen_judul']          = $post['detsen_judul'];
			$data['detsen_koordinat_long'] = $post['detsen_koordinat_long'];
			$data['detsen_kotaprov']       = $post['detsen_kotaprov'];
			$data['detsen_koordinat_lat']  = $post['detsen_koordinat_lat'];
			$data['detsen_kodepos']        = $post['detsen_kodepos'];
			$data['detsen_alamat'] 	       = $post['detsen_alamat'];
			$update 		               = $this->m_global->update('detail_pasien',$data,[md56('detsen_id',1) => $id]);

			if($update){
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

	public function delete($id){
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

	public function hapus_alamat($id){
		$delete = $this->m_global->delete('detail_pasien',[md56('detsen_id',1) => $id]);
		if ( $delete ){
			$end['status']  = 1;
			$end['message'] = 'Delete data successfully';
		} else {
			$end['status']  = 0;
			$end['message'] = 'Delete data failed';
		}
		echo json_encode( $end );
	}

	public function change_status($id,$status){
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

	public function ubah_status($id,$status){
		if ($status == 1) {
			$data['user_status'] = '0';
		} else {
			$data['user_status'] = '1';
		}
		
		$update = $this->m_global->update('detail_pasien', $data, [md56('detsen_id',1) => $id]);
		
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

/* End of file base.php */
/* Location: ./application/modules/base/controllers/base.php */