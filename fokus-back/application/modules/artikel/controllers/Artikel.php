<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	private $prefix         = 'artikel_';
	private $table         	= 'fokus_artikel';
	private $url            = 'artikel';
	private $rule_valid     = 'xss_clean|encode_php_tags';

	public function index()
	{
		$data['pagetitle'] = 'Artikel';
		$data['subtitle']  = 'Daftar Data Artikel';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Artikel' => null];
		
		$this->template->display($this->url, $data);
	}

	function get_data(){
		$join    = [['fokus_kategori','artikel_kategoriId = kategori_id','left']];
		$where   = null;
		$where_e = null;
		$paging  = $_REQUEST['pagination'];
		$search  = @$_REQUEST['query'];

		// setting pagging
		$start = $paging['page'];
		$limit = $paging['perpage'];
		$awal  = ($start == 1 ? '0' : ($start * $limit) - $limit );

		// setting pencarian data
		if(!empty($search)){
			foreach ($search as $value => $param) {
				if(empty($param)){
					$where   = null;
					$where_e = null;
				}else{
					if($value == 'generalSearch'){
						$where_e = '(artikel_judul like "%'.$param.'%" OR artikel_ringkasan like "%'.$param.'%")';
					}else{
						$where[$value] = $param;
					}
				}
			}
		}

		// set record data
		$select          = 'artikel_id,artikel_judul,artikel_ringkasan,kategori_nama,artikel_tipe,artikel_status,artikel_lastupdate';
		$data['total']	 = $this->m_global->count($this->table, $join, $where, $where_e);
		$result 		 = $this->m_global->get($this->table, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

		$i = 1 + $awal;
		foreach ($result as $key => $value) {
			$data['records'][] = [
				'no'		         => $i++,
				'artikel_judul'      => $value->artikel_judul,
				'artikel_ringkasan'  => $value->artikel_ringkasan,
				'artikel_tipe'       => $value->artikel_tipe,
				'kategori_nama' 	 => $value->kategori_nama,
				'artikel_status'     => ($value->artikel_status == '1' ? '<span><span class="m-badge  m-badge--success m-badge--wide">Active</span></span>' : '<span><span class="m-badge  m-badge--warning m-badge--wide">Inactive</span></span>' ),
				'artikel_lastupdate' => $value->artikel_lastupdate,
				'action'             => '<a href="'.base_url($this->url.'/change_status/'.md56($value->artikel_id).'/'.$value->artikel_status).'" onClick="return f_status(1, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill change_status" title="Change Status">
											<i class="la la-eye"></i>
										</a>
										<a href="'.base_url($this->url.'/show_edit/'.md56($value->artikel_id)).'" data-table="disres" data-toggle="modal" class="btn-sm ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--base m-btn--base-only m-btn--pill edit_data" title="Edit details">
											<i class="la la-edit"></i>
										</a>
										<a href="'.base_url($this->url.'/delete/'.md56($value->artikel_id)).'" onClick="return f_status(2, this, event)" class="btn-sm m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--base m-btn--base-only m-btn--pill" title="Delete">
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
		$data['pagetitle'] = 'Form Tambah';
		$data['subtitle']  = 'Tambah Data Artikel';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url($this->url), 'Artikel' => null, 'Form Add' => base_url($this->url.'/show_add')];

		$this->template->display($this->url.'_tambah', $data);	
	}

	function show_edit($id){
		$data['pagetitle']  = 'Form Ubah';
		$data['subtitle']   = 'Ubah Data Artikel';
		$data['artikel_id'] = $id;
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Artikel' => null, 'Form Edit' => base_url($this->url.'/show_edit/'.$id)];
		$select          	= 'artikel_nama,artikel_email,artikel_nohp,artikel_alamat,artikel_deskripsi,artikel_foto,artikel_sosmed';
		$data['records'] 	= $this->m_global->get($this->table, null, [md56('artikel_id',1) => $id],$select)[0];

		$this->template->display($this->url.'_rubah', $data);	
	}

	public function action_add(){
		$post = $this->input->post();
		$path = 'assets/app/media/img/Artikel/';

        $config['upload_path']    = './assets/app/media/img/Artikel/';
        $config['allowed_types']  = 'jpg|png|bmp|jpeg';
        $config['maintain_ratio'] = TRUE;
        $config['source_image']   = $_FILES['artikel_foto']['tmp_name'];
        $type 			          = explode('/',$_FILES['artikel_foto']['type']);
        $config['file_name']      = implode('_',explode(' ',$this->input->post('artikel_nama').date('His'))).".".max($type);
		
		$this->load->library('upload', $config);
		
		if ( $this->upload->do_upload('artikel_foto')){
            $image_data 		      = $this->upload->data();
            $config['image_library']  = 'gd2';
            $config['source_image']   = $image_data['full_path']; //get original image
            $config['maintain_ratio'] = FALSE;
            $config['width'] 		  = 177;
			$config['height'] 		  = 177;
			
            $this->load->library('image_lib', $config);
			
			if (!$this->image_lib->resize()) {
                $this->handle_error($this->image_lib->display_errors());
			}
		}
		
        $upload_data     = $this->upload->data();
		$image_file_name = $upload_data['file_name'];
		
		$this->form_validation->set_rules('artikel_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('artikel_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('artikel_nohp', 'Nomer HP', 'trim|required');

        if ( $this->form_validation->run( $this ) ){
			$sosmed['linkedin']  = $post['linkedin'];
			$sosmed['facebook']  = $post['facebook'];
			$sosmed['twitter']   = $post['twitter'];
			$sosmed['instagram'] = $post['instagram'];
			
			$data['artikel_foto']	     = $path.$image_file_name;
			$data['artikel_nama']		 = $post['artikel_nama'];
			$data['artikel_email'] 		 = $post['artikel_email'];
			$data['artikel_nohp'] 		 = $post['artikel_nohp'];
			$data['artikel_alamat']      = $post['artikel_alamat'];
			$data['artikel_deskripsi']   = $post['artikel_deskripsi'];
			$data['artikel_sosmed']      = json_encode($sosmed);
			$data['artikel_createdby']   = getSession()->admin_id;
			$data['artikel_createddate'] = date('Y-m-d H:i:s');
			$data['artikel_ip']    		 = getUserIP();
			
			$insert 				     = $this->m_global->insert($this->table,$data);

			if($insert){
				$data['status']  = 1;
				$data['message'] = 'Input data berhasil';
			}else{
				$data['status']  = 0;
				$data['message'] = 'Input data gagal';	
			}
		}else{
			$data['status']  = 0;
			$data['message'] = 'Koreksi inputan anda';	
		}

		echo json_encode( $data ); 
	}

	public function action_edit($id){
		$post = $this->input->post();

		if (!empty(@$_FILES['artikel_foto']['name'])) {
            $path 					  = 'assets/app/media/img/Artikel/';
            $config['upload_path']    = './assets/app/media/img/Artikel/';
            $config['allowed_types']  = 'jpg|png|bmp|jpeg';
            $config['width']          = 177;
            $config['height']         = 177;
            $config['overwrite']      = TRUE;
            $config['maintain_ratio'] = FALSE;
            $type 					  = explode('/',$_FILES['artikel_foto']['type']);
            $config['file_name']      = implode('_',explode(' ',$this->input->post('artikel_nama').date('His'))).".".max($type);
            $get_data 			      = $this->m_global->get($this->table, null, [md56('artikel_id',1) => $id],'artikel_foto');
            $link_gambar 			  = $get_data[0]->artikel_foto;

            $this->load->library('upload', $config);
            if ( $this->upload->do_upload('artikel_foto')){
                $data['artikel_foto'] = $path.$config['file_name'];
                @unlink(FCPATH . '/'.$link_gambar);
            }else{
                $data['artikel_foto'] = '';
            }

            $upload_data     = $this->upload->data();
            $image_file_name = $upload_data['file_name'];
		}

		$this->form_validation->set_rules('artikel_nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('artikel_email', 'Email', 'trim|required');
		$this->form_validation->set_rules('artikel_nohp', 'Nomer HP', 'trim|required');

		if ( $this->form_validation->run( $this ) ){		

			$sosmed['linkedin']  = $post['linkedin'];
			$sosmed['facebook']  = $post['facebook'];
			$sosmed['twitter']   = $post['twitter'];
			$sosmed['instagram'] = $post['instagram'];

			$data['artikel_nama']	   = $post['artikel_nama'];
			$data['artikel_email'] 	   = $post['artikel_email'];
			$data['artikel_nohp'] 	   = $post['artikel_nohp'];
			$data['artikel_alamat']    = $post['artikel_alamat'];
			$data['artikel_deskripsi'] = $post['artikel_deskripsi'];
			$data['artikel_sosmed']    = json_encode($sosmed);
			$data['artikel_updatedby'] = getSession()->admin_id;
			$data['artikel_ip']    	   = getUserIP();

			$update 			       = $this->m_global->update($this->table,$data,[md56('artikel_id',1) => $id]);

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

	public function delete($id){
		$get_data    = $this->m_global->get($this->table, null, [md56('artikel_id',1) => $id]);
		$link_gambar = $get_data[0]->artikel_foto;
		@unlink(FCPATH . '/'.$link_gambar);

		$delete = $this->m_global->delete($this->table,[md56('artikel_id',1) => $id]);

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
		$data['artikel_id'] 	= $post['artikel_id'];
		$data['title'] 		= 'Preview Keterangan';
		$data['url']	  	= 'Artikel';
		$data['records']  	= $this->m_global->get($this->table,null,[md56('artikel_id',1) => $data['artikel_id']],'artikel_keterangan')[0];

		$this->load->view('artikel_preview', $data);
	}

	function konfig_Artikel($id=''){
		$data['pagetitle']  = 'Form Auth Artikel';
		$data['subtitle']   = 'Data Auth Artikel';
		$data['url']        = $this->url;
		$data['breadcumb']  = ['index' => base_url($this->url), 'Artikel' => null, 'Form Auth Artikel' => base_url($this->url.'/konfig_Artikel')];
		
		$where   = (!empty($id) ? [md56('homed_id') => $id] : null );
		$select  = 'homed_id,homed_key,homed_value';
		$records = $this->m_global->get('keys',null,$where,$select);

		if(empty($records)){
			$data['records'] = null;
		}else{
			$data['records'] = $records[0];
		}

		$this->template->display($this->url.'_konfigArtikel', $data);	
	}

	public function change_status($id,$status){
        if ($status == 1) {
            $data['artikel_status'] = '0';
        } else {
            $data['artikel_status'] = '1';
        }
        
        $update = $this->m_global->update($this->table, $data, [md56('artikel_id',1) => $id]);
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

/* End of file Artikel.php */
/* Location: ./application/modules/Artikel/controllers/Artikel.php */