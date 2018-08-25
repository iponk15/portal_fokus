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
								Edit Icon
							</h3>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url() ?>icon/action_edit/<?php echo md5($records->icon_id) ?>" method="POST" >
					<div class="m-portlet__body">
						<div class="m-form__group form-group row">
							<label class="col-2 col-form-label">
								Icon Type
							</label>
							<div class="col-9">
								<div class="m-radio-inline">
									<label class="m-radio">
										<input type="radio" class="icon_tipe" name="icon_tipe" value="1" <?php echo ($records->icon_tipe=='1' ? 'checked' : '') ?> >
										Flaticon
										<span></span>
									</label>
									<label class="m-radio">
										<input type="radio" class="icon_tipe" name="icon_tipe" value="2" <?php echo ($records->icon_tipe=='2' ? 'checked' : '') ?> >
										Fa Icon
										<span></span>
									</label>
								</div>
								<span class="m-form__help">
									
								</span>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-2 col-form-label">
								Icon
							</label>
							<div class="col-5">
								<input class="form-control m-input" type="text" value="<?php echo $records->icon_icon ?>" name="icon_icon">
							</div>
						</div>
						<div class="form-group m-form__group row c_icon_color" <?php echo ($records->icon_tipe=='2' ? '' : 'style="display: none;"') ?> >
							<label class="col-2 col-form-label">Color</label>
							<div class="col-3">
								<select class="form-control m-bootstrap-select icon_color" name="icon_color">
									<option value="1" class="m--bg-success m--font-inverse-success" <?php echo ($records->icon_color=='1' ? 'selected' : '') ?> >Success</option>
									<option value="2" class="m--bg-warning m--font-inverse-warning" <?php echo ($records->icon_color=='2' ? 'selected' : '') ?> >Warning</option>
									<option value="3" class="m--bg-danger m--font-inverse-danger" <?php echo ($records->icon_color=='3' ? 'selected' : '') ?> >Danger</option>
									<option value="4" class="m--bg-info m--font-inverse-info" <?php echo ($records->icon_color=='4' ? 'selected' : '') ?> >Info</option>
									<option value="5" class="m--bg-primary m--font-inverse-primary" <?php echo ($records->icon_color=='5' ? 'selected' : '') ?> >Primary</option>
									<option value="6" class="m--bg-secondary m--font-inverse-secondary" <?php echo ($records->icon_color=='6' ? 'selected' : '') ?> >Secondary</option>
								</select>
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
<a href="<?php echo base_url('icon'); ?>" class="reload ajaxify"></a>
<script type="text/javascript">
	$( document ).ready(function() {
		var rules = {
			icon_tipe 			: { required: true },
			icon_color 			: { required: true },
			icon_icon	 		: { required: true }
		};

		var message = {};
		global.init_form_validation('.form_add',rules,message);
		global.init_bootstrapSelect('.icon_color');

		$('.icon_tipe').change(function(event) {
			var prm = $(this).val();

			if(prm == 2){
				$('.c_icon_color').fadeIn('slow');
				$('.icon_color').attr('required', true);

				global.init_bootstrapSelect('.icon_color');
			}else{
				$('.c_icon_color').fadeOut('slow');
				$('.icon_color').attr('required', false);
			}
		});
	});
</script>
