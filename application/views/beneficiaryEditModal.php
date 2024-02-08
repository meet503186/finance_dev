<?php 
$data=$this->db->query("select * from tb_vendors where vendorId='".$param2."'")->result_array();
$row=$data[0];
?>

<div class="row">
	<div class="col-lg-6">
		<div class="card alert">
			<div class="card-header">
				<h4>Edit beneficiary</h4>
				
			</div>
			<div class="card-body">
				<div class="basic-elements">
					<form action="<?=base_url() ?>" id="vendorForm" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Beneficiary Name</label>
									<input type="text" id="name" name="name" class="form-control" value="<?=$row["vendorName"] ?>">
								</div>

								<div class="form-group">
									<label>Account No.</label>
									<input type="text" id="vendorAccountNo" name="vendorAccountNo" class="form-control" value="<?=$row["vendorAccountNo"] ?>">
								</div>

								<div class="form-group">
									<label>IFSC Code</label>
									<input type="text" id="vendorIFSCCode" name="vendorIFSCCode" class="form-control" value="<?=$row["vendorIFSCCode"] ?>">
								</div>
								<div class="form-group">
									<label>Bank</label>
									<input type="text" id="vendorBank" name="vendorBank" class="form-control" value="<?=$row["vendorBank"] ?>">
								</div>
								<div class="form-group">
									<label>Mobile</label>
									<input type="text" id="vendorMobile" name="vendorMobile" class="form-control" value="<?=$row["vendorMobile"] ?>">
								</div>

								<div class="form-group">
									<label>Address</label>
									<input type="text" id="address" name="address" class="form-control" value="<?=$row["vendorAddress"] ?>">
								</div>
							</div>
						</div>
						<input  id="saveVendor" type="submit" class="btn btn-dark" value="Update beneficiary"/>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		$( "#saveVendor" ).click(function() {


			$("form#vendorForm").validate({
				rules: {
					name: {
						required: true,
					},
					vendorAccountNo: {
						required: true,
					},

				},
				messages: {
					name: {
						required: "Beneficiary Name required",
					},
					vendorAccountNo: {
						required: "Beneficiary AccountNo required",
					},

				},
				submitHandler: function(form) {
					var a=$('#vendorForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/updateVendor/<?=$param2?>',
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
								toastr.success("Beneficiary updated successfully",'Success',{
									timeOut: 1000,
									"closeButton": true,
									"debug": false,
									"newestOnTop": true,
									"progressBar": true,
									"positionClass": "toast-top-right",
									"preventDuplicates": true,
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "500",
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
		window.location.href="<?=base_url()?>Admin/beneficiaryView"
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
