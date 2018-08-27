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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Fokus || <?php echo ($pagetitle != '' ? $pagetitle : 'Blank'); ?></title>
        <meta name="description" content="Latest updates and statistic charts"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        
        <link href="<?php echo base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/vendors/base/vendors.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/demo/base/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/app/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url('assets/app/media/img/icons/favicon.png'); ?>" />
        <?php 
            foreach ( $this->config->item('plugin') as $key => $value) {
                get_additional( $value, 'css' );
            } 
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            var base_url = '<?php echo base_url() ?>';
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700","Asap+Condensed:500"]},
                    active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/demo/base/scripts.bundle.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/app/js/global_helper.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/app/js/ajaxify.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/app/js/custom.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/app/js/dashboard.js'); ?>" type="text/javascript"></script>
        <?php 
            foreach ( $this->config->item('plugin') as $key => $value) {
                echo get_additional( $value, 'js' );
            } 
        ?>
        <script>
            $(window).on('load', function() {
                $('body').removeClass('m-page--loading');         
            });
        </script> 
    </head>
    <body   class="m-page--fluid m-page--loading-enabled m-page--loading m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  >
        <div class="m-page-loader m-page-loader--base">
            <div class="m-blockui">
                <span>Please wait...</span>
                <span><div class="m-loader m-loader--brand"></div></span>
            </div>
        </div>
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <header id="m_header" class="m-grid__item m-header" m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="10" m-minimize-mobile-offset="10" >
                <?php echo $_header; ?>
            </header>
            <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop m-page__container m-body">
                <div class="m-grid__item m-grid__item--fluid m-wrapper body-content" id="body-content">
                    <?php echo $_breadcumb; ?>	     
                    <div class="m-content">
                        <?php echo $_content; ?>
                    </div>
                </div>
            </div>
            <footer class="m-grid__item m-footer ">
                <?php echo $_footer; ?>
            </footer>
        </div>
        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <ul class="m-nav-sticky" style="margin-top: 30px;">
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
                <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
                <a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
            </li>
            <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
                <a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
            </li>
        </ul>         
    </body>
    <script>
		function la(la) {
			let sub = la.siblings('.m-menu__submenu--classic');
			if (!sub.find('.m-menu__subnav').children().length > 0 && la.hasClass('single')) {
				sub.hide();
				la.css('border-radius','6px');
				$('.m-header .m-header__bottom').css('height','none');
				la.closest('.m-header__bottom').animate({height: "56px"},600);
			}else{
				sub.show();
				la.closest('.m-header__bottom').animate({height: "126px"},600);
			}
		}
		$(document).on('click', '.m-menu__link', function () {
			la($(this));
		})
		$(document).ready(function () {
				if (!$('.m-menu__item--active-tab').children('div').length > 0) {
					$('.m-menu__link').closest('.m-header__bottom').animate({height: "56px"},600);
				} else {
					$('.m-menu__link').closest('.m-header__bottom').animate({height: "126px"},600);
				}
			// $(window).bind("resize", function () {
            // if (window.screen.availWidth > 1400) {
            //     $('.m-page__container').addClass('boxed-layout');
            // } else {
            //     $('.m-page__container').removeClass('boxed-layout');
            // }
            // }).resize();
		});
	</script>
</html>