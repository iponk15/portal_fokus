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
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_edit/'.$id) ?>" method="post">
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
						<label for="example-text-input" class="col-3 col-form-label">Nama Layanan<span class="m--font-danger">*</span></label>
						<div class="col-4">
							<input value="<?php echo $records->layanan_nama ?>" class="form-control m-input" type="text" name="layanan_nama" placeholder="Nama Layanan ...">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">Harga Layanan <span class="m--font-danger">*</span></label>
						<div class="col-4">
							<input value="<?php echo $records->layanan_harga ?>" class="form-control m-input" type="number" name="layanan_harga" placeholder="Harga Layanan ..." min="0">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-3 col-form-label">Keterangan </label>
						<div class="col-4">
							<textarea name="layanan_keterangan" class="form-control m-input" rows="10" placeholder="Keterangan ..."><?php echo $records->layanan_keterangan; ?></textarea>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="offset-3 col-10">
								<a href="<?php echo base_url($url); ?>" class="btn m-btn btn-secondary ajaxify">Kembali</a>
								<button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<a href="<?php echo base_url($url.'/show_edit/'.$id); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
		// set form validation
		var rules = {
	        layanan_nama		: { required: true },
			layanan_harga		: { required: true },
	    };

	    var message = {};
		global.init_form_validation('.form_add',rules,message);
	});
</script>