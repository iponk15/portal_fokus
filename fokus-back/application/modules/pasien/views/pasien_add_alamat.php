<div class="row">
	<div class="col-md-12">
		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption" style="width: 100%;">
					<div class="m-portlet__head-title">
						<?php 
							if(!empty($subtitle)){
								echo '<span class="m-portlet__head-icon">
										<i class="flaticon-exclamation-1"></i>
									</span>
									<h3 class="m-portlet__head-text">'.$subtitle.'</h3>';
							}
						?>
						<h2 class="m-portlet__head-label m-portlet__head-label--danger">
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
							<a href="<?php echo base_url($url.'/tambah_alamat/'.$user_id); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_alamat'); ?>" method="POST" >
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
					<input type="hidden" value="<?php echo $records; ?>" name="user_id">
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Judul <span class="m--font-danger">*</span></label>
						<div class="col-lg-8">
							<div class="input-group">
								<input required type="text" name="detsen_judul" class="form-control m-input" placeholder="Judul Alamat ... ">
							</div>
							<span class="m-form__help">Masukan Judul</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Koordinat Long <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="text" name="detsen_koordinat_long" class="form-control m-input" placeholder="Koordinat Long ... ">
							</div>
							<span class="m-form__help">Masukan Koordinat Long</span>
						</div>
						<label class="col-md-2 col-form-label">Kota & Provinsi <span class="m--font-danger">*</span></label>
						<div class="col-md-3">
							<div class="input-group">
							<input required type="text" name="detsen_kotaprov" class="form-control m-input" placeholder="Kota & Provinsi ... ">
							</div>
							<span class="m-form__help">Masukan kota & provinsi</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Koordinat Lat <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input required type="text" name="detsen_koordinat_lat" class="form-control m-input" placeholder="Koordinat Lat ... ">
							</div>
							<span class="m-form__help">Masukan Koordinat Lat</span>
						</div>
						<label class="col-md-2 col-form-label">Kode Pos <span class="m--font-danger">*</span></label>
						<div class="col-md-3">
							<div class="input-group">
							<input required type="number" name="detsen_kodepos" class="form-control m-input" placeholder="Kode Pos ... ">
							</div>
							<span class="m-form__help">Masukan Kode Pos</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-md-2 col-form-label">Alamat <span class="m--font-danger">*</span></label>
						<div class="col-md-8">
							<div class="input-group">
								<textarea required name="detsen_alamat" class="form-control m-input alamat"></textarea>
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

<a href="<?php echo base_url($url.'/tambah_alamat/'.$user_id); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		var prm = {height: 150};
		global.init_summernote('.alamat',prm);

		var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>
