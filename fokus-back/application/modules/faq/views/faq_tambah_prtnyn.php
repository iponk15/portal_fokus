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
        <form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo $url.'/aksi_tambah_pertnyn/'; ?>" method="post">
            <div class="m-portlet__body">
                <div class="m-form__content">
                    <div class="m-alert m-alert--icon alert alert-danger m--hide m_form_msg" role="alert">
                        <div class="m-alert__icon"><i class="la la-warning"></i></div>
                        <div class="m-alert__text">Oh Shit Man! Ada inputan yang masih belum di isi.</div>
                        <div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="form-group m-form__group row ktgrBaru">
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Kategori </label>
                    <div class="col-12 col-md-5">
                        <input disabled type="text" value="<?php echo $records->kategori; ?>" class="form-control inptKtgr"/>
                        <input type="hidden" name="id_kategori" value="<?php echo $records->id; ?>" />
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Flag <span class="m--font-danger">*</span></label>
                    <div class="col-12 col-md-5">
                        <input type="text" disabled value="<?php echo ($records->flag == '0' ? 'Pasien' : 'Nakes'); ?>" class="form-control inptKtgr"/>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Pertanyaan <span class="m--font-danger">*</span></label>
                    <div class="col-12 col-md-5">
                        <textarea required name="pertanyaan" class="form-control" rows="2" placeholder="Input Pertanyaan"></textarea>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="example-email-input" class="col-md-2 col-sm-12 col-form-label">jawaban <span class="m--font-danger">*</span></label>
                    <div class="col-12 col-md-5">
                        <textarea required class="form-control m-input summernote" name="jawaban"></textarea>
                        <span class="m-form__help"></span>
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

<a href="<?php echo $url.'/tambah_pertanyaan/'.$id; ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {

		// set form validation
		var rules   = {};
	    var message = {};
		global.init_form_validation('.form_add',rules,message);
		
		var prm = {height: 150};
		global.init_summernote('.summernote',prm);
	});
</script>