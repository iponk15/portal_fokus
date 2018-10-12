<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	private $prefix         = 'kategori_';
	private $table         	= 'fokus_kategori';
	private $url            = 'kategori';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index()
	{
		$data['pagetitle'] = 'Kategori';
		$data['subtitle']  = 'Daftar Data Kategori';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Kategori' => null];
		
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
						$where_e = '(kategori_nama like "%'.$param.'%" OR kategori_deskripsi like "%'.$param.'%") OR kategori_kode like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$select          = 'kategori_id,kategori_kode,kategori_nama,kategori_deskripsi,kategori_status';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no'		         => $i++,
				'kategori_kode'      => $value->kategori_kode,
				'kategori_nama'      => $value->kategori_nama,
				'kategori_deskripsi' => $value->kategori_deskripsi,
				'kategori_status'    => ($value->kategori_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
				'action'             => '<a href="'.base_url($this->url.'/change_status/'.md56($value->kategori_id).'/'.$value->kategori_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
											<i class="la la-eye"></i>
										</a>
										<a href="'.base_url($this->url.'/tampil_ubah/'.md56($value->kategori_id)).'" data-table="disres" data-toggle="modal" class="btn-sm ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--base m-btn--base-only m-btn--pill edit_data" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="'.base_url($this->url.'/delete/'.md56($value->kategori_id)).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
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

	function tampil_tambah(){
		$data['pagetitle'] = 'Form Tambah';
		$data['subtitle']  = 'Tambah Data Kategori';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Kategori' => null, 'Form Add' => base_url($this->url.'/tampil_tambah')];

		$this->template->display($this->prefix.'tambah', $data);	
	}

	function tampil_ubah($id){
		$data['pagetitle']   = 'Form Ubah';
		$data['subtitle']    = 'Ubah Data Kategori';
		$data['kategori_id'] = $id;
		$data['url']         = $this->url;
		$data['breadcumb']   = ['index' => base_url($this->url), 'Kategori' => null, 'Form Edit' => base_url($this->url.'/tampil_ubah/'.$id)];
		$select          	 = 'kategori_nama,kategori_kode,kategori_deskripsi';
		$data['records'] 	 = $this->m_global->get($this->table, null, [md56('kategori_id',1) => $id],$select)[0];

		$this->template->display($this->prefix.'ubah', $data);	
	}

	public function aksi_tambah(){
		$post = $this->input->post();
		
		$this->form_validation->set_rules('kategori_kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('kategori_nama', 'Nama', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$cekKode = $this->m_global->count($this->table,null,[ 'kategori_kode' => $post['kategori_kode'] ]);
			
			if($cekKode == 0){
				$data['kategori_kode'] 	 	  = $post['kategori_kode'];
				$data['kategori_nama']		  = $post['kategori_nama'];
				$data['kategori_deskripsi']   = $post['kategori_deskripsi'];
				$data['kategori_createdby']   = getSession()->admin_id;
				$data['kategori_createddate'] = date('Y-m-d H:i:s');
				$data['kategori_ip']    	  = getUserIP();
				$insert 				      = $this->m_global->insert($this->table,$data);

				if($insert){
					$data['status']  = 1;
					$data['message'] = 'Insert data successfully';
				}else{
					$data['status']  = 0;
					$data['message'] = 'Insert data failed';	
				}
			}else{
				$data['status']  = 0;
				$data['message'] = 'Kategori dengan kode <b>'.$post["kategori_kode"].'</b> sudah terdaftar';
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Insert data failed';	
		}

		echo json_encode( $data ); 
	}

	public function aksi_ubah($id){
		$post = $this->input->post();

		$this->form_validation->set_rules('kategori_nama', 'Nama', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		
			$data['kategori_nama']		= $post['kategori_nama'];
			$data['kategori_deskripsi'] = $post['kategori_deskripsi'];
			$data['kategori_updatedby'] = getSession()->admin_id;
			$data['kategori_ip']    	= getUserIP();

			$update 			        = $this->m_global->update($this->table,$data,[md56('kategori_id',1) => $id]);

			if($update){
				$data['status']  = 1;
				$data['message'] = 'Ubah data berhasil';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Ubah data gagal';	
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Ubah data gagal';
		}

		echo json_encode( $data );
	}

	public function delete($id)
	{
		$delete = $this->m_global->delete($this->table,[md56('kategori_id',1) => $id]);
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
            $data['kategori_status'] = '0';
        } else {
            $data['kategori_status'] = '1';
        }
        
        $update = $this->m_global->update($this->table, $data, [md56('kategori_id',1) => $id]);
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

/* End of file Kategori.php */
/* Location: ./application/modules/Kategori/controllers/Kategori.php */