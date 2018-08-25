<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height   m-portlet--rounded">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title m--hide">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="assets/app/media/img/users/user4.jpg" alt=""/>
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name"><?php echo $records->user_nama; ?></span>
                        <a href="" class="m-card-profile__email m-link"><?php echo $records->user_email; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs   m-portlet--rounded">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                Informasi User
                            </a>
                        </li>
                        <!-- <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                Messages
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                Settings
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="m-portlet__head-tools"></div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form class="m-form m-form--fit m-form--label-align-right">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">1. Personal Details</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Nama Lengkap
                                </label>
                                <div class="col-7">
                                    <input readonly class="form-control m-input" type="text" value="<?php echo $records->user_nama; ?>">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    Email
                                </label>
                                <div class="col-7">
                                    <input readonly class="form-control m-input" type="text" value="<?php echo $records->user_email; ?>">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                    No. Telepon
                                </label>
                                <div class="col-7">
                                    <input readonly class="form-control m-input" type="text" value="<?php echo $records->user_nohp; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-7">
                                        <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            Save changes
                                        </button>
                                        &nbsp;&nbsp;
                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </form>
                </div>
                <!-- <div class="tab-pane " id="m_user_profile_tab_2"></div>
                <div class="tab-pane " id="m_user_profile_tab_3"></div> -->
            </div>
        </div>
    </div>
</div>