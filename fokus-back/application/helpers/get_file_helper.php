<?php 

	function get_additional( $add, $tipe ){
		$arr = [
			'datatables' => [ 
				'css' => [
					'<link href="'.base_url('assets/vendors/custom/datatables/datatables.bundle.css').'" rel="stylesheet" type="text/css" />' 
				],
				'js' => [
					'<script src="'.base_url('assets/vendors/custom/datatables/datatables.bundle.js').'" type="text/javascript"></script>' 
				]
			],
			'ckeditor' => [ 
				'css' => [],
				'js'  => [
					'<script src="'.base_url('assets/vendors/custom/ckeditor/ckeditor5.js').'"></script>'
					// '<script src="http://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>'
					// '.base_url('assets/vendors/custom/datatables/datatables.bundle.js').'
					// http://cdn.ckeditor.com/4.10.1/full/ckeditor.js
				]
			]
		];

		$each = @$arr[ $add ][ $tipe ];
		if ( $each )
		{
			foreach ( $each as $key => $value ) {
				echo $value."\n";
			}
		}

	}
	
?>