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
        <form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo $url.'/aksi_tambah'; ?>" method="post">
            <div class="m-portlet__body">
                <div class="m-form__content">
                    <div class="m-alert m-alert--icon alert alert-danger m--hide m_form_msg" role="alert">
                        <div class="m-alert__icon"><i class="la la-warning"></i></div>
                        <div class="m-alert__text">Oh Shit Man! Ada inputan yang masih belum di isi.</div>
                        <div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="form-group m-form__group row kgrLama" <?php echo (empty($records) ? 'style="display:none"' : '' ); ?> >
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Kategori <span class="m--font-danger">*</span></label>
                    <div class="col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-9 col-md-5 col-sm-6">
                                <select <?php echo (empty($records) ? '' : 'required' ); ?>  class="form-control kategori" name="kategori">
                                    <option value=""></option>
                                </select>
                                <span class="m-form__help"></span>
                            </div>&nbsp;&nbsp;
                            <div class="col-2">
                                <button type="button" data-type="1" style="margin-top: 2%;" class="btn btn-accent m-btn m-btn--icon btn-sm m-btn--icon-only katBaru"><i class="la la-plus-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row ktgrBaru" <?php echo (empty($records) ? '' : 'style="display:none"' ); ?>>
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Kategori Baru <span class="m--font-danger">*</span></label>
                    <div class="col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-10 col-md-4 col-sm-6">
                                <input <?php echo (empty($records) ? 'required' : 'disabled' ); ?> type="text" name="katergori_baru" class="form-control inptKtgr" placeholder="Kategori"/>
                                <span class="m-form__help"></span>
                            </div>&nbsp;&nbsp;
                            <div class="col-xs-2 col-md-2 col-sm-2">
                                <button type="button" data-type="0" style="margin-top: 2%;<?php echo (empty($records) ? 'display:none;' : '' ); ?>" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only katLama"><i class="la la-microphone"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label for="example-text-input" class="col-md-2 col-sm-12 col-form-label">Flag <span class="m--font-danger">*</span></label>
                    <div class="col-12 col-md-3">
                        <select required name="flag" class="form-control flag">
                            <option value=""></option>
                            <option value="0">Pasien</option>
                            <option value="1">Nakes</option>
                        </select>
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

<a href="<?php echo $url.'/tambah_data'; ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
        $('.flag').select2({
            placeholder: 'Pilih Flag'
        });

        $('.katBaru, .katLama').click(function(){
            var type = $(this).attr('data-type');
            
            if(type == '1'){
                $('.katLama').fadeIn('slow');
                $('.katBaru').fadeOut('slow');

                $('.ktgrBaru').fadeIn('slow');
                $('.kgrLama').fadeOut('slow');
                
                $('.kategori').attr('disabled',true);
                $('.kategori').val('').trigger('change');
                $('.inptKtgr').attr('required',true);
                $('.inptKtgr').attr('disabled',false);
            }else{
                $('.katBaru').fadeIn('slow');
                $('.katLama').fadeOut('slow');

                $('.kgrLama').fadeIn('slow');
                $('.ktgrBaru').fadeOut('slow');

                $('.kategori').attr('disabled',false);
                $('.inptKtgr').attr('required',false);
                $('.inptKtgr').attr('disabled',true);
                $('.inptKtgr').val('');
            }
        });

		// set form validation
		var rules   = {};
	    var message = {};
		global.init_form_validation('.form_add',rules,message);
		
		var prm = {height: 150};
		global.init_summernote('.summernote',prm);
        global.init_select2('.kategori','fetch/fetch_global/faq_kategori/id/kategori','Pilih Kategori');

	});
</script>