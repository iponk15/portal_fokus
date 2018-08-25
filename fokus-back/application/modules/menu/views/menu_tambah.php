<div class="m-content">
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet m-portlet--tab">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Add Menu
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url() ?>menu/action_add" method="POST" >
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<label class="col-3 col-form-label">
								Nama *
							</label>
							<div class="col-3">
								<input class="form-control m-input" type="text" value="" id="menu_nama" name="menu_nama" placeholder="Nama Menu">
							</div>
						</div>
						<?php if($is_primary != '1'){ ?>
							<div class="m-form__group form-group row">
								<label class="col-3 col-form-label">
									Is Primary *
								</label>
								<div class="col-9">
									<div class="m-radio-inline">
										<label class="m-radio">
											<input type="radio" name="menu_is_primary" value="1"> True
											<span></span>
										</label>
										<label class="m-radio">
											<input type="radio" name="menu_is_primary" value="0"> False
											<span></span>
										</label>
									</div>
									<span class="m-form__help"></span>
								</div>
							</div>		
						<?php } ?>
						<div class="m-form__group form-group row">
							<label class="col-3 col-form-label">
								Sub Menu *
							</label>
							<div class="col-9">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="menu_sub_menu" value="1" class="menu_sub_menu">
										True
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="menu_sub_menu" value="0" class="menu_sub_menu">
										False
										<span></span>
									</label>
								</div>
								<span class="m-form__help">
									
								</span>
							</div>
						</div>					
						<div class="form-group m-form__group row menu_ctrl" style="display: none;">
							<label class="col-3 col-form-label">
								Controller *
							</label>
							<div class="col-3">
								<input class="form-control m-input" type="text" value="" id="menu_ctrl" name="menu_ctrl" placeholder="Nama Controller">
							</div>
						</div>
						<hr class="line" style="display: none;">
						<div class="form-group m-form__group row jml_submenu" style="display: none;">
							<label class="col-3 col-form-label"></label>
							<div class="col-2">
								<input class="form-control m-input" type="number" value="" id="jml_submenu" name="jml_submenu" placeholder="Jumlah Form">
							</div>
							<div class="col-2">
								<button type="button" class="btn btn-success generate" onclick="hasil()">
									Generate
								</button>
							</div>
						</div>

						<div class="m-portlet m-portlet--unair">
							<div class="m-portlet__body">
								<div class="row config_menu"></div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-9">
									<button type="submit" class="btn btn-success">
										Submit
									</button>
									<a href="<?php echo base_url('menu'); ?>" class="btn btn-secondary ajaxify">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<a href="<?php echo base_url('menu'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	function hasil(){
		var jml_grup = Number($('#jml_submenu').val());
		var separate = $('.separate').length;
		if (jml_grup < separate) {
			toastr.warning('Jumlah inputan tidak boleh lebih sedikit!', 'Warning');
		} else {
			for (var i = separate+1; i <= jml_grup; i++) {
				$('.config_menu').append('<div class="separate col-md-6">'+
							'<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded m-portlet--skin-warning" style="background-color: ghostwhite;">'+
								'<div class="m-portlet__body" style="margin-top: 5%;">'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Order*</label>'+
										'<div class="col-9"><input class="form-control m-input order" type="text" value="'+ i +'" name="order[]" placeholder="Order Submenu"></div>'+
									'</div>'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Title*</label>'+
										'<div class="col-9"><input class="form-control m-input" type="text" value="" name="title[]" placeholder="Title Submenu"></div>'+
									'</div>'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Icon*</label>'+
										'<div class="col-9">'+
											'<select class="form-control icon_flaticon" name="icon_menu[]">'+
												'<option value=""></option>'+
											'</select>'+
										'</div>'+
									'</div>'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Icon*</label>'+
										'<div class="col-9">'+
											'<select class="form-control icon_fa" name="icon_menu_fa[]">'+
												'<option value=""></option>'+
											'</select>'+
										'</div>'+
									'</div>'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Controller*</label>'+
										'<div class="col-9">'+
											'<input class="form-control m-input" type="text" value="" name="ctrl_submenu[]" placeholder="Controller Submenu">'+
										'</div>'+
									'</div>'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-8 col-form-label"></label>'+
										'<div class="col-1">'+
											'<button type="button" class="btn btn-danger btn-sm" onclick="deleteseparate(this)">'+
												'<span><i class="la la-trash-o"></i></span> Hapus'+
											'</button>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>');
			}
		}
		count();

		global.init_select2('.icon_flaticon','fetch/fetch_icon/1','Pilih Flaticon');
		global.init_select2('.icon_fa','fetch/fetch_icon/2','Pilih Fa');
	}

	function deleteseparate(a){
		$(a).parent().parent().parent().parent().parent().remove();
		order_num();
		count();
	}

	function count()
	{
		var separate = $('.separate').length;
		$('#jml_submenu').val(parseInt(separate));
	}

	function order_num(){
		var order = $('.separate');
		var count = 1;
		$.each(order, function(index, val) {
			 $(val).find('.order').attr('value', count);
			 count++;
		});
	}

	$( document ).ready(function() {
		$('.menu_sub_menu').on('change', function(){
			var param = $(this).val();
			if (param == 1) {
				$('.jml_submenu').fadeIn();
				$('.menu_ctrl').fadeOut();
				$('#menu_ctrl').val('');
				$('.line').fadeIn('slow');
			} else {
				$('.menu_ctrl').fadeIn();
				$('.jml_submenu').fadeOut();
				$('#jml_submenu').val('');
				$('.separate').remove();
			}
		})

		var rules = {
	        menu_nama 			: { required: true },
	        menu_sub_menu 		: { required: true },
	        menu_is_primary		: { required: true }
	    };

	    var message = {};
		global.init_form_validation('.form_add',rules,message);
	});
</script>