	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Role Add
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet m-portlet--tab">
			<!--begin::Form-->
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url('role/action_add') ?>" method="post">
				<div class="m-portlet__body">
					<div class="m-form__content">
						<div class="m-alert m-alert--icon alert alert-warning m--hide m_form_msg" role="alert">
							<div class="m-alert__icon"><i class="la la-warning"></i></div>
							<div class="m-alert__text">Oh Shit Man! Ada inputan yang masih belum di isi.</div>
							<div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							Role Name
						</label>
						<div class="col-4">
							<input class="form-control m-input" type="text" name="role_nama" placeholder="Role Name">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-email-input" class="col-2 col-form-label">
							Description
						</label>
						<div class="col-8">
							<textarea class="form-control m-input summernote" name="desc" rows="3"></textarea>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-password-input" class="col-2 col-form-label">
							Status
						</label>
						<div class="col-4">
							<div class="m-radio-list">
								<label class="m-radio">
									<input type="radio" value="1" name="status">
									Active
									<span></span>
								</label>
								<label class="m-radio">
									<input type="radio" value="0" name="status">
									Inactive
									<span></span>
								</label>
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="offset-2 col-10">
								<a href="<?php echo base_url('role'); ?>" class="btn m-btn btn-secondary ajaxify">Back</a>
								<button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<a href="<?php echo base_url('role/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {

		// set form validation
		var rules = {
	        name	: { required: true },
	        desc			: { required: true },
	        status		: { required: true }
	    };

	    var message = {};
		global.init_form_validation('.form_add',rules,message);
		
		var prm = {height: 200};
		global.init_summernote('.summernote',prm);
	});
</script>