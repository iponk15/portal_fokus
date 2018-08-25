<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
    private $url      = 'tentang';
    private $table_db = 'konfig';

	public function index(){
		$data['pagetitle'] 	= 'Tentang Kami';
		$data['url']	    = $this->url;
		$data['key']  	    = md56('homedika_'.$this->url);
		$data['ktnTipe']    = 'Form Input';
		$data['breadcumb'] 	= ['index' => base_url($this->url), 'Tentang' => null];

		$getData         = $this->m_global->get($this->table_db,null,['konfig_key' => $data['key']]);
		$data['records'] = (empty($getData) ? null : json_decode($getData[0]->konfig_isi));

		$this->template->display($this->url, $data);
	}
	
	public function aksi_simpan(){
		$post = $this->input->post();

		$this->form_validation->set_rules('tentang_deskripsi', 'deskripsi', 'trim|required');
		
		if ($this->form_validation->run($this)) {
			$data['konfig_key']   	    = $post['kontak_key'];
			$data['konfig_fitur'] 		= 'Tentang Kami';
			$param['tentang_deskripsi'] = $post['tentang_deskripsi'];

			$jsonEnc 		    = json_encode($param);
			$data['konfig_isi'] = $jsonEnc;
			$cek                = $this->m_global->count($this->table_db,null,['konfig_key' => md56('homedika_'.$this->url)]);
			
			if(empty($cek)){
				$proses = $this->m_global->insert($this->table_db,$data);
			}else{
				$proses = $this->m_global->update($this->table_db,$data,['konfig_key' => md56('homedika_'.$this->url) ]);
			}
			
			if ($proses) {
				$data['status']  = 1;
				$data['message'] = 'Successfully';
	
				echo json_encode( $data );
			} else {
				$data['status']  = 0;
				$data['message'] = 'Failed';
	
				echo json_encode( $data );                                       
			} 
		} else {
			$data['status']  = 0;
			$data['message'] = 'Failed';

			echo json_encode( $data );   
		}
	}

}

/* End of file Contact.php */
/* Location: ./application/modules/contact/controllers/Contact.php */