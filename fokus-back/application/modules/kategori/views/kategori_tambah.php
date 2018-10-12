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
							<a href="<?php echo base_url($url.'/tampil_tambah'); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/aksi_tambah'); ?>" method="POST" >
				<div class="m-portlet__body">
					<div class="m-form__content">
						<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-warning m--hide m_form_msg" role="alert">
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
						<label class="col-lg-3 col-form-label">Kode <span class="m--font-danger">*</span></label>
						<div class="col-lg-4">
							<div class="input-group">
								<input type="text" name="kategori_kode" class="form-control m-input" placeholder="Kode Kategori ... ">
							</div>
							<span class="m-form__help">Masukan kode kategori</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-3 col-form-label">Nama <span class="m--font-danger">*</span></label>
						<div class="col-lg-4">
							<div class="input-group">
								<input required type="text" name="kategori_nama" class="form-control m-input" placeholder="Nama Kategori ... ">
							</div>
							<span class="m-form__help">Masukan nama kategori</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-3 col-form-label"> Deskripsi </label>
						<div class="col-lg-4">
							<textarea name="kategori_deskripsi" class="form-control m-input" placeholder="Deskripsi ... " rows="6"></textarea>
							<span class="m-form__help">Masukan keterangan kategori</span>
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

<a href="<?php echo base_url($url.'/tampil_tambah'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		var rules   = {
			kategori_kode : {
				maxlength : 3,
				minlength : 3,
				required  : true
			}
		};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>

