<div class="m-content">
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="flaticon-statistics"></i>
							</span>
							<h3 class="m-portlet__head-text">
								<?php echo $subtitle; ?>
							</h3>
							<h2 class="m-portlet__head-label m-portlet__head-label btn-custom-primary">
								<span><?php echo $pagetitle; ?></span>
							</h2>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url() ?>icon/action_add" method="POST" >
					<div class="m-portlet__body">
						<div class="m-form__group form-group row">
							<label class="col-2 col-form-label">Icon Type *</label>
							<div class="col-9">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" name="icon_tipe" value="1" class="icon_tipe">Flaticon
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" name="icon_tipe" value="2" class="icon_tipe">Fa Icon
										<span></span>
									</label>
								</div>
								<span class="m-form__help"></span>
							</div>
						</div>

						<hr class="line" style="display: none;">
						<div class="form-group m-form__group row jml_icon" style="display: none;">
							<label class="col-2 col-form-label"></label>
							<div class="col-2">
								<input class="form-control m-input" type="number" value="" id="jml_icon" name="jml_icon" placeholder="Jumlah Form">
							</div>
							<div class="col-2">
								<button type="button" class="btn btn-success generate" onclick="hasil()">
									Generate
								</button>
							</div>
						</div>

						<div class="m-portlet m-portlet--unair">
							<div class="m-portlet__body">
								<div class="row config_icon"></div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<div class="row">
								<div class="col-2"></div>
								<div class="col-9">
									<button type="submit" class="btn btn-success">
										Submit
									</button>
									<a href="<?php echo base_url('icon'); ?>" class="btn btn-secondary ajaxify">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<a href="<?php echo base_url('icon/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
		function hasil(){
		var val_ticon = $("input[name='icon_tipe']:checked").val();
		var element1 = '<div class="separate col-md-6">'+
							'<div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded m-portlet--skin-warning" style="background-color: ghostwhite;">'+
								'<div class="m-portlet__body" style="margin-top: 5%;">'+
									'<div class="form-group m-form__group row">'+
										'<label class="col-2 col-form-label">Icon</label>'+
										'<div class="col-9"><input class="form-control m-input" type="text" value="" name="icon_icon[]" placeholder="Input Icon"></div>'+
									'</div>';
		if (val_ticon == '1') {
			var element2 = '';
		} else {			
			var element2	= '<div class="form-group m-form__group row">'+
								'<label class="col-2 col-form-label">Color</label>'+
								'<div class="col-9">'+
									'<select class="form-control m-bootstrap-select icon_color" name="icon_color[]">'+
								'<option value="1" class="m--bg-success m--font-inverse-success">Success</option>'+
								'<option value="2" class="m--bg-warning m--font-inverse-warning">Warning</option>'+
								'<option value="3" class="m--bg-danger m--font-inverse-danger">Danger</option>'+
								'<option value="4" class="m--bg-info m--font-inverse-info">Info</option>'+
								'<option value="5" class="m--bg-primary m--font-inverse-primary">Primary</option>'+
								'<option value="6" class="m--bg-secondary m--font-inverse-secondary">Secondary</option>'+
							'</select>'+
								'</div>'+
							'</div>';
		}
		var element3 = '<div class="form-group m-form__group row">'+
										'<label class="col-8 col-form-label"></label>'+
										'<div class="col-1">'+
											'<button type="button" class="btn btn-danger btn-sm" onclick="deleteseparate(this)">'+
												'<span><i class="la la-trash-o"></i></span> Hapus'+
											'</button>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
		var element = element1+element2+element3;
		var jml_grup = Number($('#jml_icon').val());
		var separate = $('.separate').length;
		var total = jml_grup - separate;
		if (jml_grup < separate) {
			toastr.warning('Jumlah inputan tidak boleh lebih sedikit!', 'Warning');
		} else {
			for (var i = 0; i < total; i++) {
				$('.config_icon').append(element);
			}
				global.init_bootstrapSelect('.icon_color');
		}
		count();
	}
	function deleteseparate(a){
		$(a).parent().parent().parent().parent().parent().remove();
		count();
	}

	function count()
	{
		var separate = $('.separate').length;
		$('#jml_icon').val(parseInt(separate));
	}
	$( document ).ready(function() {
		var rules = {
			icon_tipe 			: { required: true },
			jml_icon 			: { required: true }
		};

		var message = {};
		global.init_form_validation('.form_add',rules,message);
		

		$('.icon_tipe').change(function(event) {
			var param = $(this).val();
			$('.jml_icon').fadeOut();
			$('.jml_icon').fadeIn();
			$('.line').fadeIn();
			$('#jml_icon').val('');
			$('.separate').remove();
		});
	});
</script>
