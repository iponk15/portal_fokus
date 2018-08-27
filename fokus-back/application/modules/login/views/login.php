<!DOCTYPE html>
<!-- 
	Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
	Author: KeenThemes
	Website: http://www.keenthemes.com/
	Contact: support@keenthemes.com
	Follow: www.twitter.com/keenthemes
	Dribbble: www.dribbble.com/keenthemes
	Like: www.facebook.com/keenthemes
	Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
	License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
	Author : Irfan Isma Somantri || irfan.isma@gmail.com || 08973950031
-->
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Fokus || Login</title>
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
		<link href="<?php echo base_url('assets/app/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php //echo base_url('assets/app/media/img/icons/favicon.png'); ?>" />
		<script src="<?php echo base_url(); ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/app/js/login.js" type="text/javascript"></script>
    </head>
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login">
				<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<!-- <a href="<?php //echo base_url(); ?>">
								<img src="<?php //echo base_url() ?>assets/app/media/img/logos/logo1.svg" style="width: 65%;">
							</a> -->
							<h1>Fokus Backend</h1>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Silahkan Login</h3>
							</div>
							<form method="POST" class="m-login__form m-form" action="<?php echo base_url('login/masuk_login'); ?>">
								<div class="form-group m-form__group">
									<input class="form-control m-input user_email" type="text" placeholder="Email" name="user_email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<!-- <label class="m-checkbox  m-checkbox--red">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label> -->
									</div>
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">Lupa Password ?</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Masuk</button>
								</div>
							</form>
						</div>
						<div class="m-login__signup">
							<div class="m-login__head">
								<h3 class="m-login__title">Sign Up</h3>
								<div class="m-login__desc">Enter your details to create your account:</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="password" placeholder="Password" name="password">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
								</div>
								<div class="row form-group m-form__group m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--red">
										<input type="checkbox" name="agree">I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
										<span></span>
										</label>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign Up</button>&nbsp;&nbsp;
									<button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
								</div>
							</form>
						</div>
						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">Forgotten Password ?</h3>
								<div class="m-login__desc">Enter your email to reset your password:</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Request</button>&nbsp;&nbsp;
									<button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">Cancel</button>
								</div>
							</form>
						</div>
						<div class="m-login__account">
							<span class="m-login__account-msg">
								Belum punya akun ?
							</span>&nbsp;
							<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">Daftar</a>
						</div>
					</div>	
				</div>
			</div>				
		</div>
		<script type="text/javascript">
			function copas(prm) {
				var val = $(prm).attr('data-value');
				$('.user_email').val(val);
			}
		</script>
		
	</body>
</html>