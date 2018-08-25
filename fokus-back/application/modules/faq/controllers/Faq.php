<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller {
	private $prefix         = 'faq_';
    private $url            = 'faq';
    private $table_ktgr     = 'faq_kategori';
    private $table_prtnyn   = 'faq_pertanyaan';
    private $pagetitle      = 'Role';
    private $rule_valid     = 'xss_clean|encode_php_tags';

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['pagetitle'] = 'Kategori FAQ';
		$data['subtitle']  = '';
		$data['ktnTipe']   = 'Daftar Data';
		$data['url']       = $this->url;
		$data['breadcumb'] = ['index' => base_url("faq"), 'FAQ' => null];

		$this->template->display($this->url, $data);
	}

	public function select($value=''){
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
                    $where_e = '(kategori like "%'.$param.'%")';
                }
            }
            $awal = null;
        }

        // set record data
        $join            = null;
        $where           = null;
        $select          = 'id,kategori,flag';
        $data['total']   = $this->m_global->count($this->table_ktgr, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_ktgr, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
				'id_content' => md56($value->id),
                'no'         =>  $i++,
                'kategori'   =>  $value->kategori,
                'flag'       =>  ($value->flag == '0' ? 'Pasien' : 'Nakes'),
                'action'     =>  '<a href="'.base_url($this->url.'/ubah_kategori/'.md56($value->id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Ubah Kategori">
									<i class="la la-edit"></i>
                                </a>
                                <a href="'.base_url($this->url.'/tambah_pertanyaan/'.md56($value->id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-primary m-btn--icon m-btn--icon-only m-btn--pill" title="Tambah Pertanyaan">
									<i class="la la-plus-square"></i>
                                </a>',
            ];
        }

        $encode = (object)[
            'meta' => ['page' => $start, 'pages' => null, 'perpage' => $limit, 'total' => $data["total"], 'sort' => 'asc', 'field' => 'id_content'], 
            'data' =>  $data['records']
        ];

        echo json_encode($encode);
    }
    
    public function select_relasi($id){
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
        $where           = [md56('faq_kategori_id',1) => $id];
        $select          = 'id, faq_kategori_id,pertanyaan,jawaban';
        $data['total']   = $this->m_global->count($this->table_prtnyn, $join, $where, $where_e);
        $result          = $this->m_global->get($this->table_prtnyn, $join, $where, $select, $where_e, null, $awal, $limit);
		$data['records'] = array();

        $i = 1 + $awal;
        foreach ($result as $key => $value) {
            $data['records'][] = [
                'no'         =>  $i++,
                'pertanyaan' =>  $value->pertanyaan,
                'jawaban'    =>  $value->jawaban,
                'action'     =>  '<a href="'.base_url($this->url.'/ubah_pertanyaan/'.md56($value->id)).'" data-table="disres" data-toggle="modal" class="ajaxify m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_data" title="Ubah Pertanyaan">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="'.base_url($this->url.'/hapus_pertanyaan/'.md56($value->id)).'" onClick="return f_status(2, this, event)" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Hapus Data">
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
    
    public function hapus_pertanyaan($id){
        $delete = $this->m_global->delete($this->table_prtnyn, [md56('id',1) => $id]);

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

	public function tambah_data(){
		$data['pagetitle'] = 'Tambah Kategori';
		$data['subtitle']  = '';
		$data['url']	   = base_url($this->url);
		$data['ktnTipe']   = 'Form Input';
		$data['records']   = $this->m_global->count($this->table_ktgr);
		
		$data['breadcumb'] = ['index' => base_url("faq"), $data['pagetitle'] => null, 'Form Tambah' => base_url('faq/tambah_data')];

		$this->template->display($this->prefix.'tambah', $data);
	}

	public function aksi_tambah(){
        $post = $this->input->post();
        
        if(!empty($post['kategori'])){
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        }else{
            $this->form_validation->set_rules('katergori_baru', 'Kategori Baru', 'required');
        }

        $this->form_validation->set_rules('flag', 'Flag', 'required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ( $this->form_validation->run( $this ) ){
            if(!empty($post['kategori'])){
                $data['faq_kategori_id'] = $post['kategori'];
                $data['pertanyaan'] 	 = $post['pertanyaan'];
                $data['jawaban'] 		 = $post['jawaban'];

                $insert = $this->m_global->insert($this->table_prtnyn, $data);
            }else{
                $data['kategori'] = $post['katergori_baru'];
                $data['flag']     = $post['flag'];
                $save             = $this->m_global->insert($this->table_ktgr, $data);
                $last             = $this->db->insert_id();

                if($save){
                    $quest['faq_kategori_id'] = $last;
                    $quest['pertanyaan'] 	  = $post['pertanyaan'];
                    $quest['jawaban'] 		  = $post['jawaban'];

                    $insert = $this->m_global->insert($this->table_prtnyn, $quest);
                }else{
                    $insert = false;
                }
            }

            if ($insert) {
                $data['status']  = 1;
                $data['message'] = 'Successfully';

                echo json_encode( $data );
            } else {
                $data['status']  = 0;
                $data['message'] = 'Failed';

                echo json_encode( $data );                                       
            } 
        }else{
            $data['status']  = 0;
            $data['message'] = 'Failed';

            echo json_encode( $data );
        }
	}

	public function ubah_kategori($id){
        $data['id']        = $id;
		$data['pagetitle'] = 'Ubah Kategori';
        $data['subtitle']  = '';
        $data['url']	   = base_url($this->url);
        $data['ktnTipe']   = 'Form Input';
		$data['breadcumb'] = ['index' => $data['url'], $data['pagetitle'] => null, 'Form Ubah' => base_url($this->url.'/ubah_kategori/'.$id)];
        $data['records']   = $this->m_global->get($this->table_ktgr, null, [md56('id',1) => $id],'kategori,flag')[0];

		$this->template->display($this->prefix.'edit', $data);
    }

    function aksi_ubahKategori($id){
        $post = $this->input->post();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('flag', 'Flag', 'required');
        
        if ( $this->form_validation->run( $this ) ){
            $data['kategori'] = $post['kategori'];
            $data['flag']     = $post['flag'];
            $ubah = $this->m_global->update($this->table_ktgr, $data, [md56('id',1) => $id]);

            if($ubah){
                $data['status']  = 1;
                $data['message'] = 'Successfully';
    
                echo json_encode( $data );
            }else{
                $data['status']  = 0;
                $data['message'] = 'Failed';

                echo json_encode( $data ); 
            }
        }else{
            $data['status']  = 0;
            $data['message'] = 'Failed';

            echo json_encode( $data );    
        }
    }
    
    function tambah_pertanyaan($id){
        $data['id']        = $id;
        $data['pagetitle'] = 'Tambah Pertanyaan';
        $data['subtitle']  = '';
        $data['url']	   = base_url($this->url);
        $data['ktnTipe']   = 'Form Input';
        $data['breadcumb'] = ['index' => $data['url'], $data['pagetitle'] => null, 'Form Tambah Pertanyaan' => base_url($this->url.'/tambah_pertanyaan/'.$id)];
        $data['records']   = $this->m_global->get($this->table_ktgr, null, [md56('id',1) => $id],'id,kategori,flag')[0];

		$this->template->display($this->prefix.'tambah_prtnyn', $data);
    }

    function aksi_tambah_pertnyn(){
        $post = $this->input->post();

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ( $this->form_validation->run( $this ) ){
            $data['faq_kategori_id'] = $post['id_kategori'];
            $data['pertanyaan']      = $post['pertanyaan'];
            $data['jawaban']         = $post['jawaban'];

            $insert = $this->m_global->insert($this->table_prtnyn, $data);

            if($insert){
                $data['status']  = 1;
                $data['message'] = 'Successfully';
    
                echo json_encode( $data );
            }else{
                $data['status']  = 0;
                $data['message'] = 'Failed';

                echo json_encode( $data );        
            }
        }else{
            $data['status']  = 0;
            $data['message'] = 'Failed';

            echo json_encode( $data );    
        }

    }

    function ubah_pertanyaan($id){
        $data['id']        = $id;
        $data['pagetitle'] = 'Ubah Pertanyaan';
        $data['subtitle']  = '';
        $data['url']	   = base_url($this->url);
        $data['ktnTipe']   = 'Form Input';
        $data['breadcumb'] = ['index' => $data['url'], $data['pagetitle'] => null, 'Form Ubah Pertanyaan' => base_url($this->url.'/ubah_pertanyaan/'.$id)];

        // get data pertanyaan di join ke kategori
        $join              = [ [$this->table_ktgr.' k','p.faq_kategori_id = k.id','left'] ];
        $data['records']   = $this->m_global->get($this->table_prtnyn.' p', $join, [md56('p.id',1) => $id],'k.kategori,p.pertanyaan,p.jawaban')[0];

		$this->template->display($this->prefix.'ubah_prtnyn', $data);
    }

    function aksi_ubah_pertnyn($id){
        $post = $this->input->post();

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

        if ( $this->form_validation->run( $this ) ){
            $data['pertanyaan'] = $post['pertanyaan'];
            $data['jawaban']    = $post['jawaban'];

            $update = $this->m_global->update($this->table_prtnyn,$data,[md56('id',1) => $id]);

            if($update){
                $data['status']  = 1;
                $data['message'] = 'Successfully';
    
                echo json_encode( $data );
            }else{
                $data['status']  = 0;
                $data['message'] = 'Failed';

                echo json_encode( $data );        
            }
        }else{
            $data['status']  = 0;
            $data['message'] = 'Failed';

            echo json_encode( $data );    
        }

    }

}

/* End of file Role.php */
/* Location: ./application/modules/role/controllers/Role.php */