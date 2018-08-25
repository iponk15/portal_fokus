<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require 'vendor/autoload.php';
use Restserver\Libraries\REST_Controller;

class Rest_api extends REST_Controller
{

    /**
        Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031

        => Kebutuhan untuk profile
        - Create [ nama, email, no hp ]
        - uodate [ nama, email, jenis kelamin, tempat lahir, tanggal lahir, golongan darah, rheses darah, no hp, foto  ]
        - view [  nama, email, jenis kelamin, tempat lahir, tanggal lahir, golongan darah, rheses darah, no hp, foto  ]
    */

    public function __construct($config = 'rest'){
        parent::__construct($config);
    }

    function index_get(){
        // pre($this->output->_display(),1);
        $data['type'] = $this->get('type');
        $data['keys'] = $this->get('keys');
        $data['flag'] = $this->get('flag');

        if ($data['type'] == 'faq') {
            $where   = ( $data['keys'] != '' ? [ md56('fp.faq_kategori_id', 1) => $data['keys'] ] : null );
            $records = $this->m_global->get('faq_pertanyaan fp', null, $where, 'fp.id,fp.pertanyaan,fp.jawaban');
        } elseif ($data['type'] == 'kontak' || $data['type'] == 'tentang' || $data['type'] == 'sadaten' || $data['type'] == 'layanan' || $data['type'] == 'nakes') {
            if($data['type'] == 'layanan'){
                $getData = $this->m_global->get('layanan',null,['layanan_status' => '1'],'layanan_id,layanan_nama,layanan_harga,layanan_keterangan');
                if(!empty($getData)){
                    $records = $getData;
                }else{
                    $records['status']  = 0;
                    $records['message'] = 'Data tidak ditemukan';
                }
            }else if($data['type'] == 'nakes'){
                if(empty($data['keys'])){
                    $where   = ['user_status'=>'1','user_tipe'=> '1'];
                    $slct    = 'user_id,user_nama,user_detkes_keahlian,user_detkes_tipe,user_foto';
                }else{
                    $where   = ['user_status'=>'1','user_tipe'=> '1',md56('user_id',1) => $data['keys']];
                    $slct    = 'user_id,user_nama,user_detkes_keahlian,user_detkes_tipe,user_foto,user_detkes_waktu,user_detkes_lokasi,user_detkes_pengalaman,user_detkes_pendidikan,user_detkes_usia';
                }

                $getData = $this->m_global->get('user',null,$where,$slct );
                
                if(!empty($getData)){
                    $records = $getData;
                }else{
                    $records['status']  = 0;
                    $records['message'] = 'Data tidak ditemukan';
                }
            }else{
                $getData = $this->m_global->get('konfig', null, ['konfig_key' => $data['keys']], 'konfig_isi')[0]->konfig_isi;
                if ($data['type'] != 'sadaten') {
                    $records = json_decode($getData);
                } else {
                    $param   = json_decode($getData);
                    $records = ['judul' => $param[$data['flag']]->judul, 'deskripsi' => $param[$data['flag']]->deskripsi];
                }
            }
        } elseif ($data['type'] == 'profile') {
            $where   = [md56('user_id', 1) => $data['keys']];
            $select  = 'user_id,user_nama,user_email,user_jenmin,user_temlahir,DATE_FORMAT(user_tgllahir, "%d-%m-%Y") user_tgllahir,user_golrah,user_rhesus,user_nohp,user_foto';
            $data    = $this->m_global->get('user', null, $where, $select);
            $records = (empty($data) ? null : $data[0]);
        } elseif ($data['type'] == 'alamat') {
            $join    = [['detail_pasien','user_id=detsen_userid','left']];
            $where   = ['user_tipe' => '0', 'user_status' => '1', md56('user_id', 1) => $data['keys'],'detsen_status' => '1'];
            $select  = 'detsen_userid,detsen_id,detsen_alamat,detsen_koordinat';
            $data    = $this->m_global->get('user', $join, $where, $select);

            if (!empty($data)) {
                $records = $data;
            } else {
                $records['status']  = 0;
                $records['message'] = 'Data tidak ditemukan';
            }
        } elseif ($data['type'] == 'visitOrder') {
			$join  = [['user nks','o.order_nakesid = nks.user_id','left']];
			$where = [md56('o.order_pasienid',1) => $data['keys']];
			
			if( !empty($data['flag'] )){
				$where['o.order_tipe'] = $data['flag'];
			}
			
			$slct  = 'o.order_id,nks.user_nama nakes,nks.user_detkes_keahlian,o.order_tanggal,CONCAT("Rp. ", FORMAT(o.order_totalbayar, 2)) order_biaya,IF(o.order_tipe = "1", "Visit", "Talk") kategori';
			$data  = $this->m_global->get('order o',$join,$where,$slct);
			
			if (!empty($data)) {
                $records = $data;
            } else {
                $records['status']  = 0;
                $records['message'] = 'Data tidak ditemukan';
            }
        } elseif ($data['type'] == 'alamatPasien') {
            $where   = [md56('detsen_userid',1) => $data['keys'], 'detsen_status' => '1'];
            $select  = 'detsen_userid,detsen_judul,detsen_alamat,detsen_kotaprov,detsen_kodepos,detsen_koordinat_long,detsen_koordinat_lat';
            $getData = $this->m_global->get('detail_pasien',null,$where,$select);
            
            if (!empty($getData)) {
                $records['status']  = 1;
                $records['data']    = $getData;
            } else {
                $records['status']  = 0;
            }
        } else if( $data['type'] == 'lupaPin' ){
            $getData = $this->m_global->get('user',null,['user_status' => '1','user_tipe' => '0',md56('user_id',1) => $data['keys']],'user_nama,user_email');
            
            if(empty($getData)){
                $records['status'] = '0';
            }else{
                $token           = random(6,'1');
                $data['email']   = $getData[0]->user_email;
                $data['nama']    = $getData[0]->user_nama;
                $data['subject'] = 'Lupa Pin';
                $data['mesage']  =  $token . ' Adalah token Lupa PIN Inmed Anda. ';
                $send            = templateEmail($data);
                
                if($send == 1){
                    $records['status'] = '1';
                    $records['token']  = $token;
                }else{
                    $records['status'] = '0';
                }
            }
        } else {
            $field   = (valid_email($this->get('user_nomail')) ? 'user_email' : 'user_nohp');
            $getData = $this->m_global->get('user', null, [$field => $this->get('user_nomail')], 'user_email,user_nohp');

            if (empty($getData)) {
                $records['status'] = 0;
                $records['note']   = 'Data kosong';
            } else {
                $records['status'] = 1;
                $records['note']   = $getData[0]->user_nohp;
            }
        }
        
        $this->response($records, 200);
    }

