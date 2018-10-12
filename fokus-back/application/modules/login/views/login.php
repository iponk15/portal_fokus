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
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/demo/media/img/logo/favicon.ico" /> 
    </head>
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="<?php echo base_url('login'); ?>">
										<!-- <img src="<?php echo base_url(); ?>assets/app/media/img//logos/logo-2.png">  	 -->
										<h1>Fokus.com</h1>
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">Sign In To Admin</h3>
									</div>
									<form method="POST" class="m-login__form m-form" action="<?php echo base_url('login/masuk_login'); ?>">
										<?php 
											if($this->session->userdata('message') != ''){ 
												echo '<div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" role="alert">			
														<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
														<span>'.$this->session->userdata('message').'</span>
													</div>';
											}
										?>
										<div class="form-group m-form__group">
											<input class="form-control m-input user_email" type="text" placeholder="Email" name="user_email" autocomplete="off">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
										</div>
										<div class="form-group m-form__group">
											<val id="image_captcha"><?php echo $captcha['capImage']; ?></val> &nbsp; 
											<button type="button" id="syncap" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x captcha-refresh">
												<i class="fa fa-sync-alt"></i>
											</button>
										</div>
										<div class="form-group m-form__group">
											<input tabindex="3" class="form-control m-input m-login__form-input--last" type="text" placeholder="Captcha" name="catpcha">
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="remember"> Ingat saya ?
													<span></span>
												</label>
											</div>
											<div class="col m--align-right">
												<a href="javascript:;" id="m_login_forget_password" class="m-link">Lupa Password ?</a>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Masuk</button>
										</div>
									</form>
								</div>
								<div class="m-login__signup">
									<div class="m-login__head">
										<h3 class="m-login__title">Registrasi</h3>
										<div class="m-login__desc">Isi form di bawah untuk membuat akun:</div>
									</div>
									<form method="POST" class="m-login__form m-form" action="<?php echo base_url('login/register'); ?>">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Nama" name="nama">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="email" placeholder="Email" name="email">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="number" placeholder="No HP" name="no_hp">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input pSwd" type="password" placeholder="Password" name="password">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password">
										</div>
										<?php 
											if(empty($cekSU)){ 
												echo '<br>
													<div class="form-group m-form__group">
														<select required name="tipe" class="form-control m-input tipe" style="width: 100%;">
															<option value=""></option>
															<option value="1">Superadmin</option>
															<option value="2">Author</option>
														</select>
													</div>';
											}
										?>
										<div class="row form-group m-form__group m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
												<input type="checkbox" name="agree"> I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
												<span></span>
												</label>
												<span class="m-form__help"></span>
											</div>
										</div>
										<div class="m-login__form-action">
										<button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">Cancel</button>
											<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign Up</button>
											<!-- <button id="" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign Up</button> -->
										</div>
									</form>
								</div>
								<div class="m-login__forget-password">
									<div class="m-login__head">
										<h3 class="m-login__title">Lupa Password ?</h3>
										<div class="m-login__desc">Isi email untuk merubah password anda:</div>
									</div>
									<form class="m-login__form m-form" action="<?php echo base_url('login/lupa_password'); ?>" method="POST">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
										</div>
										<div class="m-login__form-action">
											<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Batal</button>
											<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Kirim Email</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--center">  
							<div class="m-login__account">
								<span class="m-login__account-msg">Belum punya akun ? Registrasi </span>
								<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link"><b>disini</b></a>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(<?php echo base_url(); ?>assets/app/media/img//bg/bg-login.jpg)">
					<div class="m-grid__item">
						<h3 class="m-login__welcome"></h3>
						<p class="m-login__msg"></p>
					</div>
				</div>
			</div>				
		</div>
		<script src="<?php echo base_url(); ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/demo/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/app/js/login.js" type="text/javascript"></script>
		<script>
			$('.tipe').select2({
				placeholder : 'Pilih Tipe',
				allowclear  : true
			});
			
			$( function(){

				$('.captcha-refresh').on('click', function(){

					$.get('<?php echo base_url().'login/refresh/'; ?>', function(data){

						$('#image_captcha').html(data);
					});

				});

			});
		</script>
	</body>
</html>