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
							<a href="<?php echo base_url($url.'/konfig_api'); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url( $url.'/aksi_auth/'.(empty($records->homed_id) ? null : md56($records->homed_id)) ); ?>" method="POST" >
                <input type="hidden" value="<?php echo md56(@$records->homed_id); ?>">
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
						<label class="col-lg-3 col-form-label">Nama Key <span class="m--font-danger">*</span></label>
						<div class="col-lg-3">
							<div class="input-group">
								<input value="<?php echo @$records->homed_key ?>" required type="text" name="homed_key" class="form-control m-input" placeholder="Nama Key ... ">
							</div>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-lg-3 col-form-label">Keys <span class="m--font-danger">*</span></label>
                        <div class="col-md-8 col-sm-12">
                            <div class="row">
                                <div class="col-5 col-md-3 col-sm-3">
                                    <input value="<?php echo @$records->homed_value ?>" required type="text" name="homed_value" class="form-control m-input homed_value" placeholder="Value Keys ... ">
                                    <span class="m-form__help"></span>
                                </div>
                                <div class="col-xs-2 col-md-2 col-sm-2">
                                    <button type="button" class="btn btn-outline-primary btn-sm m-btn m-btn--icon m-btn--outline-2x generateKeys">
                                        <span><i class="fa flaticon-gift"></i><span>Generate Keys</span></span>
                                    </button>
                                </div>
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

<a href="<?php echo base_url($url.'/konfig_api'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
        $('.generateKeys').on('click',function(){
            var mask   = '';
            var length = 20;
            var chars  = 'aA#!';

            if (chars.indexOf('a') > -1) mask += 'abcdefghijklmnopqrstuvwxyz';
            if (chars.indexOf('A') > -1) mask += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            if (chars.indexOf('#') > -1) mask += '0123456789';
            if (chars.indexOf('!') > -1) mask += '@_-';

            var result = '';
            
            for (var i = length; i > 0; --i) result += mask[Math.floor(Math.random() * mask.length)];
            
            $('.homed_value').val(result);
        });

        var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
    });

</script>

