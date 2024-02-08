

<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">
						<div class="page-title">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-l-0 title-margin-left">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Dashboard</a></li>
								<li class="active">New beneficiary</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">
				

				<div class="row">
					<div class="col-lg-6">
						<div class="card alert">
							<div class="card-header">
								<h4>New beneficiary</h4>
								<div class="card-header-right-icon">
									<ul>
										<li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
										<li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="basic-elements">
									<form action="<?=base_url() ?>" id="vendorForm" method="post">
										<div class="row">
											<div class="col-lg-6">
											
												<div class="form-group">
													<label>Beneficiary Name</label>
													<input type="text" id="name" name="name" class="form-control" value="">
												</div>
												
												<div class="form-group">
													<label>Account No.</label>
													<input type="text" id="vendorAccountNo" name="vendorAccountNo" class="form-control" value="">
												</div>
												
												<div class="form-group">
													<label>IFSC Code</label>
													<input type="text" id="vendorIFSCCode" name="vendorIFSCCode" class="form-control" value="">
												</div>
												<div class="form-group">
													<label>Bank</label>
													<input type="text" id="vendorBank" name="vendorBank" class="form-control" value="">
												</div>
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" id="vendorMobile" name="vendorMobile" class="form-control" value="">
												</div>
											
												<div class="form-group">
													<label>Branch</label>
													<input type="text" id="address" name="address" class="form-control" value="">
												</div>
												
											</div>
											
										</div>
										<input  id="saveVendor" type="submit" class="btn btn-dark" value="Save beneficiary"/>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /# row -->

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
						url:'<?=base_url()?>admin/saveVendor',
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
								toastr.success("Beneficiary saved successfully",'Success',{
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
