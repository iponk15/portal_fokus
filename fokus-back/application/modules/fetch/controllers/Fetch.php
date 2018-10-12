<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fetch extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    public function fetch_global($table,$id,$field){
        $q                     = $_GET['q'];
        $where[$field.' LIKE'] = '%'.$q.'%';
        $result                = $this->m_global->get( $table, null, $where, '*', null, null, 0, 5, null, 1 );
        $data                  = [];

        for ($i=0; $i < count( $result ); $i++) {
            $data[$i] = ['id' => $result[$i][$id], 'text' => $result[$i][$field] ];
        }

        echo json_encode( ['items' => $data] );
    }

    public function fetch_icon($type){
        $q                       = $_GET['q'];
        $where_e                 = "icon_icon LIKE '%".$q."%' AND icon_tipe = ".$type." AND icon_status = '1'"; 
        $result                  = $this->m_global->get( 'fokus_icon', null, null, '*', $where_e, null, 0, 5, null, 1 );
        $data                    = [];

        for ($i=0; $i < count( $result ); $i++) {
            if($type == 1){
                $data[$i] = ['id' => $result[$i]['icon_icon'], 'text' =>  '<i class="flaticon-'.$result[$i]['icon_icon'].'"></i>&nbsp;&nbsp;&nbsp;' . $result[$i]['icon_icon'] ];
            }else{
                $data[$i] = ['id' => 'fa fa-'.$result[$i]['icon_icon'].' m--font-' . state_color($result[$i]['icon_color']), 'text' =>  '<span class="m-badge m-badge--'.state_color($result[$i]['icon_color']).' m-badge--dot"></span><span class="fa fa-'.$result[$i]['icon_icon'].'"></span>&nbsp;&nbsp;&nbsp;'.$result[$i]['icon_icon']];
            }
        }

        echo json_encode( ['items' => $data] );
    }

    public function fetch_kategori(){
        $q      = $_GET['q'];
        $where  = ['kategori_nama LIKE' => '%'.$q.'%', 'kategori_status' => '1'];
        $select = "kategori_id,concat(kategori_kode,' - ',kategori_nama) as kategori";
        $result = $this->m_global->get( 'fokus_kategori', null, $where, $select, null, null, 0, 5, null, 1 );
        $data   = [];

        for ($i=0; $i < count( $result ); $i++) {
            $data[$i] = ['id' => $result[$i]['kategori_id'], 'text' => $result[$i]['kategori'] ];
        }

        echo json_encode( ['items' => $data] );
    }

}

/* End of file config.php */
/* Location: ./application/modules/config/controllers/config.php */