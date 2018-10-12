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
				<div class="col-xl-4 order-1 order-xl-2 m--align-right"></div>
			</div>
		</div>
		<!--begin: Datatable -->
		<div class="datatable"></div>
		<!--end: Datatable -->
	</div>
</div>

<a href="<?php echo base_url($url); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	$(document).ready(function($) {
		var clas   = '.datatable';
		var urll   = '<?php echo base_url($url.'/get_data'); ?>';
		var column = [
			{ field: "no",title: "No. ",sortable: false,width: 30,textAlign: 'center'}, 
			{ field: "tag_nama",title: "Nama", width: 50}, 
			{ field: "action", title: "Action", width: 50,textAlign: 'center'}
		];

		var cari = {generalSearch :'.generalSearch'};
		global.init_datatable(clas, urll, column,cari);
	});
</script>