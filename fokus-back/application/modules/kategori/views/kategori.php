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
					<a href="<?php echo base_url($url.'/tampil_tambah'); ?>" class="btn btn-outline-success m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air ajaxify">
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

<div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="bodyLayanan"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>	

<div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			
		</div>
	</div>
</div>
<a href="<?php echo base_url($url); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function($) {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url($url.'/get_data'); ?>';
		var column = [
			{ field: "no",title: "No. ",sortable: false,width: 30,textAlign: 'center'}, 
			{ field: "kategori_kode",title: "Kode", width: 30,textAlign: 'center'}, 
			{ field: "kategori_nama",title: "Nama", width: 100}, 
			{ field: "kategori_deskripsi",title: "Deskripsi", width: 200}, 
			{ field: "kategori_status",title: "Status", width: 60,textAlign: 'center'}, 
			{ field: "action", title: "Action", width: 150,textAlign: 'center'}
		];

		var cari = {generalSearch :'.generalSearch'};
		global.init_datatable(clas, urll, column,cari);
	});
</script>