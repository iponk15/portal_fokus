<div class="m-header__top" style="background-color: currentColor">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--ver m-stack--desktop">		
            <div class="m-stack__item m-brand m-stack__item--left">
                <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="<?php echo base_url(); ?>" class="m-brand__logo-wrapper">
                            <!-- <img alt="" src="<?php echo base_url(); ?>assets/demo/media/img/logo/inmed_200x63.png" class="m-brand__logo-default"/>
                            <img alt="" src="<?php echo base_url(); ?>assets/demo/media/img/logo/inmed_200x63.png" class="m-brand__logo-inverse"/> -->
                            <h1>Fokus.com</h1>
                        </a>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-brand__tools">					
                        <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable- m-header-search--skin-" id="m_quicksearch" m-quicksearch-mode="default">
                <form class="m-header-search__form">
                    <div class="m-header-search__wrapper">
                        <span class="m-header-search__icon-search" id="m_quicksearch_search">
                            <i class="la la-search"></i>
                        </span>
                        <span class="m-header-search__input-wrapper">
                            <input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="m_quicksearch_input">
                        </span>
                        <span class="m-header-search__icon-close" id="m_quicksearch_close">
                            <i class="la la-remove"></i> 
                        </span>
                        <span class="m-header-search__icon-cancel" id="m_quicksearch_cancel">
                            <i class="la la-remove"></i>
                        </span>
                    </div>
                </form>  
                <div class="m-dropdown__wrapper">
                    <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                    <div class="m-dropdown__inner">	
                        <div class="m-dropdown__body">
                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-height="300" data-mobile-height="200">
                                <div class="m-dropdown__content m-list-search m-list-search--skin-light">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-stack__item m-stack__item--right m-header-head" id="m_header_nav">
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-topbar__notifications m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
                                <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span>
                                    <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="flaticon-music-2"></i></span></span>
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center">
                                            <span class="m-dropdown__header-title">9 New</span>
                                            <span class="m-dropdown__header-subtitle">User Notifications</span>
                                        </div>
                                        <div class="m-dropdown__body">				
                                            <div class="m-dropdown__content">
                                                <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                        Alerts
                                                        </a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">Events</a>
                                                    </li>
                                                    <li class="nav-item m-tabs__item">
                                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">Logs</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                        <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                        <span class="m-list-timeline__text">12 new users registered</span>
                                                                        <span class="m-list-timeline__time">Just now</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">System shutdown <span class="m-badge m-badge--success m-badge--wide">pending</span></span>
                                                                        <span class="m-list-timeline__time">14 mins</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">New invoice received</span>
                                                                        <span class="m-list-timeline__time">20 mins</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">DB overloaded 80% <span class="m-badge m-badge--info m-badge--wide">settled</span></span>
                                                                        <span class="m-list-timeline__time">1 hr</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">System error - <a href="#" class="m-link">Check</a></span>
                                                                        <span class="m-list-timeline__time">2 hrs</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span href="" class="m-list-timeline__text">New order received <span class="m-badge m-badge--danger m-badge--wide">urgent</span></span>
                                                                        <span class="m-list-timeline__time">7 hrs</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">Production server down</span>
                                                                        <span class="m-list-timeline__time">3 hrs</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge"></span>
                                                                        <span class="m-list-timeline__text">Production server up</span>
                                                                        <span class="m-list-timeline__time">5 hrs</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                        <div class="m-scrollable" data-scrollable="true" data-height="250" data-mobile-height="200">
                                                            <div class="m-list-timeline m-list-timeline--skin-light">
                                                                <div class="m-list-timeline__items">
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                        <a href="" class="m-list-timeline__text">New order received</a>
                                                                        <span class="m-list-timeline__time">Just now</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                        <a href="" class="m-list-timeline__text">New invoice received</a>
                                                                        <span class="m-list-timeline__time">20 mins</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                        <a href="" class="m-list-timeline__text">Production server up</a>
                                                                        <span class="m-list-timeline__time">5 hrs</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                        <a href="" class="m-list-timeline__text">New order received</a>
                                                                        <span class="m-list-timeline__time">7 hrs</span>
                                                                    </div>
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                        <a href="" class="m-list-timeline__text">System shutdown</a>
                                                                        <span class="m-list-timeline__time">11 mins</span>
                                                                    </div>										
                                                                    <div class="m-list-timeline__item">
                                                                        <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                        <a href="" class="m-list-timeline__text">Production server down</a>
                                                                        <span class="m-list-timeline__time">3 hrs</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                        <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                            <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                <span class="">All caught up!<br>No new logs.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                    <span class="m-nav__link-icon"><span class="m-nav__link-icon-wrapper"><i class="flaticon-share"></i></span></span>	
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center">
                                            <span class="m-dropdown__header-title">Quick Actions</span>
                                            <span class="m-dropdown__header-subtitle">Shortcuts</span>
                                        </div>
                                        <div class="m-dropdown__body m-dropdown__body--paddingless">
                                            <div class="m-dropdown__content">
                                                <div class="m-scrollable" data-scrollable="false" data-height="380" data-mobile-height="200">
                                                    <div class="m-nav-grid m-nav-grid--skin-light">
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-file"></i>
                                                                <span class="m-nav-grid__text">Generate Report</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-time"></i>
                                                                <span class="m-nav-grid__text">Add New Event</span>
                                                            </a>
                                                        </div>
                                                        <div class="m-nav-grid__row">
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                <span class="m-nav-grid__text">Create New Task</span>
                                                            </a>
                                                            <a href="#" class="m-nav-grid__item">
                                                                <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                <span class="m-nav-grid__text">Completed Tasks</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                    <span class="m-topbar__userpic">
                                        <img src="<?php echo base_url(); ?>assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                    </span>
                                    <span class="m-nav__link-icon m-topbar__usericon  m--hide">
                                        <span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
                                    </span>
                                    <span class="m-topbar__username m--hide">Nick</span>					
                                </a>
                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center">
                                            <div class="m-card-user m-card-user--skin-light">
                                                <div class="m-card-user__pic">
                                                    <img src="<?php echo base_url(); ?>assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">
                                                        <?php echo getSession()['user_nama']; ?>
                                                    </span>
                                                    <a href="" class="m-card-user__email m--font-weight-300 m-link" style="font-size: x-small;">
                                                        <?php echo getSession()['user_email']; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">
                                                            Section
                                                        </span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="<?php echo base_url('profile'); ?>" class="m-nav__link ajaxify">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                <span class="m-nav__link-wrap">
                                                                    <span class="m-nav__link-text">
                                                                        My Profile
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                                    <li class="m-nav__item">
                                                        <a href="<?php echo base_url('login/out') ?>" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                            Logout
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>			
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-header__bottom">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--ver m-stack--desktop">		
            <div class="m-stack__item m-stack__item--fluid m-header-menu-wrapper">
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-light m-aside-header-menu-mobile--submenu-skin-light "  >		
                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <?php  
                            $menu_role 		= menu_role(getSession()['user_role']);
                            $group_data 	= json_decode($menu_role[0]->group_data);
                            $uri  			= $this->uri->segment(1) == '' ? 'welcome' : $this->uri->segment(1);
                            $uri_config  	= $this->uri->segment(1) == '' ? 'config' : $this->uri->segment(1);
                            $uri_segment 	=  $this->uri->segment(1);
                            $html 			= '';
                            
                            foreach ($group_data as $data) {
                                if(isJSON($data->menu_controllers)){
                                    $dec_con = json_decode($data->menu_controllers);

                                    if(in_array($uri, $dec_con)){
                                        $active_sub = 'm-menu__item--active-tab';
                                    }else{
                                        $active_sub = '';
                                    }
                                }else{									
                                    if($data->menu_url == $uri){
                                        $active_sub = 'm-menu__item--active-tab';
                                    }else{
                                        $active_sub = '';
                                    }                                    
                                }

                                $paramChild = false;
                                if (is_array($data->menu_controllers)) {
                                    if (in_array($uri, $data->menu_controllers)) {
                                        $paramChild = true;
                                    }
                                }

                                $html .= '
                                    <li class="m-menu__item m-menu__item--submenu m-menu__item--tabs '.tab_menu($data->menu_is_primary, $data->menu_controllers,  $uri, $paramChild).$active_sub.'"  m-menu-submenu-toggle="tab" aria-haspopup="true">
                                        <a  href="'.(!empty($data->menu_url) ? base_url().$data->menu_url : 'javascript:void(0)' ).'" class="m-menu__link '.(!empty($data->menu_url) ? 'ajaxify single' : 'm-menu__toggle').'">
                                            <span class="m-menu__link-text">
                                                '.$data->menu_nama.'
                                            </span>
                                            <i class="m-menu__hor-arrow la la-angle-down"></i>
                                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                                        </a>';
                                            if(!empty($data->menu_sub_menu)){
                                                $decode = $data->menu_sub_menu;
                                                $html.= '<div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left m-menu__submenu--tabs">
                                                <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                                <ul class="m-menu__subnav">';
                                                foreach ($decode as $submenu) {
                                                    $html .= '
                                                        <li class="m-menu__item '.($submenu->controller == $uri ? 'm-menu__item--active' : '').'"  data-redirect="true" aria-haspopup="true">
                                                            <a  href="'.base_url($submenu->controller).'" class="m-menu__link ajaxify">
                                                                <i class="m-menu__link-icon flaticon-'.$submenu->icon_menu.'"></i>
                                                                <span class="m-menu__link-text">'.$submenu->text.'</span>
                                                            </a>
                                                        </li>';
                                                }
                                                $html .= '	</ul>
                                                </div>';
                                            }

                                $html .='
                                    </li>';
                            }

                            echo $html;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>