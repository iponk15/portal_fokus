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
	<form method="POST" action="<?php echo base_url('group/action_add'); ?>" class="m-form m-form--fit m-form--label-align-right form_add" >
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-4 col-form-label">
							Nama Group
						</label>
						<div class="col-7">
							<input required class="form-control m-input" type="text" placeholder="Nama Group" id="example-text-input" name="nama_group">
							<input class="form-control m-input" type="hidden" placeholder="" id="parent" name="parent">
							<input class="form-control m-input" type="hidden" placeholder="" id="child" name="child">
							<input class="form-control m-input" type="hidden" placeholder="" id="controller" name="controller">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-4 col-form-label">
							Role
						</label>
						<div class="col-7">
							<select required class="form-control role" name="role">
								<option value=""></option>
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-4 col-form-label">
							Deskripsi
						</label>
						<div class="col-7">
							<textarea required class="form-control m-input" id="exampleTextarea" rows="3" placeholder="Deskripsi" name="deskripsi"></textarea>
						</div>
					</div>
				</div>
				<div class="col-md-6">				
					<ul style="list-style: none;">
						<?php foreach ($menu as $key => $value): ?>
							<li style="margin-bottom: 1%;margin-top: 1%">
							<?php if (!empty($value->menu_sub_menu)) { ?>
								<i class="cek fa fa-minus-square-o" data-toggle="collapse" data-target="#<?php echo $value->menu_id ?>" data-type="1"></i>
							<?php }else{ ?>
								<i class="fa fa-square-o"></i> 
							<?php } ?>
							<!-- <i class="fa fa-minus-square-o"></i> -->
							<label class="m-checkbox m-checkbox--solid m-checkbox--brand">
								<input type="checkbox" value="<?php echo $value->menu_id ?>" class=" <?php echo 'parent_cek_'.$value->menu_id ?>" onchange="cek_all(this)" data-type="<?php echo $value->menu_id ?>" name="menu_id[]" data-menu_nama="<?php echo $value->menu_nama ?>" data-controller="<?php echo (empty($value->menu_sub_menu) ? $value->menu_controllers : '') ?>" data-menu_is_primary="<?php echo $value->menu_is_primary ?>" data-menu_url="<?php echo $value->menu_url ?>">
								<span style="margin-top: -20%;"></span>
							</label>
							<i class="fa fa-glass m--font-warning"></i> 
							<?php echo $value->menu_nama; ?>
							<?php if (!empty($value->menu_sub_menu)): ?>
								<ul style="list-style-type: none;margin-left: 1.5%;" class="collapse show" id="<?php echo $value->menu_id ?>">
								<?php $menu_sub_menu = json_decode($value->menu_sub_menu);
								foreach ($menu_sub_menu as $key2 => $value2): ?>
										<li style="margin-bottom: 1%;margin-top: 1%">
											<label class="m-checkbox m-checkbox--solid m-checkbox--brand">
												<input type="checkbox" value="<?php echo $value2->text ?>" class="<?php echo $value->menu_id ?>" onchange="cek_checked(this)" name="text[]" data-controller="<?php echo $value2->controller ?>" data-icon="<?php echo $value2->icon ?>" data-icon_menu ="<?php echo $value2->icon_menu ?>" data-parent="<?php echo $value2->parent ?>">
												<span style="margin-top: -20%;"></span>
											</label>
											<i class="fa fa-glass m--font-warning"></i> 
											<?php echo $value2->text ?> 
										</li>
								<?php endforeach ?>
								</ul>									
							<?php endif ?>							
						</li>
						<?php endforeach ?>						
					</ul>
				</div>
			</div>
		</div>
		<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
			<div class="m-form__actions m-form__actions--solid">
				<div class="row">
					<div class="col-lg-6 m--align-right">
						<a href="<?php echo base_url('group'); ?>" class="btn m-btn m-btn--gradient-from-focus m-btn--gradient-to-danger ajaxify">Back</a>
						<button type="button" class="btn m-btn m-btn--gradient-from-metal m-btn--gradient-to-accent" id="btn_submit">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<a href="<?php echo base_url('group/show_add'); ?>" class="reload ajaxify"></a>

<script type="text/javascript">
	function cek_checked(a){
		var c_cek 	= $(a).prop( "checked" );
		var clas 	= $(a).attr('class');
		var count 	= $('input.'+clas+':checked').length;
		if (c_cek == true) {
			if (count > '0') {
				$('li .parent_cek_'+clas).prop('checked', true);				
			}else{
				$('li .parent_cek_'+clas).prop('checked', false);								
			}
		} else {
			if (count > '0') {
				$('li .parent_cek_'+clas).prop('checked', true);				
			}else{
				$('li .parent_cek_'+clas).prop('checked', false);								
			}
		}		
	}

	function cek_all(a){
		var c_cek 	= $(a).prop( "checked" );
		var type 	= $(a).data('type');

		if (c_cek == true) {
			$('.'+type).prop("checked", true);
		} else {
			$('.'+type).prop("checked", false);
		}
	}

	$(document).ready(function() {
		var rules   = {};
	    var message = {};
		global.init_form_validation('.form_add',rules,message);

		global.init_select2('.role','fetch/fetch_global/fokus_role/role_id/role_nama','Pilih Role');

		$('#btn_submit').on('click', function(){
			var child = [];
			var parenting = [];
			var controller = [];
	   		var ctrl = [];
			$('input[type="checkbox"]:checked').each(function() {
	   			var controler = $(this).data('controller');
	   			if (controler!='') {
	   				ctrl.push(controler);	   				
	   			}
	   		});

			$('input[name="text[]"]:checked').each(function() {
	   			var text = $(this).val();
	   			var controller = $(this).data('controller');
	   			var icon = $(this).data('icon');
	   			var icon_menu = $(this).data('icon_menu');
	   			var parent = $(this).data('parent');
	   			item = {};
	   			item ['text'] = text;
	   			item ['icon_menu'] = icon_menu;
	   			item ['controller'] = controller;
	   			item ['parent'] = parent;

	   			child.push(item);
			});

			$('input[name="menu_id[]"]:checked').each(function() {
	   			var menu_id = $(this).val();
	   			var menu_nama = $(this).data('menu_nama');
	   			var menu_controllers = $(this).data('controller');
	   			var menu_is_primary = $(this).data('menu_is_primary');
	   			var menu_url = $(this).data('menu_url');
	   			item = {};
	   			item ['menu_id'] = menu_id;
	   			item ['menu_nama'] = menu_nama;
	   			item ['menu_controllers'] = menu_controllers;
	   			item ['menu_is_primary'] = menu_is_primary;
	   			item ['menu_url'] = menu_url;
	   			item ['menu_sub_menu'] = "";

	   			parenting.push(item);
			});
			$('#parent').val(JSON.stringify(parenting));
			$('#child').val(JSON.stringify(child));
			$('#controller').val(JSON.stringify(ctrl));
			$('.form_add').submit();
		});

		$('.cek').click(function(){
			var plus = 'fa-plus-square-o';
			var min  = 'fa-minus-square-o';
			var type = $(this).data('type');
			var clas = $(this).attr('class');
			if (clas == 'cek fa fa-plus-square-o' || clas == 'cek fa fa-plus-square-o collapsed') {
				$(this).removeClass(plus);
				$(this).addClass(min);
			} else {
				$(this).removeClass(min);
				$(this).addClass(plus);
			}
		});		
	});
</script>