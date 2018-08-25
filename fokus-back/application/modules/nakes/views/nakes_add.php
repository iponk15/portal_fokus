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
								<input required type="text" name="user_nama" class="form-control m-input" placeholder="Nama Nakes ... ">
							</div>
							<span class="m-form__help">Masukan nama nakes / dokter</span>
						</div>
						<label class="col-lg-2 col-form-label">Pendidikan <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="text" name="user_detkes_pendidikan" class="form-control m-input" placeholder="Pendidikan ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Keahlian Khusus <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="text" name="user_detkes_keahlian" class="form-control m-input" placeholder="Keahlian Khusus ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
						<label class="col-lg-2 col-form-label">Usia <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="number" name="user_detkes_usia" class="form-control m-input" placeholder="Usia ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label"> Waktu Praktek <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="row align-items-center">
								<div class="col-6"><input required type="text" class="form-control f_awal" placeholder="Mulai" name="awal" ></div>
								<div class="col-6"><input required type="text" class="form-control f_akhir" placeholder="Selesai" name="akhir"></div>
							</div>
							<span class="m-form__help">Masukan waktu praktek</span>
						</div>
						<label class="col-lg-2 col-form-label">Tipe Nakes <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<select required name="user_detkes_tipe" class="form-control m-input user_detkes_tipe">
									<option></option>
									<option value="1">Dokter</option>
									<option value="2">Perawat</option>
									<option value="3">Bidan</option>
									<option value="4">Psikolog</option>
									<option value="5">Fisioterapi</option>
									<option value="6">Ahli Gizi</option>
								</select>
							</div>
							<span class="m-form__help">Please select base</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-md-3 col-form-label">Lokasi Praktek <span class="m--font-danger">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<textarea required name="user_detkes_lokasi" class="form-control m-input" rows="5" placeholder="Lokasi Praktek ... "></textarea>
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-md-3 col-form-label">Pengalaman <span class="m--font-danger">*</span></label>
						<div class="col-md-7">
							<div class="input-group">
								<textarea required name="user_detkes_pengalaman" class="form-control m-input pengalaman" placeholder="Lokasi Praktek ... "></textarea>
							</div>
							<span class="m-form__help"></span>
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
		var prmTime = {defaultTime: '',minuteStep: 1,showMeridian: false,snapToStep: true};
		global.init_dtrp(3,'.f_awal',prmTime);
		global.init_dtrp(3,'.f_akhir',prmTime);

		$('.user_detkes_tipe').select2({
			placeholder: 'Pilih Tipe Nakes'
		})

		var prm = {height: 150};
		global.init_summernote('.pengalaman',prm);

		var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>
