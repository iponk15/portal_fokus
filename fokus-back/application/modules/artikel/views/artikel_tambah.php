<div class="row">
	<div class="col-md-12">
		<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<?php 
							if(!empty($subtitle)){
								echo '<span class="m-portlet__head-icon">
										<i class="flaticon-exclamation-1"></i>
									</span>
									<h3 class="m-portlet__head-text">'.$subtitle.'</h3>';
							}
						?>
						<h2 class="m-portlet__head-label btn-custom-primary">
							<span><?php echo $pagetitle; ?></span>
						</h2>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo base_url($url); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-mail-reply"></i>
							</a>
						</li>
						<li class="m-portlet__nav-item">
							<a href="<?php echo base_url($url.'/show_add'); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_add'); ?>" method="POST" enctype="multipart/form-data">
				<div class="m-form__content">
					<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger m--hide m_form_msg" role="alert">
						<div class="m-alert__icon"><i class="flaticon-warning-2"></i><span></span></div>
						<div class="m-alert__text"><strong>Warning !!!</strong> <br> Change a few things up and try submitting again.  </div>
						<div class="m-alert__actions" style="width: 200px;">
							<button type="button" class="btn btn-danger btn-sm m-btn m-btn--pill m-btn--wide" data-dismiss="alert" aria-label="Close">
								Dismiss
							</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon">
											<i class="flaticon-edit-1"></i>
										</span>
										<h3 class="m-portlet__head-text">Informasi Artikel</h3>
									</div>			
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label class="col-md-2 col-form-label">Judul <span class="m--font-danger">*</span></label>
									<div class="col-lg-5">
										<div class="input-group">
											<input required type="text" name="artikel_judul" class="form-control m-input" placeholder="Judul Artikel ... ">
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Ringkasan</label>
									<div class="col-lg-10">
										<div class="input-group">
											<textarea name="artikel_ringkasan" class="form-control m-input	" rows="2" placeholder="Ringkasan max(100 karakter)..."></textarea>
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Tipe <span class="m--font-danger">*</span></label>
									<div class="col-lg-5">
										<div class="input-group">
											<select required name="artikel_tipe" class="form-control m-input artikel_tipe">
												<option></option>
												<option value="1">Konten Standar</option>
												<option value="2">Konten Video</option>
												<option value="3">Konten Audio</option>
												<option value="4">Konten Galeri</option>
												<option value="4">Konten Gambar</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label"> Kategori </label>
									<div class="col-lg-5">
										<select required name="artikel_kategoriId" class="form-control m-input artikel_kategoriId">
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="form-group m-form__group">
									<label class="col-lg-2" for="exampleTextarea">Example textarea</label>
									<textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon">
											<i class="flaticon-user"></i>
										</span>
										<h3 class="m-portlet__head-text">Galery</h3>
									</div>			
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">Foto</label>
									<div></div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="artikel_foto">
										<label class="custom-file-label" for="customFile">Pilih Foto</label>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Linkedin </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="text" name="linkedin" class="form-control m-input" placeholder="Linkedin ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Facebook </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="text" name="facebook" class="form-control m-input" placeholder="Facebook ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Twitter </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="text" name="twitter" class="form-control m-input" placeholder="Twitter ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Instagram </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input type="text" name="instagram" class="form-control m-input" placeholder="Instagram ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<div class="row">
							<div class="col-10"></div>
							<div class="col-2">
								<a href="<?php echo base_url($url); ?>" class="btn btn-secondary ajaxify">Kembali</a>
								<button type="submit" class="btn btn-success">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<a href="<?php echo base_url($url.'/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		ClassicEditor.create( document.querySelector( '#editor1' ) ).then( editor => {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
			heading: {
				options: [
					{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
					{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
					{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
				]
			}
		} ).catch( error => {
			console.error( error );
		} );

		global.init_select2('.artikel_kategoriId','fetch/fetch_kategori/','Pilih Kategori');

		$('.artikel_tipe').select2({
			placeholder : 'Pilih Tipe',
			allowClear   : true
		});

		var prm = {height: 150};

		global.init_summernote('.artikel_deskripsi',prm);
		
		var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>

