<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text"><?php echo $pagetitle; ?></h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="<?php echo base_url($url); ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
						<i class="la la-refresh"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
		<!--begin: Search Form -->
		<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
			<div class="row align-items-center">
				<div class="col-xl-8 order-2 order-xl-1">
					<div class="form-group m-form__group row align-items-center">
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input generalSearch" placeholder="Search...">
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
						<a href="<?php echo base_url('faq/tambah_data') ?>" class="ajaxify btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
							<span><i class="la la-plus-circle"></i><span>Tambah Data</span></span>
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

<a href="<?php echo base_url($url); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
		var clas    = '.datatable';
		var urll    = '<?php echo base_url("faq/select"); ?>';
		var urllC   = '<?php echo base_url("faq/select_relasi"); ?>';
		var column  = [
			{ field: "no",title: "#. ",filterable: false,width: 20,textAlign: 'center'}, 
			{ field: "kategori",title: "Kategori",filterable: true,width: 190,textAlign: 'left'},
			{ field: "flag",title: "Flag",filterable: true,width: 190,textAlign: 'center'},
			{ field: "action", title: "Action",width: 70,textAlign: 'center'}
		];

		var columnC = [
			{ field: "no",title: "No. ",filterable: true,width: 30,textAlign: 'center'},
			{ field: "pertanyaan",title: "Pertanyaan",filterable: true,width: 250,textAlign: 'left'},
			{ field: "jawaban",title: "Jawaban",filterable: true,width: 900,textAlign: 'left'},
			{ field: "action", title: "Action",width: 70,textAlign: 'center'}
		];

	 	var cari = {generalSearch :'.generalSearch'};
	 	global.init_datatable_child(clas, urll, column,cari,urllC,columnC);
	});
</script>