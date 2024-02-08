

<div class="col-lg-6">
	<div class="card alert">
		<div class="card-header">
			<h4>Generate PO</h4>

		</div>
		<div class="card-body">
			<div class="basic-elements">
				<form action="<?=base_url() ?>" id="poForm" method="post">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Is it Urgent Payment?</label>
								<select name="urgent" id="urgent" class="form-control" required="">
									<option value="No">No</option>
									<option value="Yes">Yes</option>

								</select>
							</div>
							<div class="form-group">
								<label>Payment Order Title</label>
								<select name="title" id="title" class="form-control" required="">
									<option value="P.O. For Cheque">For Cheque</option>
									<option value="P.O. For Net Banking">For Net Banking</option>

								</select>
							</div>
							<div class="form-group">
								<label>Payment Order Date</label>
								<input type="text" id="poDate" name="poDate" value="<?=date("d-m-Y") ?>" class="form-control" value="">
							</div>
							<?php

							$data=$this->db->query("select * from department where departmentId='".$this->session->userdata("department")."'")->result_array();

							?>
							<div class="form-group">
								<label>Firm Name</label>
								<input type="text" id="poDate" name="poDate" class="form-control" value="<?=$data[0]["departmentName"]; ?>" disabled="">
							</div>

							<div class="form-group">
								<label>Bank</label>
								<input type="text" id="bank" name="bank" value="" class="form-control"
								>
							</div>
							<div class="form-group">
								<label>Balance</label>
								<input type="text" id="balance" name="balance" value="" class="form-control" >
							</div>
						</div>
					</div>
					<input  id="saveVendor" type="submit" class="btn btn-dark" value="Save PO"/>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$( "#saveVendor" ).click(function() {


			$("form#poForm").validate({
				rules: {
					bank: {
						required: true,
					},
					
				},
				messages: {
					bank: {
						required: "Bank Name required",
					},
					

				},
				submitHandler: function(form) {
					var a=$('#poForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/savePO',
						data:a,
						dataType: "JSON",
						beforeSend:function() {
							//	launchpreloader();
						},
						complete:function(resdata) {

						},
						success:function(resdata) {
							if (resdata.success==0) {
								toastr.error(resdata.message,'Warning',{
									timeOut: 5000,
									"closeButton": true,
									"debug": false,
									"newestOnTop": true,
									"progressBar": true,
									"positionClass": "toast-top-right",
									"preventDuplicates": true,
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut",
									"tapToDismiss": false

								})
							}
							if (resdata.success==1) {
								toastr.success("PO generated successfully",'Success',{
									timeOut: 5000,
									"closeButton": true,
									"debug": false,
									"newestOnTop": true,
									"progressBar": true,
									"positionClass": "toast-top-right",
									"preventDuplicates": true,
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut",
									"tapToDismiss": false

								});
								setTimeout(redirect, 1000);
							}
						}
					});
				}
			});


		});
	});
	function redirect()
	{
		window.location.href="<?=base_url()?>Admin/poListView"
	}
	function load_block(stateid)
	{
		$.ajax(
		{
			url: '<?php echo base_url();?>admin/get_block_list/' + stateid ,
			success: function(response) {
				jQuery('#blockid').html(response);
			}
		});
	}
</script>
