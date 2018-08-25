<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text"><?php echo $pagetitle ?></h3>
			</div>
		</div>
	</div>
	<div class="m-portlet m-portlet--tab">
		<!--begin::Form-->
		<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo $url.'/aksi_ubahKategori/'.$id; ?>" method="post">
			<div class="m-portlet__body">
				<div class="m-form__content">
					<div class="m-alert m-alert--icon alert alert-warning m--hide m_form_msg" admin="alert">
						<div class="m-alert__icon"><i class="la la-warning"></i></div>
						<div class="m-alert__text">Oh Shit Man! Ada inputan yang masih belum di isi.</div>
						<div class="m-alert__close"><button type="button" class="close" data-close="alert" aria-label="Close"></button></div>
					</div>
				</div>
				<div class="form-group m-form__group row">
					<label for="example-text-input" class="col-2 col-form-label">Kategori</label>
					<div class="col-4">
						<input class="form-control m-input" type="text" name="kategori" value="<?php echo $records->kategori ?>" placeholder="Nomer Pegawai">
					</div>
				</div>
				<div class="form-group m-form__group row">
                    <label for="example-text-input" class="col-2 col-form-label">Flag <span class="m--font-danger">*</span></label>
                    <div class="col-4">
                        <select required name="flag" class="form-control flag">
                            <option value=""></option>
                            <option <?php echo ($records->flag == '0' ? 'selected' : ''); ?> value="0">Pasien</option>
                            <option <?php echo ($records->flag == '1' ? 'selected' : ''); ?> value="1">Nakes</option>
                        </select>
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

<a href="<?php echo $url; ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
		$('.flag').select2({
            placeholder: 'Pilih Flag'
        });

		// set form validation
		var rules   = {};
	    var message = {};
        global.init_form_validation('.form_add',rules,message);
        
	});
</script>