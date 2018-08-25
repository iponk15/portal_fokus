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
					<a href="<?php echo $url; ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
						<i class="la la-refresh"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<hr>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input generalSearch" placeholder="Search ...">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?php echo base_url($url.'/show_add'); ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air ajaxify">
						<span>
							<i class="la la-calendar-plus-o"></i>
							<span>Tambah Data</span>
						</span>
					</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--begin: Datatable -->
		<div class="datatable"></div>
		<!--end: Datatable -->
	</div>
</div>

<div class="modal fade" id="m_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					New message
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="form-control-label">
							Recipient:
						</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="message-text" class="form-control-label">
							Message:
						</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary">
					Send message
				</button>
			</div>
		</div>
	</div>
</div>

<a href="<?php echo base_url($url); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function() {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url($url.'/get_data'); ?>';
		var urllC  = '<?php echo base_url($url.'/get_relasi'); ?>';
		var column = [
			{ field: "no",title: "#",sortable: false,width: 30,textAlign: 'center'}, 
			{ field: "user_nama",title: "Nama",filterable: true,width: 80}, 
			{ field: "user_email",title: "Email",filterable: true,width: 120}, 
			{ field: "user_nohp",title: "No HP",filterable: true,width: 90}, 
			{ field: "user_tmptglhr",title: "Tempat & Tanggal Lahir",filterable: true,width: 180}, 
			{ field: "user_jenmin",title: "Gender",filterable: true,width: 80,textAlign: 'center'}, 
			{ field: "user_detkes_usia",title: "Usia",filterable: true,width: 80,textAlign: 'center'}, 
			{ field: "user_status",title: "Status",filterable: true,width: 70,textAlign: 'center'}, 
			{ field: "action", title: "Action",filterable: true,width: 190,textAlign: 'center'}
		];

		var columnC = [
			{ field: "no",title: "No. ",filterable: true,width: 30,textAlign: 'center'},
			{ field: "detsen_judul",title: "Judul",filterable: true,width: 80,textAlign: 'center'},
			{ field: "detsen_alamat",title: "Alamat",filterable: true,width: 200,textAlign: 'left'},
			{ field: "detsen_kotaprov",title: "Kota Provinsi",filterable: true,width: 200,textAlign: 'left'},
			{ field: "detsen_kodepos",title: "Kode Pos",filterable: true,width: 80,textAlign: 'center'},
			{ field: "detsen_koordinat_long",title: "Koordinat Long",filterable: true,width: 100,textAlign: 'left'},
			{ field: "detsen_koordinat_lat",title: "Koordinat Lat",filterable: true,width: 100,textAlign: 'left'},
			{ field: "detsen_status",title: "Status",filterable: true,width: 80,textAlign: 'left'},
			{ field: "action", title: "Action",width: 150,textAlign: 'center'}
		];

		var cari = {generalSearch :'.generalSearch'};
		global.init_datatable_child(clas, urll, column,cari,urllC,columnC);

	});
</script>