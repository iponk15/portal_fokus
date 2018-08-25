<div class="m-portlet m-portlet--mobile">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Role
				</h3>
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
					</div>
				</div>
				<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="<?php echo base_url('role/show_add') ?>" class="ajaxify btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air">
							<span><i class="la la-plus-circle"></i><span>Add Role</span></span>
						</a>
					<div class="m-separator m-separator--dashed d-xl-none"></div>
				</div>
			</div>
		</div>
		<!--begin: Datatable -->
		<div class="datatable"></div>
		<!--end: Datatable -->

<a href="<?php echo base_url('role'); ?>" class="reload ajaxify"></a>
		<!--end: Datatable -->
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url("role/select"); ?>';
		var column = [
			{ field: "no",title: "No. ",filterable: true,width: 50,textAlign: 'center'}, 
			{ field: "nama",title: "Nama",filterable: true,width: 90,textAlign: 'center'}, 
			{ field: "desc",title: "Descripsi",filterable: true,width: 150}, 
			{ field: "status",title: "Status",filterable: true,width: 70}, 
			{ field: "action", title: "Action",width: 120,textAlign: 'center'}
		];

	 	var cari = {generalSearch :'.generalSearch'};
	 	global.init_datatable(clas, urll, column,cari);
	});
</script>