<?php $sosmed = json_decode($records->penulis_sosmed);?>
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
							<a href="<?php echo base_url($url.'/show_edit/'.$penulis_id); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
								<i class="la la-refresh"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<hr>
			<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url($url.'/action_edit/'.$penulis_id); ?>" method="POST" enctype="multipart/form-data" data-confirm="1">
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
					<div class="col-md-4" style="margin-left: 4.1%;">
						<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon">
											<i class="flaticon-user"></i>
										</span>
										<h3 class="m-portlet__head-text">Foto & Sosial Media</h3>
									</div>			
								</div>
								<div class="m-portlet__head-tools"></div>
							</div>
							<div class="m-portlet__body">
								<div class="form-group m-form__group">
									<label for="exampleInputEmail1">Foto</label>
									<div></div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="penulis_foto">
										<label class="custom-file-label" for="customFile">Pilih Foto</label>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Linkedin </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input value="<?php echo $sosmed->linkedin; ?>" type="text" name="linkedin" class="form-control m-input" placeholder="Linkedin ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Facebook </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input value="<?php echo $sosmed->facebook; ?>" type="text" name="facebook" class="form-control m-input" placeholder="Facebook ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Twitter </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input value="<?php echo $sosmed->twitter; ?>" type="text" name="twitter" class="form-control m-input" placeholder="Twitter ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-md-4 col-form-label">Instagram </label>
									<div class="col-lg-8">
										<div class="input-group">
											<input value="<?php echo $sosmed->instagram; ?>" type="text" name="instagram" class="form-control m-input" placeholder="Instagram ... ">
										</div>
										<span class="m-form__help"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<span class="m-portlet__head-icon">
											<i class="flaticon-edit-1"></i>
										</span>
										<h3 class="m-portlet__head-text">Informasi Penulis</h3>
									</div>			
								</div>
								<div class="m-portlet__head-tools">
									<!-- <ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="" m-portlet-tool="toggle" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-plus"></i></a>	
										</li>
										<li class="m-portlet__nav-item">
											<a href="" m-portlet-tool="reload" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-circle"></i></a>	
										</li>
										<li class="m-portlet__nav-item">
											<a href="#" m-portlet-tool="fullscreen" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-expand"></i></a>	
										</li>
										<li class="m-portlet__nav-item">
											<a href="#" m-portlet-tool="remove" class="m-portlet__nav-link m-portlet__nav-link--icon"><i class="la la-power-off"></i></a>	
										</li>		
									</ul> -->
								</div>
							</div>
							<div class="m-portlet__body">
								<div class="form-group m-form__group row">
									<label class="col-md-2 col-form-label">Nama <span class="m--font-danger">*</span></label>
									<div class="col-lg-5">
										<div class="input-group">
											<input value="<?php echo $records->penulis_nama; ?>" required type="text" name="penulis_nama" class="form-control m-input" placeholder="Nama Penulis ... ">
										</div>
										<span class="m-form__help">Masukan nama penulis</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Email <span class="m--font-danger">*</span></label>
									<div class="col-lg-5">
										<div class="input-group">
											<input value="<?php echo $records->penulis_email; ?>" required type="email" name="penulis_email" class="form-control m-input" placeholder="Email ... ">
										</div>
										<span class="m-form__help">Masukan email penulis</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">Nomer HP <span class="m--font-danger">*</span></label>
									<div class="col-lg-5">
										<div class="input-group">
											<input value="<?php echo $records->penulis_nohp; ?>" required type="number" name="penulis_nohp" class="form-control m-input" placeholder="Nomer HP ... ">
										</div>
										<span class="m-form__help">Masukan nomer hp penulis</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label"> Alamat </label>
									<div class="col-lg-10">
										<textarea name="penulis_alamat" class="form-control m-input" placeholder="Alamat ... "><?php echo $records->penulis_alamat; ?></textarea>
										<span class="m-form__help">Masukan alamat penulis</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label"> Deskripsi </label>
									<div class="col-lg-10">
										<textarea name="penulis_deskripsi" class="form-control m-input penulis_deskripsi" placeholder="Deskripsi ... "><?php echo $records->penulis_deskripsi; ?></textarea>
										<span class="m-form__help">Masukan deskripsi</span>
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

<a href="<?php echo base_url($url.'/show_edit/'.$penulis_id); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$( document ).ready(function() {
		var prm = {height: 150};

		global.init_summernote('.penulis_deskripsi',prm);
		
		var rules   = {};
		var message = {};
			
		global.init_form_validation('.form_add',rules,message);		
	});
</script>

