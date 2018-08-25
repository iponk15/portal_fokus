<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text"><?php echo $pagetitle; ?></h3>
            </div>
        </div>
    </div>
    <div class="m-portlet m-portlet--tab">
        <!--begin::Form-->
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
				<div class="form-group m-form__group row justify-content-center">
                    <label for="example-email-input" class="col-11 col-form-label text-left">Deskripsi <span class="m--font-danger">*</span></label>
                    <div class="col-11">
                        <textarea required class="form-control m-input summernote" name="tentang_deskripsi"><?php echo @$records->tentang_deskripsi; ?></textarea>
                        <span class="m-form__help"></span>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="offset-1 col-10 m--align-right">
                            <button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<a href="<?php echo $url; ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {

		// set form validation
		var rules   = {};
	    var message = {};
		global.init_form_validation('.form_add',rules,message);

        var prm = {height: 350};
		global.init_summernote('.summernote',prm);

	});
</script>