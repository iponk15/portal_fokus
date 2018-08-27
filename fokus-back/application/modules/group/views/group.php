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
				<h2 class="m-portlet__head-label m-portlet__head-label btn-custom-primary">
					<span><?php echo $pagetitle; ?></span>
				</h2>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					<a href="<?php echo base_url($url) ?>" class="m-portlet__nav-link m-portlet__nav-link--icon ajaxify">
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
					<a href="<?php echo base_url('group/show_add') ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air ajaxify">
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

<a href="<?php echo base_url('group'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function () {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url("group/select"); ?>';
		var column = [
			{ field: "no",title: "No. ",filterable: true,width: 50,textAlign: 'center'},
			{ field: "group_nama",title: "Nama Group",filterable: true,width: 100}, 
			{ field: "group_role",title: "Role Group",filterable: true,width: 100}, 
			{ field: "group_deskripsi",title: "Deskripsi",filterable: true,width: 250}, 
			{ field: "group_status",title: "Status",filterable: true,width: 70,textAlign: 'center'}, 
			{ field: "action", title: "Action",width: 120,textAlign: 'center'}
		];

	 	var cari = {generalSearch :'.generalSearch'};
	 	global.init_datatable(clas, urll, column,cari);
	});
</script>
