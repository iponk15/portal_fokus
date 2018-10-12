<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Fokus | Form</title>
        <meta name="description" content="Latest updates and statistic charts"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
			var base_url = '<?php echo base_url() ?>';
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <link href="<?php echo base_url(); ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/demo/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/demo/media/img/logo/favicon.ico" /> 
    </head>
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">			
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(<?php echo base_url(); ?>assets/app/media/img//bg/bg-2.jpg);">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#">
						<img src="<?php echo base_url(); ?>assets/app/media/img//logos/logo-1.png">  	
					</a>
				</div>
				<div class="m-login__signin">
					<div class="m-login__head">
						<h3 class="m-login__title">Form Merubah Password</h3>
					</div>
					<form class="m-login__form m-form" action="<?php echo base_url('login/knfm_lupas/'.md56($records->admin_id).'/'.$records->admin_salt); ?>" method="POST">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="password" placeholder="Password" name="password" autocomplete="off" id="lupas_password">
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Konfirmasi Password" name="konfirm_lupas">
						</div>
						<div class="m-login__form-action">
							<button id="m_form_lupas" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">Submit</button>
						</div>
					</form>
				</div>
			</div>	
		</div>
	</div>				
	</div>
		<script src="<?php echo base_url(); ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/app/js/login.js" type="text/javascript"></script>     
	</body>
</html>