    function index_post()
    {
        $post = $this->post();
        $get  = $this->input->get();

        if ((!empty($get['tipe']) && $get['tipe'] == 'profile') && $get['auth'] == 'create') {
            $where_e = '';

            if (!empty($post['user_email']) || !empty($post['user_nohp']) || !empty($post['user_gmail']) || !empty($post['user_fmail'])) {
                $where_e .= '';
            }

            if (!empty($post['user_email'])) {
                $where_e .= 'user_email = "'.$post["user_email"].'"';
            }

            if (!empty($post['user_nohp'])) {
                if (!empty($post['user_email'])) {
                    $where_e .= ' OR ';
                }

                $where_e .= 'user_nohp = "'.@$post["user_nohp"].'"';
            }

            if (!empty($post['user_gmail'])) {
                if (!empty($post['user_email']) || !empty($post['user_nohp'])) {
                    $where_e .= ' OR ';
                }

                $where_e .= 'user_gmail = "'.@$post["user_gmail"].'"';
            }

            if (!empty($post['user_fmail'])) {
                if (!empty($post['user_email']) || !empty($post['user_nohp']) || !empty($post['user_gmail'])) {
                    $where_e .= ' OR ';
                }

                $where_e .= 'user_fmail = "'.@$post["user_fmail"].'"';
            }

            $select  = 'user_email,user_nohp,user_gmail,user_fmail';
            $cekData = $this->m_global->get('user', null, null, $select, $where_e);
            
            if (count($cekData) > 0) {
                $text = '';
                if ($post['user_email'] == $cekData[0]->user_email) {
                    $text .= '(Email) ';
                }

                if (!empty($post['user_nohp']) && $post['user_nohp'] == $cekData[0]->user_nohp) {
                    $text .= '(No HP) ';
                }

                if (!empty($post['user_gmail']) && $post['user_gmail'] == $cekData[0]->user_gmail) {
                    $text .= '(Email Gmail) ';
                }

                if (!empty($post['user_fmail']) && $post['user_fmail'] == $cekData[0]->user_fmail) {
                    $text .= '(Email Facebook) ';
                }

                $text .= 'Anda sudah terdaftar';

                $msg['status']  = 0;
                $msg['catatan'] = $text;

                $records = $msg;
            } else {
                $data['user_nama']  = $post['user_nama'];
                $data['user_email'] = $post['user_email'];
                $data['user_tipe']  = $post['user_tipe'];
                
                if (!empty($post['user_nohp'])) {
                    $data['user_nohp']  = $post['user_nohp'];
                }
                
                if (!empty($post['user_gmail'])) {
                    $data['user_gmail'] = $post['user_gmail'];
                }
                
                if (!empty($post['user_fmail'])) {
                    $data['user_fmail'] = $post['user_fmail'];
                }

                $insert = $this->m_global->insert('user', $data);
                $lastid = $this->db->insert_id();

                if ($insert) {
                    $msg['user_id'] = $lastid;
                    $msg['status']  = 1;
                    $msg['catatan'] = 'Data berhasil di simpan. Terima kasih';

                    $records = $msg;
                } else {
                    $msg['status']  = 0;
                    $msg['catatan'] = 'Data gagal di simpan';

                    $records = $msg;
                }
            }
        } elseif ((!empty($get['tipe']) && $get['tipe'] == 'profile') && $get['auth'] == 'update') {
            $path  = 'assets/app/media/img/users/';
            $olfto = $this->m_global->get('user', null, [md56('user_id', 1) => $get['keys']], 'user_foto')[0]->user_foto;

            if (!empty($_FILES['user_foto']['name'])) {
                $config['upload_path']    = './assets/app/media/img/users/';
                $config['allowed_types']  = 'jpg|png|bmp|jpeg';
                $config['maintain_ratio'] = 1;
                $config['file_name']      = date('dmY').$_FILES['user_foto']['name'];
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('user_foto')) {
                    $image_data               = $this->upload->data();
                    $config['image_library']  = 'gd2';
                    $config['source_image']   = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = 0;
                    $config['width']          = 240;
                    $config['height']         = 240;
                    
                    $this->load->library('image_lib', $config);
                    
                    if ($this->image_lib->resize()) {
                        $image_file_name = '/'.$path.$image_data['file_name'];
                        @unlink(FCPATH . '/'.$olfto);
                    } else {
                        $image_file_name = null;
                    }
                } else {
                    $image_file_name = null;
                }
            } else {
                $image_file_name = $olfto;
            }

            $data['user_nama']     = $post['user_nama'];
            $data['user_email']    = $post['user_email'];
            $data['user_jenmin']   = $post['user_jenmin'];
            $data['user_temlahir'] = $post['user_temlahir'];
            $data['user_tgllahir'] = date('Y-m-d',strtotime($post['user_tgllahir']));
            $data['user_golrah']   = $post['user_golrah'];
            $data['user_rhesus']   = @$post['user_rhesus'];
            $data['user_nohp']     = $post['user_nohp'];
            $data['user_foto']     = $image_file_name;

            $update = $this->m_global->update('user', $data, [md56('user_id', 1) => $get['keys']]);
        
            if ($update) {
                $msg['status']  = 1;
                $msg['catatan'] = 'Data berhasil di ubah. Terima kasih';

                $records = $msg;
            } else {
                $msg['status']  = 0;
                $msg['catatan'] = 'Data gagal di ubah';

                $records = $msg;
            }

            $records = $msg;
        } elseif ((!empty($get['tipe']) && $get['tipe'] == 'profile') && $get['auth'] == 'validnomail') {
            $field   = (valid_email($post['user_nomail']) ? 'user_email' : 'user_nohp');
            $getData = $this->m_global->get('user', null, [$field => $post['user_nomail']], 'user_id,user_email,user_nohp');

            if (empty($getData)) {
                $records['status'] = 0;
                $records['note']   = 'Data kosong';
            } else {
                $records['user_id'] = $getData[0]->user_id;
                $records['status']  = 1;
                $records['note']    = $getData[0]->user_nohp;
            }
        } elseif ((!empty($get['tipe']) && $get['tipe'] == 'alamatPasien')) {
            if($get['auth'] == 'create'){
                $userId = $this->m_global->get('user',null,[md56('user_id',1) => $get['keys']],'user_id')[0]->user_id;
            
                $data['detsen_userid']         = $userId;
                $data['detsen_judul']          = $post['detsen_judul'];
                $data['detsen_alamat']         = $post['detsen_alamat'];
                $data['detsen_kotaprov']       = $post['detsen_kotaprov'];
                $data['detsen_kodepos']        = $post['detsen_kodepos'];
                $data['detsen_koordinat_long'] = $post['detsen_koordinat_long'];
                $data['detsen_koordinat_lat']  = $post['detsen_koordinat_lat'];
                
                $insert = $this->m_global->insert('detail_pasien',$data);

                if($insert){
                    $records['status']  = '1';
                    $records['catatan'] = 'Data alamat pasien telah berhasil di input';
                }else{
                    $records['status']  = '0';
                    $records['catatan'] = 'Data alamat pasien telah gagal di input';
                }
                
            }else if($get['auth'] == 'update'){
                $data['detsen_judul']          = $post['detsen_judul'];
                $data['detsen_alamat']         = $post['detsen_alamat'];
                $data['detsen_kotaprov']       = $post['detsen_kotaprov'];
                $data['detsen_kodepos']        = $post['detsen_kodepos'];
                $data['detsen_koordinat_long'] = $post['detsen_koordinat_long'];
                $data['detsen_koordinat_lat']  = $post['detsen_koordinat_lat'];
                
                $update = $this->m_global->update('detail_pasien',$data,[md56('detsen_userid',1) => $get['keys'], 'detsen_id' => $post['detsen_id']]);

                if($update){
                    $records['status']  = '1';
                    $records['catatan'] = 'Data alamat pasien telah berhasil di rubah';
                }else{
                    $records['status']  = '0';
                    $records['catatan'] = 'Data alamat pasien telah gagal di rubah';
                }
            }
        } elseif ((!empty($get['tipe']) && $get['tipe'] == 'listLayanan')) {
            $where  = ['layanan_status' => '1'];
            $select = 'layanan_id,layanan_nama,CONCAT("Rp. ", FORMAT(layanan_harga, 2)) layanan_harga,layanan_keterangan';
            $data  = $this->m_global->get('layanan',null,$where,$select);

            if(!empty($data)){
                $records = $data;
            }else{
                $records['status']  = '0';
                $records['catatan'] = 'Tidak dapat menemukan data layanan';
            }
        } elseif (empty($get['tipe']) && !empty($get['auth'])) {
            if ($get['auth'] == 'email') {
                $where  = [ 'user_email' => $post['user_nomail'], 'user_tipe' => $get['flag'] ];
                $select = 'user_email';
            } elseif ($get['auth'] == 'gmail') {
                $where  = [ 'user_gmail' => $post['user_nomail'], 'user_tipe' => $get['flag'] ];
                $select = 'user_gmail';
            } else if($get['auth'] == 'fmail'){
                $where  = [ 'user_fmail' => $post['user_nomail'], 'user_tipe' => $get['flag'] ];
                $select = 'user_fmail';
            }else{
                $where  = [ 'user_nohp' => $post['user_nomail'], 'user_tipe' => $get['flag'] ];
                $select = 'user_nohp';
            }

            $getData = $this->m_global->get('user', null, $where, 'user_id,'.$select);

            if (empty($getData)) {
                $records['status'] = 0;
                $records['result'] = 'Data tidak di temukan';
            } else {
                $records['status']  = 1;
                $records['result']  = $getData[0]->$select;
                $records['user_id'] = $getData[0]->user_id;
            }
        }

        $this->response($records, 200);
    }

    function index_delete(){
        $get = $this->input->get();
        
        if($get['tipe'] == 'alamatPasien'){
            $dlt = $this->m_global->delete('detail_pasien',[md56('detsen_id',1) => $get['keys']]);

            if($dlt){
                $records['status']  = '1';
                $records['catatan'] = 'Data berhasil di hapus';
            }else{
                $records['status']  = '0';
                $records['catatan'] = 'Data gagal di hapus';
            }
        }

        $this->response($records, 200);
    }
}
