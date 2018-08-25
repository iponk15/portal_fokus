<div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<span class="m-portlet__head-icon m--hide">
					<i class="flaticon-statistics"></i>
				</span>
				<h3 class="m-portlet__head-text">
					<?php echo $subtitle; ?>
				</h3>
				<h2 class="m-portlet__head-label m-portlet__head-label btn-custom-primary">
					<span><?php echo $pagetitle; ?></span>
				</h2>
			</div>
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
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<select class="form-control m-input m-input--air icon_tipe">
									<option value=""></option>
									<option value="1">Flaticon</option>
									<option value="2">Fa Icon</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="m-input-icon m-input-icon--left">
								<select class="form-control m-input m-input--air icon_status">
									<option value=""></option>
									<option value="1">Aktive</option>
									<option value="0">Inactive</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
					<a href="<?php echo base_url('icon/show_add') ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air ajaxify">
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

<a href="<?php echo base_url('icon'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function() {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url("icon/get_data"); ?>';
		var column = [
		{ field: "no",title: "No. ",sortable: false,width: 30,textAlign: 'center'}, 
		{ field: "icon_icon",title: "Icon",filterable: true,width: 80,textAlign: 'center'}, 
		{ field: "icon_tipe",title: "Icon Type",filterable: true,width: 80,textAlign: 'center'}, 
		{ field: "icon_preview",title: "Icon Preview",filterable: true,width: 80,textAlign: 'center'}, 
		{ field: "icon_status",title: "Status",filterable: true,width: 70,textAlign: 'center'}, 
		{ field: "action", title: "Action",filterable: true,width: 120,textAlign: 'center'}
		];

		var cari = {generalSearch :'.generalSearch', icon_tipe : '.icon_tipe', icon_status : '.icon_status'};
		global.init_datatable(clas, urll, column,cari);
		global.init_select2('.icon_tipe','','Pilih Tipe');
		global.init_select2('.icon_status','','Pilih Status');
	});
</script>