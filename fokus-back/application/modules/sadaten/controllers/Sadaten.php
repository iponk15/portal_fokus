<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadaten extends CI_Controller {
    private $url      = 'sadaten';
    private $table_db = 'konfig';

	public function index(){
		$data['pagetitle'] 	= 'Syarat dan Ketentuan';
		$data['url']	    = $this->url;
		$data['key']  	    = md56('homedika_'.$this->url);
		$data['ktnTipe']    = 'Form Input';
		$data['breadcumb'] 	= ['index' => base_url($this->url), 'Syarat dan Ketentuan' => null];

		$getData         = $this->m_global->get($this->table_db,null,['konfig_key' => $data['key']]);
		$data['records'] = (empty($getData) ? null : json_decode($getData[0]->konfig_isi));
		// pre($data['records']);

		$this->template->display($this->url, $data);
	}
	
	public function aksi_simpan(){
		$post = $this->input->post();

		$this->form_validation->set_rules('judul_pasien', 'Judul :', 'trim|required');
		$this->form_validation->set_rules('judul_nakes', 'Judul :', 'trim|required');
		$this->form_validation->set_rules('deskripsi_pasien', 'Deskripsi :', 'trim|required');
		$this->form_validation->set_rules('deskripsi_nakes', 'Deskripsi :', 'trim|required');
		
		if ($this->form_validation->run($this)) {
			$data['konfig_key']   = $post['sadaten_key'];
			$data['konfig_fitur'] = 'Syarat dan Ketentuan';

			$param = [
				['judul' => $post['judul_pasien'], 'deskripsi' => $post['deskripsi_pasien'] ],
				['judul' => $post['judul_nakes'], 'deskripsi' => $post['deskripsi_nakes'] ]
			];

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