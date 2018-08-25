<div class="row">
	<div class="col-md-12">
		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<?php 
							if(!empty($subtitle)){
								echo '<span class="m-portlet__head-icon">
										<i class="flaticon-exclamation-1"></i>
									</span>
									<h3 class="m-portlet__head-text">'.$subtitle.'</h3>';
							}
						?>
						<h2 class="m-portlet__head-label btn-custom-primary">
							<span><?php echo $pagetitle; ?></span>
						</h2>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo base_url($url); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-mail-reply"></i>
							</a>
						</li>
						<li class="m-portlet__nav-item">
							<a href="<?php echo base_url($url.'/show_add'); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_add'); ?>" method="POST" >
				<div class="m-portlet__body">
					<div class="m-form__content">
						<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger m--hide m_form_msg" role="alert">
							<div class="m-alert__icon"><i class="flaticon-warning-2"></i><span></span></div>
							<div class="m-alert__text"><strong>Warning !!!</strong> <br> Change a few things up and try submitting again.  </div>
							<div class="m-alert__actions" style="width: 200px;">
								<button type="button" class="btn btn-danger btn-sm m-btn m-btn--pill m-btn--wide" data-dismiss="alert" aria-label="Close">
									Dismiss
								</button>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Nama <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="text" name="user_nama" class="form-control m-input" placeholder="Nama Pasien ... ">
							</div>
							<span class="m-form__help">Masukan nama pasien</span>
						</div>
						<label class="col-lg-2 col-form-label">Email <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="email" name="user_email" class="form-control m-input" placeholder="Email ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Jenis Kelamin <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<select required name="user_jenmin" class="form-control m-input jenmin">
									<option value=""></option>
									<option value="0">Pria</option>
									<option value="1">Wanita</option>
								</select>
							</div>
							<span class="m-form__help"></span>
						</div>
						<label class="col-lg-2 col-form-label">Usia</label>
						<div class="col-lg-3">
							<div class="input-group">
								<input type="number" name="user_detkes_usia" class="form-control m-input" placeholder="Usia ... ">
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label"> Tempat & Tanggal Lahir <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="row align-items-center">
								<div class="col-6"><input required type="text" class="form-control m-input " placeholder="Tempat" name="user_temlahir" ></div>
								<div class="col-6"><input required type="text" class="form-control m-input tgllahir" placeholder="Tanggal" name="user_tgllahir"></div>
							</div>
							<span class="m-form__help"></span>
						</div>
						<label class="col-lg-2 col-form-label">No HP </label>
						<div class="col-lg-3">
							<div class="input-group">
								<input type="number" name="user_nohp" class="form-control m-input" placeholder="No HP ... ">
							</div>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="col-3"></div>
							<div class="col-4">
								<a href="<?php echo base_url($url); ?>" class="btn btn-secondary ajaxify">Back</a>
								<button type="submit" class="btn btn-success">
									Submit
								</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<a href="<?php echo base_url($url.'/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		$('.jenmin').select2({
			placeholder: 'Pilih Jenis Kelamin'
		});

		var param = {
			todayHighlight: true,
			orientation: "bottom right",
			autoclose: true,
			format: 'dd-mm-yyyy'
		};
		global.init_dtrp(1,'.tgllahir',param);

		$('.user_detkes_tipe').select2({
			placeholder: 'Pilih Tipe Nakes'
		})

		var prm = {height: 150,dialogsInBody: true};
		global.init_summernote('.pengalaman',prm);

		var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>
