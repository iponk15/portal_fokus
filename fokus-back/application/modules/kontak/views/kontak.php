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
						<h2 class="m-portlet__head-label m-portlet__head-label--danger">
							<span><?php echo $pagetitle; ?></span>
						</h2>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo base_url($url); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
            <form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo $url.'/aksi_simpan'; ?>" method="post">
                <div class="m-portlet__body">
                    <input type="hidden" name="kontak_key" value="<?php echo $key; ?>">
                    <div class="m-form__content">
                        <div class="m-alert m-alert--icon alert alert-danger m--hide m_form_msg" role="alert">
                            <div class="m-alert__icon"><i class="la la-warning"></i></div>
                            <div class="m-alert__text">Oh Shit Man! Ada inputan yang masih belum di isi.</div>
                            <div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Alamat <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                            <textarea required name="kontak_alamat" class="form-control" rows="5" placeholder="Input Alamat"><?php echo @$records->kontak_alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Koordinat Long <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                            <input required value="<?php echo @$records->kontak_koordinat_long; ?>" type="text" class="form-control m-input" name="kontak_koordinat_long" placeholder="Input Koordinat Long">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Koordinat Lat <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                            <input required value="<?php echo @$records->kontak_koordinat_lat; ?>" type="text" class="form-control m-input" name="kontak_koordinat_lat" placeholder="Input Koordinat Lat">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Nomer Kantor <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                        <input value="<?php echo @$records->kontak_noKantor; ?>" required type="text" name="kontak_noKantor" class="form-control" placeholder="Input Nomer Kantor">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Nomer CS <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                            <input value="<?php echo @$records->kontak_noCs; ?>" required type="text" name="kontak_noCs" class="form-control" placeholder="Input Nomer CS">
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">Email <span class="m--font-danger">*</span></label>
                        <div class="col-4">
                            <input value="<?php echo @$records->kontak_email; ?>" required type="email" name="kontak_email" class="form-control" placeholder="Input Email">
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <div class="row">
                            <div class="offset-2 col-10">
                                <a href="<?php echo $url; ?>" class="btn m-btn btn-secondary ajaxify">Back</a>
                                <button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<a href="<?php echo $url; ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {

		// set form validation
		var rules   = {};
	    var message = {};
		global.init_form_validation('.form_add',rules,message);

	});
</script>