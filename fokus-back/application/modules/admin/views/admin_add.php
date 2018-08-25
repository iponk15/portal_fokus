<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Admin Add
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="<?php echo base_url($url.'/show_add'); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
						<i class="la la-refresh"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet m-portlet--tab">
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url('admin/action_add') ?>" method="post">
			<div class="m-portlet__body">
				<div class="m-form__content">
					<div class="m-alert m-alert--icon alert alert-warning m--hide m_form_msg" admin="alert">
						<div class="m-alert__icon"><i class="la la-warning"></i></div>
						<div class="m-alert__text">Perhatian !!! <br> Ada inputan yang masih belum di isi.</div>
						<div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-2 col-form-label">Nama <span class="m--font-danger">*</span></label>
					<div class="col-4">
						<input class="form-control m-input" type="text" name="user_nama" placeholder="Nama">
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-2 col-form-label">Email <span class="m--font-danger">*</span></label>
					<div class="col-4">
						<input class="form-control m-input" type="text" name="user_email" placeholder="Nomer Pegawai">
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-email-input" class="col-2 col-form-label">Password <span class="m--font-danger">*</span></label>
					<div class="col-4">
						<input class="form-control m-input" type="password" name="user_password" placeholder="Password">
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-password-input" class="col-2 col-form-label">Role <span class="m--font-danger">*</span></label>
					<div class="col-4">
						<select class="form-control lg-select2 user_role_id" name="user_role_id">
                      		<option value=""></option>
	                    </select>
						<span class="m-form__help"></span>
					</div>
				</div>
			</div>
			<div class="m-portlet__foot m-portlet__foot--fit">
				<div class="m-form__actions">
					<div class="row">
						<div class="offset-2 col-10">
                            <a href="<?php echo base_url('admin'); ?>" class="btn m-btn btn-secondary ajaxify">Kembali</a>
                            <button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
                        </div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<a href="<?php echo base_url('admin/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
		// set form validation
		var rules = {
	        user_nama		: { required: true },
			user_email		: { required: true },
	        user_password	: { required: true },
	        user_role_id	: { required: true },
	    };

	    var message = {};
		global.init_form_validation('.form_add',rules,message);
		global.init_select2('.user_role_id','fetch/fetch_global/role/role_id/role_nama','Pilih Role');
	});
</script>