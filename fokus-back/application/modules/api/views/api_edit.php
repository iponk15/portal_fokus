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
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_edit/'.$api_id); ?>" method="POST" >
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
						<label class="col-lg-2 col-form-label">Type <span class="m--font-danger">*</span></label>
						<div class="col-lg-6">
							<div class="input-group">
								<select class="form-control m-input" name="api_type" id="typeApi">
									<option value="1" <?php if($records->api_tipe == 1){echo'selected';} ?>>GET</option>
									<option value="2" <?php if($records->api_tipe == 2){echo'selected';} ?>>POST</option>
									<option value="3" <?php if($records->api_tipe == 3){echo'selected';} ?>>DELETE</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Nama <span class="m--font-danger">*</span></label>
						<div class="col-lg-6">
							<div class="input-group">
								<input required type="text" value="<?php echo $records->api_nama?>" name="api_nama" class="form-control m-input" placeholder="Nama API ... ">
							</div>
							<span class="m-form__help">Masukan nama api</span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label">Link <span class="m--font-danger">*</span></label>
						<div class="col-lg-6">
							<div class="input-group">
								<input required type="text" value="<?php echo $records->api_link?>" name="api_link" class="form-control m-input" placeholder="Link API ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-2 col-form-label"> Keterangan <span class="m--font-danger">*</span></label>
						<div class="col-lg-6">
							<textarea required name="api_keterangan" class="form-control m-input pengalaman" placeholder="Keterangan ... "><?php echo $records->api_keterangan?></textarea>
							<span class="m-form__help">Masukan keterangan api</span>
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

<a href="<?php echo base_url($url.'/show_edit/'. $api_id); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		var rules   = {};
		var message = {};
			
		var prm = {height: 150};
		global.init_summernote('.pengalaman',prm);
		global.init_form_validation('.form_add',rules,message);		
	});

	$(document).ready(function() {
	    $('#typeApi').select2();
	});
</script>

