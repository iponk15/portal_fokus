<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	private $prefix   = 'config_';
    private $url      = 'kontak';
    private $table_db = 'konfig';

	public function index(){
		$data['pagetitle'] 	= 'Kontak Kami';
		$data['subtitle'] 	= 'Form Input Kontak Kami';
		$data['url']	    = $this->url;
		$data['key']  	    = md56('homedika_'.$this->url);
		$data['breadcumb'] 	= ['index' => base_url($this->url), 'Kontak' => null];

		$getData         = $this->m_global->get($this->table_db,null,['konfig_key' => $data['key']]);
		$data['records'] = (empty($getData) ? null : json_decode($getData[0]->konfig_isi));

		$this->template->display($this->url, $data);
	}
	
	public function aksi_simpan(){
		$post = $this->input->post();

		$this->form_validation->set_rules('kontak_alamat', 'Alamat', 'trim|required');	
		$this->form_validation->set_rules('kontak_koordinat_long', 'Koordinat Long', 'trim|required');	
		$this->form_validation->set_rules('kontak_koordinat_lat', 'Koordinat Lat', 'trim|required');	
		$this->form_validation->set_rules('kontak_noKantor', 'No. Office', 'trim|required');	
		$this->form_validation->set_rules('kontak_noCs', 'No. CS', 'trim|required');	
		$this->form_validation->set_rules('kontak_email', 'Email', 'trim|required|valid_email');
		
		if ($this->form_validation->run($this)) {
			$data['konfig_key']   = $post['kontak_key'];
			$data['konfig_fitur'] = 'Kontak';

			$param['kontak_alamat']         = $post['kontak_alamat'];
			$param['kontak_koordinat_long'] = $post['kontak_koordinat_long'];
			$param['kontak_koordinat_lat']  = $post['kontak_koordinat_lat'];
			$param['kontak_noKantor']  	    = $post['kontak_noKantor'];
			$param['kontak_noCs']           = $post['kontak_noCs'];
			$param['kontak_email']          = $post['kontak_email'];

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