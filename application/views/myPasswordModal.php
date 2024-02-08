<div class="row">
	<div class="col-lg-6">
		<div class="card alert">
			<div class="card-header">
				<h4>Set New Password</h4>

			</div>
			<div class="card-body">
				<div class="basic-elements">
					<form action="<?=base_url() ?>" id="vendorForm" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Old Password</label>
									<input type="text" id="oldpassword" name="oldpassword" class="form-control" value="">
								</div>
								<div class="form-group">
									<label>Enter New Password</label>
									<input type="text" id="newpassword" name="newpassword" class="form-control" value="">
								</div>
								<div class="form-group">
									<label>Re-type New Password</label>
									<input type="text" id="retypepassword" name="retypepassword" class="form-control" value="">
								</div>
							</div>
						</div>
						<input  id="updateMyPassword" type="submit" class="btn btn-dark" value="Update Password"/>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<script type="text/javascript">
	$(document).ready(function () {
		$( "#updateMyPassword" ).click(function() {


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
						required: "Vendor Name required",
					},
					vendorAccountNo: {
						required: "vendorAccountNo required",
					},

				},
				submitHandler: function(form) {
					var a=$('#vendorForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/updateMyPassword',
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
								toastr.success("Password updated successfully",'Success',{
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
								$('#modal_ajax').modal('hide');
								//	setTimeout(redirect, 500);
							}
						}
					});
				}
			});


		});
	});
	function redirect()
	{
		window.location.href="<?=base_url()?>Admin/billView"
	}

</script>