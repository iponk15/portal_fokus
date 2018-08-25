<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text"><?php echo $pagetitle; ?></h3>
            </div>
        </div>
    </div>
    <form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo $url.'/aksi_simpan'; ?>" method="post">
        <input type="hidden" name="sadaten_key" value="<?php echo $key ?>">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="col-lg-3">
                    <label>Judul : <span class="m--font-danger">*</span></label>
                    <input value="<?php echo @$records[0]->judul; ?>" required type="text" name="judul_pasien" class="form-control m-input" placeholder="Input Judul">
                    <span class="m-form__help"></span>
                </div>
                <div class="col-lg-9">
                    <label class="">Deskripsi : <span class="m--font-danger">*</span></label>
                    <textarea required class="form-control m-input summernote" name="deskripsi_pasien"><?php echo @$records[0]->deskripsi; ?></textarea>
                    <span class="m-form__help"></span>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-lg-3">
                    <label>Judul : <span class="m--font-danger">*</span></label>
                    <input value="<?php echo @$records[1]->judul; ?>" required type="text" name="judul_nakes" class="form-control m-input" placeholder="Input Judul">
                    <span class="m-form__help"></span>
                </div>
                <div class="col-lg-9">
                    <label class="">Deskripsi : <span class="m--font-danger">*</span></label>
                    <textarea required class="form-control m-input summernote" name="deskripsi_nakes"><?php echo @$records[1]->deskripsi; ?></textarea>
                    <span class="m-form__help"></span>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
                <div class="row">
                    <div class="col-lg-12 m--align-right">
                        <button type="submit" class="btn m-btn btn-custom-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<a href="<?php echo $url; ?>" class="reload ajaxify"></a>

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