<form class="m-form m-form--fit m-form--label-align-right form_add" action="<?php echo base_url('nakes/add_layanan/'.$nakes_id) ?>" method="post">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle"><?php echo $title ?></h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">X</span>
		</button>
		<input type="hidden" name="idt" value="" id="idt">
	</div>
	<div class="modal-body">
		<div id="bodyLayanan">
			<table class="table table-striped- table-bordered table-hover table-checkable table-layanan">
				<thead>
					<tr>
						<th width="1%">#
                		</th>
						<th><center>Nama</center></th>
						<th width="15%"><center>Harga</center></th>
						<th width="50%"><center>Keterangan</center></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						if(empty($records)){
							
						}else{
							foreach ($records as $key) {
					?>
								<tr>
									<td>
										<label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
			                                <input type="checkbox" value="<?php echo $key->layanan_id ?>" class="m-checkable" onclick="fval(this)">
			                                    <span></span>
			                            </label>
                        			</td>
									<td><?php echo $key->layanan_nama; ?></td>
									<td><?php echo "Rp " . number_format($key->layanan_harga,2,',','.') ?></td>
									<td><?php echo $key->layanan_keterangan; ?></td>
								</tr>
					<?php 
							}
						} 
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		<?php if (!empty($records)): ?>
		<button type="submit" class="btn btn-primary">Save changes</button>
		<?php endif ?>
	</div>
</form>
<script type="text/javascript">
	var totval = [];
	$(document).ready(function($) {
		global.init_tableBasic('.table-layanan');

		var rules = {
	        layanan_nama		: { required: true },
			layanan_harga		: { required: true },
	    };

	    var message = {};
		global.init_form_validation('.form_add',rules,message);
	})

	function fval(a){
		var val 	= $(a).val();
		if ($(a).is(':checked')) {
			var index = totval.indexOf(val);
			totval.push(val);
		} else {
			var index = totval.indexOf(val);
			totval.splice(index,1);
		}
		$('#idt').val(JSON.stringify(totval));
	}

</script>